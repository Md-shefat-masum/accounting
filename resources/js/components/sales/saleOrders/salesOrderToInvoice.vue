<template>
    <!-- form section -->

    <form @submit.prevent="createInvoice">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel panel-default page-right-content">
                    <div class="panel-body page-panel-body">
                        <invoice-form-data
                            :type="type"
                            :setFormData="setFormData">
                        </invoice-form-data>
                    </div>
                </div>

                <new-footer type="basic"/>
            </div>
        </div>
    </form>

</template>

<script>
import { mapGetters, mapMutations } from 'vuex'
    import NewFooter from '../../../layouts/partials/new_footer'
    import addCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue'
    import listOfCustomerOrLeadVue from '../../modal_contents/listOfCustomerOrLead.vue'
    import listOfProductOrServiceVue from '../../modal_contents/listOfProductOrService.vue'
    import salesStatusVue from '../components/sales_status.vue'
    import InvoiceFormData from '../invoices/invoiceFormData.vue'

    export default {
        components: {
            NewFooter,
            addCustomerOrLead,
            listOfCustomerOrLeadVue,
            listOfProductOrServiceVue,
            salesStatusVue,
            InvoiceFormData,
        },
        name: 'QuoteToInvoice',
        data: function () {
            return {
                type: 'sales_order_to_invoice',
                loaded: false,
                sales_logs:[],
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "recipient": "",
                    "address": "",
                    "currency": "TK",
                    "exchange_rate": "",
                    "code": "",
                    "po_number": "",
                    "date": "",
                    "payment_terms": "",
                    "is_product_and_service": true,
                    "is_expense": false,
                    "selected_products":'',
                    "is_upload": "",
                    "deposit_to": "",
                    "product": "",
                    "document_note": "",
                    "sub_total": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_date": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_notes": "",
                    "project": "",
                    "delivery_phone_number": "",
                    "assigned_to": "",
                    "private_note": "",
                    "attachments": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getSalesOrder();
            this.reset_form_product_list_store();

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            this.today_date =  yyyy+'-'+ mm +'-'+dd ;
            this.form.date = this.today_date;
            setTimeout(() => {
                $('.edit_head_text').text('Sales Order to invoice.');
            }, 300);
        },
        methods: {
            ...mapMutations([
                'reset_form_product_list_store',
            ]),

            getSalesOrder: function (Deliverynote) {
                var that = this;
                this.form.get('/api/saleorders/' + this.$route.params.id)
                    .then(function (response) {
                        that.loaded = true;
                        that.sales_logs = response.data.orders.sales_log;
                    });
            },

            createInvoice: function(){
                $('.done_btn').addClass('loading').prop("disabled",true);

                this.form.selected_products = this.get_old_data;
                this.form.vat = JSON.stringify(this.get_total_vat_information);
                this.form.discount_amount = this.get_form_product_list_info.discount_amount;
                this.form.subtotal = this.get_form_product_list_info.subtotal;
                this.form.total = this.get_form_product_list_info.total;
                this.form.discount_rate = this.get_form_product_list_info.discount_rate;
                this.form.document_note = this.get_form_product_list_info.document_note;

                this.form.post('/api/invoices?sales_order_sales_log_id='+this.sales_logs.id).then(() => {
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.push({name: 'invoiceList'})
                }).catch(() => {
                    $('.done_btn').removeClass('loading').prop("disabled",false);
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },

            setFormData: function(form_data){
                this.form = form_data;
            },

        },
        computed: {
            ...mapGetters([
                'get_form_product_list_info',
                'get_old_data',
                'get_total_vat_information',
            ]),
        }
    }
</script>
