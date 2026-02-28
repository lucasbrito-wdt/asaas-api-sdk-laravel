# EscrowAccountService

## Propósito

Serviço que encapsula o recurso **Contas em garantia (escrow)** da API Asaas. No Laravel expõe listagem; no Java expõe finalização de escrow.

---

## Endpoint base

- **API Asaas:** `v3/escrow` (Laravel) / `v3/escrow/{id}/finish` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\EscrowAccountService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista contas escrow com paginação e filtros | `array $params = []` (query) | `EscrowAccountList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListEscrowAccountsRequest::validate($params)`.

### Models / Requests

- **Models:** `EscrowAccount`, `EscrowAccountList`
- **Requests:** `ListEscrowAccountsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\EscrowAccountService;

$service = app(EscrowAccountService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Escrow** / **Contas em garantia**.
