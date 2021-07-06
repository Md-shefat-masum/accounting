<template>
    <!-- form section -->

    <form @submit.prevent="updateSales">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a" data-id="eaf59416-1dc1-4844-a76b-f22ed8dd0971">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">
                            <sale-order-form-data :setFormData="setFormData" :type="type"></sale-order-form-data>
                        </div>
                    </div>

                    <new-footer v-if="form.status != 'delivered'" type="basic"/>

                </div>
            </div>
        </div>
    </form>

</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer';
    import SaleOrderFormData from './saleOrderFormData.vue';

    export default {
        components: {
            NewFooter,
            SaleOrderFormData
        },
        name: 'SalesOrderEdit',
        data: function () {
            return {
                type : 'edit',
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "code": "",
                    "recipient": "",
                    "currency": "TK",
                    "currency_rate": '',
                    "address": "",
                    "po_number": "",
                    "date": "",
                    "satus": "open",
                    "paid_satus": "not_delivered",
                    "delivery_date": "",
                    "payment_terms": "at 30 days",
                    "selected_products":'',
                    "product": "",
                    "document_note": "",
                    "sub_total": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_address_id": "",
                    "delivery_notes": "",
                    "project": "",
                    "delivery_phone_number": "",
                    "private_note": "",
                    "attachments": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        methods: {

            updateSales: function () {
                let that = this;
                this.form.put('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                    that.$router.replace({name: 'salesOrderList'});
                })
            },
            setFormData: function(form_data){
                this.form=form_data;
            }
        }
    }
</script>
