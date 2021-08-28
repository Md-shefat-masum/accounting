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
                                    <h4 style="border: 0;" class="page-title">Customers</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <a href="/print-customer-due" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none" target="_blank">Download Due Sheet </a>
                                    <router-link to="/contact/customer/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Customers</router-link>
                                    <router-link to="/contact/customer/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
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
                                        <a class="dropdown-item" href="#">Export Customers Lines</a>
                                        <a class="dropdown-item" href="#">Export Customers Details</a>
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
                                        <button class="btn btn-outline-default"> All Employees <i class="fa fa-angle-down" aria-hidden="true"></i></button>
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
                                            <input type="text" placeholder="Search in Customers">
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- filter -->

                <!-- tab -->
                <!-- tab -->

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
                                                        <input type="checkbox" class="filled-in">
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
                                <tbody>
                                    <tr v-for="(customer,index) in customers" :key="index">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td  style="cursor: pointer;">
                                            <div class="ellipsis cursor_pointer text-success" @click="gotoCustomerProfile(customer.id)" v-if="customer.is_company == false">
                                                {{ customer.first_name }} {{ customer.last_name }}
                                            </div>
                                            <div class="ellipsis cursor_pointer text-success" @click="gotoCustomerProfile(customer.id)" v-if="customer.is_company == true">
                                                {{ customer.company_name }}
                                            </div>
                                        </td>
                                        <td @click="customersEdit(customer)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ customer.billing_address }}
                                                {{ customer.line_2 }}
                                                {{ customer.city }}
                                                {{ customer.zip_code }}
                                                {{ customer.country_name.name }}
                                            </div>
                                        </td>
                                        <td @click="customersEdit(customer)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ customer.email }}
                                            </div>
                                        </td>
                                        <td @click="customersEdit(customer)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ customer.phone }}
                                            </div>
                                        </td>
                                        <td class="text-center" @click="customersEdit(customer)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ customer.business_code }}
                                            </div>
                                        </td>
                                        <td class="text-center" @click="customersEdit(customer)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ customer.note }}
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item text-danger waves-effect waves-light"  @click="deleteCustomer(customer.id)">Delete</a>
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

        <!-- full table -->
    </div>
</template>


<script>

    import SubHeader from "../sub_header";
    export default {
        components: {
            SubHeader,
        },

        name: 'Customer',

        data: function () {
            return {
                customers: false,
                form: new Form({
                    "id": "",
                    "is_company": true,
                    "company_name": "",
                    "first_name": "",
                    "last_name": "",
                    "middle_name": "",
                    "email": "",
                    "phone": "",
                    "website": "",
                    "vat_number": "",
                    "is_pickup_only_customer": true,
                    "billing_address": "",
                    "line_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "18",
                    "is_same_delivery": true,
                    "delivery_address": [{
                        address: '',

                    }],
                    "contacts": [{
                        single_contact: '',
                    }],
                    "payment_terms": "",
                    "price_family": "",
                    "currency": "18",
                    "business_code": "",
                    "opt_in_to_emails": true,
                    "assigned_to": "0",
                    "reference_account": "",
                    "date_as": new Date().toLocaleString(),
                    "note": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listCustomers();
        },
        methods: {
            listCustomers: function () {
                axios.get('/api/customers').then(response => this.customers = response.data);
            },
            customersEdit(customer){
                this.$router.push({ name: 'editCustomer', params: { id: customer.id }});
            },
            deleteCustomer: function (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/customers/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listCustomers();
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
            },
            gotoCustomerProfile: function(customer_id){
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            }
        }
    }
</script>
