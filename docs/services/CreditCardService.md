# CreditCardService

## Propósito

Serviço que encapsula o recurso **Cartão de crédito** da API Asaas. Permite listar.

---

## Endpoint base

- **API Asaas:** `v3/creditCard`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\CreditCardService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista recursos de cartão (conforme API) | `array $params = []` (query) | `CreditCardList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListCreditCardRequest::validate($params)`.

### Models / Requests

- **Models:** `CreditCard`, `CreditCardList`
- **Requests:** `ListCreditCardRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\CreditCardService;

$service = app(CreditCardService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Cartão de crédito** / **Tokenização**.
