<template>

    <!-- form section -->
    <form @submit.prevent="updateReceipt">
        <div class="right-content form2">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e">
                            <receipt-form-body :setFormData="setFormData" :type="type"></receipt-form-body>
                        </div>
                    </div>

                    <new-footer type="basic"/>
                </div>
            </div>
        </div>
    </form>

    <!-- form section -->
</template>

<script>

    import NewFooter from '../../../layouts/partials/new_footer'
    import ReceiptFormBody from './receiptFormBody.vue';

    export default {
        components: {
            NewFooter,
            ReceiptFormBody,
        },

        name: 'editReceipt',
        data: function () {
            return {
                type: 'edit',
                form: new Form({
                    "id": "",
                    "customer_id": "",
                    "address": "",
                    "code": "",
                    "paid_by": "",
                    "billing_date": "",
                    "receipt_status": "deposit",
                    "receipts_category": "",
                    "amount": 0,
                    "splits": [],
                    "is_paid": "",
                    "payment_method": "cash",
                    "paid_on": "",
                    "bank": "",
                    "bank_id": "",
                    "transaction_id": "",
                    "from_bank_name": '',
                    "from_bank_id": '',
                    "check_number": '',
                    "transaction_date": '',
                    "payment_processor": '',
                    "payment_processor_id": '',
                    "card_holder_name": '',
                    "card_number": '',

                    "attachments": "",
                    "files": [],
                    "project": "",
                    "project_id": "",
                    "assigned_to": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        methods: {
            updateReceipt: function () {

                var that = this;
                this.form.put('/api/receipts/' + this.$route.params.id).then(function (response) {

                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });

                    this.$router.replace({name: 'salesReceiptList'})

                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Updated error'
                    });
                });

            },
            setFormData: function(form_data){
                this.form = form_data;
                console.log(form_data);
            },
        }
    }
</script>
