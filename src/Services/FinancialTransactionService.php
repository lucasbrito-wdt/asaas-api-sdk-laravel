<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\FinancialTransaction\ListFinancialTransactionsRequest;
use Asaas\Laravel\Models\FinancialTransactionList;

class FinancialTransactionService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): FinancialTransactionList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListFinancialTransactionsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/financialTransactions', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var FinancialTransactionList $result */
        $result = $this->executeAndMap($request, FinancialTransactionList::class);
        return $result;
    }
}
