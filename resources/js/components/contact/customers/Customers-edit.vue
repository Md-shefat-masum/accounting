<template>
    <!-- form section -->

    <form @submit.prevent="updateCustomer">
        <div class="right-content form2">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e">
                            <div class="A54VNK-Ae-c"></div>
                            <div class="row">
                                <div class="col-sm-2 col-md-3 hidden-xs A54VNK-Ae-g">
                                    <h4> Overview </h4>
                                </div>
                                <div class="col-12 col-sm-9 col-md-8">
                                    <div class="form-horizontal">
                                        <input type="hidden" v-model="form.id" />
                                        <div class="row form-group A54VNK-Ae-j">
                                            <div class="col-12 col-sm-6">
                                                <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                    <button type="button" class="btn btn-default" v-bind:class="{ active: form.is_company }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.is_company = true">Company</button>
                                                    <button type="button" class="btn btn-default" v-bind:class="{ active: !form.is_company }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.is_company = false">Individual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12" v-if="form.is_company == true">
                                            <div class="form-group floating-label mandatory" :class="{ 'has-error': form.errors.has('company_name') }">
                                                <input type="text" v-model="form.company_name" class="form-control form-component" id="gwt-uid-384" autocomplete="off">
                                                <label  class="control-label form-question ellipsis" :class="{ 'activess': form.company_name != null }" for="gwt-uid-384">Company Name</label>
                                            </div>
                                            <div v-if="form.errors.has('company_name')" class="required-text" v-html="form.errors.get('company_name')"></div>
                                        </div>

                                        <div class="col-12 col-offset-0 col-sm-6 col-sm-offset-0" aria-hidden="true" v-if="form.is_company == false">
                                            <div class="form-group floating-label" :class="{ 'has-error': form.errors.has('first_name') }">
                                                <input type="text" v-model="form.first_name" class="form-control form-component" id="gwt-uid-380" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{ 'activess': form.first_name != null }" for="gwt-uid-380">First Name</label>
                                            </div>
                                            <div v-if="form.errors.has('first_name')" class="required-text" v-html="form.errors.get('first_name')"></div>
                                        </div>

                                        <div class="col-12 col-offset-0 col-sm-6 col-sm-offset-0" aria-hidden="true" v-if="form.is_company == false">
                                            <div class="form-group floating-label" :class="{ 'has-error': form.errors.has('last_name') }">
                                                <input type="text" v-model="form.last_name" class="form-control form-component" id="gwt-uid-388" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{'activess': form.last_name != null}" for="gwt-uid-388">Last Name</label>
                                            </div>
                                            <div v-if="form.errors.has('last_name')" class="required-text" v-html="form.errors.get('last_name')"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group floating-label">
                                                <input type="text" v-model="form.email" class="form-control form-component" id="gwt-uid-430" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{'activess': form.email != null}" for="gwt-uid-430">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group floating-label">
                                                <input type="text" v-model="form.phone" class="form-control form-component" id="gwt-uid-426" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{'activess': form.phone != null}" for="gwt-uid-426">Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group floating-label">
                                                <input type="text" v-model="form.vat_number" class="form-control form-component" id="gwt-uid-467" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{'activess': form.vat_number != null}" for="gwt-uid-467">NID / TIN / VAT</label>

                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group floating-label">
                                                <input type="text" v-model="form.website" class="form-control form-component" id="gwt-uid-434" autocomplete="off">
                                                <label class="control-label form-question ellipsis" :class="{'activess': form.website != null}" for="gwt-uid-434">Website</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" aria-hidden="true">
                                        <div class="col-6">
                                            <div class="row A54VNK-uc-a">
                                                <div class="col-6"><span class="control-label">Pickup-only customer</span></div>
                                                <div class="col-6 text-right">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label v-on:click="form.is_pickup_only_customer = true" class="btn btn-default" v-bind:class="{ active: form.is_pickup_only_customer }" for='option1' style="text-transform: capitalize;">
                                                            <input type="radio" id="option1" value="true" v-model="form.is_pickup_only_customer">Yes
                                                        </label>
                                                        <label v-on:click="form.is_pickup_only_customer = false" class="btn btn-default" v-bind:class="{ active: !form.is_pickup_only_customer }" for='option2' style="text-transform: capitalize;">
                                                            <input type="radio" id="option2" value="false" v-model="form.is_pickup_only_customer">No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-2 col-md-3 A54VNK-Ae-g">
                                    <h4> Address </h4>
                                </div>
                                <div class="col-12 col-sm-9 col-md-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <span></span>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group floating-label">
                                                                <input type="text" v-model="form.billing_address" class="form-control form-component pac-target-input" id="gwt-uid-392" autocomplete="off">
                                                                <label class="control-label form-question ellipsis" :class="{'activess': form.billing_address != null}" for="gwt-uid-392">Billing address</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group floating-label">
                                                                <input type="text" v-model="form.line_2" class="form-control form-component" id="gwt-uid-396" autocomplete="off">
                                                                <label class="control-label form-question ellipsis" :class="{'activess': form.line_2 != null}" for="gwt-uid-396">Line 2</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row city_row">
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="form-group floating-label">
                                                                        <input type="text" v-model="form.city" class="form-control form-component" id="gwt-uid-city" autocomplete="off">
                                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.city != null}"  for="gwt-uid-city">City</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-4 floating-label" v-if="form.country != 18">
                                                                    <div class="form-group floating-label">
                                                                        <input type="text" v-model="form.state" class="form-control form-component" id="gwt-uid-state" autocomplete="off">
                                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.state != null}" for="gwt-uid-state">State</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-4 floating-label">
                                                                    <div class="form-group floating-label">
                                                                        <input type="text" v-model="form.zip_code" class="form-control form-component" id="gwt-uid-zip_code" autocomplete="off">
                                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.zip_code != null}" for="gwt-uid-zip_code">Post code</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group floating-label focused">
                                                                <div class="select-panel form-component">
                                                                    <select class="form-control" id="gwt-uid-400" v-model="form.country">
                                                                        <option v-for="(country,index) in countries" :key="index" :value="country.id">{{ country.name }}</option>
                                                                    </select>
                                                                    <label class="control-label form-question ellipsis" for="gwt-uid-400" style="top: -6px;">Country</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="row A54VNK-uc-a">
                                                <div class="col-6"><span class="control-label">Use same address for delivery</span></div>
                                                <div class="col-6 text-right">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label v-on:click="form.is_same_delivery = true" class="btn btn-default" v-bind:class="{ active: form.is_same_delivery }" for='sameaddress1' style="text-transform: capitalize;">
                                                            <input type="radio" id="sameaddress1" value="true" v-model="form.is_same_delivery">Yes
                                                        </label>
                                                        <label v-on:click="form.is_same_delivery = false" class="btn btn-default" v-bind:class="{ active: !form.is_same_delivery }" for='sameaddress2' style="text-transform: capitalize;">
                                                            <input type="radio" id="sameaddress2" value="false" v-model="form.is_same_delivery">No
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row" v-if="!form.is_same_delivery">
                                            <div class="col-12">
                                                <div class="row" v-for="(delivery_address, k) in form.delivery_address" :key="k">
                                                    <div class="col-11">
                                                        <div class="form-group floating-label">
                                                            <textarea type="text"
                                                                class="form-control form-component pac-target-input"
                                                                style="height: 90px;"
                                                                :id="k" autocomplete="off"
                                                                :value="`${delivery_address.address}\r${delivery_address.line2}\r${delivery_address.city}, ${(delivery_address.state ? delivery_address.state+', ' : '')}${delivery_address.zip_code}, ${delivery_address.country}`"
                                                                disabled></textarea>
                                                            <label class="control-label form-question ellipsis" :for="k">Delivery address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 text-right object-list-last-cell A54VNK-Pg-a" style="display: flex;align-items: center;">
                                                        <button type="button" class="btn btn-default A54VNK-mh-c"
                                                            data-toggle="modal"
                                                            @click="set_selected_delivery_address(form.delivery_address[k],k)"
                                                            data-target=".deliver_address_modal">
                                                            <span class="picto-font">p</span>
                                                        </button>
                                                        <button @click="removeDeliveryAddressRow(k)" type="button" class="btn cA54VNK-Pg-b btn-danger A54VNK-Pg-b">
                                                            <span class="picto-font">#</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <button v-if="!form.is_same_delivery" @click="addDeliveryAddressRow()" type="button" class="btn btn-default A54VNK-Ef-a" style="text-transform: capitalize;">New Delivery Address</button> -->
                                    <button data-toggle="modal"
                                        v-if="!form.is_same_delivery"
                                        data-target=".deliver_address_modal"
                                        @click="reset_selected_delivery_address"
                                        type="button" class="btn btn-default A54VNK-Ef-a" style="text-transform: capitalize;">
                                        New Delivery Address
                                    </button>
                                </div>
                            </div>

                            <!-- new address Modal -->
                            <div class="modal deliver_address_modal" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Address Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <customer-address-modal
                                            :key="address_modal_key"
                                            :selected_delivery_address="selected_delivery_address"
                                            :address_country='form.address_country'
                                            :set_address_country_name='set_address_country_name'
                                            :countries='countries'
                                            :set_delivery_address='set_delivery_address'
                                            :update_delivery_address='update_delivery_address'
                                        ></customer-address-modal>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-2 col-md-3 A54VNK-Ae-g">
                                    <h4> Contacts </h4>
                                </div>
                                <div class="col-12 col-sm-9 col-md-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="A54VNK-Ef-b">
                                                <div>
                                                    <div class="text-muted text-left" style="margin-top: 10px;" v-if="form.contacts.length == 0">No items to show</div>
                                                    <div class="row A54VNK-Pg-e" v-for="(contact, l) in form.contacts" :key="l">
                                                        <div class="col-sm-10 hidden-xs A54VNK-Pg-f">
                                                            <div class="row">
                                                                <div class="col-sm-3 object-list-first-cell">
                                                                    <div class="form-group floating-label">
                                                                        <div class="dropdown form-component">
                                                                            <input type="text" v-model="form.contacts[l].first_name" class="form-control form-component" data-toggle="dropdown" :id="'first_name-'+l" autocomplete="off">
                                                                            <label class="control-label form-question ellipsis" :class="{'activess': form.contacts[l].first_name != null}" :for="'first_name-'+l">First Name</label>
                                                                            <ul class="dropdown-menu A54VNK-ge-d">
                                                                                <li class="">
                                                                                    <a class="ellipsis-block" role="button"></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3 object-list-cell">
                                                                    <div class="form-group floating-label mandatory" :class="{ 'has-error': form.errors.has('contacts.'+[l]+'.last_name') }">
                                                                        <input type="text" v-model="form.contacts[l].last_name" class="form-control form-component" :id="'last_name-'+l" autocomplete="off">
                                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.contacts[l].last_name != null}" :for="'last_name-'+l">Last Name</label>
                                                                    </div>
                                                                    <div v-if="form.errors.has('contacts.'+[l]+'.last_name')" class="required-text" v-html="form.errors.get('contacts.'+[l]+'.last_name')"></div>
                                                                </div>
                                                                <div class="col-sm-3 object-list-cell">
                                                                    <div class="form-group floating-label">
                                                                        <input type="text" v-model="form.contacts[l].email" class="form-control form-component" :id="'email-'+l" autocomplete="off">
                                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.contacts[l].email != null}" :for="'email-'+l">Email</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3 object-list-cell">
                                                                    <div class="form-group floating-label">
                                                                        <input type="text" v-model="form.contacts[l].phone" class="form-control form-component" :id="'phone-'+l" autocomplete="off">
                                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.contacts[l].phone != null}" :for="'phone-'+l">Phone</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-sm-2 text-right object-list-last-cell A54VNK-Pg-a">
                                                            <button @click="removeContactListRow(l, contact)" type="button" class="btn btn-danger A54VNK-Pg-b">
                                                                <span class="picto-font">#</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button @click="addContactListRow()" type="button" class="btn btn-default A54VNK-Ef-a"  style="text-transform: capitalize;">New Customer Contact</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a class="accordion-toggle collapsed A54VNK-Ae-a" data-toggle="collapse" href="#gwt-uid-708">Advanced</a>
                            <div class="panel-collapse collapse" id="gwt-uid-708">
                                <div class="A54VNK-Ae-b">
                                    <div class="row">
                                        <div class="col-12 col-sm-2 col-md-3 A54VNK-Ae-g">
                                            <h4> Finance </h4>
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-8">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label focused">
                                                        <div class="dropdown form-component">
                                                            <input v-model="form.payment_terms" type="text" class="form-control A54VNK-ge-i" id="gwt-uid-450" data-toggle="dropdown" placeholder='Payment Terms' autocomplete="off" style="padding-top: 0px !important;">
                                                            <label class="control-label form-question ellipsis not_float" for="gwt-uid-450">Payment Terms</label>
                                                            <ul class="dropdown-menu A54VNK-ge-d">
                                                                <li @click="getPaymentTerms('Due on receipt')"><a class="ellipsis-block" role="button">Due on receipt</a></li>
                                                                <li @click="getPaymentTerms('At 30 days')"><a class="ellipsis-block" role="button">At 30 days</a></li>
                                                                <li @click="getPaymentTerms('At 90 days')"><a class="ellipsis-block" role="button">At 90 days</a></li>
                                                                <li @click="getPaymentTerms('In two installments')"><a class="ellipsis-block" role="button">In two installments</a></li>
                                                                <li @click="getPaymentTerms('In three installments')"><a class="ellipsis-block" role="button">In three installments</a></li>
                                                                <li class="divider"></li>
                                                                <li><a class="ellipsis-block" role="button">Create a new...</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6" aria-hidden="true">
                                                    <div class="form-group floating-label focused">
                                                        <div class="select-panel form-component">
                                                            <select class="form-control" id="gwt-uid-455" v-model="form.currency">
                                                                <span v-for="currency in countries" :key="currency.id+Math.random()">
                                                                    <option  v-if="currency.currency_code != ''" :value="currency.id">{{ currency.currency_code }}</option>
                                                                </span>
                                                            </select>
                                                            <label class="control-label form-question ellipsis" for="gwt-uid-455" style="top: -6px;">Currency</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-sm-2 col-md-3 A54VNK-Ae-g">
                                            <h4> Business </h4>
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-8">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label" :class="{ 'has-error': form.errors.has('business_code') }">
                                                        <input v-model="form.business_code" type="text" class="form-control form-component" id="gwt-uid-459" autocomplete="off">
                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.business_code != null}" for="gwt-uid-459">Code</label>
                                                    </div>
                                                    <div v-if="form.errors.has('business_code')" class="required-text" v-html="form.errors.get('business_code')"></div>
                                                </div>
                                                <div class="col-12 col-sm-6" aria-hidden="true">
                                                    <div class="form-group floating-label focused">
                                                        <div class="select-panel form-component">
                                                            <select class="form-control" id="gwt-uid-164" v-model="form.assigned_to">
                                                                <option value="0">none</option>
                                                                <option>employee name</option>
                                                            </select>
                                                            <label class="control-label form-question ellipsis" for="gwt-uid-164" style="top: -6px;">Assigned To</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="row A54VNK-uc-a">
                                                        <div class="col-6"><span class="control-label">Opt-in to Emails</span></div>
                                                        <div class="col-6 text-right">
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label v-on:click="form.opt_in_to_emails = true" class="btn btn-default" v-bind:class="{ active: form.opt_in_to_emails }" for='opt_email1' style="text-transform: capitalize;">
                                                                    <input type="radio" id="opt_email1" value="true" v-model="form.opt_in_to_emails">Yes
                                                                </label>
                                                                <label v-on:click="form.opt_in_to_emails = false" class="btn btn-default" v-bind:class="{ active: !form.opt_in_to_emails }" for='opt_email2' style="text-transform: capitalize;">
                                                                    <input type="radio" id="opt_email2" value="false" v-model="form.opt_in_to_emails">No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label focused">
                                                        <div class="dropdown form-component">
                                                            <input v-model="form.reference_account" type="text" class="form-control A54VNK-ge-i" id="gwt-uid-484" data-toggle="dropdown" placeholder='Create an account based on another account' autocomplete="off" style="padding-top: 0px !important;">
                                                            <label class="control-label form-question ellipsis not_float" for="gwt-uid-484">Create an account based on another account</label>
                                                            <ul class="dropdown-menu A54VNK-ge-d">
                                                                <li @click="getReferenceAccount('11100 (Accounts Receivable:Miscellaneous Customers)')"><a class="ellipsis-block" role="button">11100 (Accounts Receivable:Miscellaneous Customers)</a></li>
                                                                <li @click="getReferenceAccount('11100 CUS-002 (company1)')"><a class="ellipsis-block" role="button">11100 CUS-002 (company1)</a></li>
                                                                <li @click="getReferenceAccount('11400 (Other Receivables)')"><a class="ellipsis-block" role="button">11400 (Other Receivables)</a></li>
                                                                <li @click="getReferenceAccount('11500 (Allowance for Doubtful Account)')"><a class="ellipsis-block" role="button">11500 (Allowance for Doubtful Account)</a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label">
                                                        <input type="text" class="form-control form-component" id="gwt-uid-1" autocomplete="off">
                                                        <label class="control-label form-question ellipsis" for="gwt-uid-1">Starting Balance</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group floating-label">
                                                        <input v-model="form.date_as" type="text" class="form-control form-component" id="gwt-uid-2" autocomplete="off">
                                                        <label class="control-label form-question ellipsis" :class="{'activess': form.date_as != null}" for="gwt-uid-2">Date as</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-sm-2 col-md-3 A54VNK-Ae-g">
                                            <h4> Notes </h4>
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-8">
                                            <div class="form-group floating-label form-group-textarea">
                                                <textarea v-model="form.note" class="form-control form-component" id="gwt-uid-488" autocomplete="off" rows="10"></textarea>
                                                <label class="control-label form-question ellipsis" for="gwt-uid-488">Notes</label>
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
                                        <input  @change="addFile" type="file" name="photo" id="upload-photo" multiple="multiple" style='opacity: 0;position: absolute;z-index: -1;' />
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

    <!-- form section -->
</template>
<script type="text/babel">
    import NewFooter from '../../../layouts/partials/new_footer'
    import CustomerAddressModal from './components/customerAddressModal.vue';

    export default {
        components: {
            NewFooter,
            CustomerAddressModal,
        },

        name: 'NewCustomers',

        data: function () {
            return {
                countries: '',
                loaded: false,

                selected_delivery_address:[],
                update_delivery_address_key: '',
                address_modal_key: Math.random(),

                form: new Form({
                    "id": "",
                    "is_company": true,
                    "company_name": "",
                    "first_name": "",
                    "last_name": "",
                    "middle_name": "",
                    "email": "",
                    "phone": "",
                    "website": "",
                    "vat_number": "",
                    "is_pickup_only_customer": true,
                    "billing_address": "",
                    "line_2": "",
                    "city": "",
                    "division": "",
                    "district": "",
                    "upazila": "",
                    "union": "",
                    "thana": "",
                    "post_office": "",
                    "zip_code": "",
                    "country": "18",
                    "is_same_delivery": true,
                    "delivery_address": [],
                    "contacts": [],
                    "payment_terms": "",
                    "price_family": "",
                    "currency": "18",
                    "business_code": "",
                    "opt_in_to_emails": true,
                    "assigned_to": "0",
                    "reference_account": "",
                    "date_as": new Date().toLocaleString(),
                    "note": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getCountryList();
            this.getCustomersSingle();
        },
        methods: {
            getCountryList: function () {
                axios.get('/api/country-list').then(response => this.countries = response.data);
            },
            getCustomersSingle: function (Customers) {
                var that = this;
                this.form.get('/api/customers/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                });
            },

            updateCustomer: function(){
                // console.log(this.form);
                this.form.put('/api/customers/'+this.form.id).then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Update successfully'
                    });
                    this.$router.replace({ name: 'customerLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error Created'
                    });
                });
            },

            set_address_country_name: function(address_country){
                this.address_country = address_country;
            },

            set_delivery_address: function(address){
                this.form.delivery_address.push(address);
            },

            update_delivery_address: function(address){
                this.form.delivery_address[this.update_delivery_address_key] = address;
                this.selected_delivery_address = [];
            },

            set_selected_delivery_address: function(address,key_index){
                this.address_modal_key = Math.random();
                this.update_delivery_address_key = key_index;
                this.selected_delivery_address = address;
                // console.log(address);
            },

            reset_selected_delivery_address: function(){
                this.address_modal_key = Math.random();
                this.selected_delivery_address = [];
            },

            removeDeliveryAddressRow: function(k) {
                if (k > -1) {
                    this.form.delivery_address.splice(k, 1);
                }
            },

            addDeliveryAddressRow() {
                if (this.form.delivery_address == null){
                    this.form.delivery_address = [];
                    this.form.delivery_address.push({
                        address: '',
                    });
                }else {
                    this.form.delivery_address.push({
                        address: '',
                    });
                }
            },
            removeContactListRow(l, contact) {
                if (l > -1) {
                    this.form.contacts.splice(l, 1);
                }
            },
            addContactListRow() {
                this.form.contacts.push({
                    single_contact: '',
                });
            },
            getPaymentTerms(value) {
                this.form.payment_terms = value;
            },
            getReferenceAccount(value) {
                this.form.reference_account = value;
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
        }
    }
</script>
