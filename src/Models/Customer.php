<?php

namespace Asaas\Laravel\Models;

use Illuminate\Contracts\Support\Arrayable;

/** @phpstan-type CustomerData array{id?: string, name?: string, email?: string, cpfCnpj?: string, ...} */
final class Customer implements Arrayable
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $email = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $externalReference = null,
        public readonly array $data = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            email: $data['email'] ?? null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            data: $data,
        );
    }

    public function toArray(): array
    {
        return array_merge($this->data, array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cpfCnpj' => $this->cpfCnpj,
            'externalReference' => $this->externalReference,
        ], fn ($v) => $v !== null));
    }
}
