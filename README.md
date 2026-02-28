# Asaas API SDK Laravel

SDK Laravel para a [API Asaas v3](https://api.asaas.com/), com cliente HTTP (retry com backoff exponencial), serviços para os principais recursos, models e validação interna (Requests internos), API pública com arrays.

- **Laravel:** 11.x | 12.x  
- **PHP:** 8.2+

## Instalação

```bash
composer require asaas/asaas-api-sdk-laravel
```

## Configuração

Publique o arquivo de configuração:

```bash
php artisan vendor:publish --tag=asaas-config
```

Configure no `.env`:

```env
ASAAS_API_KEY=sua_api_key
ASAAS_ENV=sandbox
# ASAAS_BASE_URL=  # opcional, override da URL base
# ASAAS_TIMEOUT=10000
# ASAAS_RETRY_MAX=1
```

Em aplicações Laravel o SDK é registrado como singleton. Use o helper ou a facade (se publicada):

```php
use Asaas\Laravel\AsaasSdk;

$sdk = app(AsaasSdk::class);
// ou
$sdk = asaas();
```

Fora do Laravel, crie a instância a partir do array de config:

```php
use Asaas\Laravel\AsaasSdk;

$sdk = AsaasSdk::fromConfig([
    'api_key' => getenv('ASAAS_API_KEY'),
    'environment' => 'sandbox',
]);
```

## Uso

### Clientes (Customer)

```php
$sdk = asaas();

// Listar (parâmetros opcionais)
$list = $sdk->customer->list();
$list = $sdk->customer->list(['offset' => 0, 'limit' => 10]);

// Criar
$customer = $sdk->customer->create([
    'name' => 'João',
    'email' => 'joao@exemplo.com',
    'cpfCnpj' => '12345678909',
]);

// Obter
$c = $sdk->customer->get($customer->id);

// Atualizar
$updated = $sdk->customer->update($customer->id, [
    'name' => 'João Silva',
]);

// Remover
$sdk->customer->delete($customer->id);
```

### Pagamentos (Payment)

```php
$sdk = asaas();

// Listar (parâmetros de query)
$payments = $sdk->payment->list(['customer' => 'cus_xxx']);
$payments = $sdk->payment->list(['customer' => 'cus_xxx', 'offset' => 0, 'limit' => 10]);

// Criar cobrança
$payment = $sdk->payment->create([
    'customer' => 'cus_xxx',
    'value' => 99.90,
    'dueDate' => '2025-03-15',
    'billingType' => 'BOLETO',
    'description' => 'Pedido #123',
]);

// Obter / atualizar / deletar
$p = $sdk->payment->get($payment->id);
$sdk->payment->update($payment->id, ['description' => 'Nova descrição']);
$sdk->payment->delete($payment->id);
```

### Outros serviços

O SDK expõe os 32 serviços da API Asaas. Além de `customer` e `payment`, estão disponíveis (entre outros): `subscription`, `webhook`, `transfer`, `invoice`, `accountInfo`, `pix`, etc. Cada um estende `BaseService` e pode ter métodos adicionais implementados conforme a documentação da API.

```php
$sdk->subscription->list();
$sdk->webhook->list();
$sdk->accountInfo->list(); // minha conta
```

## Autenticação

A autenticação é feita via header `access_token` (compatível com o SDK Java). A chave é lida de `config('asaas.api_key')` ou `ASAAS_API_KEY`.

## Retry

O cliente HTTP aplica retry com backoff para códigos 408, 429 e 5xx, conforme `config/asaas.php` (ou padrões). Métodos GET, POST, PUT, PATCH e DELETE são elegíveis para retry.

## Exceções

- `Asaas\Laravel\Exceptions\ApiError` – erros gerais (status, mensagem, response).
- `Asaas\Laravel\Exceptions\ErrorResponseDtoException` – erros 400 com detalhes da API (`getErrors()`).

## Testes

```bash
composer install
./vendor/bin/phpunit
```

## Referência

Para espelhamento dos padrões do SDK Java, consulte a análise em [ANALISE_PROJETO.md](https://github.com/asaasdev/asaas-api-sdk-java) do repositório asaas-api-sdk-java.

## Licença

MIT.
