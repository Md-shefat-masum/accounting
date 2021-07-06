<template>
    <span>
        <div class="main print_view2" v-if="load">
            <div class="left">
                <h1>PAYMENT RECEIPT</h1>
            </div>

            <div class="right">
                <div class="crow">
                    <div class="logo">
                        <img src="http://akaunter.com/pdflogo.png" alt="" style="height: 50px;">
                        <ul class="receipt_no">
                            <li><b>Receipt No:</b> {{receipt.code}}</li>
                            <li><b>Date:</b> {{new Date(receipt.paid_on).toLocaleDateString()}}</li>
                        </ul>
                    </div>
                    <div class="address">
                        <div class="flex-container" style="padding:5px">
                            <div class="address-details">
                                <h4>Orika Corporation</h4>
                                <p>218/3/A (3rd floor) West Kafrul,</p>
                                <p>Begum Rokeya Ave,Shwerapara</p>
                                <p>Dhaka 1216</p>
                                <p>Phone: +8809638786786</p>
                                <p>Mobile: +8801712662245</p>
                                <p>www.orika.com.bd</p>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="form_list">
                    <li><b>Recived from</b></li>
                    <li>{{receipt.paid_by}}</li>
                </ul>

                <ul class="form_list">
                    <li><b>Amount</b></li>
                    <li>{{receipt.amount}}/=</li>
                </ul>

                <ul class="form_list">
                    <li><b><i>for</i></b></li>
                    <li>
                        <span v-for="(split,index ) in splits" :key="split.id">
                            {{split.category}}
                            <span v-if="index>0 && index<(splits.length-1)">,</span>
                        </span>
                    </li>
                </ul>
                <ul class="form_list">
                    <li><b>by</b></li>
                    <li>{{receipt.payment_method}}</li>

                    <span v-if="check_check_number">
                        <li><b>Cheque no</b></li>
                        <li>{{receipt.check_number}}</li>
                    </span>

                    <span v-if="check_for_from_bank_name">
                        <li><b>Bank</b></li>
                        <li>{{receipt.from_bank_name}}</li>
                    </span>
                </ul>

                <ul class="footer_sign">
                    <li>Created By</li>
                    <li>Received By</li>
                    <li>Authorized By</li>
                </ul>
            </div>

            <span style="display: none;">{{selected_data.id}}</span>
        </div>
    </span>
</template>

<script>

    export default {
        props: ['selected_data'],
        data: function(){
            return {
                load: false,
                receipt: {},
                splits: [],
            }
        },
        watch: {
            selected_data: {
                handler(val){
                    this.receipt = this.selected_data;
                    this.load = false;
                    this.getReceipt(this.selected_data.id)
                },
                deep: true
            }
        },
        methods: {
            getReceipt: function (receipt_id) {
                var that = this;
                axios.get('/api/receipts/' + receipt_id)
                    .then(function (response) {
                        that.receipt = response.data;
                        that.splits = response.data.receipt_splits;
                        that.load = true;
                    });
            },
        },
        computed: {
            check_deposit_type: function(){
                if(
                    this.receipt.payment_method.toLowerCase() == 'check'.toLowerCase() ||
                    this.receipt.payment_method.toLowerCase() == 'other'.toLowerCase()
                ){
                    return true;
                }else{
                    return false;
                }
            },

            check_check_number: function(){
                if( this.receipt.payment_method.toLowerCase() == 'other'.toLowerCase() ||
                    this.receipt.payment_method.toLowerCase() == 'check'.toLowerCase()
                ){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_transaction_id: function(){
                if( this.receipt.payment_method.toLowerCase() == 'rtgh / bftn'.toLowerCase() ||
                    this.receipt.payment_method.toLowerCase() == 'mobile banking'.toLowerCase() ||
                    this.receipt.payment_method.toLowerCase() == 'debit Card'.toLowerCase()
                ){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_from_bank_name: function(){
                if( this.receipt.payment_method.toLowerCase() == 'rtgh / bftn'.toLowerCase() ){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_bank_name: function(){
                if( this.receipt.payment_method.toLowerCase() != 'cash'.toLowerCase() &&
                    this.receipt.payment_method.toLowerCase() != 'mobile banking'.toLowerCase()
                ){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_payment_processor: function(){
                if(this.receipt.payment_method.toLowerCase() == 'mobile banking'.toLowerCase() ){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_card_holder_name: function(){
                if(this.receipt.payment_method.toLowerCase() == 'debit card'.toLowerCase()){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_card_number: function(){
                if(this.receipt.payment_method.toLowerCase() == 'debit card'.toLowerCase()){
                    return true;
                }else{
                    return false;
                }
            },

            check_for_transaction_date: function(){
                if(this.receipt.payment_method.toLowerCase() != 'cash'.toLowerCase()){
                    return true;
                }else{
                    return false;
                }
            },
        }
    }
</script>

<style>

</style>
