# PaymentWithSummaryDataService

## Propósito

Serviço que encapsula o recurso **Pagamentos com dados resumidos** da API Asaas. Permite listar. no path `v3/payments/summary`.

---

## Endpoint base

- **API Asaas:** `v3/payments/summary`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\PaymentWithSummaryDataService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista pagamentos com dados resumidos | `array $params = []` (query) | `PaymentWithSummaryList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListPaymentWithSummaryRequest::validate($params)`.

### Models / Requests

- **Models:** `PaymentWithSummary`, `PaymentWithSummaryList`
- **Requests:** `ListPaymentWithSummaryRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\PaymentWithSummaryDataService;

$service = app(PaymentWithSummaryDataService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Pagamentos** / **Payments** (lean/summary).
