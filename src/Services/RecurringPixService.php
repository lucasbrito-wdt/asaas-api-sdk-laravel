<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\RecurringPix\ListRecurringPixRequest;
use Asaas\Laravel\Models\RecurringPixList;

class RecurringPixService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): RecurringPixList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListRecurringPixRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/recurringPix', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var RecurringPixList $result */
        $result = $this->executeAndMap($request, RecurringPixList::class);
        return $result;
    }
}
