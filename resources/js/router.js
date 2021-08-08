import Vue from 'vue'
import VueRouter from 'vue-router'

import LayoutBasic from './layouts/LayoutBasic'
import LayoutNew from './layouts/LayoutNew'
import LayoutConvert from './layouts/LayoutConvert'
import LayoutEdit from './layouts/LayoutEdit'
import LayoutStatement from './layouts/LayoutStatement'
import LayoutStatementAll from './layouts/LayoutStatementAll'
import Dashboard from './components/Dashboard'
import Passport from './components/passport/master'

// CONTACT MODULE START
import Customers from './components/contact/customers/Customers-list'
import CustomerProfile from './components/contact/customers/CustomerProfile'
import CustomerStatement from './components/contact/customers/CustomerStatement'
import NewCustomer from './components/contact/customers/Customers-single'
import EditCustomer from './components/contact/customers/Customers-edit'
import SuppliersList from './components/contact/suppliers/Suppliers-list'
import NewSuppliers from './components/contact/suppliers/Suppliers-single'
import EditSuppliers from './components/contact/suppliers/Suppliers-edit'
import CfAgents from './components/contact/cf_agents/Cfagetns-list'
import NewCfAgents from './components/contact/cf_agents/Cfagetns-single'
import EditCfAgents from './components/contact/cf_agents/Cfagents-edit'
import Employee from './components/contact/employees/Employees-list'
import NewEmployee from './components/contact/employees/Employees-single'
import EditEmployee from './components/contact/employees/Employees-edit'
import Banks from './components/contact/banks/Banks-list'
import NewBanks from './components/contact/banks/Banks-single'
import EditBank from './components/contact/banks/Banks-edit'
import Contact from './components/contact/contacts/Contacts-list'
import NewContact from './components/contact/contacts/Contacts-single'
import EditContact from './components/contact/contacts/Contacts-edit'
// CONTACT MODULE END

// SALES MODULE START
import Quotes from './components/sales/quotes/Quotes-list'
import NewQuotes from './components/sales/quotes/Quotes-single'
import QuotesEdit from './components/sales/quotes/QuotesEdit'
import QuotesToSaleOrder from './components/sales/quotes/QuotesToSaleOrder'
import QuotesToInvoice from './components/sales/quotes/QuotesToInvoice'
import DeliveryNote from './components/sales/deliverynotes/Deliverynotes-list'
import DeliveryNotesToInvoice from './components/sales/deliverynotes/DeliverynotesToInvoice'
import NewDeliveryNote from './components/sales/deliverynotes/Deliverynotes-single'
import editDeliveryNote from './components/sales/deliverynotes/Deliverynotes-edit'
import Invoices from './components/sales/invoices/Invoices-list'
import InvoiceToDeliveryNotes from './components/sales/invoices/InvoiceToDeliveryNotes'
import InvoiceEdit from './components/sales/invoices/Invoices-edit'
import NewInvoice from './components/sales/invoices/Invoices-single'
import Receipts from './components/sales/receipts/Receipts-list'
import NewReceipt from './components/sales/receipts/Receipts-single'
import editReceipt from './components/sales/receipts/Receipts-edit'
import SalesOrders from './components/sales/saleOrders/Saleorders-list'
import NewSalesOrder from './components/sales/saleOrders/Saleorders-single'
import convertToDeliveryNotes from './components/sales/saleOrders/convertToDeliveryNotes'
import salesOrderToInvoice from './components/sales/saleOrders/salesOrderToInvoice'
import EditSalesOrder from './components/sales/saleOrders/Saleorders-edit'
import CustomerPayments from './components/sales/customerPayments/Customerpayments-list'
import NewCustomerPayment from './components/sales/customerPayments/Customerpayments-single'
import CreditMemos from './components/sales/creditMemos/Creditmemos-list'
import NewCreditMemo from './components/sales/creditMemos/Creditmemos-single'
import editCreditMemo from './components/sales/creditMemos/Creditmemos-edit'
import Projects from './components/sales/projects/Projects-list'
import editProject from './components/sales/projects/Projects-edit'
import NewProject from './components/sales/projects/Projects-single'
import ProductServices from './components/sales/productServices/Productservices-list'
import NewProductServices from './components/sales/productServices/Productservices-single'
import ProductServiceEdit from './components/sales/productServices/Productservices-single-edit'
// SALES MODULE END

// PURCHASE MODULE START
import Bills from './components/purchase/bills/Bills-list'
import NewBills from './components/purchase/bills/Bills-single'
import Expenses from './components/purchase/expenses/Expenses-list'
import NewExpense from './components/purchase/expenses/Expenses-single'
import Vouchers from './components/purchase/vouchers/Vouchers-list'
import NewVoucher from './components/purchase/vouchers/Vouchers-single'
import SupplierQuotes from './components/purchase/supplierQuotes/Supplierquotes-list'
import NewSupplierQuote from './components/purchase/supplierQuotes/Supplierquotes-single'
import PurchaseOrders from './components/purchase/purchaseOrders/Purchaseorders-list'
import NewPurchaseOrder from './components/purchase/purchaseOrders/Purchaseorders-single'
import ReceivingNotes from './components/purchase/receivingNotes/Receivingnotes-list'
import NewReceivingNote from './components/purchase/receivingNotes/Receivingnotes-single'
import ReceivingNoteEdit from './components/purchase/receivingNotes/ReceivingNotesEdit'
import BillingPayments from './components/purchase/billingPayments/Billingpayments-list'
import NewBillingPayment from './components/purchase/billingPayments/Billingpayments-single'
import SupplierCreditMemos from './components/purchase/supplierCreditMemos/Suppliercreditmemos-list'
import NewSupplierCreditMemos from './components/purchase/supplierCreditMemos/Suppliercreditmemos-single'
import pProductServices from './components/purchase/productServices/Purchaseproductservices-list'
import pNewProductServices from './components/purchase/productServices/Purchaseproductservices-single'

// PURCHASE MODULE END

// Inventory Module Start
import Stock from './components/inventory/stock/stock-list'
import InventoryPurchaseOrders from './components/inventory/purchaseOrders/Purchaseorders-list'
import NewInventoryPurchaseOrder from './components/inventory/purchaseOrders/Purchaseorders-single'

import InventorySalesOrders from './components/inventory/saleOrders/Saleorders-list'
import NewInventorySalesOrder from './components/inventory/saleOrders/Saleorders-single'

import InventoryReceivingNotes from './components/inventory/receivingNotes/Receivingnotes-list'

import InventoryDeliveryNotes from './components/inventory/deliverynotes/Deliverynotes-list'
import NewInventoryDeliveryNotes from './components/inventory/deliverynotes/Deliverynotes-single'

import InventoryPurchaseReturn from './components/inventory/purchaseReturn/Purchasereturn-list'
import NewInventoryPurchaseReturn from './components/inventory/purchaseReturn/Purchasereturn-single'

import InventoryEntry from './components/inventory/InventoryEntry/InventoryEntry-list'
import NewInventoryEntry from './components/inventory/InventoryEntry/InventoryEntry-single'

import InventoryWithdrawal from './components/inventory/InventoryWithdrawal/InventoryWithdrawal-list'
import NewInventoryWithdrawal from './components/inventory/InventoryWithdrawal/InventoryWithdrawal-single'

import storageList from './components/inventory/storage/storageList'
import storageSingle from './components/inventory/storage/storageSingle'
// Inventory Module End

// Accounting Modules Start
import BankActivity from './components/accounting/bankActivity/bankActivity-list'
import ChartOfAccounts from './components/accounting/chartOfAccount/chartOfAccount-list'
import AccountingTransaction from './components/accounting/accountingTransaction/transaction-list'

import BankDeposit from './components/accounting/bankDeposit/bankDeposit-list'
import NewBankDeposit from './components/accounting/bankDeposit/bankDeposit-single'

import BankTransfer from './components/accounting/bankTransfer/bankTransfer-list'
import NewBankTransfer from './components/accounting/bankTransfer/bankTransfer-single'

import accountingReceipt from './components/accounting/accountingReceipt/accountingReceipt-list'
import NewaccountingReceipt from './components/accounting/accountingReceipt/accountingReceipt-single'

// Accounting Modules End


// USER SETTINGS MODULES START
import companySettings from './components/user_settings/companySettings'
import Profile from './components/user_settings/profile'
import Notifications from './components/user_settings/notifications'
import Preferences from './components/user_settings/preferences'
import employee from './components/user_settings/employee/employee'
// USER SETTINGS MODULES END

Vue.use(VueRouter);
window.Fire = new Vue();

const routes = [
    {
        path: '/', component: LayoutBasic,
        children: [
            //Users Management
            {path: '', component: Dashboard},
        ]
    },
    {
        path: '/settings', component: LayoutBasic,
        children: [
            //Users Management
            {path: 'company-settings', component: companySettings},
            {path: 'profile', component: Profile},
            {path: 'notifications', component: Notifications},
            {path: 'preferences', component: Preferences},
            {path: 'all-role', component: employee},
        ]
    },
    {
        path: '/', component: LayoutBasic,
        children: [
            //Users Management
            {path: 'passport', component: Passport},
        ]
    },
    // CONTACT MODULE START
    {
        path: '/contact', component: LayoutBasic,
        children: [
            {path: 'customers', name: 'customerLists', component: Customers},
            {path: 'suppliers', name: 'supplierLists', component: SuppliersList},
            {path: 'cf-agents', name: 'cfAgentsLists', component: CfAgents},
            {path: 'employees', name: 'employeeLists', component: Employee},
            {path: 'banks', name: 'bankLists', component: Banks},
            {path: 'contacts', name: 'contactList', component: Contact},
        ]
    },
    {
        path: '/contact', component: LayoutNew,
        children: [
            {path: 'customer/create', component: NewCustomer},
            {path: 'supplier/create', component: NewSuppliers},
            {path: 'cf-agent/create', component: NewCfAgents},
            {path: 'employee/create', component: NewEmployee},
            {path: 'bank/create', component: NewBanks},
            {path: 'contact/create', component: NewContact},
        ]
    },
    {
        path: '/contact', component: LayoutEdit,
        children: [
            {path: 'customer/edit/:id', name: 'editCustomer', component: EditCustomer},
            {path: 'supplier/edit/:id', name: 'editSupplier', component: EditSuppliers},
            {path: 'cf-agent/edit/:id', name: 'editCfAgetns', component: EditCfAgents},
            {path: 'employee/edit/:id', name: 'editEmployee', component: EditEmployee},
            {path: 'bank/edit/:id', name: 'editBank', component: EditBank},
            {path: 'contact/edit/:id', name: 'editContacts', component: EditContact},
        ]
    },
    {
        path: '/contact', component: LayoutStatementAll,
        children: [
            {path: 'customer/details/:id', name: 'customer_details', component: CustomerProfile}
        ]
    },
    {
        path: '/contact', component: LayoutStatement,
        children: [
            {path: 'customer/statement/:id', name: 'customer_statement', component: CustomerStatement}
        ]
    },
    // CONTACT MODULE END

    //SALES MODULE START
    {
        path: '/sales', component: LayoutBasic,
        children: [
            //sales Management
            {path: 'quotes',name:'quoteList', component: Quotes},
            {path: 'delivery-notes',name:'deliveryNoteList', component: DeliveryNote},
            {path: 'invoices',name:'invoiceList', component: Invoices},
            {path: 'receipts',name:'salesReceiptList', component: Receipts},
            {path: 'sales-orders',name:'salesOrderList', component: SalesOrders},
            {path: 'customer-payments', component: CustomerPayments},
            {path: 'credit-memos', component: CreditMemos},
            {path: 'projects', component: Projects},
            {path: 'product-services',name:'ProductServices', component: ProductServices},
        ]
    },
    {
        path: '/sales', component: LayoutNew,
        children: [
            //Users Management
            {path: 'quote/create', component: NewQuotes},
            {path: 'delivery-note/create', component: NewDeliveryNote},
            {path: 'invoice/create', component: NewInvoice},
            {path: 'receipt/create', component: NewReceipt},
            {path: 'sales-order/create', component: NewSalesOrder},
            {path: 'customer-payment/create', component: NewCustomerPayment},
            {path: 'credit-memo/create', component: NewCreditMemo},
            {path: 'project/create', component: NewProject},
            {path: 'product-service/create',name:'product_services_create', component: NewProductServices},
        ]
    },
    {
        path: '/sales', component: LayoutEdit,
        children: [
            //Users Management
            {path: 'product-service/edit/:id',name:'ProductServiceEdit', component: ProductServiceEdit},
            {path: 'quote/edit/:id',name:'editQuote', component: QuotesEdit},
            {path: 'quote/toInvoice/:id', name:'QuotesToInvoice', component: QuotesToInvoice},
            {path: 'quote/toSaleOrder/:id', name:'QuotesToSaleOrder', component: QuotesToSaleOrder},
            {path: 'invoice/edit/:id',name:'editInvoice', component: InvoiceEdit},
            {path: 'sales-order/edit/:id',name:'EditSalesOrder', component: EditSalesOrder},
            {path: 'delivery-note/edit/:id',name:'editDeliveryNote', component: editDeliveryNote},
            {path: 'project/edit/:id',name:'editProject', component: editProject},
            {path: 'credit-memo/edit/:id',name:'editCreditMemo', component: editCreditMemo},
            {path: 'receipt/edit/:id',name:'editReceipt', component: editReceipt},
        ]
    },
    {
        path: '/sales', component: LayoutConvert,
        children: [
            //sales order to invoice
            {path: 'sales-order/to-delivery-note/:id', name:'convertSalesOrderToDeliveryNote', component: convertToDeliveryNotes},
            {path: 'sales-order/to-invoice/:id', name:'convertSalesOrderToInvoice', component: salesOrderToInvoice},
            // delivery note to invoice
            {path: 'delivery-note/to-invoice/:id', name:'DeliveryNotesToInvoice', component: DeliveryNotesToInvoice},
            // invoice to delivery not
            {path: 'invoice/invoice-to-delivery-notes/:id', name:'InvoiceToDeliveryNotes', component: InvoiceToDeliveryNotes},
        ]
    },
    //SALES MODULE END

    //Purchase MODULE START
    {
        path: '/purchase', component: LayoutBasic,
        children: [
            //Users Management
            {path: 'bills', component: Bills},
            {path: 'expenses', component: Expenses},
            {path: 'vouchers', component: Vouchers},
            {path: 'supplier-quotes',name:'supplierQuote', component: SupplierQuotes},
            {path: 'purchase-orders', component: PurchaseOrders},
            {path: 'receiving-notes',name:'ReceivingNotes', component: ReceivingNotes},
            {path: 'billing-payments', component: BillingPayments},
            {path: 'supplier-credit-memos', component: SupplierCreditMemos},
            {path: 'product-services', component: pProductServices},
        ]
    },
    {
        path: '/purchase', component: LayoutNew,
        children: [
            //Users Management
            {path: 'bill/create', component: NewBills},
            {path: 'expense/create', component: NewExpense},
            {path: 'voucher/create', component: NewVoucher},
            {path: 'supplier-quote/create', component: NewSupplierQuote},
            // {path: 'purchase-order/create', component: NewStockPurchaseOrder},
            {path: 'receiving-note/create', component: NewReceivingNote},
            {path: 'billing-payment/create', component: NewBillingPayment},
            {path: 'supplier-credit-memo/create', component: NewSupplierCreditMemos},
            {path: 'product-service/create', component: pNewProductServices},
        ]
    },
    {
        path: '/purchase', component: LayoutNew,
        children: [
            {path: 'receiving-note/edit/:id',name:'ReceivingNoteEdit', component: ReceivingNoteEdit},
        ]
    },
    //Purchase MODULE END

    //Inventory MODULE START
    {
        path: '/inventory', component: LayoutBasic,
        children: [
            //inventory Management
            {path: 'stocks', component: Stock},
            {path: 'purchase-orders', component: InventoryPurchaseOrders},
            {path: 'sales-orders', component: InventorySalesOrders},
            {path: 'receiving-notes', component: InventoryReceivingNotes},
            {path: 'delivery-notes', component: InventoryDeliveryNotes},
            {path: 'purchase-returns', component: InventoryPurchaseReturn},
            {path: 'inventory-entrys', component: InventoryEntry},
            {path: 'inventory-withdrawals', component: InventoryWithdrawal},
            {path: 'storage-locations', component: storageList},
        ]
    },
    {
        path: '/inventory', component: LayoutNew,
        children: [
            //inventory Management
            {path: 'purchase-order/create', component: NewInventoryPurchaseOrder},
            {path: 'sales-order/create', component: NewInventorySalesOrder},
            {path: 'delivery-notes/create', component: NewInventoryDeliveryNotes},
            {path: 'purchase-return/create', component: NewInventoryPurchaseReturn},
            {path: 'inventory-entry/create', component: NewInventoryEntry},
            {path: 'inventory-withdrawal/create', component: NewInventoryWithdrawal},
            {path: 'storage-location/create', component: storageSingle},
        ]
    },
    //Inventory MODULE END

    //Accounting MODULE START
    {
        path: '/accounting', component: LayoutBasic,
        children: [
            //inventory Management
            {path: 'bank-activitys', component: BankActivity},
            {path: 'chart-of-accounts', component: ChartOfAccounts},
            {path: 'accounting-transactions', component: AccountingTransaction},
            {path: 'bank-deposits', component: BankDeposit},
            {path: 'bank-transfers', component: BankTransfer},
            {path: 'accounting-receipts', component: accountingReceipt},
        ]
    },
    {
        path: '/accounting', component: LayoutNew,
        children: [
            //inventory Management
            {path: 'bank-deposit/create', component: NewBankDeposit},
            {path: 'bank-transfer/create', component: NewBankTransfer},
            {path: 'accounting-receipts/create', component: NewaccountingReceipt},
        ]
    },
    //Inventory MODULE END


];

const router = new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'active',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

export default router
