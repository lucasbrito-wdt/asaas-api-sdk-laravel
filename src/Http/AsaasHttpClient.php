<?php

namespace Asaas\Laravel\Http;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final class AsaasHttpClient
{
    public function __construct(
        private readonly AsaasSdkConfig $config,
    ) {
    }

    public function send(string $method, string $path, array $headers = [], mixed $body = null): Response
    {
        $auth = $this->config->getApiKeyAuthConfig();
        if ($auth->apiKey !== '') {
            $headers[$auth->apiKeyHeader] = $auth->apiKey;
        }
        $headers['User-Agent'] = $this->config->userAgent;
        $headers['Accept'] = 'application/json';
        $headers['Content-Type'] = 'application/json';

        $baseUrl = rtrim($this->config->getBaseUrl(), '/') . '/';
        $request = Http::baseUrl($baseUrl)
            ->withHeaders($headers)
            ->timeout($this->config->timeout / 1000);

        $retry = $this->config->retryConfig;
        $request = $request->retry(
            $retry->maxRetries,
            $retry->initialDelay,
            function (\Exception $e, PendingRequest $req) use ($retry, $method): bool {
                if (! in_array($method, $retry->methodsToRetry, true)) {
                    return false;
                }
                if ($e instanceof \Illuminate\Http\Client\RequestException && $e->response) {
                    return in_array($e->response->status(), $retry->statusCodesToRetry, true);
                }
                return true;
            },
            throw: false
        );

        $response = match (strtoupper($method)) {
            'GET' => $request->get($path),
            'POST' => $request->withBody(
                is_string($body) ? $body : json_encode($body ?? [], JSON_THROW_ON_ERROR),
                'application/json'
            )->post($path),
            'PUT' => $request->withBody(
                is_string($body) ? $body : json_encode($body ?? [], JSON_THROW_ON_ERROR),
                'application/json'
            )->put($path),
            'PATCH' => $request->withBody(
                is_string($body) ? $body : json_encode($body ?? [], JSON_THROW_ON_ERROR),
                'application/json'
            )->patch($path),
            'DELETE' => $request->delete($path),
            default => $request->send(strtoupper($method), $path, array_filter(['body' => $body])),
        };

        return $response;
    }
}
