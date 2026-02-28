# RecurringPixService

## Propósito

Serviço que encapsula o recurso **PIX recorrente** da API Asaas. No Laravel expõe listagem em `v3/recurringPix`; no Java usa `v3/pix/transactions/recurrings` com listar, obter, cancelar e itens recorrentes.

---

## Endpoint base

- **API Asaas:** `v3/recurringPix` (Laravel) / `v3/pix/transactions/recurrings` (Java)

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\RecurringPixService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista PIX recorrentes | `array $params = []` (query) | `RecurringPixList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListRecurringPixRequest::validate($params)`.

### Models / Requests

- **Models:** `RecurringPix`, `RecurringPixList`
- **Requests:** `ListRecurringPixRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\RecurringPixService;

$service = app(RecurringPixService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **PIX recorrente**.
