<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\PaymentSplit\ListPaymentSplitsRequest;
use Asaas\Laravel\Models\PaymentSplitList;

class PaymentSplitService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PaymentSplitList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPaymentSplitsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/paymentSplits', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PaymentSplitList $result */
        $result = $this->executeAndMap($request, PaymentSplitList::class);
        return $result;
    }
}
