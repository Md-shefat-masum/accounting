<template>
    <!-- form section -->
    <form @submit.prevent="updateQuote">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a" data-id="eaf59416-1dc1-4844-a76b-f22ed8dd0971">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">

                            <quote-form-body
                                :type="type"
                                :setFormData="setFormData">
                            </quote-form-body>

                        </div>
                    </div>

                    <new-footer v-if="form.status == 'open'" type="basic"/>

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

        name: 'QuotesEdit',

        data: function () {
            return {
                loaded: false,
                type: 'edit',

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "code": "",
                    "date": "",
                    "recipient": "",
                    "status": "Open",
                    "address": "",
                    "expiration_date": "",
                    "payment_terms": "At 30 Days",
                    "currency": "TK",
                    "currency_rate": "",
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

        created: function () {

        },

        methods: {

            updateQuote: function () {
                var that = this;
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.put('/api/quotes/' + this.$route.params.id).then(function (response) {
                    // that.form.fill(response.data);
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                    that.$router.replace({name: 'quoteList'});
                }).catch(() => {
                    // this.errors = err.response.data.errors;
                    $('.done_btn').removeClass('loading').prop("disabled",false);
                    Toast.fire({
                        icon: 'error',
                        title: 'Updated error'
                    });
                });

            },

            setFormData: function(form_data){
                this.form.fill(form_data);
                // console.log(form_data);
            },
        }
    }
</script>

<style>

</style>
