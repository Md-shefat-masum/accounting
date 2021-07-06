<template>
    <div class="row">
        <div class="col-12">
            <div data-id="v192168001011_1372347062346_2186">
                <div class="form-horizontal">
                    <div class="form-group" data-id="v192168001011_1372347062346_2187">
                        <div class="col-sm-12">
                            <span class="">
                                <div class="alert alert-info">
                                    <span class="picto-font" style="color: #3b719c;">A</span>

                                    <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_quote">
                                        &nbsp;&nbsp;&nbsp;Quote :
                                        <a href="#" @click.prevent="editQuote(sales_logs.quote_id)" style="color:white">{{sales_logs.quote_code}}</a>
                                    </span>

                                    <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_sales_order">
                                        &nbsp;&nbsp;&nbsp;Sales Order :
                                        <a href="#" @click.prevent="editOrder(sales_logs.sales_order_id)" style="color:white">{{sales_logs.sales_order_code}}</a>
                                    </span>

                                    <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_delivery_note">
                                        &nbsp;&nbsp;&nbsp;Delivery Note :
                                        <a href="#" style="color:white">{{sales_logs.delivery_note_code}}</a>
                                    </span>

                                    <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_invoice">
                                        &nbsp;&nbsp;&nbsp;Invoice :
                                        <a href="#" style="color:white">{{sales_logs.invoice_code}}</a>
                                    </span>

                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['sales_logs'],
    methods: {
        editQuote: function(quote_id){
            this.$router.replace({ name: 'editQuote', params: { id: quote_id }});
        },

        editOrder: function(order_id){
            this.$router.replace({ name: 'EditSalesOrder', params: { id: order_id }});
        },
    }

}
</script>

<style>

</style>
