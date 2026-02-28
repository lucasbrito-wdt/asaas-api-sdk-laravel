# FinanceService

## Propósito

Serviço que encapsula o recurso **Financeiro** da API Asaas. No Laravel expõe listagem; no Java expõe saldo, estatísticas de pagamento e de split.

---

## Endpoint base

- **API Asaas:** `v3/finances` (Laravel) / `v3/finance/*` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\FinanceService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista dados financeiros | `array $params = []` (query) | `FinanceList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListFinanceRequest::validate($params)`.

### Models / Requests

- **Models:** `Finance`, `FinanceList`
- **Requests:** `ListFinanceRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\FinanceService;

$service = app(FinanceService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Financeiro** / **Finance**.
