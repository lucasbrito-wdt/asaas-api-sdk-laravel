# Plano: Documentação em Markdown para todos os serviços (Laravel)

## 1. Objetivo

Criar **documentação em Markdown** para **todos os serviços** do SDK **asaas-api-sdk-laravel** (PHP/Laravel), de forma que cada serviço tenha um doc `.md` com propósito, endpoint base, métodos, parâmetros, exemplos e referência a modelos/requests. O plano é acionável na Fase 2 por `documentation-writer` e demais agentes indicados.

---

## 2. Escopo

### 2.1 Serviços a documentar

| # | Serviço | Endpoint base (API Asaas) |
|---|---------|---------------------------|
| 1 | **BaseService** | — (base) |
| 2 | AccountDocumentService | v3/accountDocuments |
| 3 | AccountInfoService | v3/accountInfo |
| 4 | AnticipationService | v3/anticipations |
| 5 | BillService | v3/bills |
| 6 | ChargebackService | v3/chargebacks |
| 7 | CheckoutService | v3/checkout |
| 8 | CreditBureauReportService | v3/creditBureauReports |
| 9 | CreditCardService | v3/creditCard |
| 10 | CustomerService | v3/customers |
| 11 | EscrowAccountService | v3/escrowAccounts |
| 12 | FinancialTransactionService | v3/financialTransactions |
| 13 | FinanceService | v3/finance |
| 14 | FiscalInfoService | v3/fiscalInfo |
| 15 | InstallmentService | v3/installments |
| 16 | InvoiceService | v3/invoices |
| 17 | MobilePhoneRechargeService | v3/mobilePhoneRecharge |
| 18 | NotificationService | v3/notifications |
| 19 | PaymentDocumentService | v3/paymentDocuments |
| 20 | PaymentDunningService | v3/paymentDunning |
| 21 | PaymentLinkService | v3/paymentLinks |
| 22 | PaymentRefundService | v3/refunds |
| 23 | PaymentService | v3/payments |
| 24 | PaymentSplitService | v3/splits |
| 25 | PaymentWithSummaryDataService | v3/payments/summary |
| 26 | PixService | v3/pix |
| 27 | PixTransactionService | v3/pixTransactions |
| 28 | RecurringPixService | v3/recurringPix |
| 29 | SandboxActionsService | v3/sandbox/* |
| 30 | SubaccountService | v3/subaccounts |
| 31 | SubscriptionService | v3/subscriptions |
| 32 | TransferService | v3/transfers |
| 33 | WebhookService | v3/webhooks |

**Total:** 33 serviços (incluindo BaseService). **31 serviços de domínio** com doc próprio (excluindo BaseService na contagem de “um doc por recurso”).

### 2.2 Relação com outros planos

| Plano | Relação |
|-------|--------|
| [PLAN-models-requests-all-services.md](PLAN-models-requests-all-services.md) | Lista Models/Requests por serviço; as docs em MD devem referenciar esses modelos/requests quando existirem. |
| [PLAN-models-requests-remove-dto.md](PLAN-models-requests-remove-dto.md) | Contexto Laravel (Form Requests vs DTOs). |
| [PLAN-api-docs-scribe-scalar.md](PLAN-api-docs-scribe-scalar.md) | Documentação de *endpoints da aplicação* com Scribe/Scalar; este plano é documentação *dos serviços do SDK* em MD (complementar). |

---

## 3. Estrutura padrão de cada documento

Cada doc de serviço deve seguir um template único para facilitar navegação e manutenção. Sugestão:

```markdown
# [Nome do Serviço] (ex.: CustomerService)

## Propósito
Breve descrição do que o serviço faz e qual recurso da API Asaas encapsula.

## Endpoint base
- **API Asaas:** `v3/recurso` (ex.: `v3/customers`)

## Laravel (asaas-api-sdk-laravel)

### Classe
- Namespace e nome da classe (ex.: `Asaas\Laravel\Services\CustomerService`).

### Métodos
| Método | HTTP | Descrição | Parâmetros | Retorno |
|--------|------|-----------|------------|---------|
| list   | GET  | ...       | array $params | CustomerList |
| create | POST | ...       | array $data   | Customer     |
| ...    | ...  | ...       | ...           | ...          |

### Parâmetros (query/body)
- Lista dos parâmetros aceitos (incluindo paginação: offset, limit quando aplicável).
- Referência ao Request de validação, se houver (ex.: `ListCustomersRequest`, `StoreCustomerRequest`).

### Models / Requests
- **Models:** Customer, CustomerList, CustomerDeleteResult.
- **Requests:** StoreCustomerRequest, UpdateCustomerRequest, ListCustomersRequest.

### Exemplo (Laravel)
```php
// list
$list = $customerService->list(['limit' => 10, 'offset' => 0]);

// create
$customer = $customerService->create([...]);
```

---

## Referência API Asaas
- Link para a documentação oficial do recurso (quando disponível).
```

**Regras:**

- **Um arquivo por serviço** (ex.: `docs/services/CustomerService.md`).
- **BaseService:** um único doc `docs/services/BaseService.md` descrevendo contrato base (executeAndMap, buildRequest, error mapping).

---

## 4. Ordem de execução sugerida

Por domínio:

| Ordem | Domínio | Serviços |
|-------|---------|----------|
| 1 | Base | BaseService |
| 2 | Clientes / Cobrança core | CustomerService, PaymentService |
| 3 | Cobrança / Faturamento | SubscriptionService, InvoiceService, BillService, InstallmentService, PaymentLinkService, CheckoutService, PaymentWithSummaryDataService |
| 4 | Pagamentos / Pix | PixService, PixTransactionService, RecurringPixService |
| 5 | Reembolsos / Estornos | PaymentRefundService, ChargebackService |
| 6 | Financeiro / Conta | FinanceService, FinancialTransactionService, TransferService, AnticipationService |
| 7 | Conta / Contabilidade | AccountDocumentService, AccountInfoService, FiscalInfoService, EscrowAccountService, SubaccountService |
| 8 | Outros | CreditCardService, CreditBureauReportService, PaymentDocumentService, PaymentDunningService, PaymentSplitService, NotificationService, WebhookService, MobilePhoneRechargeService, SandboxActionsService |

---

## 5. Critérios de "pronto" (Done when)

- [ ] Existe um arquivo Markdown por serviço na pasta definida (ex.: `docs/services/<ServiceName>.md`).
- [ ] Cada doc contém as seções: **Propósito**, **Endpoint base**, **Laravel** (classe, métodos, parâmetros, models/requests, exemplo).
- [ ] BaseService documentado em `docs/services/BaseService.md`.
- [ ] Tabelas de métodos preenchidas com assinaturas reais (Laravel: retorno tipado).
- [ ] Exemplos de código verificáveis (nomes de classe e método consistentes com o código).
- [ ] Referência à documentação oficial da API Asaas incluída quando houver link estável para o recurso.
- [ ] Revisão de consistência: mesma estrutura em todos os docs; nomenclatura alinhada a [PLAN-models-requests-all-services.md](PLAN-models-requests-all-services.md) (Laravel).

---

## 6. Atribuição sugerida para a Fase 2

| Foco | Agente recomendado | Responsabilidade |
|------|--------------------|------------------|
| Estrutura do template e índice (índice de serviços em `docs/README-services.md` ou no README principal) | **documentation-writer** | Definir template final, índice e convenções de redação. |
| Documentação dos serviços Laravel (preencher métodos, params, models, exemplos) | **documentation-writer** ou **backend-specialist** | Escrever/atualizar os `.md` do SDK Laravel; validar exemplos com o código. |
| Extração de assinaturas e parâmetros a partir do código Laravel | **backend-specialist** | Fornecer listas exatas de métodos e tipos para o documentation-writer. |
| Links e referências à API Asaas | **generalPurpose** ou pesquisa manual | Inserir URLs oficiais por recurso. |

**Sugestão de fluxo:**

1. **documentation-writer:** criar template (seção 3), pasta `docs/services/` e índice; criar primeiro doc completo (ex.: CustomerService) como referência.
2. **backend-specialist:** revisar CustomerService e, em lote, preencher métodos/params/retornos para os demais serviços a partir do código.
3. **documentation-writer:** redigir/ajustar textos (propósito, descrições) e exemplos; adicionar referências à API Asaas.
4. **documentation-writer:** revisão final de consistência e checklist da seção 5.

---

## 7. Localização dos arquivos

| Item | Caminho |
|------|---------|
| Plano geral (este arquivo) | `docs/PLAN.md` |
| Doc por serviço | `docs/services/<ServiceName>.md` (ex.: `docs/services/CustomerService.md`) |
| Índice de serviços | `docs/README-services.md` ou seção "Serviços" no `README.md` do repositório Laravel |

---

## 8. Resumo

| Aspecto | Decisão |
|--------|--------|
| **Objetivo** | Documentação em MD para todos os serviços do SDK Laravel. |
| **Escopo** | 33 serviços (incl. BaseService); 31 de domínio com doc próprio. |
| **Estrutura** | Um `.md` por serviço com: propósito, endpoint base, Laravel (classe, métodos, params, models/requests, exemplo). |
| **Ordem** | Por domínio (base → customer/payment → cobrança → pix → financeiro → outros). |
| **Done when** | Todos os itens da seção 5 marcados; exemplos e assinaturas conferidos com o código. |
| **Agentes Fase 2** | documentation-writer (template, índice, redação, consistência); backend-specialist (extração de métodos/params e validação de exemplos). |
