<?php

namespace Asaas\Laravel\Http\Requests\Payment;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Valida parâmetros de query para listagem de pagamentos (API Asaas).
 *
 * @internal Request usado apenas para validação interna do SDK. Não exposto na API pública.
 */
class ListPaymentsRequest implements Arrayable
{
    public function __construct(
        public ?int $offset = null,
        public ?int $limit = null,
        public ?string $customer = null,
        public ?string $billingType = null,
        public ?string $status = null,
        public ?string $subscription = null,
        public ?string $installment = null,
        public ?string $externalReference = null,
        public ?string $paymentDate = null,
        public ?string $paymentDateGe = null,
        public ?string $paymentDateLe = null,
    ) {
    }

    /** @return array<string, mixed> */
    public static function rules(): array
    {
        return [
            'offset' => ['nullable', 'integer', 'min:0'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'customer' => ['nullable', 'string', 'max:100'],
            'billingType' => ['nullable', 'string', 'in:BOLETO,CREDIT_CARD,DEBIT_CARD,PIX,UNDEFINED'],
            'status' => ['nullable', 'string', 'max:50'],
            'subscription' => ['nullable', 'string', 'max:100'],
            'installment' => ['nullable', 'string', 'max:100'],
            'externalReference' => ['nullable', 'string', 'max:100'],
            'paymentDate' => ['nullable', 'string', 'max:30'],
            'paymentDateGe' => ['nullable', 'string', 'max:30'],
            'paymentDateLe' => ['nullable', 'string', 'max:30'],
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

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn ($v) => $v !== null);
    }
}
