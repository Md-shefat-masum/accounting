<template>
    <div>
        <div class="dropdown">
            <input type="text"
                    class="form-control A54VNK-oi-b"
                    data-toggle="dropdown"
                    autocomplete="off" role="button"
                    v-model="payment_terms"
                    placeholder="Select">
            <ul class="dropdown-menu A54VNK-oi-a">
                <li class="active">
                    <a class="ellipsis-block" @click="payment_terms = 'At 30 days'" role="button">At 30 days</a>
                </li>
                <li class="">
                    <a class="ellipsis-block" @click="payment_terms = 'At 90 days'" role="button">At 90 days</a>
                </li>
                <li class="">
                    <a class="ellipsis-block" @click="payment_terms = 'Due on receipt'" role="button">Due on receipt</a>
                </li>
                <li class="">
                    <a class="ellipsis-block" @click="payment_terms = 'In three installments'" role="button">In three installments</a>
                </li>
                <li class="">
                    <a class="ellipsis-block" @click="payment_terms = 'In two installments'" role="button">In two installments</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props:['set_payment_terms'],
    data: function(){
        return {
            payment_terms : 'Due on receipt',

            payment_term_info: {
                payment_terms: this.payment_terms,
                payment_date: '',
            },
        }
    },
    created: function(){
        this.$watch('payment_terms', (newVal, oldVal) => {
            this.payment_term_info.payment_date = this.set_payment_date(this.payment_terms);
            this.payment_term_info.payment_terms = this.payment_terms;

            // return props
            this.set_payment_terms(this.payment_term_info);
        });
    },
    methods: {
        set_payment_date: function(term){
            if(term == 'At 30 days'){
                var d = new Date();
                d.setDate(d.getDate() + 30);
                return d.toISOString().split('T')[0];
            }else if(term == 'At 90 days'){
                var d = new Date();
                d.setDate(d.getDate() + 90);
                return d.toISOString().split('T')[0];
            }else if(term == 'Due on receipt'){
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }else if(term == 'In two installments'){
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }else if(term == 'In three installments'){
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }else{
                // return today
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }
        },
    }
}
</script>

<style>

</style>

