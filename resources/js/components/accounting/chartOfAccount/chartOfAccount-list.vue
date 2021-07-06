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
                                    <h4 style="border: 0;" class="page-title">Accounts</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Account</router-link>
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
                        <div class="table-responsive card card-body shadow-none">
                            <table __gwtcellbasedwidgetimpldispatchingfocus="true" __gwtcellbasedwidgetimpldispatchingblur="true" class="A54VNK-S-y table-fixed-layout page-panel" cellspacing="0">
                                <colgroup>
                                    <col />
                                    <col style="width: 25%;" />
                                </colgroup>
                                <thead>
                                    <tr __gwt_header_row="0">
                                        <th colspan="1" class="A54VNK-S-h A54VNK-S-f" __gwt_column="column-gwt-uid-3326" __gwt_header="header-gwt-uid-3327">Account</th>
                                        <th colspan="1" class="A54VNK-S-h A54VNK-S-p text-right" __gwt_column="column-gwt-uid-3328" __gwt_header="header-gwt-uid-3329">Balance</th>
                                    </tr>
                                </thead>
                                <tbody style="">
                                    <tr __gwt_row="0" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Bank</div>
                                                    <a class="" href="#accounting/1/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk140,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="1" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Asia Bank" href="#accounting/1215825" style="margin-left: 30px;">Asia Bank</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk135,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="2" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Petty Cash" href="#accounting/2" style="margin-left: 30px;">Petty Cash</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="3" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Company Checking Account" href="#accounting/3" style="margin-left: 30px;">Company Checking Account</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="4" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Bank Account city bank" href="#accounting/1215827" style="margin-left: 30px;">Bank Account city bank</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk10,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="5" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Bank Account ASI-420" href="#accounting/1215925" style="margin-left: 30px;">Bank Account ASI-420</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk5,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="6" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Payroll Checking" href="#accounting/4" style="margin-left: 30px;">Payroll Checking</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="7" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Savings" href="#accounting/5" style="margin-left: 30px;">Savings</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="8" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Bank in Transit" href="#accounting/197" style="margin-left: 30px;">Bank in Transit</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="9" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Accounts Receivable</div>
                                                    <a class="" href="#accounting/6/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk11,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="10" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accounts Receivable:Miscellaneous Customers" href="#accounting/7" style="margin-left: 30px;">Accounts Receivable:Miscellaneous Customers</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="11" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="karim" href="#accounting/1215811" style="margin-left: 30px;">karim</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk11,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="12" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Receivables" href="#accounting/8" style="margin-left: 30px;">Other Receivables</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="13" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Allowance for Doubtful Account" href="#accounting/9" style="margin-left: 30px;">Allowance for Doubtful Account</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="14" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Inventory</div>
                                                    <a class="" href="#accounting/10/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk90,900.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="15" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Inventory Miscellaneous" href="#accounting/11" style="margin-left: 30px;">Inventory Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="16" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Inventory in Transit" href="#accounting/182" style="margin-left: 30px;">Inventory in Transit</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk90,900.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="17" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Other Current Assets</div>
                                                    <a class="" href="#accounting/12/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk1,500.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="18" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Prepaid Expenses" href="#accounting/13" style="margin-left: 30px;">Prepaid Expenses</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="19" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Employee Advances" href="#accounting/14" style="margin-left: 30px;">Employee Advances</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="20" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Notes Receivable-Current" href="#accounting/15" style="margin-left: 30px;">Notes Receivable-Current</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="21" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Undeposited Funds" href="#accounting/155" style="margin-left: 30px;">Undeposited Funds</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk1,500.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="22" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Fixed Assets</div>
                                                    <a class="" href="#accounting/16/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="23" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Furniture and Fixtures" href="#accounting/17" style="margin-left: 30px;">Furniture and Fixtures</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="24" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Equipment" href="#accounting/18" style="margin-left: 30px;">Equipment</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="25" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Vehicles" href="#accounting/19" style="margin-left: 30px;">Vehicles</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="26" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Depreciable Property" href="#accounting/20" style="margin-left: 30px;">Other Depreciable Property</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="27" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Leasehold Improvements" href="#accounting/21" style="margin-left: 30px;">Leasehold Improvements</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="28" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Buildings" href="#accounting/22" style="margin-left: 30px;">Buildings</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="29" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Building Improvements" href="#accounting/23" style="margin-left: 30px;">Building Improvements</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="30" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Land" href="#accounting/24" style="margin-left: 30px;">Land</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="31" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Accumulated Depreciation</div>
                                                    <a class="" href="#accounting/25/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="32" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Depreciation-Furniture" href="#accounting/26" style="margin-left: 30px;">Accumulated Depreciation-Furniture</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="33" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Depreciation-Equipment" href="#accounting/27" style="margin-left: 30px;">Accumulated Depreciation-Equipment</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="34" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Depreciation-Vehicles" href="#accounting/28" style="margin-left: 30px;">Accumulated Depreciation-Vehicles</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="35" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Accumulated Depreciation-Other" href="#accounting/29" style="margin-left: 30px;">Accumulated Depreciation-Other</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="36" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Depreciation-Leasehold" href="#accounting/30" style="margin-left: 30px;">Accumulated Depreciation-Leasehold</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="37" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Depreciation-Buildings" href="#accounting/31" style="margin-left: 30px;">Accumulated Depreciation-Buildings</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="38" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Depreciation-Building Improvments" href="#accounting/32" style="margin-left: 30px;">Accumulated Depreciation-Building Improvments</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="39" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Other Assets</div>
                                                    <a class="" href="#accounting/33/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="40" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Deposits" href="#accounting/34" style="margin-left: 30px;">Deposits</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="41" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Organisation Costs" href="#accounting/35" style="margin-left: 30px;">Organisation Costs</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="42" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accumulated Amortis - Organis Costs" href="#accounting/36" style="margin-left: 30px;">Accumulated Amortis - Organis Costs</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="43" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Notes Receivable- Noncurrent" href="#accounting/37" style="margin-left: 30px;">Notes Receivable- Noncurrent</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="44" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Noncurrent Assets" href="#accounting/38" style="margin-left: 30px;">Other Noncurrent Assets</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="45" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Accounts Payable</div>
                                                    <a class="" href="#accounting/39/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk1,900.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="46" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Accounts Payable:Miscellaneous Suppliers" href="#accounting/40" style="margin-left: 30px;">Accounts Payable:Miscellaneous Suppliers</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk10,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="47" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="islam" href="#accounting/1215824" style="margin-left: 30px;">islam</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk8,100.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="48" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Tax Agency" href="#accounting/157" style="margin-left: 30px;">Tax Agency</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="49" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Other Current Liabilities</div>
                                                    <a class="" href="#accounting/41/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="50" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Accrued Expenses</div>
                                                    <a class="" href="#accounting/42/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="51" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 60px;">
                                                    <div class="gwt-Label">VAT Payable</div>
                                                    <a class="" href="#accounting/43/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="52" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 90px;">
                                                    <div class="gwt-Label">VAT collected</div>
                                                    <a class="" href="#accounting/158/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="53" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="20.0% Standard rate (Collected)" href="#accounting/162" style="margin-left: 120px;">20.0% Standard rate (Collected)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="54" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="5.0% Lower rate (Collected)" href="#accounting/164" style="margin-left: 120px;">5.0% Lower rate (Collected)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="55" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="0.0% Zero-rated (Collected)" href="#accounting/166" style="margin-left: 120px;">0.0% Zero-rated (Collected)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="56" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="0.0% Exempt (Collected)" href="#accounting/168" style="margin-left: 120px;">0.0% Exempt (Collected)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="57" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 90px;">
                                                    <div class="gwt-Label">VAT paid</div>
                                                    <a class="" href="#accounting/160/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="58" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="VAT collected - no tax" href="#accounting/178" style="margin-left: 120px;">VAT collected - no tax</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="59" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="20.0% Standard rate (Deductible)" href="#accounting/170" style="margin-left: 120px;">20.0% Standard rate (Deductible)</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="60" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="5.0% Lower rate (Deductible)" href="#accounting/172" style="margin-left: 120px;">5.0% Lower rate (Deductible)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="61" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="0.0% Zero-rated (Deductible)" href="#accounting/174" style="margin-left: 120px;">0.0% Zero-rated (Deductible)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="62" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="0.0% Exempt (Deductible)" href="#accounting/176" style="margin-left: 120px;">0.0% Exempt (Deductible)</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="63" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="VAT paid - no tax" href="#accounting/180" style="margin-left: 120px;">VAT paid - no tax</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="64" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Wages Payable" href="#accounting/44" style="margin-left: 60px;">Wages Payable</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="65" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="shefat" href="#accounting/1215807" style="margin-left: 60px;">shefat</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="66" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Health Insurance Payable" href="#accounting/45" style="margin-left: 60px;">Health Insurance Payable</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="67" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Payroll Taxes Payable" href="#accounting/46" style="margin-left: 60px;">Payroll Taxes Payable</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="68" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 60px;">
                                                    <div class="gwt-Label">VAT Payable Pending</div>
                                                    <a class="" href="#accounting/47/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="69" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 90px;">
                                                    <div class="gwt-Label">VAT collected Pending</div>
                                                    <a class="" href="#accounting/159/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="70" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="20.0% Standard rate (Collected) - PENDING" href="#accounting/163" style="margin-left: 120px;">20.0% Standard rate (Collected) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="71" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="5.0% Lower rate (Collected) - PENDING" href="#accounting/165" style="margin-left: 120px;">5.0% Lower rate (Collected) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="72" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="0.0% Zero-rated (Collected) - PENDING" href="#accounting/167" style="margin-left: 120px;">0.0% Zero-rated (Collected) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="73" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="0.0% Exempt (Collected) - PENDING" href="#accounting/169" style="margin-left: 120px;">0.0% Exempt (Collected) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="74" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 90px;">
                                                    <div class="gwt-Label">VAT paid Pending</div>
                                                    <a class="" href="#accounting/161/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="75" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="VAT collected - no tax  Pending" href="#accounting/179" style="margin-left: 120px;">VAT collected - no tax Pending</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="76" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="20.0% Standard rate (Deductible) - PENDING" href="#accounting/171" style="margin-left: 120px;">20.0% Standard rate (Deductible) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="77" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="5.0% Lower rate (Deductible) - PENDING" href="#accounting/173" style="margin-left: 120px;">5.0% Lower rate (Deductible) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="78" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="0.0% Zero-rated (Deductible) - PENDING" href="#accounting/175" style="margin-left: 120px;">0.0% Zero-rated (Deductible) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="79" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="0.0% Exempt (Deductible) - PENDING" href="#accounting/177" style="margin-left: 120px;">0.0% Exempt (Deductible) - PENDING</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="80" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="VAT paid - no tax Pending" href="#accounting/181" style="margin-left: 120px;">VAT paid - no tax Pending</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="81" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Taxes Payable" href="#accounting/48" style="margin-left: 30px;">Other Taxes Payable</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="82" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Current Portion Long-Term Debt" href="#accounting/49" style="margin-left: 30px;">Current Portion Long-Term Debt</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="83" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Contracts Payable- Current" href="#accounting/50" style="margin-left: 30px;">Contracts Payable- Current</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="84" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Prepaid Income" href="#accounting/201" style="margin-left: 30px;">Prepaid Income</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="85" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Suspense - Clearing Account" href="#accounting/51" style="margin-left: 30px;">Suspense - Clearing Account</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="86" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Deferred Income" href="#accounting/200" style="margin-left: 30px;">Deferred Income</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="87" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Accrued Expenses Miscellaneous" href="#accounting/52" style="margin-left: 30px;">Accrued Expenses Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="88" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Income Tax Payable</div>
                                                    <a class="" href="#accounting/53/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="89" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Long Term Liabilities</div>
                                                    <a class="" href="#accounting/54/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk1,500.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="90" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Notes Payable-Noncurrent" href="#accounting/55" style="margin-left: 30px;">Notes Payable-Noncurrent</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="91" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Contracts Payable- Noncurrent" href="#accounting/56" style="margin-left: 30px;">Contracts Payable- Noncurrent</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="92" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Bank Loan" href="#accounting/156" style="margin-left: 30px;">Bank Loan</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk1,500.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="93" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Long-Term Liabilities" href="#accounting/57" style="margin-left: 30px;">Other Long-Term Liabilities</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="94" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Equity</div>
                                                    <a class="" href="#accounting/58/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="95" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Owner Draws" href="#accounting/59" style="margin-left: 30px;">Owner Draws</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="96" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Opening Balance Equity" href="#accounting/60" style="margin-left: 30px;">Opening Balance Equity</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="97" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Common Stock" href="#accounting/61" style="margin-left: 30px;">Common Stock</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="98" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Paid-in Capital" href="#accounting/62" style="margin-left: 30px;">Paid-in Capital</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="99" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Retained Earnings" href="#accounting/63" style="margin-left: 30px;">Retained Earnings</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="100" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Current Year Earnings" href="#accounting/64" style="margin-left: 30px;">Current Year Earnings</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="101" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Dividends Paid" href="#accounting/65" style="margin-left: 30px;">Dividends Paid</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="102" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Income</div>
                                                    <a class="" href="#accounting/66/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk26,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="103" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Sales</div>
                                                    <a class="" href="#accounting/67/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk26,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="104" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales - Items" href="#accounting/68" style="margin-left: 60px;">Sales - Items</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk15,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="105" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales - Composition" href="#accounting/69" style="margin-left: 60px;">Sales - Composition</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="106" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales - Fabrication" href="#accounting/70" style="margin-left: 60px;">Sales - Fabrication</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="107" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales - Services" href="#accounting/71" style="margin-left: 60px;">Sales - Services</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="108" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales - Miscellaneous" href="#accounting/72" style="margin-left: 60px;">Sales - Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk11,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="109" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Income" href="#accounting/74" style="margin-left: 30px;">Other Income</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="110" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Interest Income" href="#accounting/73" style="margin-left: 30px;">Interest Income</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="111" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Finance Charge Income" href="#accounting/75" style="margin-left: 30px;">Finance Charge Income</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="112" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales Returns and Allowances" href="#accounting/76" style="margin-left: 30px;">Sales Returns and Allowances</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="113" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Sales Discounts" href="#accounting/77" style="margin-left: 30px;">Sales Discounts</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="114" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Uncategorized Income" href="#accounting/78" style="margin-left: 30px;">Uncategorized Income</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="115" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Cost of Sales</div>
                                                    <a class="" href="#accounting/79/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk36,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="116" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Product Cost</div>
                                                    <a class="" href="#accounting/80/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk9,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="117" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Product Cost - Items" href="#accounting/81" style="margin-left: 60px;">Product Cost - Items</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk9,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="118" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Product Cost - Composition" href="#accounting/82" style="margin-left: 60px;">Product Cost - Composition</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="119" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Product Cost - Fabrication" href="#accounting/83" style="margin-left: 60px;">Product Cost - Fabrication</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="120" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Product Cost - Services" href="#accounting/84" style="margin-left: 60px;">Product Cost - Services</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="121" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Product Cost - Miscellaneous" href="#accounting/85" style="margin-left: 60px;">Product Cost - Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="122" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Direct Labor</div>
                                                    <a class="" href="#accounting/86/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="123" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Direct Labor - Items" href="#accounting/87" style="margin-left: 60px;">Direct Labor - Items</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="124" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Direct Labor - Composition" href="#accounting/88" style="margin-left: 60px;">Direct Labor - Composition</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="125" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Direct Labor - Fabrication" href="#accounting/89" style="margin-left: 60px;">Direct Labor - Fabrication</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="126" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Direct Labor - Services" href="#accounting/90" style="margin-left: 60px;">Direct Labor - Services</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="127" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Direct Labor - Miscellaneous" href="#accounting/91" style="margin-left: 60px;">Direct Labor - Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="128" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Materials Cost</div>
                                                    <a class="" href="#accounting/92/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="129" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Materials Cost - Items" href="#accounting/93" style="margin-left: 60px;">Materials Cost - Items</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="130" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Materials Cost - Composition" href="#accounting/94" style="margin-left: 60px;">Materials Cost - Composition</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="131" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Materials Cost - Fabrication" href="#accounting/95" style="margin-left: 60px;">Materials Cost - Fabrication</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="132" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Materials Cost - Services" href="#accounting/96" style="margin-left: 60px;">Materials Cost - Services</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="133" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Materials Cost - Miscellaneous" href="#accounting/97" style="margin-left: 60px;">Materials Cost - Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="134" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 30px;">
                                                    <div class="gwt-Label">Subcontractors</div>
                                                    <a class="" href="#accounting/98/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="135" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Subcontractors - Items" href="#accounting/99" style="margin-left: 60px;">Subcontractors - Items</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="136" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Subcontractors - Composition" href="#accounting/100" style="margin-left: 60px;">Subcontractors - Composition</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="137" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Subcontractors - Fabrication" href="#accounting/101" style="margin-left: 60px;">Subcontractors - Fabrication</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="138" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Subcontractors - Services" href="#accounting/102" style="margin-left: 60px;">Subcontractors - Services</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="139" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Subcontractors - Miscellaneous" href="#accounting/103" style="margin-left: 60px;">Subcontractors - Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="140" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Inventory shortage" href="#accounting/198" style="margin-left: 30px;">Inventory shortage</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="141" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Inventory increase" href="#accounting/199" style="margin-left: 30px;">Inventory increase</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right text-danger"><span class="">-Tk45,000.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="142" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Expenses</div>
                                                    <a class="" href="#accounting/104/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="143" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Freight" href="#accounting/105" style="margin-left: 30px;">Freight</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="144" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other" href="#accounting/106" style="margin-left: 30px;">Other</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="145" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Inventory Adjustments" href="#accounting/107" style="margin-left: 30px;">Inventory Adjustments</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="146" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Purchase Returns and Allowance" href="#accounting/108" style="margin-left: 30px;">Purchase Returns and Allowance</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="147" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Purchase Discounts" href="#accounting/109" style="margin-left: 30px;">Purchase Discounts</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="148" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Advertising Expense" href="#accounting/110" style="margin-left: 30px;">Advertising Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="149" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Amortisation Expense" href="#accounting/111" style="margin-left: 30px;">Amortisation Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="150" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Auto Expenses" href="#accounting/112" style="margin-left: 30px;">Auto Expenses</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="151" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Bad Debt Expense" href="#accounting/113" style="margin-left: 30px;">Bad Debt Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="152" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Bank Charges" href="#accounting/114" style="margin-left: 30px;">Bank Charges</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="153" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Interest on Loan" href="#accounting/115" style="margin-left: 30px;">Interest on Loan</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="154" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Charitable Contributions Expense" href="#accounting/116" style="margin-left: 30px;">Charitable Contributions Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="155" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Commissions and Fees Expense" href="#accounting/117" style="margin-left: 30px;">Commissions and Fees Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="156" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Depreciation Expense" href="#accounting/118" style="margin-left: 30px;">Depreciation Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="157" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Dues and Subscriptions Expense" href="#accounting/119" style="margin-left: 30px;">Dues and Subscriptions Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="158" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Employee Benefit Programs Expense" href="#accounting/120" style="margin-left: 30px;">Employee Benefit Programs Expense</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="159" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Freight Expense" href="#accounting/121" style="margin-left: 30px;">Freight Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="160" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Gifts Expense" href="#accounting/122" style="margin-left: 30px;">Gifts Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="161" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Income Tax Expense" href="#accounting/123" style="margin-left: 30px;">Income Tax Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="162" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Insurance Expense" href="#accounting/124" style="margin-left: 30px;">Insurance Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="163" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Interest Expense" href="#accounting/125" style="margin-left: 30px;">Interest Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="164" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Laundry and Cleaning Expense" href="#accounting/126" style="margin-left: 30px;">Laundry and Cleaning Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="165" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Legal and Professional Expense" href="#accounting/127" style="margin-left: 30px;">Legal and Professional Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="166" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Licenses Expense" href="#accounting/128" style="margin-left: 30px;">Licenses Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="167" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Loss on NSF Checks" href="#accounting/129" style="margin-left: 30px;">Loss on NSF Checks</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="168" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Maintenance Expense" href="#accounting/130" style="margin-left: 30px;">Maintenance Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="169" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Meals and Entertainment Expense" href="#accounting/131" style="margin-left: 30px;">Meals and Entertainment Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="170" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Office Expense" href="#accounting/132" style="margin-left: 30px;">Office Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="171" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Taxes" href="#accounting/133" style="margin-left: 30px;">Other Taxes</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="172" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Payroll Tax Expense" href="#accounting/134" style="margin-left: 30px;">Payroll Tax Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="173" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Penalties and Fines Expense" href="#accounting/135" style="margin-left: 30px;">Penalties and Fines Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="174" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <a class="ellipsis-block" title="Pension/Profit-Sharing Plan Expense" href="#accounting/136" style="margin-left: 30px;">Pension/Profit-Sharing Plan Expense</a>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="175" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Printing Offsite Expense" href="#accounting/137" style="margin-left: 30px;">Printing Offsite Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="176" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Postage Expense" href="#accounting/138" style="margin-left: 30px;">Postage Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="177" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Rent or Lease Expense" href="#accounting/139" style="margin-left: 30px;">Rent or Lease Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="178" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Repairs Expense" href="#accounting/140" style="margin-left: 30px;">Repairs Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="179" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Salaries Expense" href="#accounting/141" style="margin-left: 30px;">Salaries Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="180" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Salaries Bonus Expense" href="#accounting/142" style="margin-left: 30px;">Salaries Bonus Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="181" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Salaries Commission Expense" href="#accounting/143" style="margin-left: 30px;">Salaries Commission Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="182" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Supplies Expense" href="#accounting/144" style="margin-left: 30px;">Supplies Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="183" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Travel Expense" href="#accounting/145" style="margin-left: 30px;">Travel Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="184" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Utilities Expense" href="#accounting/146" style="margin-left: 30px;">Utilities Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="185" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Wages Expense" href="#accounting/147" style="margin-left: 30px;">Wages Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="186" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Items Expense" href="#accounting/148" style="margin-left: 30px;">Items Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="187" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Gain/Loss on Sale of Assets" href="#accounting/149" style="margin-left: 30px;">Gain/Loss on Sale of Assets</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="188" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Uncategorized Expense" href="#accounting/150" style="margin-left: 30px;">Uncategorized Expense</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="189" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Other Expenses</div>
                                                    <a class="" href="#accounting/151/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="190" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Loss on Exchange Rate" href="#accounting/184" style="margin-left: 30px;">Loss on Exchange Rate</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="191" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Expenses Miscellaneous" href="#accounting/152" style="margin-left: 30px;">Other Expenses Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="192" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402">
                                                <div class="A54VNK-Vi-a ellipsis-block" style="margin-left: 0px;">
                                                    <div class="gwt-Label">Other Income</div>
                                                    <a class="" href="#accounting/153/edit">Edit <span class="picto-font">p</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="193" __gwt_subrow="0" class="A54VNK-S-r table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Gain on Exchange Rate" href="#accounting/183" style="margin-left: 30px;">Gain on Exchange Rate</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-s A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr __gwt_row="194" __gwt_subrow="0" class="A54VNK-S-b table-row link">
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-d">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3402"><a class="ellipsis-block" title="Other Income Miscellaneous" href="#accounting/154" style="margin-left: 30px;">Other Income Miscellaneous</a></div>
                                        </td>
                                        <td class="A54VNK-S-a A54VNK-S-c A54VNK-S-n" align="right">
                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-3405">
                                                <div class="text-right"><span class="">Tk0.00</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody style="display: none;">
                                    <tr>
                                        <td align="center" colspan="2">
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
