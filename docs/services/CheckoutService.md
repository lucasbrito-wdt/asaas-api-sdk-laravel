# CheckoutService

## Propósito

Serviço que encapsula o recurso **Checkout** da API Asaas. Permite listar sessões de checkout. No Java inclui criar e cancelar checkout.

---

## Endpoint base

- **API Asaas:** `v3/checkout` (Laravel) / `v3/checkouts` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\CheckoutService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista checkouts com paginação e filtros | `array $params = []` (query) | `CheckoutList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListCheckoutRequest::validate($params)`.

### Models / Requests

- **Models:** `Checkout`, `CheckoutList`
- **Requests:** `ListCheckoutRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\CheckoutService;

$service = app(CheckoutService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Checkout**.
