<?php

namespace Asaas\Laravel\Models;

use Illuminate\Contracts\Support\Arrayable;

/** Representação de um pagamento (resposta da API Asaas). */
final class Payment implements Arrayable
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $customer = null,
        public readonly ?float $value = null,
        public readonly ?string $status = null,
        public readonly array $data = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            customer: $data['customer'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            status: $data['status'] ?? null,
            data: $data,
        );
    }

    public function toArray(): array
    {
        return array_merge($this->data, array_filter([
            'id' => $this->id,
            'customer' => $this->customer,
            'value' => $this->value,
            'status' => $this->status,
        ], fn ($v) => $v !== null));
    }
}
