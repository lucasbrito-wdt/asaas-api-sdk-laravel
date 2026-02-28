<?php

namespace Asaas\Laravel\Http\Requests\Customer;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @internal Request usado apenas para validação interna do SDK. Não exposto na API pública.
 */
class StoreCustomerRequest implements Arrayable
{
    public function __construct(
        public ?string $name = null,
        public ?string $email = null,
        public ?string $cpfCnpj = null,
        public ?string $externalReference = null,
        public ?bool $notificationDisabled = null,
        public ?string $mobilePhone = null,
        public ?string $phone = null,
        public ?string $postalCode = null,
        public ?string $address = null,
        public ?string $addressNumber = null,
        public ?string $complement = null,
        public ?string $province = null,
        public ?int $city = null,
        public ?string $state = null,
        public ?string $country = null,
        public ?string $observations = null,
        public ?int $personType = null,
    ) {
    }

    /** @return array<string, mixed> */
    public static function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:100'],
            'cpfCnpj' => ['nullable', 'string', 'max:18'],
            'externalReference' => ['nullable', 'string', 'max:100'],
            'notificationDisabled' => ['nullable', 'boolean'],
            'mobilePhone' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:20'],
            'postalCode' => ['nullable', 'string', 'max:9'],
            'address' => ['nullable', 'string', 'max:300'],
            'addressNumber' => ['nullable', 'string', 'max:10'],
            'complement' => ['nullable', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'integer'],
            'state' => ['nullable', 'string', 'max:2'],
            'country' => ['nullable', 'string', 'max:3'],
            'observations' => ['nullable', 'string'],
            'personType' => ['nullable', 'integer', 'in:0,1'],
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
            name: $validated['name'] ?? null,
            email: $validated['email'] ?? null,
            cpfCnpj: $validated['cpfCnpj'] ?? null,
            externalReference: $validated['externalReference'] ?? null,
            notificationDisabled: $validated['notificationDisabled'] ?? null,
            mobilePhone: $validated['mobilePhone'] ?? null,
            phone: $validated['phone'] ?? null,
            postalCode: $validated['postalCode'] ?? null,
            address: $validated['address'] ?? null,
            addressNumber: $validated['addressNumber'] ?? null,
            complement: $validated['complement'] ?? null,
            province: $validated['province'] ?? null,
            city: isset($validated['city']) ? (int) $validated['city'] : null,
            state: $validated['state'] ?? null,
            country: $validated['country'] ?? null,
            observations: $validated['observations'] ?? null,
            personType: isset($validated['personType']) ? (int) $validated['personType'] : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn ($v) => $v !== null);
    }
}
