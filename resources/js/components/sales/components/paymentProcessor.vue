<template>
    <div>
        <div class="form-group">
            <div class="dropdown">
                <input type="text"
                        class="form-control"
                        data-toggle="dropdown"
                        autocomplete="off"
                        role="button"
                        v-model="payment_processor.name"
                        style="border: 1px solid #e0e0e0;padding: 15px;height: 47px;"
                        placeholder="Payment Processor">
                <ul class="dropdown-menu A54VNK-pi-c">
                    <li class="ellipsis-block" role="button" v-for="payment_processor in payment_processors" :key="payment_processor.id">
                        <span class="p-3 d-block" @click="set_data(payment_processor)" style="cursor:pointer">
                            {{payment_processor.name}}
                        </span>
                    </li>
                    <li class="" style="border-top:1px solid gray;">
                        <a class="ellipsis-block" role="button" data-toggle="modal"
                            data-target="#addPaymentProcessor">
                            Create New
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- addPaymentProcessor Modal -->
        <div class="modal fade" id="addPaymentProcessor" tabindex="-1" aria-labelledby="addPaymentProcessorLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPaymentProcessorLabel">New Payment Processor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <addBankModalVue :get_banks="get_banks"></addBankModalVue> -->
                        <add-payment-processor-form :reset_data="reset_data"></add-payment-processor-form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import addPaymentProcessorForm from '../../contact/payment_processor/addPaymentProcessorForm.vue';
export default {
    components: { addPaymentProcessorForm },
    props: ['set_payment_processor'],
    created: function(){
        this.get_payment_processor();
    },
    data: function(){
        return {
            payment_processors: [],
            payment_processor: {
                name: '',
                id: '',
            },
        }
    },
    watch: {
        // payment_processor: {
        //     handler: function(val,oldVal){
        //         this.set_payment_processor(this.payment_processor);
        //     },
        //     deep: true,
        // }
    },
    methods: {
        get_payment_processor: function(){
            axios.get('/api/payment-processor')
                .then((res)=>{
                    this.payment_processors = res.data;
                })
        },

        set_data: function(payment_processor){
            this.payment_processor = payment_processor;
            this.set_payment_processor(payment_processor);
        },

        reset_data: function(new_payment_processor){
            this.set_data(new_payment_processor);
            this.get_payment_processor();
            $('#addPaymentProcessor').modal('hide');
        }
    }

}
</script>

<style>

</style>
