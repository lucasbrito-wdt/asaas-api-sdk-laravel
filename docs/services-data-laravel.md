# Dados dos serviços — SDK Laravel (asaas-api-sdk-laravel)

**Objetivo:** Extração a partir do código para preencher em massa os `.md` de cada serviço (Fase 2 da documentação).  
**Fonte:** `src/Services/*.php` (excluindo BaseService).  
**Data:** 2025-02-28.

---

## Convenções

- **Endpoint base:** string do primeiro `RequestBuilder` no serviço (path).
- **list():**
  - Request de validação: classe usada em `ListXxxRequest::validate($params)`.
  - Model de retorno: tipo de retorno do método (ex.: `CustomerList`).
- **create/update:** Request de validação e Model de retorno quando existirem (apenas Customer e Payment têm create/update/delete no Laravel).

---

## 1. AccountDocumentService

| Campo | Valor |
|-------|--------|
| **Classe** | `AccountDocumentService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/myAccount/documents` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): AccountDocumentList` | ListAccountDocumentsRequest | AccountDocumentList |

### Models / Requests (por serviço)

- **Models:** AccountDocument, AccountDocumentList
- **Requests:** ListAccountDocumentsRequest

---

## 2. AccountInfoService

| Campo | Valor |
|-------|--------|
| **Classe** | `AccountInfoService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/myAccount` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): AccountInfoList` | ListAccountInfoRequest | AccountInfoList |

### Models / Requests

- **Models:** AccountInfo, AccountInfoList
- **Requests:** ListAccountInfoRequest

---

## 3. AnticipationService

| Campo | Valor |
|-------|--------|
| **Classe** | `AnticipationService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/anticipations` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): AnticipationList` | ListAnticipationsRequest | AnticipationList |

### Models / Requests

- **Models:** Anticipation, AnticipationList
- **Requests:** ListAnticipationsRequest

---

## 4. BillService

| Campo | Valor |
|-------|--------|
| **Classe** | `BillService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/bills` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): BillList` | ListBillsRequest | BillList |

### Models / Requests

- **Models:** Bill, BillList
- **Requests:** ListBillsRequest

---

## 5. ChargebackService

| Campo | Valor |
|-------|--------|
| **Classe** | `ChargebackService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/chargebacks` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): ChargebackList` | ListChargebacksRequest | ChargebackList |

### Models / Requests

- **Models:** Chargeback, ChargebackList
- **Requests:** ListChargebacksRequest

---

## 6. CheckoutService

| Campo | Valor |
|-------|--------|
| **Classe** | `CheckoutService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/checkout` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): CheckoutList` | ListCheckoutRequest | CheckoutList |

### Models / Requests

- **Models:** Checkout, CheckoutList
- **Requests:** ListCheckoutRequest

---

## 7. CreditBureauReportService

| Campo | Valor |
|-------|--------|
| **Classe** | `CreditBureauReportService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/creditBureauReport` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): CreditBureauReportList` | ListCreditBureauReportsRequest | CreditBureauReportList |

### Models / Requests

- **Models:** CreditBureauReport, CreditBureauReportList
- **Requests:** ListCreditBureauReportsRequest

---

## 8. CreditCardService

| Campo | Valor |
|-------|--------|
| **Classe** | `CreditCardService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/creditCard` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): CreditCardList` | ListCreditCardRequest | CreditCardList |

### Models / Requests

- **Models:** CreditCard, CreditCardList
- **Requests:** ListCreditCardRequest

---

## 9. CustomerService

| Campo | Valor |
|-------|--------|
| **Classe** | `CustomerService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/customers` (list/create); `v3/customers/{id}` (get/update/delete) |

### Métodos públicos

| Método | Assinatura | Request | Model retorno |
|--------|------------|--------|---------------|
| list | `list(array $params = []): CustomerList` | ListCustomersRequest | CustomerList |
| create | `create(array $data): Customer` | StoreCustomerRequest | Customer |
| get | `get(string $id): Customer` | — | Customer |
| update | `update(string $id, array $data): Customer` | UpdateCustomerRequest | Customer |
| delete | `delete(string $id): CustomerDeleteResult` | — | CustomerDeleteResult |

### Models / Requests

- **Models:** Customer, CustomerList, CustomerDeleteResult
- **Requests:** ListCustomersRequest, StoreCustomerRequest, UpdateCustomerRequest

---

## 10. EscrowAccountService

| Campo | Valor |
|-------|--------|
| **Classe** | `EscrowAccountService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/escrow` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): EscrowAccountList` | ListEscrowAccountsRequest | EscrowAccountList |

### Models / Requests

- **Models:** EscrowAccount, EscrowAccountList
- **Requests:** ListEscrowAccountsRequest

---

## 11. FinanceService

| Campo | Valor |
|-------|--------|
| **Classe** | `FinanceService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/finances` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): FinanceList` | ListFinanceRequest | FinanceList |

### Models / Requests

- **Models:** Finance, FinanceList
- **Requests:** ListFinanceRequest

---

## 12. FinancialTransactionService

| Campo | Valor |
|-------|--------|
| **Classe** | `FinancialTransactionService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/financialTransactions` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): FinancialTransactionList` | ListFinancialTransactionsRequest | FinancialTransactionList |

### Models / Requests

- **Models:** FinancialTransaction, FinancialTransactionList
- **Requests:** ListFinancialTransactionsRequest

---

## 13. FiscalInfoService

| Campo | Valor |
|-------|--------|
| **Classe** | `FiscalInfoService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/fiscalInfo` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): FiscalInfoList` | ListFiscalInfoRequest | FiscalInfoList |

### Models / Requests

- **Models:** FiscalInfo, FiscalInfoList
- **Requests:** ListFiscalInfoRequest

---

## 14. InstallmentService

| Campo | Valor |
|-------|--------|
| **Classe** | `InstallmentService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/installments` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): InstallmentList` | ListInstallmentsRequest | InstallmentList |

### Models / Requests

- **Models:** Installment, InstallmentList
- **Requests:** ListInstallmentsRequest

---

## 15. InvoiceService

| Campo | Valor |
|-------|--------|
| **Classe** | `InvoiceService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/invoices` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): InvoiceList` | ListInvoicesRequest | InvoiceList |

### Models / Requests

- **Models:** Invoice, InvoiceList
- **Requests:** ListInvoicesRequest

---

## 16. MobilePhoneRechargeService

| Campo | Valor |
|-------|--------|
| **Classe** | `MobilePhoneRechargeService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/mobilePhoneRecharge` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): MobilePhoneRechargeList` | ListMobilePhoneRechargeRequest | MobilePhoneRechargeList |

### Models / Requests

- **Models:** MobilePhoneRecharge, MobilePhoneRechargeList
- **Requests:** ListMobilePhoneRechargeRequest

---

## 17. NotificationService

| Campo | Valor |
|-------|--------|
| **Classe** | `NotificationService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/notifications` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): NotificationList` | ListNotificationsRequest | NotificationList |

### Models / Requests

- **Models:** Notification, NotificationList
- **Requests:** ListNotificationsRequest

---

## 18. PaymentDocumentService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentDocumentService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/paymentDocuments` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PaymentDocumentList` | ListPaymentDocumentsRequest | PaymentDocumentList |

### Models / Requests

- **Models:** PaymentDocument, PaymentDocumentList
- **Requests:** ListPaymentDocumentsRequest

---

## 19. PaymentDunningService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentDunningService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/paymentDunnings` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PaymentDunningList` | ListPaymentDunningRequest | PaymentDunningList |

### Models / Requests

- **Models:** PaymentDunning, PaymentDunningList
- **Requests:** ListPaymentDunningRequest

---

## 20. PaymentLinkService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentLinkService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/paymentLinks` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PaymentLinkList` | ListPaymentLinksRequest | PaymentLinkList |

### Models / Requests

- **Models:** PaymentLink, PaymentLinkList
- **Requests:** ListPaymentLinksRequest

---

## 21. PaymentRefundService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentRefundService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/payments/refunds` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PaymentRefundList` | ListPaymentRefundsRequest | PaymentRefundList |

### Models / Requests

- **Models:** PaymentRefund, PaymentRefundList
- **Requests:** ListPaymentRefundsRequest

---

## 22. PaymentService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/payments` (list/create); `v3/payments/{id}` (get/update/delete) |

### Métodos públicos

| Método | Assinatura | Request | Model retorno |
|--------|------------|--------|---------------|
| list | `list(array $params = []): PaymentList` | ListPaymentsRequest | PaymentList |
| create | `create(array $data): Payment` | StorePaymentRequest | Payment |
| get | `get(string $id): Payment` | — | Payment |
| update | `update(string $id, array $data): Payment` | UpdatePaymentRequest | Payment |
| delete | `delete(string $id): PaymentDeleteResult` | — | PaymentDeleteResult |

### Models / Requests

- **Models:** Payment, PaymentList, PaymentDeleteResult
- **Requests:** ListPaymentsRequest, StorePaymentRequest, UpdatePaymentRequest

---

## 23. PaymentSplitService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentSplitService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/paymentSplits` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PaymentSplitList` | ListPaymentSplitsRequest | PaymentSplitList |

### Models / Requests

- **Models:** PaymentSplit, PaymentSplitList
- **Requests:** ListPaymentSplitsRequest

---

## 24. PaymentWithSummaryDataService

| Campo | Valor |
|-------|--------|
| **Classe** | `PaymentWithSummaryDataService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/payments/summary` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PaymentWithSummaryList` | ListPaymentWithSummaryRequest | PaymentWithSummaryList |

### Models / Requests

- **Models:** PaymentWithSummary, PaymentWithSummaryList
- **Requests:** ListPaymentWithSummaryRequest

---

## 25. PixService

| Campo | Valor |
|-------|--------|
| **Classe** | `PixService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/pix` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PixList` | ListPixRequest | PixList |

### Models / Requests

- **Models:** Pix, PixList
- **Requests:** ListPixRequest

---

## 26. PixTransactionService

| Campo | Valor |
|-------|--------|
| **Classe** | `PixTransactionService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/pix/transactions` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): PixTransactionList` | ListPixTransactionsRequest | PixTransactionList |

### Models / Requests

- **Models:** PixTransaction, PixTransactionList
- **Requests:** ListPixTransactionsRequest

---

## 27. RecurringPixService

| Campo | Valor |
|-------|--------|
| **Classe** | `RecurringPixService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/recurringPix` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): RecurringPixList` | ListRecurringPixRequest | RecurringPixList |

### Models / Requests

- **Models:** RecurringPix, RecurringPixList
- **Requests:** ListRecurringPixRequest

---

## 28. SandboxActionsService

| Campo | Valor |
|-------|--------|
| **Classe** | `SandboxActionsService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/sandbox` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): SandboxActionList` | ListSandboxActionsRequest | SandboxActionList |

### Models / Requests

- **Models:** SandboxAction, SandboxActionList
- **Requests:** ListSandboxActionsRequest

---

## 29. SubaccountService

| Campo | Valor |
|-------|--------|
| **Classe** | `SubaccountService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/accounts` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): SubaccountList` | ListSubaccountsRequest | SubaccountList |

### Models / Requests

- **Models:** Subaccount, SubaccountList
- **Requests:** ListSubaccountsRequest

---

## 30. SubscriptionService

| Campo | Valor |
|-------|--------|
| **Classe** | `SubscriptionService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/subscriptions` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): SubscriptionList` | ListSubscriptionsRequest | SubscriptionList |

### Models / Requests

- **Models:** Subscription, SubscriptionList
- **Requests:** ListSubscriptionsRequest

---

## 31. TransferService

| Campo | Valor |
|-------|--------|
| **Classe** | `TransferService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/transfers` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): TransferList` | ListTransfersRequest | TransferList |

### Models / Requests

- **Models:** Transfer, TransferList
- **Requests:** ListTransfersRequest

---

## 32. WebhookService

| Campo | Valor |
|-------|--------|
| **Classe** | `WebhookService` |
| **Namespace** | `Asaas\Laravel\Services` |
| **Endpoint base** | `v3/webhooks` |

### Métodos públicos

| Método | Assinatura | Request (list) | Model retorno |
|--------|------------|----------------|---------------|
| list | `list(array $params = []): WebhookList` | ListWebhooksRequest | WebhookList |

### Models / Requests

- **Models:** Webhook, WebhookList
- **Requests:** ListWebhooksRequest

---

## Índice rápido: Models e Requests por serviço (para seção "Models/Requests" de cada doc)

| Serviço | Models | Requests |
|---------|--------|----------|
| AccountDocumentService | AccountDocument, AccountDocumentList | ListAccountDocumentsRequest |
| AccountInfoService | AccountInfo, AccountInfoList | ListAccountInfoRequest |
| AnticipationService | Anticipation, AnticipationList | ListAnticipationsRequest |
| BillService | Bill, BillList | ListBillsRequest |
| ChargebackService | Chargeback, ChargebackList | ListChargebacksRequest |
| CheckoutService | Checkout, CheckoutList | ListCheckoutRequest |
| CreditBureauReportService | CreditBureauReport, CreditBureauReportList | ListCreditBureauReportsRequest |
| CreditCardService | CreditCard, CreditCardList | ListCreditCardRequest |
| CustomerService | Customer, CustomerList, CustomerDeleteResult | ListCustomersRequest, StoreCustomerRequest, UpdateCustomerRequest |
| EscrowAccountService | EscrowAccount, EscrowAccountList | ListEscrowAccountsRequest |
| FinanceService | Finance, FinanceList | ListFinanceRequest |
| FinancialTransactionService | FinancialTransaction, FinancialTransactionList | ListFinancialTransactionsRequest |
| FiscalInfoService | FiscalInfo, FiscalInfoList | ListFiscalInfoRequest |
| InstallmentService | Installment, InstallmentList | ListInstallmentsRequest |
| InvoiceService | Invoice, InvoiceList | ListInvoicesRequest |
| MobilePhoneRechargeService | MobilePhoneRecharge, MobilePhoneRechargeList | ListMobilePhoneRechargeRequest |
| NotificationService | Notification, NotificationList | ListNotificationsRequest |
| PaymentDocumentService | PaymentDocument, PaymentDocumentList | ListPaymentDocumentsRequest |
| PaymentDunningService | PaymentDunning, PaymentDunningList | ListPaymentDunningRequest |
| PaymentLinkService | PaymentLink, PaymentLinkList | ListPaymentLinksRequest |
| PaymentRefundService | PaymentRefund, PaymentRefundList | ListPaymentRefundsRequest |
| PaymentService | Payment, PaymentList, PaymentDeleteResult | ListPaymentsRequest, StorePaymentRequest, UpdatePaymentRequest |
| PaymentSplitService | PaymentSplit, PaymentSplitList | ListPaymentSplitsRequest |
| PaymentWithSummaryDataService | PaymentWithSummary, PaymentWithSummaryList | ListPaymentWithSummaryRequest |
| PixService | Pix, PixList | ListPixRequest |
| PixTransactionService | PixTransaction, PixTransactionList | ListPixTransactionsRequest |
| RecurringPixService | RecurringPix, RecurringPixList | ListRecurringPixRequest |
| SandboxActionsService | SandboxAction, SandboxActionList | ListSandboxActionsRequest |
| SubaccountService | Subaccount, SubaccountList | ListSubaccountsRequest |
| SubscriptionService | Subscription, SubscriptionList | ListSubscriptionsRequest |
| TransferService | Transfer, TransferList | ListTransfersRequest |
| WebhookService | Webhook, WebhookList | ListWebhooksRequest |

**Localização no código:**
- **Models:** `src/Models/*.php` (namespace `Asaas\Laravel\Models`)
- **Requests:** `src/Http/Requests/{Recurso}/*.php` (ex.: `Customer/ListCustomersRequest.php`, `Customer/StoreCustomerRequest.php`)
