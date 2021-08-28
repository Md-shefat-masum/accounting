<template>
    <!-- form section -->
    <div>
        <sub-header></sub-header>

        <section class="content content-menu content_setting">
            <div class="container-fluid" style="padding-bottom: 100px;">
                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row" style="justify-content:center;">
                        <div class="col-md-10">
                            <div class="card" style="margin-bottom: 13px; padding-top: 30px;">
                                <div class="body">
                                    <div class="A54VNK-Mc-e">
                                        <div class="row">
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Company Information</div>
                                                </h4>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Company Name</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.company" class="form-control" id="gwt-uid-137" />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Logo</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <form action="" name="logo_pic_form" id="logo_pic_form">
                                                            <input type="file" @change="upload_logo" name="logo_image" class="form-control form-component" autocomplete="off" />
                                                            <img :src="'/'+this.get_auth_user_info.logo" alt="" style="height: 40px;margin: 10px;">
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Address</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="address.line1" class="form-control" placeholder="line-1" />
                                                        <input type="text" v-model="address.line2" class="form-control" placeholder="line-2" />
                                                        <input type="text" v-model="address.line3" class="form-control" placeholder="line-3" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">City</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.city" class="form-control" placeholder="city" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">State</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input v-model="form.state" type="text" class="form-control" placeholder="state" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Zip code</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.zip" class="form-control" placeholder="Zip code" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Country</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <!-- <input type="text" v-model="form.country" class="form-control" placeholder="Country" /> -->
                                                        <select v-model="form.country" class="form-control">
                                                            <option :value="country.name" v-for="country in get_countries" :key="country.id">{{ country.name }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Mobile</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.mobile" class="form-control" placeholder="Mobile Number" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Phone</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.phone" class="form-control" placeholder="Phone" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Fax</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.fax" class="form-control" placeholder="Fax" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Email</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.company_email" class="form-control" placeholder="Email" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Website</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.website" class="form-control" placeholder="Website" />
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">EIN</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text"  v-model="form.ein" class="form-control" placeholder="EIN" />
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Sales Tax Number</label>

                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text"  v-model="form.sales_tax_number" class="form-control" placeholder="Sales Tax Number" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12">
                                                <h4 style="margin-bottom: 20px;">Document Settings</h4>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Document Language</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <!-- <input type="text" v-model="form.document_language" class="form-control" placeholder="Document Language" /> -->
                                                        <select v-model="form.document_language" class="form-control">
                                                            <!-- <option :value="country.name" v-for="country in get_countries" :key="country.id">{{ country.name }}</option> -->
                                                            <!-- <option value=""></option> -->
                                                            <option value="English (United States)">English (United States)</option>
                                                            <option value="Chinese">Chinese</option>
                                                            <option value="Croatian">Croatian</option>
                                                            <option value="Dutch">Dutch</option>
                                                            <option value="English (United Kingdom)">English (United Kingdom)</option>
                                                            <option value="French">French</option>
                                                            <option value="German">German</option>
                                                            <option value="Greek">Greek</option>
                                                            <option value="Icelandic">Icelandic</option>
                                                            <option value="Italian">Italian</option>
                                                            <option value="Polish">Polish</option>
                                                            <option value="Portuguese (Brazil)">Portuguese (Brazil)</option>
                                                            <option value="Romanian">Romanian</option>
                                                            <option value="Russian">Russian</option>
                                                            <option value="Slovenian">Slovenian</option>
                                                            <option value="Spanish (Latin America)">Spanish (Latin America)</option>
                                                            <option value="Spanish (Spain)">Spanish (Spain)</option>
                                                            <option value="Swedish">Swedish</option>
                                                            <option value="Turkish">Turkish</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Document Format</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <!-- <input type="text" v-model="form.document_format" class="form-control" placeholder="Document Format" /> -->
                                                        <select class="form-control" v-model="form.document_format" >
                                                            <option value="Letter">Letter</option>
                                                            <option value="A4">A4</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Document Templates</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" class="form-control" placeholder="Document Format" />
                                                    </div>
                                                </div> -->

                                            </div>

                                            <div class="col-12">
                                                <hr>

                                                <h4 style="margin-bottom: 20px;">sales Settings</h4>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Default Quote Expiration (days)</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.default_qoute_expiration_days" class="form-control" value="30" />
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Late payments penalties fees</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.late_payment_fees" class="form-control" value="0.00" />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Late payments penalties interest rate</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" v-model="form.late_payment_interest" class="form-control" value="0.00" />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Default SMS</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <textarea style="min-height: 120px;" name="default_sms" v-model="form.default_sms" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Cash Drawer Management</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="A54VNK-pe-b A54VNK-pe-d" style="width: 22%;">
                                                            <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.cash_drawer_management=='Yes' }" v-on:click="form.cash_drawer_management = 'Yes'" aria-pressed="true" style="text-transform: capitalize;">Yes</button>
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.cash_drawer_management=='No' }" v-on:click="form.cash_drawer_management = 'No'" aria-pressed="false" style="text-transform: capitalize;" >No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="col-12">
                                                <h4>Finance Settings</h4>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Accounting basis</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="A54VNK-pe-b A54VNK-pe-d" style="width: 22%;">
                                                            <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.accounting_basis=='Cash' }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.accounting_basis = 'Cash'">Cash</button>
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.accounting_basis=='Accural' }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.accounting_basis = 'Accural'">Accrual</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Tax Management</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="A54VNK-pe-b A54VNK-pe-d" style="width: 22%;">
                                                            <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.tax_management=='Yes' }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.tax_management = 'Yes'">Yes</button>
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.tax_management=='No' }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.tax_management = 'No'">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">Sales Tax Basis</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="A54VNK-pe-b A54VNK-pe-d" style="width: 22%;">
                                                            <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.sales_tax_basis=='Cash' }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.sales_tax_basis = 'Cash'">Cash</button>
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.sales_tax_basis=='Accural' }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.sales_tax_basis = 'Accural'">Accrual</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Track Customer/Vendor for Sales Receipt and Expenses
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="A54VNK-pe-b A54VNK-pe-d" style="width: 22%;">
                                                            <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.track_customer_vendor=='Yes' }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.track_customer_vendor = 'Yes'">Yes</button>
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.track_customer_vendor=='No' }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.track_customer_vendor = 'No'">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Working Period Start
                                                        </label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input v-model="form.working_period_start" type="date" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Working Period Emd
                                                        </label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input v-model="form.working_period_end" type="date" class="form-control" >
                                                    </div>
                                                </div>
                                                <hr>

                                            </div>

                                            <div class="col-12">
                                                <h4 style="margin-bottom: 20px;">Product and Service Settings</h4>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Pack Units for Sales and Purchases
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="A54VNK-pe-b A54VNK-pe-d" style="width: 22%;">
                                                            <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.pack_unit_for_sales=='Yes' }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.pack_unit_for_sales = 'Yes'">Yes</button>
                                                                <button type="button" class="btn btn-default" v-bind:class="{ active: form.pack_unit_for_sales=='No' }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.pack_unit_for_sales = 'No'">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Default Storage Location
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <!-- <input v-model="form.default_storage_location" type="text" class="form-control" > -->
                                                        <select v-model="form.default_storage_location" class="form-control">
                                                            <option value="main location">Main Location</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12" v-if="selected_numbering">
                                                <h4>Auto Numbering</h4>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Select an Object
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <!-- <input v-model="auto_numbering.select_object" type="text" class="form-control" > -->
                                                        <select v-if="selected_numbering" v-model="selected_numbering.name" @change="set_auto_numbering($event)" class="form-control">
                                                            <option :value="auto_numbering.name" v-for="(auto_numbering,index) in auto_numberings" :key="index">
                                                                {{ auto_numbering.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Prefix
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input v-model="selected_numbering.prefix" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="" style="font-weight: normal;">
                                                            Last Code Used
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input v-model="selected_numbering.code" type="text" class="form-control">
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
            <div class="navbar navbar-fixed-bottom navbar-custom A54VNK-be-c formfooter" type="basic">
                <div class="A54VNK-Vf-d">
                    <div class="A54VNK-Vf-e"></div>
                    <div class="btn-toolbar A54VNK-Vf-c">
                        <button type="button" class="btn btn-default btn-danger" style="line-height:0;">Cancel</button>
                        <form id="temp_form">
                            <input type="hidden" name="aliyen">
                        </form>
                        <button type="button"
                            @click.prevent="save_company_settings()"
                            class="btn btn-primary done_btn active">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>
<script>
import { mapActions, mapGetters } from 'vuex';
    import SubHeader from './sub_header'

    export default {
        components: {
            SubHeader,
        },

        name: 'CompanySettings',

        data: function () {
            return {
                form: new Form({
                    "id": "",
                    "is_company": true,
                    "company": '',
                    "address": '',
                    "city": '',
                    "state": '',
                    "zip": '',
                    "country": '',
                    "fax": '',
                    "company_email": '',
                    "ein": '',
                    "sales_tax_number": '',
                    "document_language": '',
                    "document_format": '',
                    "default_qoute_expiration_days": '',
                    "late_payment_fees": '',
                    "late_payment_interest": '',
                    "default_sms": '',
                    "cash_drawer_management": '',
                    "accounting_basis": '',
                    "tax_management": '',
                    "sales_tax_basis": '',
                    "track_customer_vendor": '',
                    "working_period_start": '',
                    "working_period_end": '',
                    "pack_unit_for_sales": '',
                    "default_storage_location": '',
                    "auto_numbering": '',
                }),
                auto_numberings:[
                    {
                        name: 'Customer',
                        prefix: 'CUS-',
                        code: '000',
                    },
                    {
                        name: 'Employee',
                        prefix: 'EMP-',
                        code: '000',
                    },
                    {
                        name: 'Quote',
                        prefix: 'QOT-',
                        code: '000',
                    },
                    {
                        name: 'Sales Order',
                        prefix: 'CORD-',
                        code: '000',
                    },
                    {
                        name: 'Delivery Note',
                        prefix: 'DEN-',
                        code: '000',
                    },
                    {
                        name: 'Invoice',
                        prefix: 'INV-',
                        code: '000',
                    },
                    {
                        name: 'Product or Service',
                        prefix: 'PRO-',
                        code: '000',
                    },
                    {
                        name: 'Sales Receipt',
                        prefix: 'IPAY-',
                        code: '000',
                    },
                    {
                        name: 'Bank Deposit',
                        prefix: 'BDP-',
                        code: '000',
                    },
                    {
                        name: 'Receiving Note',
                        prefix: 'REC-',
                        code: '000',
                    },
                    {
                        name: 'Accounting Transaction',
                        prefix: 'MVT-',
                        code: '000',
                    },
                    {
                        name: 'Bill',
                        prefix: 'VINV-',
                        code: '000',
                    },
                    {
                        name: 'Customer Credit Memo',
                        prefix: 'CCN-',
                        code: '000',
                    },
                    {
                        name: 'Expense',
                        prefix: 'OPAY-',
                        code: '000',
                    },
                    {
                        name: 'Inventory Entry',
                        prefix: 'SEF-',
                        code: '000',
                    },
                    {
                        name: 'Inventory Transfer',
                        prefix: 'STN-',
                        code: '000',
                    },
                    {
                        name: 'Inventory Withdrawal',
                        prefix: 'SRN-',
                        code: '000',
                    },
                    {
                        name: 'Picking List',
                        prefix: 'PICK-',
                        code: '000',
                    },
                    {
                        name: 'Purchase Order',
                        prefix: 'SORD-',
                        code: '000',
                    },
                    {
                        name: 'Vendor',
                        prefix: 'VEN-',
                        code: '000',
                    },
                    {
                        name: 'Vendor Credit Memo',
                        prefix: 'SCN-',
                        code: '000',
                    },
                    {
                        name: 'Vendor Quote',
                        prefix: 'SCN-',
                        code: '000',
                    },
                ],

                selected_numbering: {
                    name: '',
                    prefix: '',
                    code: '',
                },

                address: {
                    line1: '',
                    line2: '',
                    line3: '',
                },
                email: '',
                old_pass: '',
                new_pass: '',
                new_psss_confirmation: '',
            }
        },
        created: function () {
            // this.fetch_user_information();
            this.fetch_countries();

            this.form = this.get_auth_user_info;

            if(!this.get_auth_user_info.company_email){
                this.form.company_email = this.get_auth_user_info.email;
            }

            if(!this.get_auth_user_info.document_format){
                this.form.document_format = 'Letter';
            }

            if(!this.get_auth_user_info.document_language){
                this.form.document_language = 'English (United States)';
            }

            if(!this.get_auth_user_info.default_qoute_expiration_days){
                this.form.default_qoute_expiration_days = 30;
            }

            if(!this.get_auth_user_info.late_payment_fees){
                this.form.late_payment_fees = 0.00;
            }

            if(!this.get_auth_user_info.late_payment_interest){
                this.form.late_payment_interest = 0.00;
            }

            if(!this.get_auth_user_info.cash_drawer_management){
                this.form.cash_drawer_management = "No";
            }

            if(!this.get_auth_user_info.accounting_basis){
                this.form.accounting_basis = "Accural";
            }

            if(!this.get_auth_user_info.tax_management){
                this.form.tax_management = "No";
            }

            if(!this.get_auth_user_info.sales_tax_basis){
                this.form.sales_tax_basis = "Accural";
            }

            if(!this.get_auth_user_info.track_customer_vendor){
                this.form.track_customer_vendor = "No";
            }

            if(!this.get_auth_user_info.pack_unit_for_sales){
                this.form.pack_unit_for_sales = "No";
            }

            if(!this.get_auth_user_info.default_storage_location){
                this.form.default_storage_location = "main location";
            }

            if(!this.get_auth_user_info.working_period_start){
                this.form.working_period_start = new Date().getFullYear()+'-01-01';
            }

            if(!this.get_auth_user_info.working_period_end){
                this.form.working_period_end = new Date().getFullYear()+'-12-01';
            }

            if(this.get_auth_user_info.address_json.line1){
                this.address = this.get_auth_user_info.address_json;
            }

            if(this.get_auth_user_info.auto_numbering && this.get_auth_user_info.auto_numbering_json.length>0){
                this.auto_numberings = this.get_auth_user_info.auto_numbering_json;
            }

            this.selected_numbering = this.auto_numberings[0];

        },
        methods: {
            ...mapActions([
                'fetch_user_information',
                'fetch_countries',
                'fetch_basic_information',
            ]),
            upload_logo: function(){
               let form_data = new FormData($('#logo_pic_form')[0]);
               axios.post('/api/user-logo-update',form_data)
                    .then((res)=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'logo Updated'
                        });
                        this.fetch_user_information();
                    })
            },
            set_auto_numbering: function(event){
                // console.log(event.target.value);
                let auto_numbering_index = this.auto_numberings.findIndex(item=>item.name==event.target.value);

                this.selected_numbering = this.auto_numberings[auto_numbering_index];
                this.auto_numberings[auto_numbering_index].prefix = this.selected_numbering.prefix;
                this.auto_numberings[auto_numbering_index].code = this.selected_numbering.code;
            },

            save_company_settings: function(){
                let form_data = new FormData($('#temp_form')[0]);
                form_data.append('form', JSON.stringify(this.form) );
                form_data.append('address', JSON.stringify(this.address) );
                form_data.append('auto_numbering', JSON.stringify(this.auto_numberings) );

                axios.post('/api/company-settings-update',form_data)
                    .then((res)=>{
                        // console.log(res.data);
                        this.fetch_user_information();
                        this.fetch_basic_information();
                        Toast.fire({
                            icon: 'success',
                            title: 'Information Updated.'
                        });
                    })
            }

        },
        computed: {
            ...mapGetters([
                'get_auth_user_info',
                'get_countries'
            ]),
        }
    }
</script>
