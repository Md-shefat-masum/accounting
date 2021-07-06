<template>
    <div class="main-container" style="margin-top:75px;">
        <div class="right-content">
            <div id="contentRootPanel" class="fullpage" style="">
                <div class="A54VNK-yb-a row">
                    <div class="A54VNK-yb-b col-md-3">
                        <div class="container-fluid">
                            <div class="col-xs-12 page-panel card">
                                <div class="A54VNK-Xb-a card-body">
                                    <a class="btn btn-link picto-font pull-right A54VNK-Xb-c border-0 shadow-none" href="#" @click.prevent="customersEdit()">p</a>
                                    <h4>Info</h4>
                                    <div>
                                        <div class="A54VNK-hg-a" style="margin-top: 25px;">
                                            <div class="customer_profile_left">
                                                <span class="picto-font text-muted A54VNK-hg-c">@</span>
                                                <a class="text-default" target="_blank" :href="'http://maps.google.com/?q='+customer.billing_address+' '+customer.line_2+' '+customer.city ">
                                                    {{ customer.billing_address }}
                                                    {{ customer.line_2 }}
                                                    {{ customer.city }}
                                                </a>
                                            </div>
                                            <div  class="customer_profile_left">
                                                <span class="picto-font text-muted A54VNK-hg-c">:</span>
                                                <a class="ellipsis-inline text-default" target="_blank" :href="'callto:'+customer.phone">{{ customer.phone }}</a>
                                            </div>
                                            <div class="customer_profile_left">
                                                <span class="picto-font text-muted A54VNK-hg-c">M</span>
                                                <a class="ellipsis-inline text-default" target="_blank" :href="'mailto:'+customer.email">{{ customer.email }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="A54VNK-Xb-a p-4">
                                    <h4>Balance Due</h4>
                                    <a class="gwt-Anchor" @click="gotoCustomerStatement" href="#">View Customer Statement</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="A54VNK-yb-d col-md-9 pl-0">
                        <div class="container-fluid pl-0 profile_right_nav">
                            <ul class="tabs-container page-panel card card-body" >
                                <li class="tab active">
                                    <a  class="" href="#" role="button">
                                        <span>Activity</span> <span class="badge">{{ logs.length }}</span>
                                    </a>
                                </li>
                                <li class="tab">
                                    <router-link :to="'/sales/invoices'" class="" href="#" role="button"><span>Invoices</span> <span class="badge">{{ invoices_total }}</span></router-link>
                                </li>
                                <li class="tab">
                                    <router-link :to="'/sales/delivery-notes'" class="" href="#" role="button"><span>Delivery Notes</span> <span class="badge">{{ deliverynotes_total }}</span></router-link>
                                </li>
                                <li class="tab">
                                    <router-link :to="'/sales/receipts'" class="" href="#" role="button"><span>Sales Receipts</span> <span class="badge">{{ receipts_total }}</span></router-link>
                                </li>
                                <li class="tab">
                                    <router-link :to="'/sales/quotes'" class="" href="#" role="button"><span>Quote</span> <span class="badge">{{ quotes_total }}</span></router-link>
                                </li>
                                <li class="tab">
                                    <router-link :to="'/sales/sales-orders'" class="" href="#" role="button"><span>Sales Order</span> <span class="badge">{{ saleorders_total }}</span></router-link>
                                </li>
                                <li class="tab dropdown A54VNK-Yc-a" aria-hidden="true" style="display: none;">
                                    <a class="dropdown-toggle" data-toggle="dropdown"> More <span class="picto-font A54VNK-Yc-b"></span> </a>
                                    <ul class="dropdown-menu with-tick dropdown-menu-right">
                                        <li aria-hidden="true" style="display: none;">
                                            <a class="" href="#" role="button">
                                                <span class="badge pull-right">{{ logs.count }}</span> <span class="A54VNK-wf-a">Activity</span></a>
                                        </li>
                                        <li aria-hidden="true" style="display: none;">
                                            <a class="" href="#" role="button"><span class="badge pull-right">{{ invoices_total }}</span> <span class="A54VNK-wf-a">Invoices</span></a>
                                        </li>
                                        <li aria-hidden="true" style="display: none;">
                                            <a class="" href="#" role="button"><span class="badge pull-right">{{ deliverynotes_total }}</span> <span class="A54VNK-wf-a">Delivery Notes</span></a>
                                        </li>
                                        <li aria-hidden="true" style="display: none;">
                                            <a class="" href="#" role="button"><span class="badge pull-right">{{ receipts_total }}</span> <span class="A54VNK-wf-a">Sales Receipts</span></a>
                                        </li>
                                        <li aria-hidden="true" style="display: none;">
                                            <a class="" href="#" role="button"><span class="badge pull-right">{{ quotes_total }}</span> <span class="A54VNK-wf-a">Quote</span></a>
                                        </li>
                                        <li aria-hidden="true" style="display: none;">
                                            <a class="" href="#" role="button"><span class="badge pull-right">{{ saleorders_total }}</span> <span class="A54VNK-wf-a">Sales Order</span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="A54VNK-ad-d page-panel" style="">
                                <div class="A54VNK-ad-g">
                                    <div class="searchbox searchbox-no-border">
                                        <div class="searchbox-wrapper">
                                            <form action="." onsubmit="return false;" style="height: 100%;">
                                                <input type="search" class="searchbox-input border-0" autocomplete="off" placeholder="Search results" aria-label="Search results" />
                                            </form>
                                            <button type="button" class="searchbox-submit">
                                                <span class="picto-font">s</span>
                                            </button>
                                            <button type="button" class="searchbox-reset" aria-hidden="true" style="display: none;">
                                                <span>×</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="A54VNK-Zc-h" aria-hidden="true" style="display: none;">
                                <button type="button" class="A54VNK-Zc-c A54VNK-Zc-d" aria-hidden="true" style="display: none;"><span class="picto-font text-muted"></span></button>
                                <button type="button" class="A54VNK-Zc-c A54VNK-Zc-e" aria-hidden="true" style="display: none;"><span class="picto-font text-muted"></span></button>
                                <ul class="tabs-container page-panel A54VNK-Zc-a"></ul>
                            </div>
                            <div class="page-panel A54VNK-bd-c" aria-hidden="true" style="display: none;">
                                <div><span class="bolder"></span> <a class="A54VNK-bd-a" role="button">select all</a> <span>|</span> <a class="A54VNK-bd-b" role="button">clear selection</a></div>
                                <div><button type="button" class="btn btn-danger">Delete</button></div>
                            </div>
                            <div class="A54VNK-e-e" style="margin-bottom: 200px; margin-top: 16px;">
                                <div class="row">

                                    <div onclick="" __idx="0" v-for="(log,key) in logs" :key="key" class="col-xs-12 col-sm-6 col-lg-4 col-xl-4">
                                        <div class="A54VNK-ae-c card">
                                            <div class="card-body">
                                                <div class="A54VNK-ae-d">
                                                    <div class="pull-right text-muted A54VNK-ae-i">
                                                        <span class="">{{ log.date || log.billing_date || log.payment_date }}</span>
                                                    </div>
                                                    <div>
                                                        <h4 class="no-margin-top A54VNK-Vj-a">
                                                            <a class="ellipsis-block" href="#" @click.prevent="edit_target(log.log_name,log.id)"
                                                                :title="log.code" style="font-size: 15px;">
                                                                {{ log.log_name }} {{ log.code }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="clearfix">
                                                        <ul class="list-inline A54VNK-ae-g">
                                                            <li class="ellipsis-inline">
                                                                <span class="ellipsis-inline A54VNK-Xj-a">
                                                                    <a class="text-muted ellipsis-inline A54VNK-Xj-a" href="#" :title="log.code">
                                                                        {{ log.customer }}
                                                                    </a>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <br>
                                                        <div class="pull-right text-right">
                                                            <div class="A54VNK-ae-a">Tk {{ log.total || log.amount }}</div>
                                                        </div>
                                                        <ul class="list-inline A54VNK-ae-g A54VNK-ae-h">
                                                            <li>
                                                                <!-- <span class="A54VNK-Gf-a ellipsis label-light label-light-warning"><span title="In 1 week">In 1 week</span></span> -->
                                                            </li>
                                                        </ul>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="A54VNK-Aj-a clearfix actions d-none">
                                                    <div class="d-flex justify-content-end border-top">
                                                        <div class="A54VNK-Tj-b">
                                                            <button class="btn A54VNK-Tj-a" style="box-shadow: unset;" data-action="CONVERT" data-convert-to-type="SALES_ORDER">
                                                                <!-- <span class="picto-font A54VNK-Tj-d"></span>
                                                                <span class="A54VNK-Tj-c">Order</span> -->
                                                            </button>
                                                        </div>

                                                        <div class="A54VNK-Uj-b">
                                                            <button class="btn A54VNK-Uj-a" style="box-shadow: unset;" type="button" data-action="EMAIL">
                                                                <span class="picto-font A54VNK-Uj-c" title="Email">M</span>
                                                            </button>
                                                        </div>
                                                        <div class="A54VNK-zh-b">
                                                            <button aria-expanded="false" style="box-shadow: unset;" class="btn dropdown-toggle A54VNK-zh-a" data-toggle="dropdown" type="button" aria-label="More Actions"><span class="picto-font A54VNK-zh-c"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li>
                                                                    <a class="gwt-Anchor" data-action="CONVERT" data-convert-to-type="CUSTOMER_INVOICE" href="javascript:void(0)">
                                                                        <span class="picto-font A54VNK-Oi-c"></span>
                                                                        <span>Invoice</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="gwt-Anchor" data-action="PREVIEW" href="javascript:void(0)">
                                                                        <span class="picto-font A54VNK-Oi-c">/</span>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="gwt-Anchor" data-action="DUPLICATE" data-duplicate="DATA" href="javascript:void(0)">
                                                                        <span class="picto-font A54VNK-Oi-c">r</span>
                                                                        <span>Duplicate</span>
                                                                    </a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a class="gwt-Anchor A54VNK-Oi-a" data-action="DELETE" href="javascript:void(0)">
                                                                        <span class="picto-font A54VNK-Oi-c">#</span>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import SubHeader from "../sub_header";
    export default {
        components: {
            SubHeader,
        },

        name: 'CustomerProfile',

        data: function () {
            return {
                invoices_total: 0,
                deliverynotes_total: 0,
                receipts_total: 0,
                quotes_total: 0,
                saleorders_total: 0,
                customer: [],
                logs:[],
                form: new Form({
                    "id": "",
                    "is_company": true,
                    "company_name": "",
                    "first_name": "",
                    "last_name": "",
                    "middle_name": "",
                    "email": "",
                    "phone": "",
                    "website": "",
                    "vat_number": "",
                    "is_pickup_only_customer": true,
                    "billing_address": "",
                    "line_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "18",
                    "is_same_delivery": true,
                    "delivery_address": [{
                        address: '',

                    }],
                    "contacts": [{
                        single_contact: '',
                    }],
                    "payment_terms": "",
                    "price_family": "",
                    "currency": "18",
                    "business_code": "",
                    "opt_in_to_emails": true,
                    "assigned_to": "0",
                    "reference_account": "",
                    "date_as": new Date().toLocaleString(),
                    "note": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.get_profile();
            setTimeout(() => {
                $('.edit_head_text').text('Customer Profile')
            }, 300);
        },
        methods: {
            get_profile: function(){
                axios.get('/api/customer-user_settings/'+this.$route.params.id)
                    .then(response => {
                        this.logs = response.data.log_details;
                        this.customer = response.data.customer;
                        this.invoices_total = response.data.invoices_total;
                        this.deliverynotes_total = response.data.deliverynotes_total;
                        this.receipts_total = response.data.receipts_total;
                        this.quotes_total = response.data.quotes_total;
                        this.saleorders_total = response.data.saleorders_total;
                    });
            },
            customersEdit: function(){
                this.$router.push({ name: 'editCustomer', params: { id: this.customer.id }});
            },
            deleteCustomer: function (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/customers/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listCustomers();
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
            },
            gotoCustomerStatement: function(){
                this.$router.push({name: 'customer_statement', params: { id: this.$route.params.id }})
            },
            edit_target: function(log_name,id){
                // console.log(log_name);
                if(log_name == 'Quote'){
                    this.$router.push({name: 'editQuote', params: { id: id }})
                }
                if(log_name == 'Sales Order'){
                    this.$router.push({name: 'EditSalesOrder', params: { id: id }})
                }
                if(log_name == 'Delivery Note'){
                    this.$router.push({name: 'editDeliveryNote', params: { id: id }})
                }
                if(log_name == 'Invoice'){
                    this.$router.push({name: 'editInvoice', params: { id: id }})
                }
            }
        }
    }
</script>
