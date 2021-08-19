<template>
    <!-- form section -->

    <form @submit.prevent="createInvoice">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel panel-default page-right-content">
                    <div class="panel-body page-panel-body">
                        <invoice-form-data :setFormData="setFormData" :type="type"></invoice-form-data>
                    </div>
                </div>

                <new-footer type="basic"/>

            </div>
        </div>
    </form>

</template>

<script>
import { mapGetters, mapMutations } from 'vuex';
    import NewFooter from '../../../layouts/partials/new_footer'
    import InvoiceFormData from '../invoices/invoiceFormData.vue'

    export default {
        components: {
            NewFooter,
            InvoiceFormData,
        },
        name: 'QuoteToInvoice',
        created: function(){
            setTimeout(() => {
                $('.edit_head_text').text('Convert Quotation to Invoice');
            }, 300);
            this.getQuote();
            this.reset_form_product_list_store();
        },
        data: function () {
            return {
                type: 'quote_to_invoice',
                sales_logs: [],

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
                    "payment_terms": "Due on receipt",
                    "payment_date": "",
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
        methods: {

            ...mapMutations([
                'reset_form_product_list_store',
            ]),

            getQuote: function () {
                var that = this;
                axios.get('/api/quotes/' + this.$route.params.id)
                    .then(function (response) {
                        that.sales_logs = response.data.quotes.sales_log;
                    });

             },

            createInvoice: function(){
                // console.log( this.set_payment_terms(this.form.payment_terms) );
                // this.form.selected_products = this.selected_products;
                this.form.selected_select2_delivery_notes = [];
                // this.form.payment_date = this.set_payment_terms(this.form.payment_terms);
                this.form.selected_products = this.get_old_data;
                this.form.vat = JSON.stringify(this.get_total_vat_information);
                this.form.discount_amount = this.get_form_product_list_info.discount_amount;
                this.form.subtotal = this.get_form_product_list_info.subtotal;
                this.form.total = this.get_form_product_list_info.total;
                this.form.discount_rate = this.get_form_product_list_info.discount_rate;
                this.form.document_note = this.get_form_product_list_info.document_note;

                $('.done_btn').addClass('loading').prop("disabled",true);

                this.form.post('/api/invoices?quotaion_sales_log_id='+this.sales_logs.id).then(() => {
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
                this.form=form_data;
            }
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
