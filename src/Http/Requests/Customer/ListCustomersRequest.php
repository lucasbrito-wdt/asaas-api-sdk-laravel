<?php

namespace Asaas\Laravel\Http\Requests\Customer;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @internal Request usado apenas para validação interna do SDK. Não exposto na API pública.
 */
class ListCustomersRequest implements Arrayable
{
    public function __construct(
        public ?int $offset = null,
        public ?int $limit = null,
        public ?string $name = null,
        public ?string $email = null,
        public ?string $cpfCnpj = null,
        public ?string $groupName = null,
        public ?string $externalReference = null,
    ) {
    }

    /** @return array<string, mixed> */
    public static function rules(): array
    {
        return [
            'offset' => ['nullable', 'integer', 'min:0'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'name' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'string', 'max:100'],
            'cpfCnpj' => ['nullable', 'string', 'max:18'],
            'groupName' => ['nullable', 'string', 'max:100'],
            'externalReference' => ['nullable', 'string', 'max:100'],
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

    /** Retorna os parâmetros validados para query string (chave => valor, sem nulls). */
    public function toQuery(): array
    {
        $out = [];
        foreach (['offset', 'limit', 'name', 'email', 'cpfCnpj', 'groupName', 'externalReference'] as $key) {
            $v = $this->{$key} ?? null;
            if ($v !== null) {
                $out[$key] = $v;
            }
        }
        return $out;
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn ($v) => $v !== null);
    }
}
