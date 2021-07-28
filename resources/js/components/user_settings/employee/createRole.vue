<template>
    <div>
        <div class="card-header">
            <h3>Create Roles</h3>
        </div>

        <div class="card-body">
            <form action="">

                <div class="row">
                    <div class="form-group floating-label mandatory col-md-6 px-2">
                        <input type="text" id="gwt-uid-380" autocomplete="off" class="form-control form-component" />
                        <label for="gwt-uid-380" class="control-label form-question ellipsis">Name</label>
                    </div>
                    <div class="form-group floating-label mandatory col-md-6 px-2">
                        <input type="text" id="gwt-uid-381" autocomplete="off" class="form-control form-component" />
                        <label for="gwt-uid-381" class="control-label form-question ellipsis">Code</label>
                    </div>
                    <div class="form-group floating-label mandatory col-md-6 px-2">
                        <input type="text" id="gwt-uid-382" autocomplete="off" class="form-control form-component" />
                        <label for="gwt-uid-382" class="control-label form-question ellipsis">Description</label>
                    </div>
                    <div class="form-group pl-4">
                        <button class="btn btn-primary done_btn">Submit</button>
                    </div>
                </div>

            </form>
        </div>



    </div>
</template>



<script>
export default {
    data: function(){
        return{
            permissions: "API;Admin Panel;Apps Home;Apps Item;Apps My;Apps Tiles;Banking Accounts;Banking Reconciliations;Banking Transactions;Banking Transfers;Client Portal;Common Companies;Common Dashboards;Common Items;Common Notifications;Common Reports;Common Search;Common Uploads;Common Widgets;Customer Statement Statement;Customer/Vendor Balances Reports Customer Balances;Customer/Vendor Balances Reports Vendor Balances;Notifications;Offline Payments Settings;Paypal Standard Settings;Portal Invoices;Portal Payments;Portal Profile;Portal Proposals;Purchases Bills;Purchases Payments;Purchases Vendors;Reports Expense Summary;Reports Income Expense Summary;Reports Income Summary;Reports Profit Loss;Reports Tax Summary;Sales Customers;Sales Invoices;Sales Revenues;Settings Apps;Settings Categories;Settings Company;Settings Currencies;Settings Defaults;Settings Email;Settings Invoice;Settings Localisation;Settings Schedule;Settings Settings;Settings Taxes;Users Profile;Vendor Statement Statement;Widgets Account Balance;Widgets Cash Flow;Widgets Currencies;Widgets Expenses By Category;Widgets Income By Category;Widgets Latest Expenses;Widgets Latest Income;Widgets Total Expenses;Widgets Total Income;Widgets Total Profit;Apps Api Key;Apps Item;Apps Token;Banking Accounts;Banking Reconciliations;Banking Transactions;Banking Transfers;Common Dashboards;Common Import;Common Items;Common Notifications;Common Reports;Common Widgets;Customer Statement Statement;Purchases Bills;Purchases Payments;Purchases Vendors;Sales Customers;Sales Invoices;Sales Revenues;Settings Categories;Settings Currencies;Settings Taxes;Vendor Statement Statement;Apps Api Key;Apps Item;Banking Accounts;Banking Reconciliations;Banking Transactions;Banking Transfers;Common Companies;Common Dashboards;Common Items;Common Notifications;Common Reports;Common Widgets;Customer Statement Statement;Notifications;Offline Payments Settings;Paypal Standard Settings;Portal Invoices;Portal Payments;Portal Profile;Portal Proposals;Purchases Bills;Purchases Payments;Purchases Vendors;Sales Customers;Sales Invoices;Sales Revenues;Settings Apps;Settings Categories;Settings Currencies;Settings Settings;Settings Taxes;Users Profile;Vendor Statement Statement;Banking Accounts;Banking Reconciliations;Banking Transactions;Banking Transfers;Common Dashboards;Common Items;Common Notifications;Common Reports;Common Uploads;Common Widgets;Customer Statement Statement;Offline Payments Settings;Purchases Bills;Purchases Payments;Purchases Vendors;Sales Customers;Sales Invoices;Sales Revenues;Settings Categories;Settings Currencies;Settings Taxes;Vendor Statement Statement",
            checks : [
                "API",
                "Admin Panel",
                "Apps Home",
                "Apps Item",
                "Apps My",
                "Apps Tiles",
                "Banking Accounts",
                "Banking Reconciliations",
                "Banking Transactions",
                "Banking Transfers",
                "Client Portal",
                "Common Companies",
                "Common Dashboards",
                "Common Items",
                "Common Notifications",
                "Common Reports",
                "Common Search",
                "Common Uploads",
                "Common Widgets",
                "Customer Statement Statement",
                "Customer/Vendor Balances Reports Customer Balances",
                "Customer/Vendor Balances Reports Vendor Balances",
                "Notifications","Offline Payments Settings",
                "Paypal Standard Settings",
                "Portal Invoices",
                "Portal Payments",
                "Portal Profile",
                "Portal Proposals",
                "Purchases Bills",
                "Purchases Payments",
                "Purchases Vendors",
                "Reports Expense Summary",
                "Reports Income Expense Summary",
                "Reports Income Summary",
                "Reports Profit Loss",
                "Reports Tax Summary",
                "Sales Customers",
                "Sales Invoices",
                "Sales Revenues",
                "Settings Apps",
                "Settings Categories",
                "Settings Company",
                "Settings Currencies",
                "Settings Defaults",
                "Settings Email",
                "Settings Invoice",
                "Settings Localisation",
                "Settings Schedule",
                "Settings Settings",
                "Settings Taxes",
                "Users Profile",
                "Vendor Statement Statement",
                "Widgets Account Balance",
                "Widgets Cash Flow",
                "Widgets Currencies",
                "Widgets Expenses By Category",
                "Widgets Income By Category",
                "Widgets Latest Expenses",
                "Widgets Latest Income",
                "Widgets Total Expenses",
                "Widgets Total Income",
                "Widgets Total Profit",
                "Apps Api Key",
                "Apps Item",
                "Apps Token",
                "Banking Accounts",
                "Banking Reconciliations",
                "Banking Transactions",
                "Banking Transfers",
                "Common Dashboards",
                "Common Import",
                "Common Items",
                "Common Notifications",
                "Common Reports",
                "Common Widgets",
                "Customer Statement Statement",
                "Purchases Bills",
                "Purchases Payments",
                "Purchases Vendors",
                "Sales Customers",
                "Sales Invoices",
                "Sales Revenues",
                "Settings Categories",
                "Settings Currencies",
                "Settings Taxes",
                "Vendor Statement Statement",
                "Apps Api Key",
                "Apps Item",
                "Banking Accounts",
                "Banking Reconciliations",
                "Banking Transactions",
                "Banking Transfers",
                "Common Companies",
                "Common Dashboards",
                "Common Items",
                "Common Notifications",
                "Common Reports",
                "Common Widgets",
                "Customer Statement Statement",
                "Notifications",
                "Offline Payments Settings",
                "Paypal Standard Settings",
                "Portal Invoices",
                "Portal Payments",
                "Portal Profile",
                "Portal Proposals",
                "Purchases Bills",
                "Purchases Payments",
                "Purchases Vendors",
                "Sales Customers",
                "Sales Invoices",
                "Sales Revenues",
                "Settings Apps",
                "Settings Categories",
                "Settings Currencies",
                "Settings Settings",
                "Settings Taxes",
                "Users Profile",
                "Vendor Statement Statement",
                "Banking Accounts",
                "Banking Reconciliations",
                "Banking Transactions",
                "Banking Transfers",
                "Common Dashboards",
                "Common Items",
                "Common Notifications",
                "Common Reports",
                "Common Uploads",
                "Common Widgets",
                "Customer Statement Statement",
                "Offline Payments Settings",
                "Purchases Bills",
                "Purchases Payments",
                "Purchases Vendors",
                "Sales Customers",
                "Sales Invoices",
                "Sales Revenues",
                "Settings Categories",
                "Settings Currencies",
                "Settings Taxes",
                "Vendor Statement Statement"
            ],

        }
    },
    created: function(){
        this.checks = this.permissions.split(';');
    },
}
</script>

<style>

</style>
