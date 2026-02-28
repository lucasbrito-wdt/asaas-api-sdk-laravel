<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\Webhook\ListWebhooksRequest;
use Asaas\Laravel\Models\WebhookList;

class WebhookService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): WebhookList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListWebhooksRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/webhooks', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var WebhookList $result */
        $result = $this->executeAndMap($request, WebhookList::class);
        return $result;
    }
}
