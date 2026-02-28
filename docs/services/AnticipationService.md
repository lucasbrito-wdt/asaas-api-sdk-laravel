# AnticipationService

## Propósito

Serviço que encapsula o recurso **Antecipações** da API Asaas. Permite listar antecipações de recebíveis. No Java inclui também obter, criar, simular, listar configurações, limites e cancelar antecipação.

---

## Endpoint base

- **API Asaas:** `v3/anticipations`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\AnticipationService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista antecipações com paginação e filtros | `array $params = []` (query) | `AnticipationList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListAnticipationsRequest::validate($params)`.

### Models / Requests

- **Models:** `Anticipation`, `AnticipationList`
- **Requests:** `ListAnticipationsRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\AnticipationService;

$service = app(AnticipationService::class);
$list = $service->list(['limit' => 10, 'offset' => 0]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Antecipações**.
