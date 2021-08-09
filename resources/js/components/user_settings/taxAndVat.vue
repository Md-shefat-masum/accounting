<template>
    <!-- form section -->
    <div>
        <sub-header></sub-header>

        <section class="content content-menu">
            <div class="container-fluid">
                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="card" style="margin-bottom: 13px; padding-top: 30px;">
                                <div class="body">
                                    <div class="A54VNK-Mc-e">
                                        <div class="row">
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Add Tax</div>
                                                </h4>
                                            </div>
                                            <div class="col-12">
                                                <form id="tax_form" @submit.prevent="form_submit">
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Tax Name</label>
                                                            <span class="text-danger bold">*</span>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="text" v-model="form.tax_name" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Abbreviation</label>
                                                            <span class="text-danger bold">*</span>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="text" v-model="form.abbreviation" class="form-control"  />
                                                        </div>
                                                    </div>
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Tax rate (%)</label>
                                                            <span class="text-danger bold">*</span>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="text" v-model="form.tax_rate" class="form-control"  />
                                                        </div>
                                                    </div>
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Description</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="text" v-model="form.description" class="form-control"  />
                                                        </div>
                                                    </div>
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Your tax number</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="text" v-model="form.your_tax_number" style="position:unset;opacity: 1;" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group  row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Show tax number on invoices</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="checkbox" v-model="form.show_tax_number_on_invoice" style="position: unset;opacity: 1;"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Is this tax recoverable?</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="checkbox" v-model="form.is_this_tax_recoverable" style="position: unset;opacity: 1;" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group SimpleTextQuestion row">
                                                        <div class="col-sm-4 col-xs-4 control-label text-right d-flex  justify-content-end">
                                                            <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Is this a compound tax?</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <input type="checkbox" v-model="form.is_compound" style="position: unset;opacity: 1;" />
                                                            <i style="display: block;">Select if this tax is a compound tax.</i>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <button class="btn btn-primary mt-5">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>
<script>
import { mapActions, mapGetters } from 'vuex';
    import SubHeader from './sub_header'

    export default {
        components: {
            SubHeader,
        },

        name: 'Tax-and-vat',

        data: function () {
            return {
                form: {
                    tax_name: '',
                    abbreviation: '',
                    tax_rate: '',
                    description: '',
                    your_tax_number: '',
                    show_tax_number_on_invoice: false,
                    is_this_tax_recoverable: false,
                    is_compound: false,
                },
            }
        },
        created: function () {
            this.email =  this.get_auth_user_info.email;
        },
        methods: {
            ...mapActions(['fetch_user_information']),
            form_submit: function(){

            }

        },
        computed: {
            ...mapGetters(['get_auth_user_info']),
        }
    }
</script>
