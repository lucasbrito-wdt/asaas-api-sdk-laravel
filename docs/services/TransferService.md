# TransferService

## Propósito

Serviço que encapsula o recurso **Transferências** da API Asaas. No Laravel expõe listagem; no Java inclui listar, transferir para outra instituição/conta PIX, transferir para conta Asaas, obter e cancelar transferência.

---

## Endpoint base

- **API Asaas:** `v3/transfers`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\TransferService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista transferências com paginação e filtros | `array $params = []` (query) | `TransferList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListTransfersRequest::validate($params)`.

### Models / Requests

- **Models:** `Transfer`, `TransferList`
- **Requests:** `ListTransfersRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\TransferService;

$service = app(TransferService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Transferências** / **Transfers**.
