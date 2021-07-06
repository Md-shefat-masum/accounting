<template>
    <!-- form section -->

    <form @submit.prevent="createInvoice">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel panel-default page-right-content">
                    <div class="panel-body page-panel-body">
                        <invoice-form-data
                            :type="type"
                            :setFormData="setFormData"></invoice-form-data>
                    </div>
                </div>
                <new-footer type="basic"/>
            </div>
        </div>
    </form>

</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'
    import InvoiceFormData from '../invoices/invoiceFormData.vue'

    export default {
        components: {
            NewFooter,
            InvoiceFormData,
        },
        name: 'QuoteToInvoice',
        data: function () {
            return {
                type: 'delivery_note_to_invoice',
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
                    "payment_terms": "Due on receipt",
                    "payment_date" : '',
                    "is_product_and_service": true,
                    "is_expense": false,
                    "selected_products":'',
                    "selected_select2_delivery_notes": [],
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
            this.getDeliverynote();
            setTimeout(() => {
                $('.edit_head_text').text('Delivery Notes to invoice.');
            }, 300);
        },
        methods: {
            getDeliverynote: function (Deliverynote) {
                var that = this;
                this.form.get('/api/delivery-note/' + this.$route.params.id)
                    .then(function (response) {
                        that.form.fill(response.data.delivery_note);
                        that.selected_products = response.data.selected_products;
                        that.loaded = true;
                        // console.log(response.data,response.data.delivery_note.customer_id);
                        // that.calculateTotal();
                        that.sales_logs = response.data.delivery_note.sales_log;
                    });
            },
             createInvoice: function(){
                this.form.selected_select2_delivery_notes = [];
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.post('/api/invoices?delivery_note_sales_log_id='+this.sales_logs.id).then(() => {
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
        }
    }
</script>
