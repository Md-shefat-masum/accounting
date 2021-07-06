<template>
    <!-- form section -->
    <form @submit.prevent="createQuote">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a" data-id="eaf59416-1dc1-4844-a76b-f22ed8dd0971">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">

                            <quote-form-body :setFormData="setFormData"></quote-form-body>

                        </div>
                    </div>
                    <new-footer type="basic"/>
                </div>
            </div>
        </div>
    </form>
</template>

<script>

    import NewFooter from '../../../layouts/partials/new_footer'
    import QuoteFormBody from './QuoteFormBody.vue';

    export default {
        components: {
            NewFooter,
            QuoteFormBody,
        },
        name: 'Quote',
        data: function () {
            return {
                loaded: false,
                errors:[],
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "code": "",
                    "date": "",
                    "recipient": "",
                    "status": "open",
                    "address": "",
                    "expiration_date": "",
                    "payment_terms": "Due on receipt",
                    "payment_date": "",
                    "currency": "TK",
                    "currency_rate": "0",
                    "products": "",
                    "selected_products": "",
                    "document_note": "",
                    "subtotal": "",
                    "discount_rate": "0",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_address_id": "",
                    "project": "",
                    "assigned_to": "",
                    "private_note": "",
                    "attachments": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },

        methods: {
            createQuote: function() {
                // console.log(this.form);
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.post('/api/quotes').then(() => {
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.replace({name: 'quoteList'})
                }).catch((err) => {
                    // console.log(err.response.data.errors.address);
                    $('.done_btn').removeClass('loading').prop("disabled",false);
                    this.errors = err.response.data.errors;
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },

            setFormData: function(form_data){
                this.form.fill(form_data);
            }
        }
    }
</script>

<style>

</style>
