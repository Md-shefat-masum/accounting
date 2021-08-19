<template>
    <div class="main print_view">
        <div class="row">
            <div class="logo">
                <img :src="'/'+get_basic_information.logo" alt="" style="height: 50px;">
            </div>
            <div class="address">
                <div class="flex-container" style="padding:5px">
                    <div class="address-details">
                        <h2>QUOTATION</h2>
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
                        <h4 style="text-transform: capitalize">{{quote.customer}}</h4>
                        <span v-if="quote.customer_info">
                            <p>{{quote.customer_info.billing_address}}</p>
                            <p>{{quote.customer_info.line_2}} , {{quote.customer_info.zip_code}}</p>
                            <p>{{quote.customer_info.city}}</p>
                            <p>{{quote.customer_info.state}}</p>
                            <p>{{quote.customer_info.country_name.name}}</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="ship-address">
                <div class="flex-container" style="padding:5px;" v-if="quote.delivery_address_info !== null">
                    <div class="ship-details">
                        <h2>SHIP To</h2>
                        <h4 class="text-capitalize">{{quote.delivery_contact}}</h4>
                        <span v-if="quote.delivery_address_info">
                            <p>{{quote.delivery_address_info.address}}</p>
                            <p>{{quote.delivery_address_info.line2}} , {{quote.delivery_address_info.zip_code}}</p>
                            <p>{{quote.delivery_address_info.city}}</p>
                            <p>{{quote.delivery_address_info.state}}</p>
                            <p>{{quote.delivery_address_info.country}}</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="order-date">
                <div class="flex-container" style="padding:5px">
                    <div class="order-date-details">
                        <h4><span>Quotation No:</span> <span>{{quote.code}}</span></h4>
                        <h4><span>Date:</span> <span>{{quote.date}}</span></h4>
                        <h4><span>Expires On:</span> <span>{{quote.expiration_date}}</span></h4>
                    </div>
                </div>
            </div>
        </div>

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
                        <tr v-for="(product,index) in quote.products" :key="index">
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
                    <tfoot v-if="quote.vat">
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Subtoal:</b></td>
                            <td>৳ {{quote.subtotal}}</td>
                        </tr>

                        <tr v-for="(taxs,index) in JSON.parse(quote.vat)" :key="index">
                            <td></td>
                            <td colspan="2">{{ taxs.name }} :</td>
                            <td>৳ {{taxs.value}}</td>
                        </tr>
                        <tr v-if="quote.discount_amount>0">
                            <td></td>
                            <td colspan="2">
                                <b>Flat Amount:</b>
                            </td>
                            <td>
                                ৳ -{{quote.discount_amount}}
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <b>Total:</b>
                            </td>
                            <td>
                                ৳ {{quote.total}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <b>Grand Total (BDT):</b>
                            </td>
                            <td>
                                <b>৳ {{quote.total}}</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <div class="row" v-if="quote.document_note">
            <div class="terms">
                <div class="flex-container">
                    <div class="terms-details">
                        <h4>Notes/Terms</h4>
                        <p v-html="get_document_note"></p>
                        <!-- <p> <span>01.</span> <span>This Price Excluding All Kind of Tax</span></p>
                        <p> <span>02.</span> <span>This Price Including Transport & Unloading Bill</span></p>
                        <p>
                            <span>03.</span>
                            <span>The bill must be paid within 07 days from the date of submis extra charge
                                at the rate of BDT 500.00 per day owing to the </span>
                        </p>
                        <p style="color:black;">
                            <span>04.</span>
                            <span>Insite measurement For every 23-foot long track the height must
                                be measured by adding an extra 2.5"-3" (inch) for the jumping
                                shake.</span>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="prepared_by" v-if="quote.creator_info" style="height:47px;">
            <h5>{{quote.creator_info.name}}</h5>
            <h6>prepared by</h6>
        </div>

        <span style="display: none">{{selected_data.id}}</span>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import printTopBarAddress from '../components/printTopBarAddress.vue';
export default {
    components: { printTopBarAddress },
    props:['selected_data'],
    data: function(){
        return {
            quote : {}
        }
    },
    watch: {
        selected_data: {
            handler(val){
                this.quote = this.selected_data;
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
            axios.get('/api/quotes/' + QuoteId)
                .then(function (response) {
                    that.quote = response.data.quotes;
                    that.quote.products = response.data.selected_products;
                    that.quote.customer_info = response.data.customer_info;
                    console.log(response.data);
                });

        },
    },
    computed: {
        get_document_note: function(){
            return this.quote.document_note.replace("\n", "<br>")
        },
        ...mapGetters([
            'get_basic_information',
        ]),
    }
}
</script>

<style>

</style>
