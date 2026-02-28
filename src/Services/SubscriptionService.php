<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\Subscription\ListSubscriptionsRequest;
use Asaas\Laravel\Models\SubscriptionList;

class SubscriptionService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): SubscriptionList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListSubscriptionsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/subscriptions', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var SubscriptionList $result */
        $result = $this->executeAndMap($request, SubscriptionList::class);
        return $result;
    }
}
