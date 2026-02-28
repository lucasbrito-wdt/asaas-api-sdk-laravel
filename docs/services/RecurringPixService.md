# RecurringPixService

## Propósito

Serviço que encapsula o recurso **PIX recorrente** da API Asaas. Permite listar. em `v3/recurringPix`.

---

## Endpoint base

- **API Asaas:** `v3/recurringPix`

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
