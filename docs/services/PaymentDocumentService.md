# PaymentDocumentService

## Propósito

Serviço que encapsula o recurso **Documentos de pagamento** da API Asaas. No Laravel expõe listagem; no Java inclui listar, criar, obter, atualizar e remover documentos de um pagamento.

---

## Endpoint base

- **API Asaas:** `v3/paymentDocuments` (Laravel) / `v3/payments/{id}/documents` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\PaymentDocumentService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista documentos de pagamento | `array $params = []` (query) | `PaymentDocumentList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListPaymentDocumentsRequest::validate($params)`.

### Models / Requests

- **Models:** `PaymentDocument`, `PaymentDocumentList`
- **Requests:** `ListPaymentDocumentsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\PaymentDocumentService;

$service = app(PaymentDocumentService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Documentos de pagamento**.
