<template>
    <!-- form section -->

    <form @submit.prevent="updateInvoice">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">
                            <invoice-form-data :setFormData="setFormData" :type="type"></invoice-form-data>
                        </div>
                    </div>

                    <new-footer type="basic"/>

                </div>
            </div>
        </div>
    </form>

</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'
    import InvoiceFormData from './invoiceFormData.vue'

    export default {
        components: {
            NewFooter,
            InvoiceFormData,
        },
        name: 'Invoice',
        data: function () {
            return {
                type: 'edit',

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
        created: function () {
            // this.getInvoice();
        },
        methods: {
            updateInvoice: function () {
                // this.form.selected_products = this.selected_products;
                // this.form.invoice_no = this.form.code;
                // this.form.payment_date = this.set_payment_terms(this.form.payment_terms);

                var that = this;
                this.form.put('/api/invoices/' + this.$route.params.id).then(function (response) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                    that.$router.push({name: 'invoiceList'})
                })

            },

            setFormData: function(form_data){
                this.form=form_data;
            }
        }
    }
</script>
