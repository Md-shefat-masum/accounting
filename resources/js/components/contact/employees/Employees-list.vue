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
                                    <h4 style="border: 0;" class="page-title">Employees</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/contact/employee/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Employee</router-link>
                                    <router-link to="/contact/employee/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block">
                                        <i class="fas fa-plus"></i></router-link>
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
                                    <a class="dropdown-item" href="#">Convert Purchase Returns to Supplier Credit Memos</a>
                                    <a class="dropdown-item" href="#">Export Purchase Returns</a>
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
                                    <div class="col-md-4 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search this List">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-0 text-right">
                                        <!-- <button class="btn btn-outline-default"> Any Date <i class="fa fa-angle-down" aria-hidden="true"></i></button> -->
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
                                            <input type="text" placeholder="Search this list">
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

                <div class="row">
                    <div class="col-12">
                        <div class="card filter content-card" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation">
                                        <a href="#" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{ employees.data && employees.data.length }}</span>
                                        </a>
                                    </li>
                                    <!-- <li role="presentation">
                                        <a href="#" data-toggle="tab">
                                            Deactivate
                                            <span class="amount">10</span>
                                        </a>
                                    </li> -->
                                </ul>
                                <!-- Tab panes -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tab -->

                <!-- table -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="min-width: 125px;padding-left: 24px">Name</th>
                                        <th style="min-width: 125px;">Employee Code</th>
                                        <th style="min-width: 125px;">Job Title</th>
                                        <th style="min-width: 125px;">Email</th>
                                        <th style="min-width: 125px;">Mobile Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="employee in employees.data" :key="employee.id">
                                        <td style="padding-left: 24px;cursor: pointer;" @click="employeeEdit(employee)">
                                            <div class="ellipsis">
                                                {{ employee.name }}
                                            </div>
                                        </td>
                                        <td @click="employeeEdit(employee)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ employee.business_code }}
                                            </div>
                                        </td>
                                        <td @click="employeeEdit(employee)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ employee.job_title }}
                                            </div>
                                        </td>
                                        <td @click="employeeEdit(employee)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ employee.email }}
                                            </div>
                                        </td>
                                        <td @click="employeeEdit(employee)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ employee.phone }}
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

        name: 'Employee',

        data: function () {
            return {
                employees: false,
                form: new Form({
                    "id": "",
                    "name": "",
                    "job_title": "",
                    "email": "",
                    "phone": "",
                    "active": "",
                    "service_bill": "",
                    "date_of_joining": "",
                    "date_of_birth": "",
                    "father_name": "",
                    "mother_name": "",
                    "address": "",
                    "nid_number": "",
                    "private_note": "",
                    "business_code": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listEmployees();
        },
        methods: {
            listEmployees: function () {
                axios.get('/api/employees').then(response => this.employees = response.data);
            },
            employeeEdit(employee){
                this.$router.replace({ name: 'editEmployee', params: { id: employee.id }});
            },

        }
    }
</script>
