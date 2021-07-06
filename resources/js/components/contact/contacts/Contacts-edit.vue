<template>
    <!-- form section -->
    <form @submit.prevent="updateContact">
        <div class="right-content form2">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e" style="padding: 20px 0 0;">
                            <div class="A54VNK-Ae-c"></div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-10">
                                    <div class="row">
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control form-component" v-model="form.first_name"
                                                       id="gwt-uid-1" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.first_name != null }"
                                                       for="gwt-uid-1">First Name</label>
                                            </div>
                                            <div class="error-panel"></div>
                                        </div>
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control form-component" v-model="form.last_name"
                                                       id="gwt-uid-2" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.last_name != null }"
                                                       for="gwt-uid-2">Last Name</label>
                                            </div>
                                            <div class="error-panel"></div>
                                        </div>
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label mandatory">
                                                <input type="text" class="form-control form-component" v-model="form.company_name"
                                                       id="gwt-uid-3" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.company_name != null }"
                                                       for="gwt-uid-3">Company Name</label>
                                            </div>
                                            <div class="error-panel"></div>
                                        </div>
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label mandatory">
                                                <input type="text" class="form-control form-component" v-model="form.position"
                                                       id="gwt-uid-4" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.position != null }"
                                                       for="gwt-uid-4">Positon</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-10">
                                    <div class="row">
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control form-component" v-model="form.email"
                                                       id="gwt-uid-5" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.email != null }"
                                                       for="gwt-uid-5">Worked Email</label>
                                            </div>
                                            <div class="error-panel"></div>
                                        </div>
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control form-component" v-model="form.another_email"
                                                       id="gwt-uid-6" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.another_email != null }"
                                                       for="gwt-uid-6">Another Email</label>
                                            </div>
                                        </div>
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label mandatory">
                                                <input type="text" class="form-control form-component" v-model="form.phone"
                                                       id="gwt-uid-7" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.phone != null }"
                                                       for="gwt-uid-7">Worked Phone</label>
                                            </div>
                                            <div class="error-panel"></div>
                                        </div>
                                        <div class="col-6" aria-hidden="true">
                                            <div class="form-group floating-label mandatory">
                                                <input type="text" class="form-control form-component" v-model="form.cell_phone"
                                                       id="gwt-uid-8" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.cell_phone != null }"
                                                       for="gwt-uid-8">Cell Phone</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a class="accordion-toggle collapsed A54VNK-Ae-a" data-toggle="collapse"
                               href="#gwt-uid-707">Advanced</a>
                            <div class="panel-collapse collapse" id="gwt-uid-707">
                                <div class="A54VNK-Ae-b">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-10">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control form-component" v-model="form.address"
                                                       id="gwt-uid-100" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.address != null }"
                                                       for="gwt-uid-100">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-10">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control form-component" v-model="form.line_2"
                                                       id="gwt-uid-10" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.line_2 != null }"
                                                       for="gwt-uid-10">Line 2</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-10">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label">
                                                        <input type="text" class="form-control form-component" v-model="form.city"
                                                               id="gwt-uid-11" autocomplete="off">
                                                        <label class="control-label form-question ellipsis" :class="{ 'activess': form.city != null }"
                                                               for="gwt-uid-11">City</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label">
                                                        <input type="text" class="form-control form-component" v-model="form.zip_code"
                                                               id="gwt-uid-12" autocomplete="off">
                                                        <label class="control-label form-question ellipsis" :class="{ 'activess': form.zip_code != null }"
                                                               for="gwt-uid-12">Postal/Zip Code</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label focused">
                                                        <div class="select-panel form-component">
                                                            <select class="form-control" id="gwt-uid-400" v-model="form.country">
                                                                <option v-for="(country) in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                                                            </select>
                                                            <label class="control-label form-question ellipsis" for="gwt-uid-400" style="top: -6px;">Country</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-sm-2 col-md-3 A54VNK-Ae-g">
                                            <h4> Notes </h4>
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-8">
                                            <div class="form-group floating-label form-group-textarea">
                                                <textarea v-model="form.note" class="form-control form-component" id="gwt-uid-488" autocomplete="off" rows="10"></textarea>
                                                <label class="control-label form-question ellipsis" for="gwt-uid-488">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <new-footer type="basic"/>

                </div>
            </div>
        </div>
    </form>

    <!-- form section -->
</template>

<script>

    import NewFooter from '../../../layouts/partials/new_footer'

    export default {
        components: {
            NewFooter,
        },
        name: 'Contact',
        data: function () {
            return {
                loaded: false,
                countries: '',
                form: new Form({
                    "id": "",
                    "first_name": "",
                    "last_name": "",
                    "company_name": "",
                    "position": "",
                    "email": "",
                    "another_email": "",
                    "phone": "",
                    "cell_phone": "",
                    "address": "",
                    "line_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "",
                    "note": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getCountryList();
            this.getContactSingle();
        },
        methods: {
            getCountryList: function () {
                axios.get('/api/country-list').then(response => this.countries = response.data);
            },
            getContactSingle: function (CfAgents) {
                var that = this;
                this.form.get('/api/contacts/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                });
            },
            updateContact: function () {
                this.form.put('/api/contacts/'+this.form.id).then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Update successfully'
                    });
                    this.$router.replace({ name: 'contactList'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error Created'
                    });
                });
            },

            deleteContact: function () {
                var that = this;
                this.form.delete('/api/contacts/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/contacts');
                })

            }
        }
    }
</script>
