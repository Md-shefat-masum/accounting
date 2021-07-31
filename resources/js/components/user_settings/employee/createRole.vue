<template>
    <div>
        <div class="card-header">
            <h3 v-if="form_type == 'create'">Create Role</h3>
            <h3 v-else>Update Role</h3>
        </div>

        <div class="card-body">
            <form action="" id="role_create_form">
                <div class="row">
                    <div class="form-group floating-label mandatory col-md-6 px-2">
                        <input type="text" name="role_name" v-model="form_data.role_name" id="gwt-uid-380" autocomplete="off" class="form-control form-component" />
                        <label for="gwt-uid-380" class="control-label form-question ellipsis">Name</label>
                        <span class="text-danger role_name_err"></span>
                    </div>
                    <div class="form-group floating-label mandatory col-md-6 px-2">
                        <input type="text" name="code" v-model="form_data.code" id="gwt-uid-381" autocomplete="off" class="form-control form-component" />
                        <label for="gwt-uid-381" class="control-label form-question ellipsis">Code</label>
                        <span class="text-danger code_err"></span>
                    </div>
                    <div class="form-group floating-label mandatory col-md-6 px-2">
                        <input type="text" name="description" v-model="form_data.description" id="gwt-uid-382" autocomplete="off" class="form-control form-component" />
                        <label for="gwt-uid-382" class="control-label form-question ellipsis">Description</label>
                        <span class="text-danger description_err"></span>
                    </div>

                    <div class="col-12">
                        <h5 class="text-capitalize">permissions</h5>
                        <div class="d-flex check_select_btns_group">
                            <button class="btn btn-outline-primary m-1 btn-sm" @click.prevent="select_all_option" type="button">Select All</button>
                            <button class="btn btn-outline-primary m-1 btn-sm" @click.prevent="unselect_all_option" type="button">Unselect All</button>
                        </div>
                        <div class="d-flex my-4 justify-content-around check_btns_group">
                            <button @click.prevent="set_selected_title('read',checks_area_read)" class="btn btn-outline-primary m-1 btn-sm w-75 active" type="button">Read</button>
                            <button @click.prevent="set_selected_title('create',checks_area_create)" class="btn btn-outline-primary m-1 btn-sm w-75" type="button">Create</button>
                            <button @click.prevent="set_selected_title('update',checks_area_update)" class="btn btn-outline-primary m-1 btn-sm w-75" type="button">Update</button>
                            <button @click.prevent="set_selected_title('delete',checks_area_delete)" class="btn btn-outline-primary m-1 btn-sm w-75" type="button">Delete</button>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="row">
                                    <li class="col-md-4 my-1 check_option_single_list" v-for="(check,index) in selected_checks" :key="index+check.name">
                                        <label :for="check.name+index" class="d-flex flex-wrap" style="cursor:pointer;">
                                            <input type="checkbox" v-if="check.checked" checked v-model="check.checked" :name="check.name+index" :id="check.name+index" style="opacity:unset; position:unset;">
                                            <input type="checkbox" v-else :name="check.name+index" v-model="check.checked" :id="check.name+index" style="opacity:unset; position:unset;">
                                            <div style="display: inline-block;line-height:16px;width:87%;margin-left: 5px;">{{ check.name }}</div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-group pl-4">
                        <button v-if="form_type == 'create'" class="btn btn-primary done_btn" @click.prevent="store_role()" >Submit</button>
                        <button v-else class="btn btn-primary done_btn" @click.prevent="update_role()" >Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</template>



<script>
export default {
    props: ['change_type','role_info','form_type','get_roles'],
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

            checks_area_delete: [
                {
                    name: 'Banking Accounts',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transfers',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Notifications',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Widgets',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Bills',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Customers',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Categories',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Vendor Statement Statement',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Reconciliations',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Dashboards',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Reports',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Customer Statement Statement',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Payments',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Invoices',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Currencies',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transactions',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Items',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Uploads',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Offline Payments Settings',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Vendors',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Revenues',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Taxes',
                    area: [
                        'delete',
                    ],
                    checked: false,
                },
            ],

            checks_area_update: [
                {
                    name: 'Apps Api Key',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Reconciliations',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Companies',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Notifications',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Customer Statement Statement',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Paypal Standard Settings',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Profile',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Payments',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Invoices',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Categories',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Taxes',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps Item',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transactions',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Dashboards',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Reports',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Notifications',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Invoices',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Proposals',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Vendors',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Revenues',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Currencies',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Users Profile',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Accounts',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transfers',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Items',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Widgets',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Offline Payments Settings',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Payments',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Bills',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Customers',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Apps',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Settings',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
                {
                    name: 'Vendor Statement Statement',
                    area: [
                        'update',
                    ],
                    checked: false,
                },
            ],

            checks_area_create: [
                 {
                    name: 'Apps Api Key',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Accounts',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transfers',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Items',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Widgets',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Payments',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Invoices',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Currencies',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps Item',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Reconciliations',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Dashboards',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Notifications',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Customer Statement Statement',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Vendors',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Revenues',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Taxes',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps Token',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transactions',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Import',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Reports',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Bills',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Customers',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Categories',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
                {
                    name: 'Vendor Statement Statement',
                    area: [
                        'create',
                    ],
                    checked: false,
                },
            ],

            checks_area_read: [
                {
                    name: 'API',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps Item',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Accounts',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transfers',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Dashboards',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Reports',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Widgets',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Customer/Vendor Balances Reports',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Paypal Standard Settings',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Profile',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Payments',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Reports Income Expense Summary',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Reports Tax Summary',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Revenues',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Company',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Email',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Schedule',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Users Profile',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Cash Flow',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Income By Category',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Total Expenses',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Admin Panel',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps My',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Reconciliations',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Client Portal',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Items',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Search',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Customer Statement Statement',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Notifications',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Invoices',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Proposals',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Vendors',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Reports Income Summary',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Customers',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Apps',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Currencies',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Invoice',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Settings',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Vendor Statement Statement',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Currencies',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Latest Expenses',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Total Income',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps Home',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Apps Tiles',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Banking Transactions',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Companies',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Notifications',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Common Uploads',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Customer/Vendor Balances Reports',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Offline Payments Settings',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Portal Payments',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Purchases Bills',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Reports Expense Summary',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Reports Profit Loss',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Sales Invoices',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Categories',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Defaults',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Localisation',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Settings Taxes',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Account Balance',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Expenses By Category',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Latest Income',
                    area: [
                        'read',
                    ],
                    checked: false,
                },
                {
                    name: 'Widgets Total Profit',
                    area: [
                        'read',
                    ],
                    checked: false,
                },

            ],

            selected_checks: [],
            checked_title_name: 'read',
            list_key: parseInt(Math.random()),

            form_data : {
                role_name : '',
                code : '',
                description : '',
            }

        }
    },
    created: function(){
        // this.checks = this.permissions.split(';');

        if (this.form_type == 'update') {
            this.form_data = this.role_info;
            this.checks_area_read = JSON.parse(this.role_info.read_permission);
            this.checks_area_create = JSON.parse(this.role_info.create_permission);
            this.checks_area_update = JSON.parse(this.role_info.update_permission);
            this.checks_area_delete = JSON.parse(this.role_info.delete_permission);

            // let that = this;
            setTimeout(() => {
                // that.list_key = parseInt(Math.random());
                $('.form2.right-content .floating-label .control-label').addClass('active');
            }, 200);
        }

        this.selected_checks = this.checks_area_read;

        $(function(){
            $('.check_btns_group button').on('click',function(){
                $('.check_btns_group button').removeClass('active');
                $(this).addClass('active');
            });

            $('.check_select_btns_group button').on('click',function(){
                $('.check_select_btns_group button').removeClass('active');
                $(this).addClass('active');
            });
        })
    },
    methods: {
        select_all_option: function(){
            // $('.check_option_single_list label input').prop( "checked", true );
            // console.log(this.checked_title_name );

            if (this.checked_title_name == 'read') {
                this.checks_area_read.map((item)=>item.checked = true);
            }

            if (this.checked_title_name == 'create') {
                this.checks_area_create.map((item)=>item.checked = true);
            }

            if (this.checked_title_name == 'update') {
                this.checks_area_update.map((item)=>item.checked = true);
            }

            if (this.checked_title_name == 'delete') {
                this.checks_area_delete.map((item)=>item.checked = true);
            }

        },

        unselect_all_option: function(){
            // $('.check_option_single_list label input').prop( "checked", false );
            if (this.checked_title_name == 'read') {
                this.checks_area_read.map((item)=>item.checked = false);
            }

            if (this.checked_title_name == 'create') {
                this.checks_area_create.map((item)=>item.checked = false);
            }

            if (this.checked_title_name == 'update') {
                this.checks_area_update.map((item)=>item.checked = false);
            }

            if (this.checked_title_name == 'delete') {
                this.checks_area_delete.map((item)=>item.checked = false);
            }
        },

        set_selected_title: function(title, data){
            // console.log(title);

            if (this.checked_title_name == 'read') {
                // console.log(this.selected_checks);
                this.checks_area_read = this.selected_checks;
            }

            if (this.checked_title_name == 'create') {
                this.checks_area_create = this.selected_checks;
            }

            if (this.checked_title_name == 'update') {
                this.checks_area_update = this.selected_checks;
            }

            if (this.checked_title_name == 'delete') {
                this.checks_area_delete = this.selected_checks;
            }

            this.selected_checks = data;
            this.checked_title_name = title;
        },

        store_role: function(){
            let form_data = new FormData( );
            this.set_selected_title(this.checked_title_name, this.selected_checks);
            form_data.append('role_name',this.form_data.role_name);
            form_data.append('code',this.form_data.code);
            form_data.append('description',this.form_data.description);
            form_data.append('read_permission',JSON.stringify(this.checks_area_read));
            form_data.append('create_permission',JSON.stringify(this.checks_area_create));
            form_data.append('update_permission',JSON.stringify(this.checks_area_update));
            form_data.append('delete_permission',JSON.stringify(this.checks_area_delete));

            let that = this;
            axios.post('/api/user-role',form_data)
                .then((res)=>{
                    that.get_roles();
                    that.change_type('all_role');
                })
                .catch((err)=>{
                    // console.log(err.response.data.errors);
                    let errors = err.response.data.errors;
                    for (const key in errors) {
                        if (Object.hasOwnProperty.call(errors, key)) {
                            const element = errors[key];
                            let label = $('.'+key+'_err').siblings('.control-label');
                            $(label[0]).html( element[0] ) ;
                            $(label[0]).addClass('text-danger');
                            Toast.fire({
                                icon: 'error',
                                title: element[0]
                            });
                        }
                    }
                })
        },

        update_role: function(){
            let form_data = new FormData( );
            this.set_selected_title(this.checked_title_name, this.selected_checks);
            form_data.append('id',this.form_data.id);
            form_data.append('role_name',this.form_data.role_name);
            form_data.append('code',this.form_data.code);
            form_data.append('description',this.form_data.description);
            form_data.append('read_permission',JSON.stringify(this.checks_area_read));
            form_data.append('create_permission',JSON.stringify(this.checks_area_create));
            form_data.append('update_permission',JSON.stringify(this.checks_area_update));
            form_data.append('delete_permission',JSON.stringify(this.checks_area_delete));

            let that = this;
            axios.post('/api/update-user-role',form_data)
                .then((res)=>{
                    that.get_roles();
                    that.change_type('all_role');
                })
                .catch((err)=>{
                    // console.log(err.response.data.errors);
                    let errors = err.response.data.errors;
                    for (const key in errors) {
                        if (Object.hasOwnProperty.call(errors, key)) {
                            const element = errors[key];
                            let label = $('.'+key+'_err').siblings('.control-label');
                            $(label[0]).html( element[0] ) ;
                            $(label[0]).addClass('text-danger');
                            Toast.fire({
                                icon: 'error',
                                title: element[0]
                            });
                        }
                    }
                })
        }

    }
}
</script>

