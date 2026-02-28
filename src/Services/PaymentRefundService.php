<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\PaymentRefund\ListPaymentRefundsRequest;
use Asaas\Laravel\Models\PaymentRefundList;

class PaymentRefundService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PaymentRefundList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPaymentRefundsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/payments/refunds', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PaymentRefundList $result */
        $result = $this->executeAndMap($request, PaymentRefundList::class);
        return $result;
    }
}
