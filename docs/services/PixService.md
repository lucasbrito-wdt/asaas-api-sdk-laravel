# PixService

## Propósito

Serviço que encapsula o recurso **PIX** da API Asaas. No Laravel expõe listagem; no Java inclui chaves de endereço (addressKeys), QR codes estáticos e token bucket.

---

## Endpoint base

- **API Asaas:** `v3/pix`

---

## Laravel (asaas-api-sdk-laravel)

### Classe

- **Namespace e classe:** `Asaas\Laravel\Services\PixService`

### Métodos

| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| `list` | GET | Lista recursos PIX | `array $params = []` (query) | `PixList` |

### Parâmetros (query/body)

**Listagem:** validados por `ListPixRequest::validate($params)`.

### Models / Requests

- **Models:** `Pix`, `PixList`
- **Requests:** `ListPixRequest`

### Exemplo (Laravel)

```php
use Asaas\Laravel\Services\PixService;

$service = app(PixService::class);
$list = $service->list(['limit' => 10]);
```


---

## Referência API Asaas

- [Documentação Asaas](https://docs.asaas.com) — recurso **PIX**.
