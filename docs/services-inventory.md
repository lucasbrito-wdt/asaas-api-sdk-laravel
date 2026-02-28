# Inventário de Serviços — SDK Asaas (Laravel)

**Objetivo:** Referência para documentação MD de todos os serviços (PLAN e Fase 2).  
**Escopo:** Discovery dos arquivos de serviço, endpoint base e métodos públicos no projeto asaas-api-sdk-laravel.  
**Data:** 2025-02-28.

---

## 1. Resumo

| SDK    | Pasta de serviços | Qtde arquivos (excl. BaseService) |
|--------|-------------------|------------------------------------|
| Laravel | `src/Services/`   | 31                                |

**Observações:**
- Todos os serviços expõem pelo menos `list()`; `CustomerService` e `PaymentService` expõem também `create`, `get`, `update`, `delete`.

---

## 2. Tabela consolidada [Serviço | Endpoint base | Métodos]

| Serviço | Endpoint base | Métodos (públicos) |
|---------|----------------|--------------------|
| AccountDocumentService | v3/myAccount/documents | list |
| AccountInfoService | v3/myAccount | list |
| AnticipationService | v3/anticipations | list |
| BillService | v3/bills | list |
| ChargebackService | v3/chargebacks | list |
| CheckoutService | v3/checkout | list |
| CreditBureauReportService | v3/creditBureauReport | list |
| CreditCardService | v3/creditCard | list |
| CustomerService | v3/customers | list, create, get, update, delete |
| EscrowAccountService | v3/escrow | list |
| FinanceService | v3/finances | list |
| FinancialTransactionService | v3/financialTransactions | list |
| FiscalInfoService | v3/fiscalInfo | list |
| InstallmentService | v3/installments | list |
| InvoiceService | v3/invoices | list |
| MobilePhoneRechargeService | v3/mobilePhoneRecharge | list |
| NotificationService | v3/notifications | list |
| PaymentDocumentService | v3/paymentDocuments | list |
| PaymentDunningService | v3/paymentDunnings | list |
| PaymentLinkService | v3/paymentLinks | list |
| PaymentRefundService | v3/payments/refunds | list |
| PaymentService | v3/payments | list, create, get, update, delete |
| PaymentSplitService | v3/paymentSplits | list |
| PaymentWithSummaryDataService | v3/payments/summary | list |
| PixService | v3/pix | list |
| PixTransactionService | v3/pix/transactions | list |
| RecurringPixService | v3/recurringPix | list |
| SandboxActionsService | v3/sandbox | list |
| SubaccountService | v3/accounts | list |
| SubscriptionService | v3/subscriptions | list |
| TransferService | v3/transfers | list |
| WebhookService | v3/webhooks | list |

---

## 3. Lista de arquivos

### Laravel (`asaas-api-sdk-laravel/src/Services/`)

- AccountDocumentService.php  
- AccountInfoService.php  
- AnticipationService.php  
- BaseService.php *(excluído do inventário de recursos)*  
- BillService.php  
- ChargebackService.php  
- CheckoutService.php  
- CreditBureauReportService.php  
- CreditCardService.php  
- CustomerService.php  
- EscrowAccountService.php  
- FinanceService.php  
- FinancialTransactionService.php  
- FiscalInfoService.php  
- InstallmentService.php  
- InvoiceService.php  
- MobilePhoneRechargeService.php  
- NotificationService.php  
- PaymentDocumentService.php  
- PaymentDunningService.php  
- PaymentLinkService.php  
- PaymentRefundService.php  
- PaymentService.php  
- PaymentSplitService.php  
- PaymentWithSummaryDataService.php  
- PixService.php  
- PixTransactionService.php  
- RecurringPixService.php  
- SandboxActionsService.php  
- SubaccountService.php  
- SubscriptionService.php  
- TransferService.php  
- WebhookService.php  

---

## 4. Uso sugerido

- **PLAN / Fase 2:** Usar a tabela da seção 2 para decidir, por serviço, endpoint e métodos a documentar.
- **Documentação final:** Para cada serviço, criar seção com nome da classe, endpoint base e lista de métodos conforme esta tabela.
