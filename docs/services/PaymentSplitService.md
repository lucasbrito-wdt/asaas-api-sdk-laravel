# PaymentSplitService

## Propósito

Serviço que encapsula o recurso **Split de pagamentos** da API Asaas. Permite listar.

---

## Endpoint base

- **API Asaas:** `v3/paymentSplits`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\PaymentSplitService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista splits de pagamento | `array $params = []` (query) | `PaymentSplitList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListPaymentSplitsRequest::validate($params)`.

### Models / Requests

- **Models:** `PaymentSplit`, `PaymentSplitList`
- **Requests:** `ListPaymentSplitsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\PaymentSplitService;

$service = app(PaymentSplitService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Split de pagamentos**.
