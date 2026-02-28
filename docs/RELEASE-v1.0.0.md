# Asaas API SDK Laravel — v1.0.0

Primeira versão estável do SDK Laravel para a [API Asaas v3](https://api.asaas.com/). Integração pronta para uso em projetos Laravel 11.x e 12.x com PHP 8.2+.

---

## Destaques

- **Cliente HTTP** com retry automático (backoff exponencial) para códigos 408, 429 e 5xx
- **33 serviços** cobrindo os recursos da API Asaas (clientes, cobranças, assinaturas, PIX, transferências, webhooks, etc.)
- **Models tipadas** para respostas (ex.: `Customer`, `CustomerList`, `Payment`, `PaymentList`)
- **Form Requests** para validação de parâmetros de listagem e de criação/atualização (ex.: `ListCustomersRequest`, `StoreCustomerRequest`)
- **CRUD completo** para Clientes e Cobranças; demais serviços com método `list()` e retorno tipado
- **Autenticação** via header `access_token` (compatível com a API Asaas)
- **Documentação** em Markdown para todos os serviços em `docs/services/`

---

## Instalação

```bash
composer require luquinhasbrito/asaas-api-sdk-laravel
```

## Configuração rápida

1. Publique o arquivo de configuração:

```bash
php artisan vendor:publish --tag=asaas-config
```

2. Configure no `.env`:

```env
ASAAS_API_KEY=sua_api_key
ASAAS_ENV=sandbox
```

3. Use o helper ou o container:

```php
$sdk = asaas();
$list = $sdk->customer->list(['limit' => 10]);
$customer = $sdk->customer->create(['name' => 'João', 'email' => 'joao@exemplo.com', 'cpfCnpj' => '12345678909']);
```

---

## Serviços disponíveis

| Categoria        | Serviços |
|------------------|----------|
| Core             | Customer, Payment |
| Cobrança / Faturamento | Subscription, Invoice, Bill, Installment, PaymentLink, Checkout, PaymentWithSummaryData |
| PIX              | Pix, PixTransaction, RecurringPix |
| Financeiro       | Transfer, Anticipation, Finance, FinancialTransaction |
| Conta            | AccountDocument, AccountInfo, FiscalInfo, EscrowAccount, Subaccount |
| Outros           | Webhook, Notification, PaymentRefund, Chargeback, PaymentDocument, PaymentDunning, PaymentSplit, CreditCard, CreditBureauReport, MobilePhoneRecharge, SandboxActions |

---

## Exceções

- `Asaas\Laravel\Exceptions\ApiError` — erros gerais da API
- `Asaas\Laravel\Exceptions\ErrorResponseDtoException` — erros 400 com detalhes retornados pela API (`getErrors()`)

---

## Requisitos

- **PHP** 8.2+
- **Laravel** 11.x ou 12.x
- **Guzzle** ^7.0

---

## Documentação

- [Índice de serviços](docs/README-services.md) — links para a documentação de cada serviço
- [Inventário de endpoints](docs/services-inventory.md) — tabela de serviços e métodos
- [Plano de documentação](docs/PLAN.md) — estrutura e convenções dos docs

---

## Licença

MIT.
