<template>
    <div>
        <sub-header type="basic"/>

        <section class="content content-menu">
            <div class="container-fluid">
                <!-- breadcumbs -->
                <div class="block-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="breadcrumb breadcrumb-style d-inline-block mb-0">
                                <li class="breadcrumb-item">
                                    <h4 style="border: 0;" class="page-title">testsohans</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <a href="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New testsohan</a>
                                    <a href="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></a>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li  style="float: left;">
                                    <a class="btn new_dot btn-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Export testsohans lines</a>
                                        <a class="dropdown-item" href="#">Export testsohans details</a>
                                    </div>
                                </li>
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
                                    <div class="col-md-4 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Customers">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-0 text-right">
                                        <button class="btn btn-outline-default"> All testsohans <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <!-- <button class="btn btn-outline-default"> All Customers <i class="fa fa-angle-down" aria-hidden="true"></i></button> -->
                                        <button class="btn btn-outline-default"> Any Date <i class="fa fa-angle-down" aria-hidden="true"></i></button>
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
                                            <input type="text" placeholder="Search in testsohans">
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
                                        <th style="width: 5%;padding: 5px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 125px;">Name</th>
                                        <th style="min-width: 125px;">Address</th>
                                        <th style="min-width: 125px;">Email</th>
                                        <th style="min-width: 125px;">Phones</th>
                                        <th class="text-center" style="min-width: 145px;">Customer Number</th>
                                        <th class="text-center" style="min-width: 200px;">Notes</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody  v-if="testsohans.length > 0">
                                    <tr v-for="(testsohan,index) in testsohans" :key="testsohan.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                yasir
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                yasirintisar7@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                01686363758
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                CUS-001
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">

                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item text-danger waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>


<script>
    import SubHeader from "../sub_header";
    export default {
        components: {
            SubHeader,
        },
        name: 'Testsohan',

        data: function(){
            return {
            testsohans : false,
                form: new Form({
                                "id" : "",
                                "is_company" : "",
                                "company_name" : "",
                                "first_name" : "",
                                "last_name" : "",
                                "middle_name" : "",
                                "email" : "",
                                "phone" : "",
                                "website" : "",
                                "vat_number" : "",
                                "is_pickup_only_customer" : "",
                                "address_1" : "",
                                "address_2" : "",
                                "city" : "",
                                "zip_code" : "",
                                "country" : "",
                                "is_same_delivery" : "",
                                "contacts" : "",
                                "payment_terms" : "",
                                "price_family" : "",
                                "currency" : "",
                                "sales_tax" : "",
                                "is_vat" : "",
                                "business_code" : "",
                                "opt_in_to_emails" : "",
                                "assigned_to" : "",
                                "reference_account" : "",
                                "note" : "",
                                "created_at" : "",
                                "updated_at" : "",
                            })
        }
        },
        created: function(){
            this.listTestsohans();
        },
        methods: {
            listTestsohans: function(){

                var that = this;
                this.form.get('/api/testsohans').then(function(response){
                    that.testsohans = response.data;
                })

            },
            createTestsohan: function(){

                var that = this;
                this.form.post('/api/testsohans').then(function(response){
                    that.testsohans.push(response.data);
                    that.form.reset();
                })

            },
            deleteTestsohan: function(testsohan, index){

                var that = this;
                this.form.delete('/api/testsohans/'+testsohan.id).then(function(response){
                    that.testsohans.splice(index,1);
                })

            }
        }
    }
</script>
