<template>
    <div class="row custom_css_form">
        <div class="col-12">
            <h4> Payment </h4>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group floating-label">
                        <input type="text" v-model="payment_method_info.payment_method" class="form-control form-component" id="payment_method" autocomplete="off" data-toggle="dropdown">
                        <label class="control-label form-question ellipsis active" for="payment_method">Payment Method</label>
                        <ul class="dropdown-menu A54VNK-ge-d">
                            <li><a @click="payment_method_info.payment_method = 'Cash'" class="ellipsis-block" role="button">Cash</a></li>
                            <li><a @click="payment_method_info.payment_method = 'Check'" class="ellipsis-block" role="button">Check</a></li>
                            <li><a @click="payment_method_info.payment_method = 'Debit Card'" class="ellipsis-block" role="button">Debit Card</a></li>
                            <li><a @click="payment_method_info.payment_method = 'Bank Deposit'" class="ellipsis-block" role="button">Bank Deposit</a></li>
                            <li><a @click="payment_method_info.payment_method = 'Mobile Banking'" class="ellipsis-block" role="button">Mobile Banking</a></li>
                            <li><a @click="payment_method_info.payment_method = 'RTGH / BFTN'" class="ellipsis-block" role="button">RTGH / BFTN</a></li>
                            <li><a @click="payment_method_info.payment_method = 'Other'" class="ellipsis-block" role="button">Other</a></li>
                        </ul>
                        <div class="error-panel"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12" v-if="check_deposit_type">
            <div class="row">
                <div class="col-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-bottom: 15px;">
                        <label class="btn btn-default" for='is_deposited1' style="text-transform: capitalize;">
                            <input @click="payment_method_info.receipt_status='undeposit'" type="radio">Undeposited
                        </label>
                        <label class="btn active btn-default" for='is_deposited2' style="text-transform: capitalize;">
                            <input @click="payment_method_info.receipt_status='deposit'" type="radio" checked="">Deposited
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-12 col-sm-4" v-if="check_for_bank_name">
                    <div class="form-group">
                        <div class="dropdown">
                            <input type="text"
                                    class="form-control"
                                    data-toggle="dropdown"
                                    autocomplete="off"
                                    role="button"
                                    v-model="payment_method_info.bank_name"
                                    style="border: 1px solid #e0e0e0;padding: 15px;height: 47px;"
                                    placeholder="Bank Name">
                            <ul class="dropdown-menu A54VNK-pi-c">
                                <li class="ellipsis-block" role="button" v-for="bank in banks" :key="bank.id">
                                    <span class="p-3 d-block" @click="set_bank(bank)" style="cursor:pointer">
                                        {{bank.bank_name}}
                                    </span>
                                </li>
                                <li class="" style="border-top:1px solid gray;">
                                    <a class="ellipsis-block" role="button" data-toggle="modal"
                                        data-target="#addBankModal">
                                        Create New Bank
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4" v-if="check_for_from_bank_name">
                    <div class="form-group">
                        <div class="dropdown">
                            <input type="text"
                                    class="form-control"
                                    data-toggle="dropdown"
                                    autocomplete="off"
                                    role="button"
                                    v-model="payment_method_info.from_bank_name"
                                    style="border: 1px solid #e0e0e0;padding: 15px;height: 47px;"
                                    placeholder="From Bank">
                            <ul class="dropdown-menu A54VNK-pi-c">
                                <li class="ellipsis-block"  role="button" v-for="bank in banks" :key="bank.id">
                                    <span class="p-3 d-block" @click="set_from_bank(bank)" style="cursor:pointer">
                                        {{bank.bank_name}}
                                    </span>
                                </li>
                                <li class="" style="border-top:1px solid gray;">
                                    <a class="ellipsis-block" role="button" data-toggle="modal"
                                        data-target="#addBankModal">
                                        Create New Bank
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4" v-if="check_for_payment_processor">
                    <payment-processor :set_payment_processor="set_payment_processor"></payment-processor>
                </div>

                <!-- addBankModal Modal -->
                <div class="modal fade" id="addBankModal" tabindex="-1" aria-labelledby="addBankModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBankModalLabel">New Bank</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <addBankModalVue :get_banks="get_banks"></addBankModalVue>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4" v-if="check_check_number">
                    <div class="form-group floating-label">
                        <input v-model="payment_method_info.check_number" type="text" class="form-control form-component" id="check_number" autocomplete="off">
                        <label class="control-label form-question ellipsis" for="check_number">Check Number</label>
                        <div class="error-panel"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-4" v-if="check_for_transaction_id">
                    <div class="form-group floating-label">
                        <input v-model="payment_method_info.transaction_id" type="text" class="form-control form-component" id="gwt-uid-11Transaction" autocomplete="off">
                        <label class="control-label form-question ellipsis" for="gwt-uid-11Transaction">Transaction ID</label>
                        <div class="error-panel"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-4" v-if="check_for_card_holder_name">
                    <div class="form-group floating-label">
                        <input v-model="payment_method_info.card_holder_name" type="text" class="form-control form-component" id="gwt-uid-11card_holder_name" autocomplete="off">
                        <label class="control-label form-question ellipsis" for="gwt-uid-11card_holder_name">Card Holder Name</label>
                        <div class="error-panel"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-4" v-if="check_for_card_number">
                    <div class="form-group floating-label">
                        <input v-model="payment_method_info.card_number" type="text" class="form-control form-component" id="gwt-uid-11card_number" autocomplete="off">
                        <label class="control-label form-question ellipsis" for="gwt-uid-11card_number">Card Number</label>
                        <div class="error-panel"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-4 ">
                    <div class="form-group floating-label">
                        <input v-model="payment_method_info.transaction_date" type="date" class="form-control form-component" id="gwt-uid-12Date" autocomplete="off">
                        <label class="control-label form-question ellipsis" for="gwt-uid-12Date" style="top:-9px;" >Date <small style="color: red;padding-left: 4px;">*</small></label>
                    </div>
                    <div class="error-panel"></div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import addBankModalVue from '../../modal_contents/addBankModal.vue'
import PaymentProcessor from '../components/paymentProcessor.vue';

export default {
    props:['set_payment_method'],
    components: {
        addBankModalVue,
        PaymentProcessor,
    },
    data: function(){
        return {
            banks: [],
            payment_method_info : {
                payment_method: 'Cash',
                receipt_status: 'deposit',
                bank_name: '',
                bank_id: '',
                from_bank_name: '',
                from_bank_id: '',
                check_number: '',
                transaction_date: new Date().toISOString('Asia/Dhaka').split("T")[0],
                transaction_id: '',
                payment_processor: '',
                card_holder_name: '',
                card_number: '',
            }
        }
    },
    watch: {
        payment_method_info: {
            handler: function(val,oldVal){
                this.set_payment_method(this.payment_method_info);
            },
            deep: true,
        }
    },
    created: function(){
        this.get_banks();
    },
    methods: {
        get_banks: function(){
            axios.get('/api/banks')
                    .then((res)=>{
                        this.banks = res.data;
                    })
        },
        set_bank: function(bank){
            this.payment_method_info.bank_name = bank.bank_name;
            this.payment_method_info.bank_id = bank.id;
        },
        set_from_bank: function(bank){
            this.payment_method_info.from_bank_name = bank.bank_name;
            this.payment_method_info.from_bank_id = bank.from_bank_id;
        },
        set_payment_processor: function(payment_processor){
            this.payment_method_info.payment_processor = payment_processor.name;
            this.payment_method_info.payment_processor_id = payment_processor.id;
        }
    },
    computed: {
        check_deposit_type: function(){
            if(
                this.payment_method_info.payment_method.toLowerCase() == 'check'.toLowerCase() ||
                this.payment_method_info.payment_method.toLowerCase() == 'other'.toLowerCase()
            ){
                return true;
            }else{
                return false;
            }
        },

        check_check_number: function(){
            if( this.payment_method_info.payment_method.toLowerCase() == 'other'.toLowerCase() ||
                this.payment_method_info.payment_method.toLowerCase() == 'check'.toLowerCase()
            ){
                return true;
            }else{
                return false;
            }
        },

        check_for_transaction_id: function(){
            if( this.payment_method_info.payment_method.toLowerCase() == 'rtgh / bftn'.toLowerCase() ||
                this.payment_method_info.payment_method.toLowerCase() == 'mobile banking'.toLowerCase() ||
                this.payment_method_info.payment_method.toLowerCase() == 'debit Card'.toLowerCase()
            ){
                return true;
            }else{
                return false;
            }
        },

        check_for_from_bank_name: function(){
            if( this.payment_method_info.payment_method.toLowerCase() == 'rtgh / bftn'.toLowerCase() ){
                return true;
            }else{
                return false;
            }
        },

        check_for_bank_name: function(){
            if( this.payment_method_info.payment_method.toLowerCase() != 'cash'.toLowerCase() &&
                this.payment_method_info.payment_method.toLowerCase() != 'mobile banking'.toLowerCase()
            ){
                return true;
            }else{
                return false;
            }
        },

        check_for_payment_processor: function(){
            if(this.payment_method_info.payment_method.toLowerCase() == 'mobile banking'.toLowerCase() ){
                return true;
            }else{
                return false;
            }
        },

        check_for_card_holder_name: function(){
            if(this.payment_method_info.payment_method.toLowerCase() == 'debit card'.toLowerCase()){
                return true;
            }else{
                return false;
            }
        },

        check_for_card_number: function(){
            if(this.payment_method_info.payment_method.toLowerCase() == 'debit card'.toLowerCase()){
                return true;
            }else{
                return false;
            }
        },

        check_for_transaction_date: function(){
            if(this.payment_method_info.payment_method.toLowerCase() != 'cash'.toLowerCase()){
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
