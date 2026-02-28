<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\FiscalInfo\ListFiscalInfoRequest;
use Asaas\Laravel\Models\FiscalInfoList;

class FiscalInfoService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): FiscalInfoList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListFiscalInfoRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/fiscalInfo', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var FiscalInfoList $result */
        $result = $this->executeAndMap($request, FiscalInfoList::class);
        return $result;
    }
}
