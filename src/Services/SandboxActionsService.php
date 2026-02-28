<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\SandboxAction\ListSandboxActionsRequest;
use Asaas\Laravel\Models\SandboxActionList;

class SandboxActionsService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): SandboxActionList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListSandboxActionsRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/sandbox', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var SandboxActionList $result */
        $result = $this->executeAndMap($request, SandboxActionList::class);
        return $result;
    }
}
