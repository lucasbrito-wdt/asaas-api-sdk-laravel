<?php

namespace Asaas\Laravel;

enum Environment: string
{
    case Production = 'production';
    case Sandbox = 'sandbox';

    public function baseUrl(): string
    {
        return match ($this) {
            self::Production => 'https://api.asaas.com',
            self::Sandbox => 'https://api-sandbox.asaas.com',
        };
    }

    public static function fromString(string $value): self
    {
        return match (strtolower($value)) {
            'production', 'prod' => self::Production,
            default => self::Sandbox,
        };
    }
}
