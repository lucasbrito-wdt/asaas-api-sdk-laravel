<?php

namespace Asaas\Laravel\Http\Requests\Payment;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @internal Request usado apenas para validação interna do SDK. Não exposto na API pública.
 */
class UpdatePaymentRequest implements Arrayable
{
    public function __construct(
        public ?string $billingType = null,
        public ?float $value = null,
        public ?string $dueDate = null,
        public ?string $description = null,
        public ?string $externalReference = null,
        public ?float $discount = null,
        public ?int $interest = null,
        public ?float $fine = null,
    ) {
    }

    /** @return array<string, mixed> */
    public static function rules(): array
    {
        return [
            'billingType' => ['nullable', 'string', 'in:BOLETO,CREDIT_CARD,DEBIT_CARD,PIX,UNDEFINED'],
            'value' => ['nullable', 'numeric', 'min:0'],
            'dueDate' => ['nullable', 'string', 'max:10'],
            'description' => ['nullable', 'string', 'max:500'],
            'externalReference' => ['nullable', 'string', 'max:100'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'interest' => ['nullable', 'integer', 'min:0'],
            'fine' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     * @throws ValidationException
     */
    public static function validate(array $data): array
    {
        return Validator::make($data, self::rules())->validate();
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        $validated = self::validate($data);
        return new self(
            billingType: $validated['billingType'] ?? null,
            value: isset($validated['value']) ? (float) $validated['value'] : null,
            dueDate: $validated['dueDate'] ?? null,
            description: $validated['description'] ?? null,
            externalReference: $validated['externalReference'] ?? null,
            discount: isset($validated['discount']) ? (float) $validated['discount'] : null,
            interest: isset($validated['interest']) ? (int) $validated['interest'] : null,
            fine: isset($validated['fine']) ? (float) $validated['fine'] : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn ($v) => $v !== null);
    }
}
