<?php

namespace Asaas\Laravel\Http\Requests\FinancialTransaction;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @internal Request usado apenas para validação interna do SDK.
 */
class ListFinancialTransactionsRequest
{
    /** @return array<string, mixed> */
    public static function rules(): array
    {
        return [
            'offset' => ['nullable', 'integer', 'min:0'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
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
}
