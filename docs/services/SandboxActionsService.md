# SandboxActionsService

## Propósito

Serviço que encapsula as **Ações de sandbox** da API Asaas para ambiente de testes. Permite listar ações disponíveis.

---

## Endpoint base

- **API Asaas:** `v3/sandbox`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\SandboxActionsService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista ações de sandbox disponíveis | `array $params = []` (query) | `SandboxActionList` |

### Parâmetros (query/body)

**Listagem:** conforme API (quando aplicável); pode não seguir paginação padrão.

### Models / Requests

- **Models:** `SandboxAction`, `SandboxActionList`
- **Requests:** `ListSandboxActionsRequest` (se aplicável)

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\SandboxActionsService;

$service = app(SandboxActionsService::class);
$list = $service->list([]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Sandbox** / **Ambiente de testes**.
