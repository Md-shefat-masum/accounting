<template>
    <!-- form section -->

    <form @submit.prevent="updateInvoice">
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
                                                                            <input type="text"
                                                                                   class="form-control A54VNK-pi-d"
                                                                                   data-toggle="dropdown"
                                                                                   autocomplete="off" role="button"
                                                                                   placeholder="Customer name"
                                                                                   v-model="form.customer"
                                                                                   aria-expanded="true">
                                                                            <ul class="dropdown-menu A54VNK-pi-c">
<!--                                                                                <li class="active">-->
<!--                                                                                    <a class="ellipsis-block" role="button">customer.company_name</a>-->
<!--                                                                                    <a class="ellipsis-block" role="button">customer.last_name</a>-->
<!--                                                                                </li>-->
                                                                                <li class="active">
                                                                                    <a class="ellipsis-block" role="button" data-toggle="modal" data-target="#listOfCustomerOrLeadModal">View all Leads and Customers</a>
                                                                                </li>
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" role="button" data-toggle="modal" data-target="#addCustomerOrLeadModal">Create a Lead or Customer</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="error-panel"></div>
                                                                    </div>
                                                                </div>

                                                                <!-- addCustomerOrLeadModal Modal -->
                                                                <div class="modal fade" id="addCustomerOrLeadModal" tabindex="-1" aria-labelledby="addCustomerOrLeadModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="addCustomerOrLeadModalLabel">New Lead or Customer</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <addCustomerOrLead
                                                                                    :key="customer_list_random_number"
                                                                                    :getCustomerRecipent="getCustomerRecipent"
                                                                                    :getCustomerNameId="getCustomerNameId">
                                                                                </addCustomerOrLead>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- listOfCustomerOrLeadModal Modal -->
                                                                <div class="modal fade" id="listOfCustomerOrLeadModal" tabindex="-1" aria-labelledby="listOfCustomerOrLeadModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="listOfCustomerOrLeadModalLabel">Customers List</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <listOfCustomerOrLeadVue
                                                                                    :getCustomerRecipent="getCustomerRecipent"
                                                                                    :getCustomerNameId="getCustomerNameId">
                                                                                </listOfCustomerOrLeadVue>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row" data-id="v192168000004_1132068913109_1142">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Recipient</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                         <div class="dropdown">
                                                                            <a class="A54VNK-pi-a"
                                                                                style="">
                                                                                <span
                                                                                    class="picto-font">D</span>
                                                                            </a>
                                                                            <input type="text"
                                                                                    class="form-control A54VNK-pi-d"
                                                                                    data-toggle="dropdown"
                                                                                    autocomplete="off"
                                                                                    role="button"
                                                                                    v-model="form.recipient"
                                                                                    placeholder="Contact name">
                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                <li class="disabled" v-for="recipient in recipients" :key="recipient.id">
                                                                                    <span @click="form.recipient = (recipient.first_name+' '+recipient.last_name)" class="d-block" style="cursor:pointer">
                                                                                        {{recipient.first_name+' '+recipient.last_name}}
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row" data-id="v192168000004_1132068923531_1143">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Address</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <textarea class="form-control" rows="4" v-model="form.address"
                                                                            disabled=""
                                                                            style="resize: vertical; min-height: 50px;"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row"
                                                                     data-id="v010010010010_1249894205531_1038">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Currency</label>
                                                                    </div>
                                                                    <div class="col-sm-4 col-4">
                                                                        <div class="A54VNK-ni-a">
                                                                            <div class="select-panel A54VNK-ni-c">
                                                                                <select class="form-control"
                                                                                        size="1"
                                                                                        v-model="form.currency"
                                                                                        name="currency">
                                                                                    <option value="tk">TK</option>
                                                                                    <option value="usd">USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-4" v-if="form.currency=='USD'">
                                                                        <div class="A54VNK-ni-a">
                                                                            <input type="text"
                                                                                class="form-control A54VNK-pi-d"
                                                                                placeholder="currency rate"
                                                                                v-model="form.currency_rate"
                                                                                aria-expanded="true">
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
                                                                            <input v-model="form.code" type="text"
                                                                                class="form-control A54VNK-oi-b" autocomplete="off" placeholder="code">
                                                                        </div>
                                                                        <div class="error-panel"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000062_1318947796381_657">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">PO Number</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="dropdown">
                                                                            <input type="text" v-model="form.po_number"
                                                                                class="form-control A54VNK-oi-b" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000003_1092663879328_4429">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Date</label>
                                                                        <span class="text-danger bold">*</span>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="input-group">
                                                                            <input type="date" v-model="form.date" class="form-control">
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
                                                                            <input type="text"
                                                                                   class="form-control A54VNK-oi-b"
                                                                                   data-toggle="dropdown"
                                                                                   autocomplete="off" role="button"
                                                                                   v-model="form.payment_terms"
                                                                                   placeholder="Select">
                                                                            <ul class="dropdown-menu A54VNK-oi-a">
                                                                                <li class="active">
                                                                                    <a class="ellipsis-block" @click="form.payment_terms = 'At 30 days'" role="button">At 30 days</a>
                                                                                </li>
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" @click="form.payment_terms = 'At 90 days'" role="button">At 90 days</a>
                                                                                </li>
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" @click="form.payment_terms = 'Due on receipt'" role="button">Due on receipt</a>
                                                                                </li>
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" @click="form.payment_terms = 'In three installments'" role="button">In three installments</a>
                                                                                </li>
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" @click="form.payment_terms = 'In two installments'" role="button">In two installments</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" data-id="v192168000062_1318947796381_657">
                                                                    <div class="col-sm-4 col-4 control-label">
                                                                        <label class="" style="font-weight: normal;">Delivery Notes</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-8">
                                                                        <div class="dropdown">
                                                                            <textarea class="form-control" rows="4" v-model="form.delivery_notes"
                                                                            style="resize: vertical; min-height: 50px;"></textarea>
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

                                    <!-- sales status -->
                                    <salesStatusVue :sales_logs="sales_logs"></salesStatusVue>

                                    <div data-id="v192168000062_1318948822365_259">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" @click="toggleProductServiceOrExpense('porduct_service')" data-toggle="tab"
                                                                href="#"
                                                                aria-selected="true">Product and Services</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" @click="toggleProductServiceOrExpense('expense')" data-toggle="tab"
                                                                href="#"
                                                                aria-selected="false">Expenses</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div data-id="v192168000062_1318948822365_260">
                                                        <div>
                                                            <div>
                                                                <table class="A54VNK-Ff-y table table-hover table-link A54VNK-Ff-z empty" cellspacing="0" style="table-layout: fixed;">
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
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="" data-toggle="tooltip">Code</span>
                                                                                    <span class="header-normal">Code</span>
                                                                                </div>
                                                                            </th>
                                                                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-689" __gwt_header="header-gwt-uid-690">
                                                                                <div>
                                                                                    <span class="ellipsis ellipsis-block header-small" data-title="" data-toggle="tooltip">Name</span>
                                                                                    <span class="header-normal">Name</span>
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
                                                                    <tbody v-if="selected_products">
                                                                        <tr @click="product_selected_row(selected_product.id,$event)" class="A54VNK-Ff-r product_seleted_row" v-for="selected_product in selected_products" :key="selected_product.id">
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-d">
                                                                                <div style="outline-style:none;"
                                                                                     data-row="1" data-column="0">
                                                                                     {{ selected_product.code }}

                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;"
                                                                                    data-row="1" data-column="1">
                                                                                    {{ selected_product.name }}
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;" data-row="1" data-column="2">
                                                                                    <textarea class="form-control" rows="1" v-model="selected_product.description"></textarea>
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;"
                                                                                     data-row="1" data-column="3">
                                                                                    <input type="text" @keyup="calculateTotal()" v-model="selected_product.qty" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;"
                                                                                     data-row="1" data-column="4">
                                                                                    <input type="text" v-model="selected_product.sales_price" @keyup="calculateTotal(selected_product.id)" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                                                                <div style="outline-style:none;"
                                                                                     data-row="1" data-column="5">
                                                                                    <input type="text" v-model="selected_product.disc" @keyup="calculateTotal(selected_product.id)" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-A" style="padding-top: 8px;">
                                                                                <div style="outline-style:none;"
                                                                                     data-row="1" data-column="6">
                                                                                    <input type="text" v-model="selected_product.total_price" class="form-control">
                                                                                </div>
                                                                            </td>
                                                                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-n">
                                                                                <div style="outline-style:none;"
                                                                                     data-row="1" data-column="7">
                                                                                    <div class="dropdown">
                                                                                        <input type="text"
                                                                                               class="form-control A54VNK-Yj-b"
                                                                                               placeholder="select"
                                                                                               data-toggle="dropdown"
                                                                                               v-model="selected_product.vat_on_sales"
                                                                                               autocomplete="off">
                                                                                        <ul class="dropdown-menu A54VNK-Yj-a">
                                                                                            <li class="">
                                                                                                <a class="ellipsis-block"
                                                                                                   role="button" @click="calculate_vat(0,selected_product.id)">0.0% Exempt (Collected)</a>
                                                                                            </li>
                                                                                            <li class="">
                                                                                                <a class="ellipsis-block"
                                                                                                   role="button" @click="calculate_vat(0,selected_product.id)">0.0% Zero-rated (Collected)</a>
                                                                                            </li>
                                                                                            <li class="">
                                                                                                <a class="ellipsis-block"
                                                                                                   role="button" @click="calculate_vat(20,selected_product.id)">20.0% Standard rate (Collected)</a>
                                                                                            </li>
                                                                                            <li class="">
                                                                                                <a class="ellipsis-block"
                                                                                                   role="button" @click="calculate_vat(5,selected_product.id)">5.0% Lower rate (Collected)</a>
                                                                                            </li>
                                                                                            <!-- <li class="">
                                                                                                <a class="ellipsis-block"
                                                                                                   role="button">tax.tax_rate%
                                                                                                                 tax.tax_name</a>
                                                                                            </li> -->
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tbody v-else>
                                                                        <tr>
                                                                            <td align="center" colspan="9">
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
                                                            <button type="button" data-toggle="modal"
                                                                @click="productListRender()"
                                                                data-target="#addProductOrService" class="btn btn-default mt-2">
                                                                <span class="picto-font">s</span> Add Product or Service
                                                            </button>
                                                            <button type="button" @click="removeProductFormList()" class="btn btn-default ml-2 mt-2">
                                                                <span class="picto-font">-</span> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- addProductOrService Modal -->
                                    <div class="modal fade" id="addProductOrService" tabindex="-1" aria-labelledby="addProductOrServiceLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addProductOrServiceLabel">Product List</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <listOfProductOrServiceVue :key="product_random_number" :selected_products="selected_products" :resetSelectedProductList="resetSelectedProductList"></listOfProductOrServiceVue>
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
                                                                        <textarea class="form-control"
                                                                            rows="3"
                                                                            v-model="form.document_note"
                                                                            style="resize: vertical; min-height: 50px;"></textarea>
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
                                                                                        <input type="text" class="form-control"
                                                                                            disabled=""
                                                                                            v-model="form.subtotal"
                                                                                            style="text-align: right;">
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
                                                                                        <input type="text"
                                                                                            v-model="form.discount_rate"
                                                                                            @keyup="calculateTotal()"
                                                                                            class="form-control"
                                                                                            style="text-align: right;">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000049_1355758531107_700">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">Discount Amount</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <input type="text" class="form-control"
                                                                                            disabled=""
                                                                                            v-model="form.discount_amount"
                                                                                            style="text-align: right;">
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
                                                                                        <input type="text" class="form-control"
                                                                                            disabled=""
                                                                                            v-model="form.vat"
                                                                                            style="text-align: right;">
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
                                                                                        <input type="text" class="form-control"
                                                                                            disabled=""
                                                                                            v-model="form.total"
                                                                                            style="text-align: right;">
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
                                            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse"
                                               href="#gwt-uid-637">Advanced</a>
                                            <div class="panel-collapse collapse" id="gwt-uid-637">
                                                <div class="panel-body">
                                                    <div data-id="v192168000062_1318949310448_732">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div data-id="v192168000062_1318949338860_733">
                                                                        <div>
                                                                            <div class="form-horizontal">
                                                                                <div class="form-group row"
                                                                                     style="margin-bottom: 15px !important;"
                                                                                     data-id="v010010010010_1247057509118_255">
                                                                                    <div
                                                                                        class="col-sm-4 col-4 control-label">
                                                                                        <label class=""
                                                                                               style="font-weight: normal;">
                                                                                               Delivery Date</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="input-group">
                                                                                            <input type="date" v-model="form.delivery_date" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row"
                                                                                     style="margin-bottom: 15px !important;"
                                                                                     data-id="v010010010010_1247057509118_255">
                                                                                    <div
                                                                                        class="col-sm-4 col-4 control-label">
                                                                                        <label class=""
                                                                                               style="font-weight: normal;">Delivery
                                                                                                                            Contact</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a"
                                                                                               style="">
                                                                                                <span
                                                                                                    class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text"
                                                                                                   class="form-control A54VNK-pi-d"
                                                                                                   data-toggle="dropdown"
                                                                                                   autocomplete="off"
                                                                                                   role="button"
                                                                                                   v-model="form.delivery_contact"
                                                                                                   placeholder="Contact name">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled" v-for="contact in customer_contacts" :key="contact.id">
                                                                                                    <span @click="form.delivery_contact = contact.first_name+' '+contact.last_name" class="d-block" style="cursor:pointer">
                                                                                                        {{contact.first_name+' '+contact.last_name}}
                                                                                                    </span>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row"
                                                                                     style="margin-bottom: 15px !important;"
                                                                                     data-id="v010010010010_1247057514555_256">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">
                                                                                            Delivery address
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a"
                                                                                               style="">
                                                                                                <span
                                                                                                    class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text"
                                                                                                   class="form-control A54VNK-pi-d"
                                                                                                   data-toggle="dropdown"
                                                                                                   autocomplete="off"
                                                                                                   v-model="form.delivery_address"
                                                                                                   role="button"
                                                                                                   placeholder="Contact address">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled" v-for="address in customer_delivery_addresses" :key="address.id">
                                                                                                    <span @click="form.delivery_address = (address.address+', '+(address.line2||'')+' '+(address.city||'')+' '+(address.zip_code||'')+' '+(address.country||''))" class="d-block" style="cursor:pointer">
                                                                                                        {{address.address+', '+(address.line2||'')+', '+(address.city||'')+', '+(address.zip_code||'')+', '+(address.country||'')}}
                                                                                                    </span>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row"
                                                                                     style="margin-bottom: 15px !important;"
                                                                                     data-id="v010010010010_1247057514555_256">
                                                                                    <div class="col-sm-4 col-4 control-label">
                                                                                        <label class="" style="font-weight: normal;">
                                                                                            Phone Number
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a"
                                                                                               style="">
                                                                                                <span
                                                                                                    class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text"
                                                                                                   class="form-control A54VNK-pi-d"
                                                                                                   data-toggle="dropdown"
                                                                                                   autocomplete="off"
                                                                                                   v-model="form.po_number"
                                                                                                   role="button"
                                                                                                   placeholder="Phone Number">
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
                                                                                <div class="form-group row"
                                                                                     style="margin-bottom: 15px !important;"
                                                                                     data-id="v192168001109_1309274770885_3348">
                                                                                    <div
                                                                                        class="col-sm-4 col-4 control-label">
                                                                                        <label class=""
                                                                                               style="font-weight: normal;">Project</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <div class="dropdown">
                                                                                            <a class="A54VNK-pi-a"
                                                                                               style="">
                                                                                                <span
                                                                                                    class="picto-font">D</span>
                                                                                            </a>
                                                                                            <input type="text"
                                                                                                   class="form-control A54VNK-pi-d"
                                                                                                   data-toggle="dropdown"
                                                                                                   autocomplete="off"
                                                                                                   v-model="form.project"
                                                                                                   role="button"
                                                                                                   placeholder="Project name">
                                                                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                                                                <li class="disabled" v-for="project in projects" :key="project.id">
                                                                                                    <a @click="form.project = project.name"> {{ project.name }}</a>
                                                                                                </li>
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
                                                                                <div class="form-group row"
                                                                                     style="margin-bottom: 15px !important;"
                                                                                     data-id="v192168000003_1092669209984_8401">
                                                                                    <div
                                                                                        class="col-sm-4 col-4 control-label">
                                                                                        <label class=""
                                                                                               style="font-weight: normal;">Private
                                                                                                                            Note</label>
                                                                                    </div>
                                                                                    <div class="col-sm-8 col-8">
                                                                                        <textarea class="form-control"
                                                                                                  rows="3"
                                                                                                  v-model="form.private_note"
                                                                                                  style="resize: vertical; min-height: 50px;"></textarea>
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
                                     <hr>
                                    <div class="row">
                                        <div class="col-sm-12 A54VNK-qi-c">
                                            <label><b>Attachments</b></label>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row A54VNK-qi-a" id="dvPreview">
                                                <div class="col-12 col-sm-4 col-md-3 A54VNK-kh-b" v-for="(file, m) in form.files" :key="m">
                                                    <div class="A54VNK-kh-a">
                                                        <div class="A54VNK-kh-g">
                                                            <img class="img-responsive" :src="form.files[m].image">
                                                        </div>
                                                        <div class="A54VNK-kh-e">
                                                            <div class="ellipsis-block A54VNK-kh-f bolder">{{ form.files[m].name }}</div>
                                                        </div>
                                                    </div>
                                                    <button @click="removeFile(m, file)" type="button" class="A54VNK-kh-c" title="Delete">×</button>
                                                </div>
                                            </div>

                                            <div class="A54VNK-Ri-b">
                                                <div class="A54VNK-Ri-e">
                                                    <div class="picto-font A54VNK-Ri-d drap_mob_none"></div>
                                                    <div class="drap_mob_none"> Drag files to attach , or </div>
                                                    <label for="upload-photo" class="btn btn-link A54VNK-Ri-a" style="margin-bottom: 0;padding-top: 6px;padding-left: 0;padding-bottom: 0;text-transform: capitalize;">Browse files from your device</label>
                                                </div>
                                                <div class="text-muted A54VNK-Ri-c"> or </div>
                                                <label class="btn btn-default" for="upload-photo" style="margin-bottom: 0;text-transform: capitalize;font-weight: 400;">Browse uploaded files</label>
                                                <input @change="addFile" type="file" name="photo" id="upload-photo" multiple="multiple" style='opacity: 0;position: absolute;z-index: -1;' />
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
    import addCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue'
    import listOfCustomerOrLeadVue from '../../modal_contents/listOfCustomerOrLead.vue'
    import listOfProductOrServiceVue from '../../modal_contents/listOfProductOrService.vue'
    import salesStatusVue from '../components/sales_status.vue'

    export default {
        components: {
            NewFooter,
            addCustomerOrLead,
            listOfCustomerOrLeadVue,
            listOfProductOrServiceVue,
            salesStatusVue,
        },
        name: 'Invoice',
        data: function () {
            return {
                loaded: false,
                selected_products: [],
                today_date: '',
                vat_on_sales: '',
                product_selected_row_id: '',
                customer_list_random_number: 0,
                product_random_number: 0,

                errors:[],
                recipients: [],
                customer_contacts:[],
                customer_delivery_addresses:[],
                customer_sale_receipts:[],
                projects:[],

                sales_logs: [],

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "recipient": "",
                    "address": "",
                    "currency": "",
                    "exchange_rate": "",
                    "code": "",
                    "po_number": "",
                    "date": "",
                    "payment_terms": "",
                    "is_product_and_service": true,
                    "is_expense": false,
                    "is_upload": "",
                    "deposit_to": "",
                    "product": "",
                    "document_note": "",
                    "sub_total": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_date": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_notes": "",
                    "project": "",
                    "delivery_phone_number": "",
                    "assigned_to": "",
                    "private_note": "",
                    "attachments": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getInvoice();
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            this.today_date =  yyyy+'-'+ mm +'-'+dd ;
            this.form.date = this.today_date;
        },
        methods: {
            getInvoice: function (Invoice) {
                var that = this;
                this.form.get('/api/invoices/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data.invoice);
                    that.form.selected_products = response.data.selected_products;
                    that.selected_products = response.data.selected_products;
                    that.calculateTotal();
                    that.loaded = true;

                    that.sales_logs = response.data.invoice.sales_log;

                    setTimeout(() => {
                        that.get_customer_data(response.data.invoice.customer_id);
                    }, 2000);
                });
            },
            get_customer_data:function(id){
                axios.get('/api/customers/'+id)
                    .then((res)=>{
                        this.customer_contacts = res.data.contacts;
                        this.recipients = res.data.contacts;
                        this.customer_delivery_addresses = res.data.delivery_address;
                        this.customer_sale_receipts = res.data.sale_receipts;
                        this.projects = res.data.projects;
                    })
            },
            updateInvoice: function () {
                this.form.selected_products = this.selected_products;
                this.form.invoice_no = this.form.code;
                this.form.payment_date = this.set_payment_terms(this.form.payment_terms);

                var that = this;
                this.form.put('/api/invoices/' + this.$route.params.id).then(function (response) {
                    that.getInvoice(response.data.invoice);
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                })

            },
            set_payment_terms: function(term){
                if(term == 'At 30 days'){
                    var d = new Date();
                    d.setDate(d.getDate() + 30);
                    return d.toISOString().split('T')[0];

                }else if(term == 'At 90 days'){
                    var d = new Date();
                    d.setDate(d.getDate() + 90);
                    return d.toISOString().split('T')[0];
                }else if(term == 'Due on receipt'){
                    var d = new Date();
                    d.setDate(d.getDate() + 0);
                    return d.toISOString().split('T')[0];
                }else if(term == 'In two installments'){
                    var d = new Date();
                    d.setDate(d.getDate() + 0);
                    return d.toISOString().split('T')[0];
                }else if(term == 'In three installments'){
                    var d = new Date();
                    d.setDate(d.getDate() + 0);
                    return d.toISOString().split('T')[0];
                }else{
                    // return today
                    var d = new Date();
                    d.setDate(d.getDate() + 0);
                    return d.toISOString().split('T')[0];
                }
            },
            addFile(e){
                let file = e.target.files;
                var i;
                for (i = 0; i < file.length; i++) {
                    var file_name = file[i].name;

                    let reader = new FileReader();

                    reader.onloadend = (file) => {
                        this.form.files.push({
                            image: reader.result,
                            file: '',
                            name: file_name,
                        });
                    }
                    reader.readAsDataURL(file[i]);
                }
            },
            removeFile(m, file){
                if (m > -1) {
                    this.form.files.splice(m, 1);
                }
            },
            getCustomerNameId: function(name, id, address){
                this.form.customer = name;
                this.form.id = id;
                this.form.customer_id = id;
                this.form.address = address;
                this.get_customer_data(id);
            },
            getCustomerRecipent: function(recipient){
                this.recipients = recipient;
            },
            resetSelectedProductList: function(products){
                this.selected_products = products;
                this.calculateTotal();
            },
            toggleProductServiceOrExpense: function(type){
                if(type == 'porduct_service'){
                    this.form.is_product_and_service = true;
                    this.form.is_expense = false;
                }
                if(type == 'expense'){
                    this.form.is_product_and_service = false;
                    this.form.is_expense = true;
                }
            },
            calculate_vat: function(vatValue, product_id){

                let key = this.selected_products.findIndex(function(item){
                    return item.id == product_id;
                });

                let element = this.selected_products[key];

                element.vat_on_sales = vatValue;
                this.calculateTotal();
            },
            calculateTotal: function(){
                let subtotal = 0;
                let discount_rate = this.form.discount_rate;
                let discount_amount = this.form.discount_amount;
                let vat = 0;
                let total = 0;

                for (const key in this.selected_products) {
                    if (Object.hasOwnProperty.call(this.selected_products, key)) {
                        const element = this.selected_products[key];

                        let sales_price = element.sales_price;
                        element.total_price = sales_price*element.qty;

                        // console.log(element.qty, element.sales_price , element.total_price);

                        let disc = element.disc;
                        if(disc > 0){
                            let dis = disc / 100;
                            sales_price = sales_price - ( sales_price * dis );
                            sales_price = sales_price.toFixed(2);
                            element.total_price = sales_price*element.qty;
                        }

                        subtotal += parseFloat(element.total_price);

                        if(element.vat_on_sales > 0){
                            vat += (element.sales_price / 100) * (element.vat_on_sales+100);
                        }
                    }
                }

                this.form.subtotal = subtotal;
                if(discount_rate > 0){
                    let dis = discount_rate / 100;
                    discount_amount = subtotal - ( subtotal * dis );
                    discount_amount = discount_amount.toFixed(2);
                }else{
                   discount_amount = 0;
                }
                total = subtotal - discount_amount + vat;
                this.form.discount_rate = discount_rate;
                this.form.discount_amount = discount_amount;
                this.form.vat = vat;
                this.form.total = total;
            },
            product_selected_row: function(product_id,event){
                this.product_selected_row_id = product_id;
                $(event.target).parents('tr').siblings('tr').removeClass('product_row_active');
                $(event.target).parents('tr').addClass('product_row_active');
            },
            removeProductFormList: function(){
                let product_id = this.product_selected_row_id;
                let elements = this.selected_products.filter(function(item){
                    return item.id != product_id;
                });
                this.selected_products = elements;
                this.calculateTotal();
            },
            customerListRender: function(){
                this.customer_list_random_number++;
            },
            productListRender: function(){
                this.product_random_number++;
            },
        }
    }
</script>
