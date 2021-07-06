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
                                    <h4 style="border: 0;" class="page-title">Stock</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">Automatic Inventory Ordering</router-link>
                                    <router-link to="/#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li style="float: left;">
                                    <a class="btn btn-white new_dot nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Inventory Withdrawals</a>
                                        <a class="dropdown-item" href="#">Inventory Transfer</a>
                                        <a class="dropdown-item" href="#">Inventory Count Sheet</a>
                                        <a class="dropdown-item" href="#">Export Inventory On Hand</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- filter -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile_d_search_none">
                        <div class="card filter" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Filter Panel -->
                                <div class="row">
                                    <div class="col-md-4 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Expenses">
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
                                            <input type="text" placeholder="Search in Expenses">
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- table -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th style="width: 5%;padding: 5px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th> -->
                                        <th style="min-width: 138px;">Item Number</th>
                                        <th style="min-width: 135px;">Name</th>
                                        <th style="width: 260px;min-width:180px;">Description</th>
                                        <th style="min-width: 110px;">Price</th>
                                        <th class="text-right" style="min-width: 110px;">Costs</th>
                                        <th class="text-center" style="min-width: 110px;">Unit</th>
                                        <th class="text-center" style="min-width: 120px;">Location</th>
                                        <th class="text-center" style="width: 110px;min-width: 140px;">Qty On Hand</th>
                                        <th class="text-center" style="width: 110px;min-width: 70px;">Available</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td> -->
                                        <td>
                                            <div class="ellipsis">
                                                50000
                                            </div>
                                        </td>
                                        <td>
                                            Huwaui
                                        </td>
                                        <td>
                                            <div class="ellipsis">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                tk 1,000.00
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                Tk 45,000.00
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                peice
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                <div class="badge col-red">all</div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                400
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                400
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/view">Print</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Duplicate</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Export as PDF</a>
                                                        <hr style="margin: 2px 0;">
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Justified</a>
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


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4> Are you sure you want to delete</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
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
        name: 'Stock',

        data: function () {
            return {
                products: [],
                form: new Form({
                    "id": "",
                    "paid_to": "",
                    "billing_date": "",
                    "category": "",
                    "currency": "",
                    "is_paid": "",
                    "payment_method": "",
                    "paid_on": "",
                    "bank": "",
                    "transaction_id": "",
                    "attachments": "",
                    "project": "",
                    "assigned": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listExpenses();
        },
        methods: {
            listExpenses: function () {

                var that = this;
                this.form.get('/api/productservices').then(function (response) {
                    that.products = response.data;
                })

            },
            createExpense: function () {

                var that = this;
                this.form.post('/api/expenses').then(function (response) {
                    that.expenses.push(response.data);
                    that.form.reset();
                })

            },
            deleteExpense: function (expense, index) {

                var that = this;
                this.form.delete('/api/expenses/' + expense.id).then(function (response) {
                    that.expenses.splice(index, 1);
                })

            }
        }
    }
</script>
