<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\EscrowAccount\ListEscrowAccountsRequest;
use Asaas\Laravel\Models\EscrowAccountList;

class EscrowAccountService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): EscrowAccountList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListEscrowAccountsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/escrow', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var EscrowAccountList $result */
        $result = $this->executeAndMap($request, EscrowAccountList::class);
        return $result;
    }
}
