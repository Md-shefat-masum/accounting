<template>
    <!-- form section -->

    <form @submit.prevent="createBank">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e ">
                            <div class="A54VNK-Ae-c"></div>
                            <div class="row">
                                <div class="col-md-2 hidden-xs A54VNK-Ae-g"></div>
                                <div class="col-12 col-md-10">
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Bank Name <small style="color: red;padding-left: 4px;">*</small></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.bank_name" class="form-control">
                                            <div v-if="form.errors.has('bank_name')" class="required-text-inline" v-html="form.errors.get('bank_name')"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Swift Code</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.swift_code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.mobile" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Website</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.website" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse"
                               href="#gwt-uid-708">Advanced</a>
                            <div class="panel-collapse collapse" id='gwt-uid-708'>
                                <div class="A54VNK-Ae-b">
                                    <div class="row">
                                        <div class="col-md-2 A54VNK-Ae-g"></div>
                                        <div class="col-12 col-md-10">
                                            <div class="form-group row">
                                                <div
                                                    class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.address1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div
                                                    class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.address2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div
                                                    class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>State</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.state" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div
                                                    class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>City</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.city" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div
                                                    class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Zip Code</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.zip_code" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div
                                                    class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Country</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="A54VNK-ni-a">
                                                        <div class="select-panel A54VNK-ni-c">
                                                            <select class="form-control" id="gwt-uid-400" v-model="form.country">
                                                                <option v-for="(country,index) in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
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

        name: 'Bank',
        data: function () {
            return {
                countries: '',
                loaded: false,
                form: new Form({
                    "id": "",
                    "bank_name": "",
                    "swift_code": "",
                    "phone": "",
                    "mobile": "",
                    "email": "",
                    "website": "",
                    "address1": "",
                    "address2": "",
                    "state": "",
                    "city": "",
                    "zip_code": "",
                    "business_code": "",
                    "country": "18",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getCountryList();
        },
        methods: {
            getCountryList: function () {
                axios.get('/api/country-list').then(response => this.countries = response.data);
            },
            createBank(){
                this.form.post('/api/banks').then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.replace({ name: 'bankLists'})
                    this.form.reset();
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },
        }
    }
</script>
