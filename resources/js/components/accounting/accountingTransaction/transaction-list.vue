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
                                    <h4 style="border: 0;" class="page-title">Accounting Entries</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">Export Accounting Transactions</router-link>
                                    <router-link to="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
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
                                            <span class="amount">20</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" data-toggle="tab">
                                            Realised
                                            <span class="amount">20</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" data-toggle="tab">
                                            Forecast
                                            <span class="amount">20</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#messages" data-toggle="tab">
                                            Closed
                                            <span class="amount">20</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#messages" data-toggle="tab">
                                            Draft
                                            <span class="amount">20</span>
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
                        <div class="table-responsive card card-body shadow-none">
                            <table __gwtcellbasedwidgetimpldispatchingfocus="true" __gwtcellbasedwidgetimpldispatchingblur="true" class="A54VNK-S-y table-fixed-layout page-panel" cellspacing="0">
                                <colgroup>
                                    <col style="width: 80px;" />
                                    <col style="width: 75px;" />
                                    <col style="width: 120px;" />
                                    <col />
                                    <col />
                                    <col />
                                    <col />
                                    <col />
                                </colgroup>
                                <thead>
                                    <tr __gwt_header_row="0">
                                        <th colspan="1" class="A54VNK-S-h A54VNK-S-f" __gwt_column="column-gwt-uid-3634" __gwt_header="header-gwt-uid-3635">#</th>
                                        <th colspan="1" class="A54VNK-S-h" __gwt_column="column-gwt-uid-3636" __gwt_header="header-gwt-uid-3637">Date</th>
                                        <th colspan="1" class="A54VNK-S-h" __gwt_column="column-gwt-uid-3638" __gwt_header="header-gwt-uid-3639">Validation Date</th>
                                        <th colspan="1" class="A54VNK-S-h" __gwt_column="column-gwt-uid-3640" __gwt_header="header-gwt-uid-3641">Description</th>
                                        <th colspan="1" class="A54VNK-S-h" __gwt_column="column-gwt-uid-3642"></th>
                                        <th colspan="1" class="A54VNK-S-h" __gwt_column="column-gwt-uid-3643" __gwt_header="header-gwt-uid-3644">Account</th>
                                        <th colspan="1" class="A54VNK-S-h text-right" __gwt_column="column-gwt-uid-3645" __gwt_header="header-gwt-uid-3646">Amount +/-</th>
                                        <th colspan="1" class="A54VNK-S-h A54VNK-S-p text-right" __gwt_column="column-gwt-uid-3647" __gwt_header="header-gwt-uid-3648">Reconciled Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="">
                                    <tr __gwt_row="0" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">27</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_receipt/1923353/edit" title="Accounting Receipt - None - IPAY-002">Accounting Receipt - None - IPAY-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Undeposited Funds</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk1,500.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="1" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">27</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_receipt/1923353/edit" title="Accounting Receipt - None - IPAY-002">Accounting Receipt - None - IPAY-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank Loan</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk1,500.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="2" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">26</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863">
                                                <a class="ellipsis-block" href="#bank_transfer/65986/edit" title="Bank Transfer from asia bank - bank transfer - BKT-001">Bank Transfer from asia bank - bank transfer - BKT-001</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank Account city bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk5,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="3" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">26</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863">
                                                <a class="ellipsis-block" href="#bank_transfer/65986/edit" title="Bank Transfer from asia bank - bank transfer - BKT-001">Bank Transfer from asia bank - bank transfer - BKT-001</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank in Transit</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk5,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="4" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">25</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863">
                                                <a class="ellipsis-block" href="#bank_transfer/65986/edit" title="Bank Transfer to city bank - bank transfer - BKT-001">Bank Transfer to city bank - bank transfer - BKT-001</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank in Transit</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk5,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="5" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">25</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863">
                                                <a class="ellipsis-block" href="#bank_transfer/65986/edit" title="Bank Transfer to city bank - bank transfer - BKT-001">Bank Transfer to city bank - bank transfer - BKT-001</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank Account ASI-420</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk5,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="6" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">24</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40021631/edit" title="Stock in New Count Sheet">Stock in New Count Sheet</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Asia Bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk45,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="7" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">24</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40021632/edit" title="Stock in New Count Sheet">Stock in New Count Sheet</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Inventory increase</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk45,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="8" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">23</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_credit_memo/11735/edit" title="safiq islam (SUP-003) - SCN-001">safiq islam (SUP-003) - SCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Product Cost - Items</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="9" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">23</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_credit_memo/11735/edit" title="safiq islam (SUP-003) - SCN-001">safiq islam (SUP-003) - SCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">islam</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="10" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">22</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_credit_memo/11735/edit" title="Payment due date - islam - SCN-001">Payment due date - islam - SCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">islam</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="11" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">22</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_credit_memo/11735/edit" title="Payment due date - islam - SCN-001">Payment due date - islam - SCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Company Checking Account</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="12" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159257/edit" title="mr karim (CUS-002) - CINV-002">mr karim (CUS-002) - CINV-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Sales - Miscellaneous</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk1,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="13" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159257/edit" title="mr karim (CUS-002) - CINV-002">mr karim (CUS-002) - CINV-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk1,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="14" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">20</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">17/04/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159257/edit" title="Payment due date - karim - CINV-002">Payment due date - karim - CINV-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk1,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="15" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">20</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">17/04/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159257/edit" title="Payment due date - karim - CINV-002">Payment due date - karim - CINV-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Undeposited Funds</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk1,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="16" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">17</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40018730/edit" title="REC-002">REC-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Inventory in Transit</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk90,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="17" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">17</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40018729/edit" title="REC-002">REC-002</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Asia Bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk90,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="18" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">15</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40018728/edit" title="REC-001">REC-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Inventory in Transit</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="19" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">15</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40018727/edit" title="REC-001">REC-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Asia Bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="20" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">13</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40018678/edit" title="DN-001">DN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Asia Bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="21" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">13</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#accounting_entry/40018677/edit" title="DN-001">DN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Product Cost - Items</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk900.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="22" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">11</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#credit_memo/96273/edit" title="mr karim (CUS-002) - CCN-001">mr karim (CUS-002) - CCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="23" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">11</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#credit_memo/96273/edit" title="mr karim (CUS-002) - CCN-001">mr karim (CUS-002) - CCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Sales - Miscellaneous</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="24" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">10</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#credit_memo/96273/edit" title="Payment due date - karim - CCN-001">Payment due date - karim - CCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="25" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">10</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#credit_memo/96273/edit" title="Payment due date - karim - CCN-001">Payment due date - karim - CCN-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Company Checking Account</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="26" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">9</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863">
                                                <a class="ellipsis-block" href="#bank_deposit/1560276/edit" title="Sales Receipt - mr karim - 145236 - IPAY-001 - DEP-001">Sales Receipt - mr karim - 145236 - IPAY-001 - DEP-001</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank Account city bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk15,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="27" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">9</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863">
                                                <a class="ellipsis-block" href="#bank_deposit/1560276/edit" title="Sales Receipt - mr karim - 145236 - IPAY-001 - DEP-001">Sales Receipt - mr karim - 145236 - IPAY-001 - DEP-001</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Undeposited Funds</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk15,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="28" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">8</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#sales_receipt/624804/edit" title="mr karim - 145236 - IPAY-001">mr karim - 145236 - IPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Undeposited Funds</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk15,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="29" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">8</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#sales_receipt/624804/edit" title="mr karim - 145236 - IPAY-001">mr karim - 145236 - IPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk15,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="30" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">7</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#sales_receipt/624804/edit" title="mr karim - 145236 - IPAY-001">mr karim - 145236 - IPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Sales - Items</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk15,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="31" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">7</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#sales_receipt/624804/edit" title="mr karim - 145236 - IPAY-001">mr karim - 145236 - IPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk15,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="32" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">6</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_bill/219622/edit" title="safiq islam (SUP-003) - VINV-001">safiq islam (SUP-003) - VINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">islam</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk9,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="33" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">6</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_bill/219622/edit" title="safiq islam (SUP-003) - VINV-001">safiq islam (SUP-003) - VINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Product Cost - Items</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk9,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="34" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">5</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">17/04/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_bill/219622/edit" title="Payment due date - islam - VINV-001">Payment due date - islam - VINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">islam</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk9,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="35" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">5</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">17/04/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#vendor_bill/219622/edit" title="Payment due date - islam - VINV-001">Payment due date - islam - VINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Company Checking Account</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk9,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="36" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">4</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#bank_payment/2103618/edit" title="safiq islam - 12365478 - OPAY-001">safiq islam - 12365478 - OPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Bank Account city bank</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="37" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">4</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#bank_payment/2103618/edit" title="safiq islam - 12365478 - OPAY-001">safiq islam - 12365478 - OPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">islam</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="38" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">3</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#bank_payment/2103618/edit" title="safiq islam - 12365478 - OPAY-001">safiq islam - 12365478 - OPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Accounts Payable:Miscellaneous Suppliers</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="39" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">3</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#bank_payment/2103618/edit" title="safiq islam - 12365478 - OPAY-001">safiq islam - 12365478 - OPAY-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">islam</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk10,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="40" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">2</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159124/edit" title="mr karim (CUS-002) - CINV-001">mr karim (CUS-002) - CINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk20,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="41" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">2</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159124/edit" title="mr karim (CUS-002) - CINV-001">mr karim (CUS-002) - CINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-success"><span title="Realised">Realised</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Sales - Miscellaneous</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk20,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="42" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">1</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159124/edit" title="Payment due date - karim - CINV-001">Payment due date - karim - CINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">karim</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right">Tk20,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="43" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3860">1</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3861">18/03/21</div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s"><div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3862"></div></td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3863"><a class="ellipsis-block" href="#customer_invoice/2159124/edit" title="Payment due date - karim - CINV-001">Payment due date - karim - CINV-001</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s text-center">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3864">
                                                <ul class="list-unstyled no-margin-bottom" style="margin-top: -2px;">
                                                    <li>
                                                        <span class="A54VNK-Kf-a ellipsis label-light label-light-info"><span title="Forecast">Forecast</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3866"><div class="ellipsis-block">Undeposited Funds</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3867"><div class="text-right text-danger">-Tk20,000.00</div></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3868">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody style="display: none;">
                                    <tr>
                                        <td align="center" colspan="8">
                                            <div>
                                                <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                                    <div aria-hidden="true" style="width: 100%; height: 100%; display: none;"><div class="text-muted text-left">No data</div></div>
                                                </div>
                                                <div style="width: 100%; height: 100%; padding: 0px; margin: 0px;">
                                                    <div class="A54VNK-S-q" style="width: 100%; height: 100%;">
                                                        <img
                                                            src="data:image/gif;base64,R0lGODlhKwALAPEAAP///0tKSqampktKSiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAKwALAAACMoSOCMuW2diD88UKG95W88uF4DaGWFmhZid93pq+pwxnLUnXh8ou+sSz+T64oCAyTBUAACH5BAkKAAAALAAAAAArAAsAAAI9xI4IyyAPYWOxmoTHrHzzmGHe94xkmJifyqFKQ0pwLLgHa82xrekkDrIBZRQab1jyfY7KTtPimixiUsevAAAh+QQJCgAAACwAAAAAKwALAAACPYSOCMswD2FjqZpqW9xv4g8KE7d54XmMpNSgqLoOpgvC60xjNonnyc7p+VKamKw1zDCMR8rp8pksYlKorgAAIfkECQoAAAAsAAAAACsACwAAAkCEjgjLltnYmJS6Bxt+sfq5ZUyoNJ9HHlEqdCfFrqn7DrE2m7Wdj/2y45FkQ13t5itKdshFExC8YCLOEBX6AhQAADsAAAAAAAAAAAA="
                                                            width="43"
                                                            height="11"
                                                            class="gwt-Image"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot aria-hidden="true" style="display: none;"></tfoot>
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
