# Inventário de Serviços — SDKs Asaas (Laravel + Java)

**Objetivo:** Referência para documentação MD de todos os serviços (PLAN e Fase 2).  
**Escopo:** Discovery dos arquivos de serviço, endpoint base e métodos públicos em ambos os projetos.  
**Data:** 2025-02-28.

---

## 1. Resumo

| SDK    | Pasta de serviços | Qtde arquivos (excl. BaseService) |
|--------|-------------------|------------------------------------|
| Laravel | `src/Services/`   | 31                                |
| Java   | `src/main/java/com/asaas/apisdk/services/` | 28                        |

**Observações:**
- Laravel: todos os serviços expõem pelo menos `list()`; `CustomerService` e `PaymentService` expõem também `create`, `get`, `update`, `delete`.
- Java: vários serviços expõem CRUD completo + métodos específicos da API; há overloads com/sem parâmetros e versões `*Async` (não listadas como método distinto no inventário).

---

## 2. Tabela consolidada [SDK | Serviço | Endpoint base | Métodos]

| SDK     | Serviço | Endpoint base | Métodos (públicos) |
|---------|---------|----------------|----------------------------------|
| Laravel | AccountDocumentService | v3/myAccount/documents | list |
| Java    | AccountDocumentService | v3/myAccount/documents | list, get, upload, getFile, updateFile, deleteFile |
| Laravel | AccountInfoService | v3/myAccount | list |
| Java    | AccountInfoService | v3/myAccount, v3/myAccount/commercialInfo, v3/wallets | get, updateCommercialInfo, getPaymentCheckoutConfig, updatePaymentCheckoutConfig, getAccountNumber, getFees, getStatus, listWallets, getMyAccount |
| Laravel | AnticipationService | v3/anticipations | list |
| Java    | AnticipationService | v3/anticipations | get, list, create, simulate, listConfigurations, createConfiguration, getLimits, cancel |
| Laravel | BillService | v3/bills | list |
| Java    | BillService | v3/bill | list, create, simulate, get, cancel |
| Laravel | ChargebackService | v3/chargebacks | list |
| Java    | ChargebackService | v3/chargebacks, v3/payments/{id}/chargeback | dispute, list, create (chargeback) |
| Laravel | CheckoutService | v3/checkout | list |
| Java    | CheckoutService | v3/checkouts | list, create, cancel |
| Laravel | CreditBureauReportService | v3/creditBureauReport | list |
| Java    | CreditBureauReportService | v3/creditBureauReport | list, create, get |
| Laravel | CreditCardService | v3/creditCard | list |
| Java    | CreditCardService | v3/creditCard/tokenizeCreditCard | tokenizeCreditCard |
| Laravel | CustomerService | v3/customers | list, create, get, update, delete |
| Java    | CustomerService | v3/customers | listCustomers, createNewCustomer, retrieveASingleCustomer, updateExistingCustomer, removeCustomer, restoreRemovedCustomer, retrieveNotificationsFromACustomer |
| Laravel | EscrowAccountService | v3/escrow | list |
| Java    | EscrowAccountService | v3/escrow/{id}/finish | finish (escrow) |
| Laravel | FinanceService | v3/finances | list |
| Java    | FinanceService | v3/finance/balance, v3/finance/payment/statistics, v3/finance/split/statistics | getBalance, getPaymentStatistics, getSplitStatistics |
| Laravel | FinancialTransactionService | v3/financialTransactions | list |
| Java    | FinancialTransactionService | v3/financialTransactions | list |
| Laravel | FiscalInfoService | v3/fiscalInfo | list |
| Java    | FiscalInfoService | v3/fiscalInfo (municipalOptions, services, nbsCodes, nationalPortal) | listMunicipalOptions, create/update (fiscal info), listServices, listNbsCodes, nationalPortal |
| Laravel | InstallmentService | v3/installments | list |
| Java    | InstallmentService | v3/installments | list, create, get, update, listPayments, getPaymentBook, refund, listSplits |
| Laravel | InvoiceService | v3/invoices | list |
| Java    | InvoiceService | v3/invoices | list, create, get, update, authorize, cancel |
| Laravel | MobilePhoneRechargeService | v3/mobilePhoneRecharge | list |
| Java    | MobilePhoneRechargeService | v3/mobilePhoneRecharges | list, create, get, cancel, getProvider |
| Laravel | NotificationService | v3/notifications | list |
| Java    | NotificationService | v3/notifications/{id}, v3/notifications/batch | get, updateBatch |
| Laravel | PaymentDocumentService | v3/paymentDocuments | list |
| Java    | PaymentDocumentService | v3/payments/{id}/documents | list, create, get, update, delete |
| Laravel | PaymentDunningService | v3/paymentDunnings | list |
| Java    | PaymentDunningService | v3/paymentDunnings | list, create, simulate, get, getHistory, getPartialPayments, listPaymentsAvailableForDunning, listDocuments, cancel |
| Laravel | PaymentLinkService | v3/paymentLinks | list |
| Java    | PaymentLinkService | v3/paymentLinks | list, create, get, update, delete, restore, listImages, addImage, getImage, updateImage, setImageAsMain |
| Laravel | PaymentRefundService | v3/payments/refunds | list |
| Java    | PaymentRefundService | v3/payments/{id}/refunds, v3/payments/{id}/bankSlip/refund | create (refund), bankSlipRefund |
| Laravel | PaymentService | v3/payments | list, create, get, update, delete |
| Java    | PaymentService | v3/payments | list, create, get, captureAuthorizedPayment, payWithCreditCard, getBillingInfo, getViewingInfo, update, delete, restore, getStatus, refund, getIdentificationField, getPixQrCode, receiveInCash, undoReceivedInCash, simulate, escrow, getLimits |
| Laravel | PaymentSplitService | v3/paymentSplits | list |
| Java    | PaymentSplitService | v3/payments/splits/paid, v3/payments/splits/received | getPaidSplit, listPaidSplits, getReceivedSplit, listReceivedSplits |
| Laravel | PaymentWithSummaryDataService | v3/payments/summary | list |
| Java    | PaymentWithSummaryDataService | v3/lean/payments | list, create, get, update, delete, captureAuthorizedPayment, restore, refund, receiveInCash, undoReceivedInCash |
| Laravel | PixService | v3/pix | list |
| Java    | PixService | v3/pix/addressKeys, v3/pix/qrCodes/static, v3/pix/tokenBucket/addressKey | list/create addressKeys, get/update addressKey, create/get static QR, tokenBucket (addressKey) |
| Laravel | PixTransactionService | v3/pix/transactions | list |
| Java    | PixTransactionService | v3/pix/transactions, v3/pix/qrCodes/pay, v3/pix/qrCodes/decode | payQrCode, decodeQrCode, get, list, cancel |
| Laravel | RecurringPixService | v3/recurringPix | list |
| Java    | RecurringPixService | v3/pix/transactions/recurrings | list, get, cancel, listItems, cancelItem |
| Laravel | SandboxActionsService | v3/sandbox | list |
| Java    | SandboxActionsService | v3/sandbox/payment/{id}/confirm, v3/sandbox/payment/{id}/overdue | confirmPayment, setOverdue |
| Laravel | SubaccountService | v3/accounts | list |
| Java    | SubaccountService | v3/accounts | listSubaccounts, createSubaccount, retrieveASingleSubaccount, reteriveEscrowAccountConfigurationForSubaccount, saveOrUpdateEscrowAccountConfigurationForSubaccount |
| Laravel | SubscriptionService | v3/subscriptions | list |
| Java    | SubscriptionService | v3/subscriptions | listSubscriptions, createNewSubscription, createSubscriptionWithCreditCard, retrieveASingleSubscription, updateExistingSubscription, removeSubscription, updateSubscriptionCreditCard, listPaymentsOfASubscription, retrieve/create/update/delete ConfigurationForIssuanceOfInvoices, listInvoices |
| Laravel | TransferService | v3/transfers | list |
| Java    | TransferService | v3/transfers | listTransfers, transferToAnotherInstitutionAccountOrPixKey, transferToAsaasAccount, retrieveASingleTransfer, cancelATransfer |
| Laravel | WebhookService | v3/webhooks | list |
| Java    | WebhookService | v3/webhooks | listWebhooks, createNewWebhook, retrieveASingleWebhook, updateExistingWebhook, removeWebhook |

---

## 3. Serviços apenas em um SDK

- **Apenas Laravel:** Nenhum; todos os serviços Laravel têm correspondente em Java (mesmo que com endpoint ou métodos diferentes).

---

## 4. Diferenças de endpoint entre SDKs (principais)

| Recurso | Laravel (path) | Java (path) |
|---------|----------------|-------------|
| Payment with summary | v3/payments/summary | v3/lean/payments |
| Recurring PIX | v3/recurringPix | v3/pix/transactions/recurrings |
| Mobile recharge | v3/mobilePhoneRecharge | v3/mobilePhoneRecharges |
| Bills | v3/bills | v3/bill |
| Checkout | v3/checkout | v3/checkouts |

---

## 5. Lista de arquivos por projeto

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

## 6. Uso sugerido

- **PLAN / Fase 2:** Usar a tabela da seção 2 para decidir, por serviço, quais endpoints e métodos documentar em cada SDK.
- **Documentação final:** Para cada serviço, criar seção com nome da classe, endpoint base, lista de métodos (e, se necessário, subpaths) conforme esta tabela.
- **Gaps:** A seção 4 pode ser usada para alinhar nomes de recurso/URL entre Laravel e Java antes da documentação definitiva.
