<template>
    <div class="content-wrapper" style="min-height: 946px;">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <h1>Update Testsohan</h1>

                        <form @submit.prevent="updateTestsohan" v-if="loaded">

                            <router-link to="/super-admin/testsohans">< Back to testsohans</router-link>

                            <div class="form-group">
                                <input type="hidden" v-model="form.id"></input>
                            </div>
                            <div class="form-group">
                                <label>is_company</label>
                                <input type="number" v-model="form.is_company"></input>
                            </div>
                            <div class="form-group">
                                <label>company_name</label>
                                <input type="text" v-model="form.company_name" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>first_name</label>
                                <input type="text" v-model="form.first_name" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>last_name</label>
                                <input type="text" v-model="form.last_name" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>middle_name</label>
                                <input type="text" v-model="form.middle_name" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="text" v-model="form.email" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>phone</label>
                                <input type="text" v-model="form.phone" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>website</label>
                                <input type="text" v-model="form.website" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>vat_number</label>
                                <input type="text" v-model="form.vat_number" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>is_pickup_only_customer</label>
                                <input type="text" v-model="form.is_pickup_only_customer" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>address_1</label>
                                <input type="text" v-model="form.address_1" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>address_2</label>
                                <input type="text" v-model="form.address_2" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>city</label>
                                <input type="text" v-model="form.city" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>zip_code</label>
                                <input type="text" v-model="form.zip_code" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>country</label>
                                <input type="text" v-model="form.country" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>is_same_delivery</label>
                                <input type="number" v-model="form.is_same_delivery"></input>
                            </div>
                            <div class="form-group">
                                <label>contacts</label>
                                <input type="text" v-model="form.contacts" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>payment_terms</label>
                                <input type="text" v-model="form.payment_terms" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>price_family</label>
                                <input type="text" v-model="form.price_family" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>currency</label>
                                <input type="text" v-model="form.currency" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>sales_tax</label>
                                <input type="text" v-model="form.sales_tax" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>is_vat</label>
                                <input type="number" v-model="form.is_vat"></input>
                            </div>
                            <div class="form-group">
                                <label>business_code</label>
                                <input type="text" v-model="form.business_code" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>opt_in_to_emails</label>
                                <input type="number" v-model="form.opt_in_to_emails"></input>
                            </div>
                            <div class="form-group">
                                <label>assigned_to</label>
                                <input type="text" v-model="form.assigned_to" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>reference_account</label>
                                <input type="text" v-model="form.reference_account" maxlength="255"></input>
                            </div>
                            <div class="form-group">
                                <label>note</label>
                                <textarea v-model="form.note"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" v-model="form.created_at"></input>
                            </div>
                            <div class="form-group">
                                <input type="hidden" v-model="form.updated_at"></input>
                            </div>

                            <div class="form-group">
                                <button class="button" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
                                <button @click.prevent="deleteTestsohan">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
                            </div>
                        </form>

                        <span v-else>Loading testsohan...</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'

    export default {
        components: {
            NewFooter,
        },
        name: 'Testsohan',
        data: function () {
            return {
                loaded: false,
                form: new Form({
                    "id": "",
                    "is_company": "",
                    "company_name": "",
                    "first_name": "",
                    "last_name": "",
                    "middle_name": "",
                    "email": "",
                    "phone": "",
                    "website": "",
                    "vat_number": "",
                    "is_pickup_only_customer": "",
                    "address_1": "",
                    "address_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "",
                    "is_same_delivery": "",
                    "contacts": "",
                    "payment_terms": "",
                    "price_family": "",
                    "currency": "",
                    "sales_tax": "",
                    "is_vat": "",
                    "business_code": "",
                    "opt_in_to_emails": "",
                    "assigned_to": "",
                    "reference_account": "",
                    "note": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getTestsohan();
        },
        methods: {
            getTestsohan: function (Testsohan) {

                var that = this;
                this.form.get('/api/testsohans/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.loaded = true;
                });

            },
            updateTestsohan: function () {

                var that = this;
                this.form.put('/api/testsohans/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                })

            },
            deleteTestsohan: function () {

                var that = this;
                this.form.delete('/api/testsohans/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/testsohans');
                })

            }
        }
    }
</script>
