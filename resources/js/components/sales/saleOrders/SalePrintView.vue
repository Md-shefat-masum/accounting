<template>
    <div class="main print_view">
        <div class="row">
            <div class="logo">
                <img src="http://akaunter.com/pdflogo.png" alt="" style="height: 50px;">
            </div>
            <div class="address">
                <div class="flex-container" style="padding:5px">
                    <div class="address-details">

                        <h2>Sales Order</h2>
                        <print-top-bar-address></print-top-bar-address>
                    </div>
                </div>
            </div>
        </div>

        <div class="line"></div>

        <div class="row">
            <div class="bill-address">
                <div class="flex-container" style="padding:5px">
                    <div class="bill-details">
                        <h2>BILL To</h2>
                        <h4 class="text-capitalize">{{sales_order.customer}}</h4>
                        <span v-if="sales_order.customer_info">
                            <p>{{sales_order.customer_info.billing_address}}</p>
                            <p>{{sales_order.customer_info.line_2}} , {{sales_order.customer_info.zip_code}}</p>
                            <p>{{sales_order.customer_info.city}}</p>
                            <p>{{sales_order.customer_info.state}}</p>
                            <p>{{sales_order.customer_info.country_name.name}}</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="ship-address">
                <div class="flex-container" style="padding:5px" v-if="sales_order.delivery_address_info !== null">
                    <div class="ship-details">
                        <h2>SHIP To</h2>
                        <h4 class="text-capitalize">{{sales_order.delivery_contact}}</h4>
                        <span v-if="sales_order.delivery_address_info">
                            <p>{{sales_order.delivery_address_info.address}}</p>
                            <p>{{sales_order.delivery_address_info.line2}} , {{sales_order.delivery_address_info.zip_code}}</p>
                            <p>{{sales_order.delivery_address_info.city}}</p>
                            <p>{{sales_order.delivery_address_info.state}}</p>
                            <p>{{sales_order.delivery_address_info.country}}</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="order-date">
                <div class="flex-container" style="padding:5px">
                    <div class="order-date-details">
                        <h4><span>Order No:</span> <span>{{sales_order.code}}</span></h4>
                        <h4><span>Date:</span> <span>{{sales_order.date}}</span></h4>
                        <h4><span>Expires On:</span> <span>{{sales_order.expiration_date}}</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"><div class="col-12"><p class="text-right"><b>PO#: {{sales_order.po_number}}</b></p></div></div>

        <div class="row">
            <div class="col-12" style="width: 100%;padding:0">
                <table class="inv_table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>Rate / Unit</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product,index) in sales_order.products" :key="index">
                            <td>
                                <h5>{{ product.name }}</h5>
                                <p>{{ product.description }}</p>
                            </td>
                            <td>
                                {{ product.qty }}
                            </td>
                            <td>
                                ৳ {{ product.sales_price }} / {{ product.product_details.unit }}
                            </td>
                            <td>
                                ৳ {{ product.total_price }}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Subtoal:</b></td>
                            <td>৳ {{sales_order.subtotal}}</td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td colspan="2">Source Tax 4%:</td>
                            <td>6,90,15265</td>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td colspan="2">Vat {{ 100*sales_order.vat/sales_order.subtotal }}%:</td>
                            <td>৳ {{sales_order.vat}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <b>Total:</b>
                            </td>
                            <td>
                                ৳ {{sales_order.total}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <b>Grand Total (BDT):</b>
                            </td>
                            <td>
                                <b>৳ {{sales_order.total}}</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <div class="row" v-if="sales_order.document_note">
            <div class="terms">
                <div class="flex-container">
                    <div class="terms-details">
                        <h4>Notes/Terms</h4>
                        <p v-html="get_document_note"></p>
                    </div>
                </div>
            </div>
        </div>

        <span style="display: none">{{selected_data.id}}</span>
    </div>
</template>

<script>
import printTopBarAddress from '../components/printTopBarAddress.vue';
export default {
    components: { printTopBarAddress },
    props:['selected_data'],
    data: function(){
        return {
            sales_order : {}
        }
    },
    watch: {
        selected_data: {
            handler(val){
                this.sales_order = this.selected_data;
                this.getQuote(this.selected_data.id)
            },
            deep: true
        }
    },
    updated: function(){
        // console.log(this.selected_data);
        // this.getQuote(this.selected_data.id)
    },
    methods: {
        getQuote: function (QuoteId) {
            var that = this;
            axios.get('/api/saleorders/' + QuoteId)
                .then(function (response) {
                    that.sales_order = response.data.orders;
                    that.sales_order.products = response.data.selected_products;
                    that.sales_order.customer_info = response.data.customer_info;
                    console.log(response.data);
                });

        },
    },
    computed: {
        get_document_note: function(){
            return this.sales_order.document_note.replace("\n", "<br>")
        }
    }
}
</script>

<style>

</style>
