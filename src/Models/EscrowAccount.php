<?php

namespace Asaas\Laravel\Models;

use Illuminate\Contracts\Support\Arrayable;

/** Representação de uma conta de garantia (resposta da API Asaas). */
final class EscrowAccount implements Arrayable
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly array $data = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            data: $data,
        );
    }

    public function toArray(): array
    {
        return array_merge($this->data, array_filter([
            'id' => $this->id,
        ], fn ($v) => $v !== null));
    }
}
