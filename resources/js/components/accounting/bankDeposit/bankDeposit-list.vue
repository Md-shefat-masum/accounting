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
                                    <h4 style="border: 0;" class="page-title">Bank Deposits</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/accounting/bank-deposit/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">Make Bank Deposit</router-link>
                                    <router-link to="/accounting/bank-deposit/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li  style="float: left;">
                                    <a class="btn btn-white new_dot nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Export Purchase Orders Lines</a>
                                        <a class="dropdown-item" href="#">Export Purchase Orders Details</a>
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
                                            <input type="text" placeholder="Search in Product Orders">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-0 text-right">
                                        <button class="btn btn-outline-default"> All Employees <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <button class="btn btn-outline-default"> All Suppliers <i class="fa fa-angle-down" aria-hidden="true"></i></button>
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
                                            <input type="text" placeholder="Search in Product Orders">
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
                                                        <input type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 165px;">Date</th>
                                        <th style="min-width: 155px;">Bank Deposit</th>
                                        <th style="min-width: 155px;">Description</th>
                                        <th class="text-right" style="min-width: 120px;">Bank Account</th>
                                        <th class="text-right" style="min-width: 120px;">Subtotal Amount</th>
                                        <th class="text-center" style="min-width: 120px;">Fee Amount</th>
                                        <th class="text-center" style="min-width: 120px;">Total Amount</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                        <td>
                                            <div class="ellipsis">
                                                18/02/14
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                DEP-001
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                City Bank
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">

                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                Tk 0.00
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                Tk 15,000
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                Tk 15,000
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
                                                        <hr style="margin: 2px 0;">

                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Convert to Deliver</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Convert to Invoice</a>
                                                        <hr style="margin: 2px 0;">
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Send by Email</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Export as PDF</a>
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
        name: 'Purchaseorder',

        data: function () {
            return {
                purchaseorders: false,
                form: new Form({
                    "id": "",
                    "supplier": "",
                    "address": "",
                    "recipient": "",
                    "ref_number": "",
                    "date": "",
                    "payment_terms": "",
                    "currency": "",
                    "product": "",
                    "document_note": "",
                    "subtotal": "",
                    "discount_rate": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_date": "",
                    "type": "",
                    "delivery_address": "",
                    "project": "",
                    "delivery_status": "",
                    "billing_status": "",
                    "assigned_to": "",
                    "private_note": "",
                    "attachments": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listPurchaseorders();
        },
        methods: {
            listPurchaseorders: function () {

                var that = this;
                this.form.get('/api/purchaseorders').then(function (response) {
                    that.purchaseorders = response.data;
                })

            },
            createPurchaseorder: function () {

                var that = this;
                this.form.post('/api/purchaseorders').then(function (response) {
                    that.purchaseorders.push(response.data);
                    that.form.reset();
                })

            },
            deletePurchaseorder: function (purchaseorder, index) {

                var that = this;
                this.form.delete('/api/purchaseorders/' + purchaseorder.id).then(function (response) {
                    that.purchaseorders.splice(index, 1);
                })

            }
        }
    }
</script>
