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
                                    <h4 style="border: 0;" class="page-title">Bills</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/purchase/bill/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Bills</router-link>
                                    <router-link to="/purchase/bill/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
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
                                        <a class="dropdown-item" href="#">Export Bills Lines</a>
                                        <a class="dropdown-item" href="#">Export Bills Details</a>
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
                                            <input type="text" placeholder="Search in Supplier Bills">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-0 text-right">
                                        <button class="btn btn-outline-default"> All Employees <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <button class="btn btn-outline-default"> All Supplier <i class="fa fa-angle-down" aria-hidden="true"></i></button>
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
                                            <input type="text" placeholder="Search in Supplier Bills">
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
                                        <a href="#home" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">10</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" data-toggle="tab">
                                            Draft
                                            <span class="amount">4</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" data-toggle="tab">
                                            Unpaid
                                            <span class="amount">5</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="mobile_d_none">
                                        <a href="#messages" data-toggle="tab">
                                            Paid
                                            <span class="amount">4</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="mobile_d_none">
                                        <a href="#messages" data-toggle="tab">
                                            Cancelled
                                            <span class="amount">4</span>
                                        </a>
                                    </li>
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
                                        <th style="min-width: 102px;">Bill Date</th>
                                        <th style="min-width: 100px;">Bill NO</th>
                                        <th style="min-width: 125px;">Supplier</th>
                                        <th class="text-right" style="min-width: 110px;">Amount</th>
                                        <th class="text-right" style="min-width: 110px;">Oustanding</th>
                                        <th class="text-right" style="min-width: 110px;">Notes</th>
                                        <th style="min-width: 100px;" class="text-center">Due Date</th>
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                        <th class="text-center" style="min-width: 95px;width: 95px;"></th>
                                        <th class="text-center" style="min-width: 70px;width: 70px;"></th>
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
                                                24/09/20
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                CINV 082020-005
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                British  manufacturing  company
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                Tk 45, 000.00
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                Tk 45, 000.00
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                09/10/20
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                <div class="badge col-red">In 4days</div>
                                            </div>
                                        </td>
                                        <td style="text-align:center;padding-top: 6px;padding-bottom: 6px;">
                                            <div style="outline-style:none;" __gwt_cell="cell-gwt-uid-65889">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-warning">
                                                            <span title="In 4 weeks">In 4 weeks</span>
                                                        </span>
                                                    </li>
                                                </ul>
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
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Cancel</a>
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
        name: 'Bill',

        data: function () {
            return {
                bills: false,
                form: new Form({
                    "id": "",
                    "supplier": "",
                    "ref_number": "",
                    "address": "",
                    "recipient": "",
                    "date": "",
                    "payment_terms": "",
                    "currency": "",
                    "is_unpaid": "",
                    "is_settled": "",
                    "bank": "",
                    "products": "",
                    "expenses": "",
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
            this.listBills();
        },
        methods: {
            listBills: function () {

                var that = this;
                this.form.get('/api/bills').then(function (response) {
                    that.bills = response.data;
                })

            },
            createBill: function () {

                var that = this;
                this.form.post('/api/bills').then(function (response) {
                    that.bills.push(response.data);
                    that.form.reset();
                })

            },
            deleteBill: function (bill, index) {

                var that = this;
                this.form.delete('/api/bills/' + bill.id).then(function (response) {
                    that.bills.splice(index, 1);
                })

            }
        }
    }
</script>
