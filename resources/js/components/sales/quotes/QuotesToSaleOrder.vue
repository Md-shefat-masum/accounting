<template>
    <!-- form section -->

    <form @submit.prevent="createSales">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel panel-default page-right-content">
                    <div class="panel-body page-panel-body">
                        <sale-order-form-data :setFormData="setFormData" :type="type"></sale-order-form-data>
                    </div>
                </div>
                <new-footer v-if="!sales_logs.is_sales_order" type="basic"/>
            </div>
        </div>
    </form>

</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'
    import SaleOrderFormData from '../saleOrders/saleOrderFormData.vue'

    export default {
        components: {
            NewFooter,
            SaleOrderFormData,
        },
        name: 'QuoteToSalesOrder',
        data: function () {
            return {
                type : 'quote_to_sales_order',
                sales_logs: [],
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
        created: function(){
            this.getQuote();
            setTimeout(() => {
                $('.edit_head_text').text('Convert to Sales Order')
            }, 300);
        },
        methods: {
            getQuote: function (Quote) {
                var that = this;
                axios.get('/api/quotes/' + this.$route.params.id)
                    .then(function (response) {
                        that.sales_logs = response.data.quotes.sales_log;
                        setTimeout(() => {
                            if(response.data.quotes.status != 'open'){
                                $('input').attr('disabled',true);
                                $('textarea').attr('disabled',true);
                                $('select').attr('disabled',true);
                                $('button').attr('disabled',true);
                            }
                        }, 2000);
                    });

            },
            createSales: function(){
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.post('/api/saleorders?quotaion_sales_log_id='+this.sales_logs.id).then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.replace({name: 'salesOrderList'})
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
        }
    }
</script>
