<template>
    <div class="main print_view" v-if="load">
        <div class="row">
            <div class="logo">
                <img src="http://akaunter.com/pdflogo.png" alt="" style="height: 50px;">
            </div>
            <div class="address">
                <div class="flex-container" style="padding:5px">
                    <div class="address-details" style="text-align: right;">
                        <h2>DELIVERY NOTE</h2>
                        <p>no. <b>{{delivery_note.code}}</b></p>
                        <p> {{delivery_note.date}} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-container">
            <div class="address-details">
                <print-top-bar-address></print-top-bar-address>
            </div>
        </div>

        <div class="line"></div>

        <div class="row">
            <div class="bill-address">
                <div class="flex-container" style="padding:5px">
                    <div class="bill-details">
                        <h2>BILL To</h2>
                        <h4 class="text-capitalize">{{delivery_note.customer}}</h4>
                        <span v-if="delivery_note.customer_info">
                            <p>{{delivery_note.customer_info.billing_address}}</p>
                            <p>{{delivery_note.customer_info.line_2}} , {{delivery_note.customer_info.zip_code}}</p>
                            <p>{{delivery_note.customer_info.city}}</p>
                            <p>{{delivery_note.customer_info.state}}</p>
                            <p>{{delivery_note.customer_info.country_name.name}}</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="ship-address">
                <div class="flex-container" style="padding:5px" v-if="delivery_note.delivery_address_info !== null">
                    <div class="ship-details">
                        <h2>SHIP To</h2>
                        <h4 class="text-capitalize">{{delivery_note.delivery_contact}}</h4>
                        <span v-if="delivery_note.delivery_address_info">
                            <p>{{delivery_note.delivery_address_info.address}}</p>
                            <p>{{delivery_note.delivery_address_info.line2}} , {{delivery_note.delivery_address_info.zip_code}}</p>
                            <p>{{delivery_note.delivery_address_info.city}}</p>
                            <p>{{delivery_note.delivery_address_info.state}}</p>
                            <p>{{delivery_note.delivery_address_info.country}}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <p v-if="delivery_note.po_number" style="text-align:right; padding-right: 15px;"><b>PO#: {{delivery_note.po_number}}</b></p>

        <div class="row">
            <div class="col-12" style="width: 100%;padding:0">
                <table class="inv_table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item name &amp; description</th>
                            <th style="text-align:center;">Unit</th>
                            <th style="text-align:center;">Qty.Ordered</th>
                            <th>Qty.Delivered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product,index) in delivery_note.products" :key="index">
                            <td>
                                <h5>{{ product.name }}</h5>
                                <p>{{ product.description }}</p>
                            </td>
                            <td>
                                {{ product.product_details && product.product_details.unit }}
                            </td>
                            <td style="text-align:center;">
                                {{ product.ordered_qty>0?product.ordered_qty:'N/A' }}
                            </td>
                            <td>
                                {{ product.qty }}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Total Items:</b></td>
                            <td>{{get_total_qty}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <div class="row">
            <div class="terms">
                <div class="flex-container">
                    <div class="terms-details">
                        <h4>Delivery Informaton</h4>
                        <p v-if="delivery_note.delivery_method"><span>Delivery Method:</span> <span> {{delivery_note.delivery_method}} </span></p>
                        <p v-if="delivery_note.vehicle_number"><span>Vehicle / Truck Number:</span> <span>{{delivery_note.vehicle_number}} </span></p>
                        <p v-if="delivery_note.operator_name"><span>Operator Name:</span> <span> {{delivery_note.operator_name}}</span></p>
                        <p v-if="delivery_note.operator_phone_number"><span>Operator Number:</span> <span> {{delivery_note.operator_phone_number}}</span></p>
                        <p v-if="delivery_note.weight_unit"><span>Truct Measurement:</span> <span> {{delivery_note.weight_unit}}</span></p>
                        <p v-if="delivery_note.delivery_weight"><span>Total Weight:</span> <span>{{delivery_note.delivery_weight}}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div style="padding-left:10px; margin-top:10px;" v-if="delivery_note.document_note">
            <h4>Notes/Terms</h4>
            <div v-html="delivery_note.document_note.replaceAll('\n', '<br>')" style="font-size:14px;">
            </div>
        </div>

        <p style="position: fixed; left:15px; bottom:15px;">this is software generated</p>

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
            delivery_note : {},
            load: false,
        }
    },
    watch: {
        selected_data: {
            handler(val){
                this.delivery_note = this.selected_data;
                this.load = false;
                this.getDeliveryNote(this.selected_data.id)
            },
            deep: true
        }
    },
    methods: {
        getDeliveryNote: function (DeliverNoteId) {
            var that = this;
            axios.get('/api/delivery-note/' + DeliverNoteId)
                .then(function (response) {
                    that.delivery_note = response.data.delivery_note;
                    that.delivery_note.products = response.data.selected_products;
                    that.delivery_note.customer_info = response.data.customer_info;
                    that.load = true;
                    // console.log(response.data);
                });
        },
    },
    computed: {
        get_total_qty: function(){
            let qty = this.delivery_note.products.reduce((total,item)=>{
                return total+item.qty;
            }, 0)
            return qty;
        }
    }
}
</script>

