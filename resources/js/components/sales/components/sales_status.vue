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
                                        <a href="#" @click.prevent="editQuote(sales_logs.quote_id)" >{{sales_logs.quote_code}}</a>
                                    </span>

                                    <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_sales_order">
                                        &nbsp;&nbsp;&nbsp;Sales Order :
                                        <a href="#" @click.prevent="editOrder(sales_logs.sales_order_id)" >{{sales_logs.sales_order_code}}</a>
                                    </span>

                                    <!-- <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_delivery_note">
                                        &nbsp;&nbsp;&nbsp;Delivery Note :
                                        <a href="#" >{{sales_logs.delivery_note_code}}</a>
                                    </span> -->
                                    <span v-if="( type == 'sale_order_to_delivery_note' || type=='sales_order_edit' ) && get_selected_sales_order_all_delivery_notes.length > 0">
                                        <span style="font-weight: bold;color:#1d0062;" v-for="note_code in get_selected_sales_order_all_delivery_notes" :key="note_code.id">
                                            &nbsp;&nbsp;&nbsp;Delivery Note :
                                            <a href="#" >{{note_code.code}}</a>
                                        </span>
                                    </span>

                                    <span v-if="(type=='delivery_note_edit' )             ">
                                        <span style="font-weight: bold;color:#1d0062;">
                                            &nbsp;&nbsp;&nbsp;Delivery Note :
                                            <a href="#" >{{sales_logs.delivery_note_code}}</a>
                                        </span>
                                    </span>


                                    <span style="font-weight: bold;color:#1d0062;" v-if="sales_logs.is_invoice">
                                        &nbsp;&nbsp;&nbsp;Invoice :
                                        <a href="#" >{{sales_logs.invoice_code}}</a>
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
import { mapGetters } from 'vuex';
export default {
    props: ['sales_logs','type'],
    methods: {
        editQuote: function(quote_id){
            this.$router.replace({ name: 'editQuote', params: { id: quote_id }});
        },

        editOrder: function(order_id){
            this.$router.replace({ name: 'EditSalesOrder', params: { id: order_id }});
        },
    },
    computed: {
        ...mapGetters([
            'get_selected_sales_order_all_delivery_notes',
        ]),
    }

}
</script>

<style scoped>
    .alert-info span{
        color: #31708f;
    }
</style>
