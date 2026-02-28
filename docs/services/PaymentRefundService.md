# PaymentRefundService

## Propósito

Serviço que encapsula o recurso **Reembolsos** de pagamentos da API Asaas. No Laravel expõe listagem; no Java inclui criar reembolso e reembolso de boleto.

---

## Endpoint base

- **API Asaas:** `v3/payments/refunds` (Laravel) / `v3/payments/{id}/refunds` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\PaymentRefundService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista reembolsos | `array $params = []` (query) | `PaymentRefundList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListPaymentRefundsRequest::validate($params)`.

### Models / Requests

- **Models:** `PaymentRefund`, `PaymentRefundList`
- **Requests:** `ListPaymentRefundsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\PaymentRefundService;

$service = app(PaymentRefundService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Reembolsos** / **Refunds**.
