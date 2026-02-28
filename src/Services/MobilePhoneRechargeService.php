<?php

namespace Asaas\Laravel\Services;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Exceptions\ErrorResponseDtoException;
use Asaas\Laravel\Http\AsaasHttpClient;
use Asaas\Laravel\Http\RequestBuilder;
use Asaas\Laravel\Http\Requests\MobilePhoneRecharge\ListMobilePhoneRechargeRequest;
use Asaas\Laravel\Models\MobilePhoneRechargeList;

class MobilePhoneRechargeService extends BaseService
{
    public function __construct(AsaasHttpClient $httpClient, AsaasSdkConfig $config)
    {
        parent::__construct($httpClient, $config);
    }

    /** @param array<string, mixed> $params */
    public function list(array $params = []): MobilePhoneRechargeList
    {
        $this->addErrorMapping(400, ErrorResponseDtoException::class);
        $query = array_filter(ListMobilePhoneRechargeRequest::validate($params), fn ($v) => $v !== null);
        $builder = new RequestBuilder('v3/mobilePhoneRecharge', 'GET');
        foreach ($query as $key => $value) {
            $builder->setOptionalQueryParameter($key, $value);
        }
        $request = $this->buildRequest($builder);
        /** @var MobilePhoneRechargeList $result */
        $result = $this->executeAndMap($request, MobilePhoneRechargeList::class);
        return $result;
    }
}
