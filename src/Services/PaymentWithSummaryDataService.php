<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\PaymentWithSummary\ListPaymentWithSummaryRequest;
use Asaas\Laravel\Models\PaymentWithSummaryList;

class PaymentWithSummaryDataService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PaymentWithSummaryList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPaymentWithSummaryRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/payments/summary', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PaymentWithSummaryList $result */
        $result = $this->executeAndMap($request, PaymentWithSummaryList::class);
        return $result;
    }
}
