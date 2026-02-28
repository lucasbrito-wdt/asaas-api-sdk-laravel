# AccountInfoService

## Propósito

Serviço que encapsula o recurso **Informações da conta** (myAccount) da API Asaas. Permite listar.

---

## Endpoint base

- **API Asaas:** `v3/myAccount`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\AccountInfoService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista informações da conta | `array $params = []` (query) | `AccountInfoList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListAccountInfoRequest::validate($params)`.

### Models / Requests

- **Models:** `AccountInfo`, `AccountInfoList`
- **Requests:** `ListAccountInfoRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\AccountInfoService;

$service = app(AccountInfoService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Minha conta** / **My Account**.
