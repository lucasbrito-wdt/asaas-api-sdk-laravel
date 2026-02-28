<?php

namespace Asaas\Laravel\Tests;

use Asaas\Laravel\Config\AsaasSdkConfig;
use Asaas\Laravel\Environment;
use Asaas\Laravel\Http\RequestBuilder;
use PHPUnit\Framework\TestCase;

class RequestBuilderTest extends TestCase
{
    public function test_build_url_with_path_params(): void
    {
        $builder = new RequestBuilder('v3/customers/{id}', 'GET');
        $builder->setPathParameter('id', 'cus_123');
        $built = $builder->build();
        $this->assertSame('GET', $built['method']);
        $this->assertStringContainsString('cus_123', $built['path']);
        $this->assertSame('v3/customers/cus_123', $built['path']);
    }

    public function test_build_url_with_query_params(): void
    {
        $builder = new RequestBuilder('v3/customers', 'GET');
        $builder->setOptionalQueryParameter('limit', 10);
        $builder->setOptionalQueryParameter('offset', 0);
        $built = $builder->build();
        $this->assertStringContainsString('limit=10', $built['path']);
        $this->assertStringContainsString('offset=0', $built['path']);
    }

    public function test_config_from_array(): void
    {
        $config = AsaasSdkConfig::fromArray([
            'api_key' => 'key_xxx',
            'environment' => 'sandbox',
        ]);
        $this->assertSame('key_xxx', $config->apiKey);
        $this->assertSame(Environment::Sandbox, $config->environment);
        $this->assertStringContainsString('sandbox', $config->getBaseUrl());
    }
}
