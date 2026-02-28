# NotificationService

## Propósito

Serviço que encapsula o recurso **Notificações** da API Asaas. Permite listar notificações. No Java inclui obter uma notificação e atualizar em lote.

---

## Endpoint base

- **API Asaas:** `v3/notifications`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\NotificationService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista notificações com paginação e filtros | `array $params = []` (query) | `NotificationList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListNotificationsRequest::validate($params)`.

### Models / Requests

- **Models:** `Notification`, `NotificationList`
- **Requests:** `ListNotificationsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\NotificationService;

$service = app(NotificationService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Notificações**.
