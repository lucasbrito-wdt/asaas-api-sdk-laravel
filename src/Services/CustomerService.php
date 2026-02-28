<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\Customer\ListCustomersRequest;
use Asaas\Laravel\Http\Requests\Customer\StoreCustomerRequest;
use Asaas\Laravel\Http\Requests\Customer\UpdateCustomerRequest;
use Asaas\Laravel\Models\Customer;
use Asaas\Laravel\Models\CustomerDeleteResult;
use Asaas\Laravel\Models\CustomerList;

class CustomerService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): CustomerList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListCustomersRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/customers', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var CustomerList $result */
        $result = $this->executeAndMap($request, CustomerList::class);
        return $result;
    }

    /** @param array<string, mixed> $data */
    public function create(array $data): Customer
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $content = StoreCustomerRequest::validate($data);
        $builder = (new RequestBuilder('v3/customers', 'POST'))->setJsonContent($content);
        $request = $this->buildRequest($builder);
        /** @var Customer $result */
        $result = $this->executeAndMap($request, Customer::class);
        return $result;
    }

    public function get(string $id): Customer
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $builder = (new RequestBuilder('v3/customers/{id}', 'GET'))->setPathParameter('id', $id);
        $request = $this->buildRequest($builder);
        /** @var Customer $result */
        $result = $this->executeAndMap($request, Customer::class);
        return $result;
    }

    /** @param array<string, mixed> $data */
    public function update(string $id, array $data): Customer
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $content = UpdateCustomerRequest::validate($data);
        $builder = (new RequestBuilder('v3/customers/{id}', 'PUT'))
            ->setPathParameter('id', $id)
            ->setJsonContent($content);
        $request = $this->buildRequest($builder);
        /** @var Customer $result */
        $result = $this->executeAndMap($request, Customer::class);
        return $result;
    }

    public function delete(string $id): CustomerDeleteResult
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $builder = (new RequestBuilder('v3/customers/{id}', 'DELETE'))->setPathParameter('id', $id);
        $request = $this->buildRequest($builder);
        /** @var CustomerDeleteResult $result */
        $result = $this->executeAndMap($request, CustomerDeleteResult::class);
        return $result;
    }
}
