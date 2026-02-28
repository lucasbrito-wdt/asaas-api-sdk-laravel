<?php

namespace Asaas\Laravel\Config;

use Asaas\Laravel\Environment;

final class AsaasSdkConfig
{
    public function __construct(
        public readonly string $apiKey,
        public readonly Environment $environment,
        public readonly ?string $baseUrl = null,
        public readonly int $timeout = 10000,
        public readonly string $userAgent = 'asaas-api-sdk-laravel/1.0',
        public readonly RetryConfig $retryConfig = new RetryConfig(),
        public readonly string $apiKeyHeader = 'access_token',
    ) {
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl ?? $this->environment->baseUrl();
    }

    public function getApiKeyAuthConfig(): ApiKeyAuthConfig
    {
        return new ApiKeyAuthConfig($this->apiKey, $this->apiKeyHeader);
    }

    public static function fromArray(array $config): self
    {
        $env = isset($config['environment'])
            ? Environment::fromString($config['environment'])
            : Environment::Sandbox;

        $retry = isset($config['retry']) && is_array($config['retry'])
            ? RetryConfig::fromArray($config['retry'])
            : new RetryConfig();

        return new self(
            apiKey: $config['api_key'] ?? '',
            environment: $env,
            baseUrl: $config['base_url'] ?? null,
            timeout: (int) ($config['timeout'] ?? 10000),
            userAgent: $config['user_agent'] ?? 'asaas-api-sdk-laravel/1.0',
            retryConfig: $retry,
            apiKeyHeader: $config['api_key_header'] ?? 'access_token',
        );
    }
}
