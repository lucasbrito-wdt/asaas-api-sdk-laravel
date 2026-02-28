<?php

namespace Asaas\Laravel\Models;

use Illuminate\Contracts\Support\Arrayable;

/** Resposta de listagem paginada de chargebacks (API Asaas). */
final class ChargebackList implements Arrayable
{
    /** @param list<Chargeback> $items */
    public function __construct(
        public readonly array $items = [],
        public readonly ?int $totalCount = null,
        public readonly ?bool $hasMore = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        $raw = $data['data'] ?? [];
        $items = [];
        foreach (is_array($raw) ? $raw : [] as $item) {
            $items[] = Chargeback::fromArray(is_array($item) ? $item : []);
        }
        return new self(
            items: $items,
            totalCount: isset($data['totalCount']) ? (int) $data['totalCount'] : null,
            hasMore: $data['hasMore'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'data' => array_map(fn (Chargeback $x) => $x->toArray(), $this->items),
            'totalCount' => $this->totalCount,
            'hasMore' => $this->hasMore,
        ];
    }
}
