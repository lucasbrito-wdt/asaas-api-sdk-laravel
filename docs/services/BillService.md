# BillService

## Propósito

Serviço que encapsula o recurso **Contas a pagar** (bills) da API Asaas. Permite listar contas.

---

## Endpoint base

- **API Asaas:** `v3/bills`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\BillService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista contas a pagar com paginação e filtros | `array $params = []` (query) | `BillList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListBillsRequest::validate($params)`.

### Models / Requests

- **Models:** `Bill`, `BillList`
- **Requests:** `ListBillsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\BillService;

$service = app(BillService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Contas a pagar** / **Bills**.
