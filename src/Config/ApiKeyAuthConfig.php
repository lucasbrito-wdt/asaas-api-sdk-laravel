<?php

namespace Asaas\Laravel\Config;

final class ApiKeyAuthConfig
{
    public function __construct(
        public readonly string $apiKey,
        public readonly string $apiKeyHeader = 'access_token',
    ) {
    }

    public static function fromArray(array $config): self
    {
        return new self(
            apiKey: $config['api_key'] ?? '',
            apiKeyHeader: $config['api_key_header'] ?? 'access_token',
        );
    }
}
