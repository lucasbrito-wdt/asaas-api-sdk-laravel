# PixTransactionService

## Propósito

Serviço que encapsula o recurso **Transações PIX** da API Asaas. No Laravel expõe listagem em `v3/pix/transactions`; no Java inclui pagar QR code, decodificar QR code, obter, listar e cancelar transação.

---

## Endpoint base

- **API Asaas:** `v3/pix/transactions` (Laravel) / `v3/pix/transactions`, `v3/pix/qrCodes/pay`, `v3/pix/qrCodes/decode` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\PixTransactionService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista transações PIX | `array $params = []` (query) | `PixTransactionList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListPixTransactionsRequest::validate($params)`.

### Models / Requests

- **Models:** `PixTransaction`, `PixTransactionList`
- **Requests:** `ListPixTransactionsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\PixTransactionService;

$service = app(PixTransactionService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Transações PIX**.
