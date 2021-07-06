<template>
    <form @submit.prevent="createSaleorder">
        <div class="right-content form1">

            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a" data-id="eaf59416-1dc1-4844-a76b-f22ed8dd0971">
                    <div class="page-panel panel-default page-right-content">
                        <div>
                            <div class="panel-body page-panel-body">
                                <div data-id="v192168000202_1058535787375_3088">
                                    <div data-id="v192168000062_1318947684325_654">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div data-id="v192168000062_1318947716793_655">
                                                        <div>
                                                            <div class="form-horizontal">
                                                                <div class="form-group row" data-id="v192168000008_1062586813328_755">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Customer</label>
                                                                        <span class="text-danger bold">*</span>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="dropdown">
                                                                            <a class="A54VNK-pi-a" style="">
                                                                                <span class="picto-font">D</span>
                                                                            </a>
                                                                            <input type="text" class="form-control A54VNK-pi-d" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Customer name or code" aria-expanded="true">
                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                <li class="active">
                                                                                    <a class="ellipsis-block" role="button">customer.company_name</a>
                                                                                    <a class="ellipsis-block" role="button">customer.first_name customer.last_name</a>
                                                                                </li>
                                                                                <li class="active">
                                                                                    <a class="ellipsis-block" role="button">View all Leads and Customers</a>
                                                                                </li>
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" role="button">Create a Lead or Customer</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000004_1132068913109_1142">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Recipient</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="A54VNK-ni-a">
                                                                            <div class="select-panel A54VNK-ni-c">
                                                                                <select class="form-control" size="1">
                                                                                    <option value="0">None</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000004_1132068923531_1143">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Address</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <textarea class="form-control" rows="4" disabled="" style="resize: vertical; min-height: 50px;"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v010010010010_1249894205531_1038">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Currency</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="A54VNK-ni-a">
                                                                            <div class="select-panel A54VNK-ni-c">
                                                                                <select class="form-control" size="1">
                                                                                    <option>currency.exchange_currency</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div data-id="v192168000062_1318947754064_656">
                                                        <div>
                                                            <div class="form-horizontal">
                                                                <div class="form-group row" data-id="v192168000062_1318947796381_657">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Code</label>
                                                                        <span class="text-danger bold" aria-hidden="true">*</span>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="dropdown">
                                                                            <input type="text" class="form-control A54VNK-oi-b" autocomplete="off" placeholder="code">
                                                                        </div>
                                                                        <div class="error-panel"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000062_1318947796381_657">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">PO Number</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <input type="text" class="form-control A54VNK-oi-b" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000003_1092663879328_4429">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Date</label>
                                                                        <span class="text-danger bold">*</span>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="error-panel"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168001012_1418222522948_291">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Status</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="A54VNK-ni-a">
                                                                            <div class="select-panel A54VNK-ni-c">
                                                                                <select class="form-control" size="1">
                                                                                    <option value="3">Lost</option>
                                                                                    <option value="1">Open</option>
                                                                                    <option value="2">Won</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000003_1092663881578_4430">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Delivery Date</label>
                                                                        <span class="text-danger bold">*</span></div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="error-panel"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000062_1318947796381_657">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Payment Terms</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="dropdown">
                                                                            <input type="text" class="form-control A54VNK-oi-b" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Search results">
                                                                            <ul class="dropdown-menu A54VNK-oi-a">
                                                                                <li class="active"><a class="ellipsis-block" role="button" title="Due on receipt"><strong>Due</strong> <strong>on</strong> <strong>receipt</strong></a></li>
                                                                                <li class="divider"></li>
                                                                                <li class=""><a class="ellipsis-block" role="button">Start the search</a></li>
                                                                                <li class=""><a class="ellipsis-block" role="button">Create a new...</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="v192168000062_1318948822365_259">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div data-id="v192168000062_1318948822365_260">
                                                        <div>
                                                            <div>
                                                                <table __gwtcellbasedwidgetimpldispatchingfocus="true" __gwtcellbasedwidgetimpldispatchingblur="true" class="A54VNK-Ff-y table table-hover table-link A54VNK-Ff-z empty" cellspacing="0" style="table-layout: fixed;">
                                                                    <colgroup>
                                                                        <col style="width: 15%;">
                                                                        <col style="width: 25%;">
                                                                        <col style="width: 80%;">
                                                                        <col style="width: 20%;">
                                                                        <col style="width: 25%;">
                                                                        <col style="width: 20%;">
                                                                        <col style="width: 30%;">
                                                                        <col style="width: 25%;">
                                                                    </colgroup>
                                                                    <thead>
                                                                        <tr __gwt_header_row="0">
                                                                            <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-f" __gwt_column="column-gwt-uid-687" __gwt_header="header-gwt-uid-688">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="" data-toggle="tooltip"></span>
                                                                                    <span class="header-normal"></span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-689" __gwt_header="header-gwt-uid-690">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="" data-toggle="tooltip"></span>
                                                                                    <span class="header-normal"></span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-691" __gwt_header="header-gwt-uid-692">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Description" data-toggle="tooltip">Description</span>
                                                                                    <span class="header-normal">Description</span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-693" __gwt_header="header-gwt-uid-694">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Qty" data-toggle="tooltip">Qty</span>
                                                                                    <span class="header-normal">Qty</span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-695" __gwt_header="header-gwt-uid-696">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Price	" data-toggle="tooltip">Price </span>
                                                                                    <span class="header-normal">Price </span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-697" __gwt_header="header-gwt-uid-698">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Disc.%" data-toggle="tooltip">Disc.%</span>
                                                                                    <span class="header-normal">Disc.%</span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-699" __gwt_header="header-gwt-uid-700">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Total" data-toggle="tooltip">Total</span>
                                                                                    <span class="header-normal">Total</span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-p" __gwt_column="column-gwt-uid-701" __gwt_header="header-gwt-uid-702">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="VAT%" data-toggle="tooltip">VAT%</span>
                                                                                    <span class="header-normal">VAT%</span>
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="A54VNK-Ff-r">
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-d">
                                                                                <div style="outline-style:none;" data-row="1" data-column="0" __gwt_cell="cell-gwt-uid-1671">4654</div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;" data-row="1" data-column="1" __gwt_cell="cell-gwt-uid-1672">4654</div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;" data-row="1" data-column="2" __gwt_cell="cell-gwt-uid-1673">
                                                                                    <textarea class="form-control" rows="1"></textarea>
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;" data-row="1" data-column="3" __gwt_cell="cell-gwt-uid-1674">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;" data-row="1" data-column="4" __gwt_cell="cell-gwt-uid-1675">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;" data-row="1" data-column="5" __gwt_cell="cell-gwt-uid-1676">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-A">
                                                                                <div style="outline-style:none;" data-row="1" data-column="6" __gwt_cell="cell-gwt-uid-1677">4654</div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-n">
                                                                                <div style="outline-style:none;" data-row="1" data-column="7" __gwt_cell="cell-gwt-uid-1678">
                                                                                    <div class="dropdown">
                                                                                        <input type="text" class="form-control A54VNK-Yj-b" placeholder="Search results" data-toggle="dropdown" autocomplete="off">
                                                                                        <ul class="dropdown-menu A54VNK-Yj-a">
                                                                                            <li class="">
                                                                                                <a class="ellipsis-block" role="button">0.0% Vat</a>
                                                                                            </li>
                                                                                            <li class="">
                                                                                                <a class="ellipsis-block" role="button">65</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" colspan="8">
                                                                                <div>
                                                                                    <div style="width: 100%; height: 100%; padding: 0px; margin: 0px;">
                                                                                        <div style="width: 100%; height: 100%;">
                                                                                            <div class="text-muted text-left">No items to show</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                                                                        <div aria-hidden="true" class="A54VNK-Ff-q" style="width: 100%; height: 100%; display: none;">
                                                                                            <div class="text-muted text-left">Loading data...</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="btn-toolbar A54VNK-Ki-a">
                                                            <button type="button" class="btn btn-default mt-2">
                                                                <span class="picto-font">s</span> Add Product or Service
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="v192168000062_1318949042895_726">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div data-id="v192168000062_1318949073030_727">
                                                        <div>
                                                            <div class="form-horizontal">
                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v127000000001_1207917415562_4228">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Document Note</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <textarea class="form-control" rows="3" style="resize: vertical; min-height: 50px;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div data-id="v192168000062_1318949125058_728">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949145442_729">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000004_1132069060421_1261">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Subtotal</label>

                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <input type="text" class="form-control" disabled="" style="text-align: right;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949147432_730">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000004_1132072382765_3207">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Discount Rate</label>

                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <input type="text" class="form-control" style="text-align: right;">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000049_1355758531107_700">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Discount Amount</label>

                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <input type="text" class="form-control" disabled="" style="text-align: right;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000049_1355822389822_3526">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000004_1132069060421_1269">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">VAT</label>

                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <input type="text" class="form-control" disabled="" style="text-align: right;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949149518_731">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000004_1132069060421_1270">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Total</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <input type="text" class="form-control" disabled="" style="text-align: right;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse" href="#gwt-uid-637">Advanced</a>
                                            <div class="panel-collapse collapse" id="gwt-uid-637">
                                                <div class="panel-body">
                                                    <div data-id="v192168000062_1318949310448_732">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949338860_733">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row"style="margin-bottom: 15px !important;" data-id="v010010010010_1247057509118_255">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Delivery Contact</label></div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a" style="">
                                                                                                <span class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text" class="form-control A54VNK-pi-d" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Contact name">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled"><a> No result </a></li>
                                                                                                <li class="divider"></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row"style="margin-bottom: 15px !important;" data-id="v010010010010_1247057514555_256">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Delivery Address</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a" style="">
                                                                                                <span class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text" class="form-control A54VNK-pi-d" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Contact address">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled"><a> No result </a></li>
                                                                                                <li class="divider"></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949340324_734">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row"style="margin-bottom: 15px !important;" data-id="v192168001109_1309274770885_3348">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Project</label>

                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a" style="">
                                                                                                <span class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text" class="form-control A54VNK-pi-d" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Project name">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled"><a> No result </a></li>
                                                                                                <li class="divider"></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949340324_734">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row"style="margin-bottom: 15px !important;" data-id="v192168001109_1309274770885_3348">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Assigned To</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a" style="">
                                                                                                <span class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text" class="form-control A54VNK-pi-d" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Assigned To">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled"><a> No result </a></li>
                                                                                                <li class="divider"></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949343613_736">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row"style="margin-bottom: 15px !important;" data-id="v192168000003_1092669209984_8401">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Private Note</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <textarea class="form-control" rows="3" style="resize: vertical; min-height: 50px;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <new-footer type="basic"/>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'

    export default {
        components: {
            NewFooter,
        },
        name: 'Saleorder',
        data: function () {
            return {
                loaded: false,
                form: new Form({
                    "id": "",
                    "customer": "",
                    "code": "",
                    "recipient": "",
                    "po_number": "",
                    "address": "",
                    "date": "",
                    "status": "",
                    "currency": "",
                    "delivery_date": "",
                    "payment_terms": "",
                    "document_note": "",
                    "subtotal": "",
                    "discount_rate": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "project": "",
                    "assigned_to": "",
                    "private_note": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getSaleorder();
        },
        methods: {
            getSaleorder: function (Saleorder) {

                var that = this;
                this.form.get('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.loaded = true;
                });

            },
            createSaleorder(){
                this.form.post('/api/dashboard/brands/add-brands').then(() => {
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.replace({name: 'customerLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },
            updateSaleorder: function () {

                var that = this;
                this.form.put('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                })

            },
            deleteSaleorder: function () {

                var that = this;
                this.form.delete('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/saleorders');
                })

            }
        }
    }
</script>
