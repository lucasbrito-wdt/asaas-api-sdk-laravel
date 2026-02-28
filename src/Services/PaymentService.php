<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\Payment\ListPaymentsRequest;
use Asaas\Laravel\Http\Requests\Payment\StorePaymentRequest;
use Asaas\Laravel\Http\Requests\Payment\UpdatePaymentRequest;
use Asaas\Laravel\Models\Payment;
use Asaas\Laravel\Models\PaymentDeleteResult;
use Asaas\Laravel\Models\PaymentList;

class PaymentService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): PaymentList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListPaymentsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/payments', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var PaymentList $result */
        $result = $this->executeAndMap($request, PaymentList::class);
        return $result;
    }

    /** @param array<string, mixed> $data */
    public function create(array $data): Payment
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $content = StorePaymentRequest::validate($data);
        $builder = (new RequestBuilder('v3/payments', 'POST'))->setJsonContent($content);
        $request = $this->buildRequest($builder);
        /** @var Payment $result */
        $result = $this->executeAndMap($request, Payment::class);
        return $result;
    }

    public function get(string $id): Payment
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $builder = (new RequestBuilder('v3/payments/{id}', 'GET'))->setPathParameter('id', $id);
        $request = $this->buildRequest($builder);
        /** @var Payment $result */
        $result = $this->executeAndMap($request, Payment::class);
        return $result;
    }

    /** @param array<string, mixed> $data */
    public function update(string $id, array $data): Payment
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $content = UpdatePaymentRequest::validate($data);
        $builder = (new RequestBuilder('v3/payments/{id}', 'PUT'))
            ->setPathParameter('id', $id)
            ->setJsonContent($content);
        $request = $this->buildRequest($builder);
        /** @var Payment $result */
        $result = $this->executeAndMap($request, Payment::class);
        return $result;
    }

    public function delete(string $id): PaymentDeleteResult
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $builder = (new RequestBuilder('v3/payments/{id}', 'DELETE'))->setPathParameter('id', $id);
        $request = $this->buildRequest($builder);
        /** @var PaymentDeleteResult $result */
        $result = $this->executeAndMap($request, PaymentDeleteResult::class);
        return $result;
    }
}
