<template>
    <div>
        <sub-header type="basic"/>

        <!-- full table -->
        <section class="content content-menu">
            <div class="container-fluid">

                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="breadcrumb breadcrumb-style d-inline-block mb-0">
                                <li class="breadcrumb-item">
                                    <h4 style="border: 0;" class="page-title">Banks</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/contact/bank/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Bank</router-link>
                                    <router-link to="/contact/bank/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <!-- <li  style="float: left;">
                                <a class="btn btn-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Export Banks Lines</a>
                                    <a class="dropdown-item" href="#">Export Banks Details</a>
                                </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- filter -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mobile_d_search_none">
                        <div class="card filter" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Filter Panel -->
                                <div class="row">
                                    <div class="col-md-12 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Banks">
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile_d_search_block">
                        <div class="card filter" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Filter Panel -->
                                <div class="row">
                                    <div class="col-md-12 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Banks">
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- filter -->

                <!-- table -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="min-width: 125px;">Bank Name</th>
                                    <th style="min-width: 125px;">Bank Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="bank in banks">
                                    <td @click="banksEdit(bank)" style="cursor: pointer;">
                                        <div class="ellipsis">
                                            {{ bank.bank_name }}
                                        </div>
                                    </td>
                                    <td @click="banksEdit(bank)" style="cursor: pointer;">
                                        <div class="ellipsis">
                                            {{ bank.bank_number }}
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- table -->
            </div>
        </section>

        <!-- full table -->
    </div>
</template>

<script>
    import SubHeader from "../sub_header";

    export default {
        components: {
            SubHeader,
        },

        name: 'Bank',

        data: function () {
            return {
                banks: false,
                form: new Form({
                    "id": "",
                    "bank_name": "",
                    "swift_code": "",
                    "phone": "",
                    "mobile": "",
                    "email": "",
                    "website": "",
                    "address": "",
                    "state": "",
                    "city": "",
                    "zip_code": "",
                    "country": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listBanks();
        },
        methods: {
            listBanks: function () {
                axios.get('/api/banks').then(response => this.banks = response.data);
            },
            banksEdit(bank){
                this.$router.replace({ name: 'editBank', params: { id: bank.id }});
            },
        }
    }
</script>
