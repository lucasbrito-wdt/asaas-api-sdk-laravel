<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\PaymentDocument\ListPaymentDocumentsRequest;
use Asaas\Laravel\Models\PaymentDocumentList;

class PaymentDocumentService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PaymentDocumentList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPaymentDocumentsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/paymentDocuments', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PaymentDocumentList $result */
        $result = $this->executeAndMap($request, PaymentDocumentList::class);
        return $result;
    }
}
