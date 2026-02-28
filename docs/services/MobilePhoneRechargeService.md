# MobilePhoneRechargeService

## Propósito

Serviço que encapsula o recurso **Recarga de celular** da API Asaas. Permite listar recargas.

---

## Endpoint base

- **API Asaas:** `v3/mobilePhoneRecharge`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\MobilePhoneRechargeService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista recargas de celular | `array $params = []` (query) | `MobilePhoneRechargeList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListMobilePhoneRechargeRequest::validate($params)`.

### Models / Requests

- **Models:** `MobilePhoneRecharge`, `MobilePhoneRechargeList`
- **Requests:** `ListMobilePhoneRechargeRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\MobilePhoneRechargeService;

$service = app(MobilePhoneRechargeService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **Recarga de celular**.
