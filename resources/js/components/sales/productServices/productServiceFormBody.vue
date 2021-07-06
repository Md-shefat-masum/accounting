<template>
    <div class="container-fluid A54VNK-Ae-e">
        <div class="A54VNK-Ae-c"></div>
        <div class="row">
            <div class="col-sm-2 col-md-4 hidden-xs A54VNK-Ae-g"></div>
            <div class="col-12 col-sm-9 col-md-8">
                <div class="form-horizontal">
                    <div class="row form-group A54VNK-Ae-j">
                        <div class="col-12 col-sm-6">
                            <div class="btn-group A54VNK-tc-c">
                                <a  class='btn btn-default'
                                    v-bind:class="{ active: check_service }"
                                    @click="toggle_is_service" style="text-transform: capitalize;">
                                    Service
                                </a>
                                <a  class='btn btn-default'
                                    v-bind:class="{ active: !check_service }"
                                    @click="toggle_is_service" style="text-transform: capitalize;">
                                    Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-xs A54VNK-Ae-g"></div>
            <div class="col-12 col-md-10">
                <div class="form-group row">
                    <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                        <label>Name <small style="color: red;padding-left: 4px;">*</small></label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" v-model="form.name" class="form-control" id="gwt-uid-116">
                        <div class="error-panel"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                        <label>Unit</label>
                    </div>
                    <div class="col-md-10">
                        <unit-dropdown :set_product_unit="set_product_unit" :old_unit_name="form.unit"></unit-dropdown>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                        <label>Sale Price</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" v-model="form.sales_price" class="form-control" id="gwt-uid-125" style="text-align: right;" value='0.00'>
                    </div>
                </div>
                <div class="form-group row" v-if="!check_service">
                    <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                        <label>Purchase Price</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" v-model="form.purchase_price" id="gwt-uid-126" style="text-align: right;" value='0.00'>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2 A54VNK-Ae-g"></div>
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                <label>Item Number</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" v-model="form.item_number" class="form-control" id="gwt-uid-131">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                <label>Description</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" v-model="form.description" rows="5" id="gwt-uid-132" style="resize: vertical; min-height: 50px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                <label>Category/Family</label>
                            </div>
                            <div class="col-md-10">
                                <product-family-dropdown :set_product_family="set_product_family" :old_family_name="form.family"></product-family-dropdown>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="product_section" v-if="!check_service">
            <div class="row">
                <div class="col-md-2 A54VNK-Ae-g"></div>
                <div class="col-12 col-md-10">
                    <div class="form-group row">
                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                            <label>Track Inventory</label>
                        </div>
                        <div class="col-md-10">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default"
                                    v-bind:class="{ active: form.is_track_inventory }"
                                    @click="toggle_inventory" for='option1'
                                    style="text-transform: capitalize;">
                                    <input type="radio" checked=''>Yes
                                </label>
                                <label class="btn btn-default"
                                    v-bind:class="{ active: !form.is_track_inventory }"
                                    @click="toggle_inventory" for='option2' style="text-transform: capitalize;">
                                    <input type="radio">No
                                </label>
                            </div>
                            <input type="radio" id="option1" value="1" style="position: inherit;pointer-events: inherit">
                            <input type="radio" id="option2" value="2" style="position: inherit;pointer-events: inherit">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="track_inventory" v-if="is_inventory">
                <div class="row">
                    <div class="col-md-1 A54VNK-Ae-g"></div>
                    <div class="col-12 col-md-11">
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Valuation Costing</label>
                            </div>
                            <div class="col-md-9">
                                <div class="A54VNK-ni-a">
                                    <div class="select-panel A54VNK-ni-c">
                                        <select class="form-control" size="1" id="gwt-uid-149">
                                            <option @click="form.valuation_costing = 'standard cost'" value="2">Standard Cost</option>
                                            <option @click="form.valuation_costing = 'weighted average price'" value="1">Weighted average price</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Authorize negative stock</label>
                            </div>
                            <div class="col-md-9">
                                <div class="A54VNK-ni-a">
                                    <div class="select-panel A54VNK-ni-c">
                                        <select class="form-control" size="1" id="gwt-uid-153">
                                            <option @click="form.authorize_negative_stock = 'no'" value="2">No</option>
                                            <option @click="form.authorize_negative_stock = 'yes' " value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Minimum Stock Quantity</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="form.minimum_stock_quantity" id="gwt-uid-154" style="text-align: right;" value="0.00">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Receiving Location</label>
                            </div>
                            <div class="col-md-9">
                                <div class="dropdown">
                                    <input type="text" v-model="form.receiving_location" class="form-control A54VNK-oi-b" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Select" id="gwt-uid-161" aria-expanded="false">
                                    <ul class="dropdown-menu A54VNK-oi-a">
                                        <li v-for="location in productrecivelocation" :key="location.id">
                                            <a class="ellipsis-block" @click="form.receiving_location = location.name" role="button" title="MAIN LOCATION">
                                                {{location.name}}
                                            </a>
                                        </li>

                                        <li class="divider"></li>
                                        <!-- <li class="">
                                            <a class="ellipsis-block" role="button">Start the search</a>
                                        </li> -->
                                        <li class="">
                                            <a class="ellipsis-block" data-target="#addProductReciveModal" data-toggle="modal" role="button">Create a new...</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- addProductReciveLocation Modal -->
                        <div class="modal fade" id="addProductReciveModal" tabindex="-1" aria-labelledby="addProductReciveModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="addProductReciveModalLabel" style="text-align:center;"> Add Product Recive Location </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ProductReciveLocationVue></ProductReciveLocationVue>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Delivery Location</label>
                            </div>
                            <div class="col-md-9">
                                <div class="dropdown">
                                    <input type="text" class="form-control A54VNK-oi-b" v-model="form.picking_delivery_location" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Select" id="gwt-uid-161" aria-expanded="false">
                                    <ul class="dropdown-menu A54VNK-oi-a">
                                        <li v-for="location in productdeliverylocation" :key="location.id">
                                            <a class="ellipsis-block" @click="form.picking_delivery_location = location.name" role="button" title="MAIN LOCATION">
                                                {{location.name}}
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <!-- <li class="">
                                            <a class="ellipsis-block" role="button">Start the search</a>
                                        </li> -->
                                        <li class="">
                                            <a class="ellipsis-block" data-toggle="modal" data-target="#addProductDeliveryModal" role="button">Create a new...</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- addProductDeliveryLocation Modal -->
                        <div class="modal fade" id="addProductDeliveryModal" tabindex="-1" aria-labelledby="addProductDeliveryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center w-100" id="addProductDeliveryModalLabel"> Add Product Delivery Location </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ProductDeliveryLocationVue></ProductDeliveryLocationVue>
                                        <!-- <listOfProductOrServiceVue :resetSelectedProductList="resetSelectedProductList"></listOfProductOrServiceVue> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Inventory Account</label>
                            </div>
                            <div class="col-md-9">
                                <div class="A54VNK-ni-a">
                                    <div class="select-panel A54VNK-ni-c">
                                        <select class="form-control" size="1" id="gwt-uid-173">
                                            <option v-for="inventory_account in inventory_accounts" :key="inventory_account.id" value="11">
                                                <span @click="form.inventory_account = inventory_account.name" >
                                                    {{inventory_account.account_number}} ( {{inventory_account.name}} )
                                                </span>
                                            </option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-link A54VNK-ni-b" style="">
                                        <span class="picto-font"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Inventory Transit Account</label>
                            </div>
                            <div class="col-md-9">
                                <div class="A54VNK-ni-a">
                                    <div class="select-panel A54VNK-ni-c">
                                        <select class="form-control" size="1" id="gwt-uid-176">
                                            <option v-for="inventory_transit_account in inventory_transit_accounts" :key="inventory_transit_account.id" value="11">
                                                <span @click="form.inventory_transit_account = inventory_transit_account.name">
                                                    {{inventory_transit_account.account_number}} ( {{inventory_transit_account.name}} )
                                                </span>
                                            </option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-link A54VNK-ni-b" style="">
                                        <span class="picto-font"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse" href="#gwt-uid-708">Advanced</a>
        <div class="panel-collapse collapse" id="gwt-uid-708">
            <div class="A54VNK-Ae-b">
                <div class="row">
                    <div class="col-md-2 A54VNK-Ae-g"></div>
                    <div class="col-12 col-md-10">
                        <div class="form-group row">
                            <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                <label>Private Note</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" id="gwt-uid-181" style="resize: vertical; min-height: 50px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-1 A54VNK-Ae-g"></div>
                    <div class="col-12 col-md-11">
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>COGS Account
                                    <small style="color: red;padding-left: 4px;">*</small></label>
                            </div>
                            <div class="col-md-9">
                                <div class="dropdown">
                                    <input type="text" class="form-control A54VNK-oi-b" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Select" id="gwt-uid-161" aria-expanded="false">
                                    <ul class="dropdown-menu A54VNK-oi-a">
                                        <li class="active">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Composition (51002)">
                                                Product Cost - Composition<span> (51002)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Fabrication (51003)">
                                                Product Cost - Fabrication<span> (51003)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Items (51001)">
                                                Product Cost - Items<span> (51001)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Miscellaneous (51005)">
                                                Product Cost - Miscellaneous<span> (51005)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Services (51004)">
                                                Product Cost - Services<span> (51004)</span>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button">View all accounts</a>
                                        </li>
                                        <li class="">
                                            <a class="ellipsis-block" role="button">Create an account</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="error-panel"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Vat on Purchase</label>
                            </div>
                            <div class="col-md-9">
                                <div class="dropdown">
                                    <input type="text" class="form-control A54VNK-oi-b" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Select" id="gwt-uid-161" aria-expanded="false">
                                    <ul class="dropdown-menu A54VNK-oi-a">
                                        <li class="active">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Composition (51002)">
                                                0.0% Exempt (Deductible)
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Fabrication (51003)">
                                                0.0% Zero-rated (Deductible)
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Items (51001)">
                                                20.0% Standard rate (Deductible)
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Miscellaneous (51005)">
                                                5.0% Lower rate (Deductible)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-1 A54VNK-Ae-g"></div>
                    <div class="col-12 col-md-11">
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>
                                    Income Account
                                    <small style="color: red;padding-left: 4px;">*</small>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <div class="dropdown">
                                    <input type="text" class="form-control A54VNK-oi-b" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Select" id="gwt-uid-161" aria-expanded="false">
                                    <ul class="dropdown-menu A54VNK-oi-a">
                                        <li class="active">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Composition (51002)">
                                                Product Cost - Composition<span> (51002)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Fabrication (51003)">
                                                Product Cost - Fabrication<span> (51003)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Items (51001)">
                                                Product Cost - Items<span> (51001)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Miscellaneous (51005)">
                                                Product Cost - Miscellaneous<span> (51005)</span>
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Services (51004)">
                                                Product Cost - Services<span> (51004)</span>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button">View all accounts</a>
                                        </li>
                                        <li class="">
                                            <a class="ellipsis-block" role="button">Create an account</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                <label>Vat on Sales</label>
                            </div>
                            <div class="col-md-9">
                                <div class="dropdown">
                                    <input type="text" class="form-control A54VNK-oi-b" data-toggle="dropdown"
                                            autocomplete="off" role="button"
                                            placeholder="Select" id="gwt-uid-161"
                                            aria-expanded="false">
                                    <ul class="dropdown-menu A54VNK-oi-a">
                                        <li class="active">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Composition (51002)">
                                                0.0% Exempt (Deductible)
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Fabrication (51003)">
                                                0.0% Zero-rated (Deductible)
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Items (51001)">
                                                20.0% Standard rate (Deductible)
                                            </a>
                                        </li>
                                        <li class="no-hover">
                                            <a class="ellipsis-block" role="button" title="Product Cost - Miscellaneous (51005)">
                                                5.0% Lower rate (Deductible)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductReciveLocationVue from '../../modal_contents/ProductReciveLocation.vue';
import ProductDeliveryLocationVue from '../../modal_contents/ProductDeliveryLocation.vue';
import UnitDropdown from '../components/unitDropdown.vue';
import productFamilyDropdown from '../components/productFamilyDropdown.vue';
export default {
    props:['type','setFormData'],
    components: {
        ProductReciveLocationVue,
        ProductDeliveryLocationVue,
        UnitDropdown,
        productFamilyDropdown,
    },
    name: 'product_service_form',
    data: function () {
        return {
            loaded: false,
            check_service: 1,
            is_inventory: true,
            form: new Form({
                "id": "",
                "is_services": "",
                "name": "",
                "unit": "",
                "sales_price": "",
                "purchase_price": "",
                "item_number": "",
                "description": "",
                "family": "",
                "private_note": "",
                "income_account": "",
                "vat_on_sales": "",
                "is_track_inventory": "1",
                "valuation_costing": "",
                "authorize_negative_stock": "no",
                "minimum_stock_quantity": "",
                "receiving_location": "",
                "picking_delivery_location": "",
                "inventory_account": "",
                "inventory_transit_account": "",
                "net_weight": "",
                "width": "",
                "length": "",
                "height": "",
                "dimension_unit": "",
                "cogs_account": "",
                "vat_on_purchases": "",
                "created_at": "",
                "updated_at": "",
            }),
            units: false,
            familys: false,
            productrecivelocation: false,
            productdeliverylocation: false,
            inventory_accounts: false,
            inventory_transit_accounts: false,
        }
    },
    watch: {
        form: {
            handler: function(val,oldVal){
                if(this.check_service){
                    this.form.is_services = 1;
                }else{
                    this.form.is_services = 0;
                }
                if(this.is_inventory){
                    this.form.is_track_inventory = 1;
                }else{
                    this.form.is_track_inventory = 0;
                }
                this.setFormData(this.form);
            },
            deep: true,
        },
    },
    created: function () {
        this.getProductserviceInfo();
        if(this.type == 'edit'){
            this.getServiceSingle();
        }
    },
    methods: {
        getProductserviceInfo: function (Productservice) {
            axios.get('/api/productunits')
                .then((res)=>{
                    this.units = res.data;
                })

            axios.get('/api/productfamily')
                .then((res)=>{
                    this.familys = res.data;
                })

            axios.get('/api/productdeliverylocation')
                .then((res)=>{
                    this.productdeliverylocation = res.data;
                })

            axios.get('/api/productrecivelocation')
                .then((res)=>{
                    this.productrecivelocation = res.data;
                })

            axios.get('/api/inventoryaccount')
                .then((res)=>{
                    this.inventory_accounts = res.data;
                })

            axios.get('/api/inventorytransitaccount')
                .then((res)=>{
                    this.inventory_transit_accounts = res.data;
                })

            // var that = this;
            // this.form.get('/api/productservices/' + this.$route.params.id).then(function (response) {
            //     that.form.fill(response.data);
            //     that.loaded = true;
            // });

        },
        getServiceSingle: function (Customers) {
            var that = this;
            this.form.get('/api/productservices/' + this.$route.params.id)
                .then(function (response) {
                    that.form.fill(response.data);

                    if(response.data.is_services == 1){
                        that.check_service = 1;
                    }else{
                        that.check_service = 0;
                    }

                    if(response.data.is_track_inventory == 1){
                        that.is_inventory = 1;
                    }else{
                        that.is_inventory = 0;
                    }

                });
        },
        createProductservice: function(){
            if(this.check_service){
                this.form.is_services = 1;
            }else{
                this.form.is_services = 0;
            }
            if(this.is_inventory){
                this.form.is_track_inventory = 1;
            }else{
                this.form.is_track_inventory = 0;
            }
            this.form.post('/api/productservices').then(() => {
                this.form.reset();
                Toast.fire({
                    icon: 'success',
                    title: 'Created successfully'
                });
                this.$router.replace({name: 'ProductServices'})
            }).catch(() => {
                Toast.fire({
                    icon: 'error',
                    title: 'Created error'
                });
            });
        },
        updateProductservice: function () {
            var that = this;
            this.form.put('/api/productservices/' + this.$route.params.id).then(function (response) {
                that.form.fill(response.data);
            })
        },
        deleteProductservice: function () {
            var that = this;
            this.form.delete('/api/productservices/' + this.$route.params.id).then(function (response) {
                that.form.fill(response.data);
                that.$router.push('/super-admin/productservices');
            })

        },
        set_product_unit: function(unit){
            this.form.unit = unit.name;
        },
        set_product_family: function(family){
            this.form.family = family.name;
        },
        toggle_is_service: function(value){
            // this.form.is_services = value;
            this.check_service = !this.check_service;
            this.form.is_services = !this.check_service;
        },
        toggle_inventory: function(){
            // console.log('hi');
            this.is_inventory = !this.is_inventory;
            this.form.is_track_inventory = !this.is_inventory;
        },
    }
}
</script>

<style>

</style>
