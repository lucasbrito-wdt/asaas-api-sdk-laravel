<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\PixTransaction\ListPixTransactionsRequest;
use Asaas\Laravel\Models\PixTransactionList;

class PixTransactionService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PixTransactionList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPixTransactionsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/pix/transactions', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PixTransactionList $result */
        $result = $this->executeAndMap($request, PixTransactionList::class);
        return $result;
    }
}
