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
                                    <h4 style="border: 0;" class="page-title">Vouchers</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <a href="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Vouchers</a>
                                    <a href="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></a>
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
                                        <a class="dropdown-item" href="#">Export Vouchers Lines</a>
                                        <a class="dropdown-item" href="#">Export Vouchers Details</a>
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
                                            <input type="text" placeholder="Search in Vouchers">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-0 text-right">
                                        <button class="btn btn-outline-default"> All Employees
                                            <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <button class="btn btn-outline-default"> Any Date
                                            <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <button class="btn btn-outline-default"> Any Type
                                            <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile_d_search_block">
                        <div class="card" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Filter Panel -->
                                <div class="row">
                                    <div class="col-md-12 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Vouchers">
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
                                        <a href="#messages" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">10</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#home" data-toggle="tab">
                                            Paid
                                            <span class="amount">4</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" data-toggle="tab">
                                            Unpaid
                                            <span class="amount">5</span>
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
                                        <th style="min-width: 138px;">Voucher Date</th>
                                        <th style="min-width: 135px;">Voucher NO</th>
                                        <th style="min-width: 160px;">Category</th>
                                        <th style="min-width: 160px;">Paid By</th>
                                        <th class="text-right" style="min-width: 120px;">Amount</th>
                                        <th class="text-center" style="min-width: 120px;">Status</th>
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
                                                24/09/20
                                            </div>
                                        </td>
                                        <td>
                                            DNORK-001452
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                Customer Payment for IInvoice
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                Cigarette manufacturing company
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                Tk 45, 000.00
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                <div class="badge col-red">Undeposite</div>
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
        name: 'Voucher',

        data: function () {
            return {
                vouchers: false,
                form: new Form({
                    "id": "",
                    "title": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listVouchers();
        },
        methods: {
            listVouchers: function () {

                var that = this;
                this.form.get('/api/vouchers').then(function (response) {
                    that.vouchers = response.data;
                })

            },
            createVoucher: function () {

                var that = this;
                this.form.post('/api/vouchers').then(function (response) {
                    that.vouchers.push(response.data);
                    that.form.reset();
                })

            },
            deleteVoucher: function (voucher, index) {

                var that = this;
                this.form.delete('/api/vouchers/' + voucher.id).then(function (response) {
                    that.vouchers.splice(index, 1);
                })

            }
        }
    }
</script>
