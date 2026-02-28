<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\PaymentLink\ListPaymentLinksRequest;
use Asaas\Laravel\Models\PaymentLinkList;

class PaymentLinkService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PaymentLinkList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPaymentLinksRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/paymentLinks', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PaymentLinkList $result */
        $result = $this->executeAndMap($request, PaymentLinkList::class);
        return $result;
    }
}
