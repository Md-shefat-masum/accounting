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
                                                    <div class="">Profile Image</div>
                                                </h4>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Company Name</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.company" class="form-control" id="gwt-uid-137" />
                                                    </div>
                                                </div>
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
                form: new Form({
                    "id": "",
                    "is_company": true,
                }),
                email: '',
                old_pass: '',
                new_pass: '',
                new_psss_confirmation: '',
            }
        },
        created: function () {
            this.email =  this.get_auth_user_info.email;
        },
        methods: {
            ...mapActions(['fetch_user_information']),

        },
        computed: {
            ...mapGetters(['get_auth_user_info']),
        }
    }
</script>
