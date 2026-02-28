<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\CreditBureauReport\ListCreditBureauReportsRequest;
use Asaas\Laravel\Models\CreditBureauReportList;

class CreditBureauReportService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): CreditBureauReportList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListCreditBureauReportsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/creditBureauReport', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var CreditBureauReportList $result */
        $result = $this->executeAndMap($request, CreditBureauReportList::class);
        return $result;
    }
}
