<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\AccountInfo\ListAccountInfoRequest;
use Asaas\Laravel\Models\AccountInfoList;

class AccountInfoService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): AccountInfoList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListAccountInfoRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/myAccount', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var AccountInfoList $result */
        $result = $this->executeAndMap($request, AccountInfoList::class);
        return $result;
    }
}
