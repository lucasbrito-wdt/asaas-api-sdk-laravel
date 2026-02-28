<?php

namespace Asaas\Laravel\Models;

use Illuminate\Contracts\Support\Arrayable;

/** Resposta de exclusão de cliente (API Asaas). */
final class CustomerDeleteResult implements Arrayable
{
    public function __construct(
        public readonly ?bool $deleted = null,
        public readonly array $data = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            deleted: $data['deleted'] ?? null,
            data: $data,
        );
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
