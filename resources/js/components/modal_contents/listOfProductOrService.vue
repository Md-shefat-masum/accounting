<template>
    <div class="product_list_manage_parent">

        <!-- full table -->

        <section class="content content-menu m-0">
            <div class="container-fluid">
                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="breadcrumb breadcrumb-style d-inline-block mb-0">
                                <li class="breadcrumb-item">
                                    <h4 style="border: 0;" class="page-title">Products and Services</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <button type="button" @click="add_new_product_form=true" v-if="!add_new_product_form" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none text-light">New Products or Services</button>
                                    <button type="button" @click="add_new_product_form=false" v-if="add_new_product_form" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none text-light">List Of Products or Services</button>
                                    <!-- <router-link to='/sales/product-service/create' class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link> -->
                                </li>
                                <!-- <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li  style="float: left;">
                                    <a class="btn btn-white new_dot nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Export Products Lines</a>
                                        <a class="dropdown-item" href="#">Export Services Lines</a>
                                        <a class="dropdown-item" href="#">Storage Location</a>
                                        <a class="dropdown-item" href="#">Edit Product and Service Families</a>
                                        <a class="dropdown-item" href="#">Edit Measurment Units</a>
                                        <a class="dropdown-item" href="#">Edit Measurment Units</a>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- table -->

                <div class="row clearfix" v-if="!add_new_product_form">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;padding: 5px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <!-- <input type="checkbox" class="filled-in">
                                                        <span></span> -->
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="min-width: 110px;">Product Code</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Cost</th>
                                        <th class="text-right">Unit</th>
                                        <!-- <th class="text-center" style="width: 70px;min-width: 70px;"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="productservice in productservices.data" :key="productservice.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input @click="addProductToList($event,productservice)"
                                                                type="checkbox">
                                                        <!-- <input @click="addProductToList(productservice)"
                                                                type="checkbox"
                                                                :class="'select_product_box'+productservice.id" > -->
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                {{productservice.name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                {{productservice.description}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                {{productservice.code}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                {{productservice.sales_price}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                {{productservice.purchase_price}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                {{productservice.unit}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="productservices" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>

                <!-- table -->
                <div class="modal-footer" v-if="!add_new_product_form">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="button" @click="saveProductList" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </section>

        <!-- full table -->

        <div class="row" v-if="add_new_product_form">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <form @submit.prevent="createProductservice"> -->
                    <div class="right-content form1" >
                        <div id="contentRootPanel" class="fullpage" style="position: unset;">
                            <div class="page-panel page-right-content A54VNK-be-a">
                                <div class="panel-body page-panel-body">
                                    <product-service-form-body
                                        :type="type"
                                        :setFormData="setFormData"
                                    ></product-service-form-body>
                                </div>

                                <div class="navbar navbar-fixed-bottom navbar-custom A54VNK-be-c formfooter" type="basic" style="position: unset; box-shadow: none; padding: 20px;">
                                    <div class="A54VNK-Vf-d">
                                        <div class="A54VNK-Vf-e"></div>
                                        <div class="btn-toolbar A54VNK-Vf-c">
                                            <button type="button" @click="add_new_product_form=false" class="btn btn-default cancel_btn">Cancel</button>
                                            <button type="button" @click="createProductservice" class="btn btn-primary">Done</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>

    </div>
</template>

<script>
    import sub_headerVue from '../contact/sub_header.vue';
    import ProductReciveLocationVue from './ProductReciveLocation.vue';
    import ProductDeliveryLocationVue from './ProductDeliveryLocation.vue';
    import ProductFamilyVue from './ProductFamily.vue';
    import newFooterVue from '../../layouts/partials/new_footer.vue';
    import ProductServiceFormBody from '../sales/productServices/productServiceFormBody.vue';

    export default {
        components: {
            sub_headerVue,
            ProductReciveLocationVue,
            ProductDeliveryLocationVue,
            ProductFamilyVue,
            newFooterVue,
            ProductServiceFormBody,
        },
        name: 'listOfProductOrService',
        props: ['resetSelectedProductList','selected_products'],
        data: function(){
            return {
                add_new_product_form: false,
                productservices : {},
                temp_slected_products : [],
                new_selected_products: [],
                type: 'create',
                form: new Form({
                        "id": "",
                        "is_services": 0,
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
        created: function(){

            // initiatlise old selected products
            if(this.selected_products && Object.keys(this.selected_products).length > 0){
                this.temp_slected_products = [...this.selected_products];
                // this.temp_slected_products.map((item)=>(item.selected=true,item.product_id && (item.id=item.product_id)));
            }

            this.listProductservices();
            this.getProductservice();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/productservices?status=`+status+'&page=' + page)
                    .then(response => {
                        that.productservices = response.data.datas;
                        // setTimeout(() => {
                        //     that.temp_slected_products.map((item)=>($('.select_product_box'+item.id).prop('checked',true)));
                        // }, 1000);
                    });
            },
            listProductservices: function(){
                var that = this;
                this.form.get('/api/productservices').then(function(response){
                    that.productservices = response.data;
                    setTimeout(() => {
                        // that.temp_slected_products.map((item)=>($('.select_product_box'+item.id).prop('checked',true)));
                    }, 1000);
                })
            },
            getProductservice: function (Productservice) {
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

            },
            deleteProductservice: function(productservice, index){
                var that = this;
                this.form.delete('/api/productservices/'+productservice.id).then(function(response){
                    that.productservices.splice(index,1);
                })
            },
            addProductToList: function(event,product){
                product.qty = 1;
                product.disc = 0.00;
                product.total_price = product.qty * product.sales_price;
                product.index = this.temp_slected_products.length;

                // if(product.selected == undefined || product.selected == false){
                //     product.selected = true
                // }else{
                //     product.selected = false
                // }

                // if(this.temp_slected_products.filter((item)=>item.id==product.id).length > 0){
                //     this.temp_slected_products = this.temp_slected_products.filter((item)=>item.id!=product.id);
                // }else{
                    // this.temp_slected_products.push(product);
                // }

                if(event.target.checked == true){
                    this.new_selected_products.push(product);
                }else{
                    this.new_selected_products = this.new_selected_products.filter((item)=>item.id!=product.id);
                }
                // console.log(this.temp_slected_products.length, event);
            },
            saveProductList: function(){
                this.temp_slected_products = this.temp_slected_products.concat(this.new_selected_products);
                this.resetSelectedProductList(this.temp_slected_products);
                $('.modal').modal('hide');
            },
            createProductservice: function(){
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.post('/api/productservices')
                    .then(() => {
                        this.form.reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Created successfully'
                        });
                        // this.$router.push({name: 'ProductServices'})
                        // $('#addProductOrService').modal('hide');
                        this.listProductservices();
                        this.add_new_product_form = false;
                        $('.done_btn').removeClass('loading').prop("disabled",false);
                    })
                    .catch(() => {
                        $('.done_btn').removeClass('loading').prop("disabled",false);
                        Toast.fire({
                            icon: 'error',
                            title: 'Created error'
                        });
                    });
            },
            setFormData: function(form_data){
                this.form = form_data;
            },
        }
    }
</script>

<style scoped>
    .form1.right-content .panel-body.page-panel-body {
        overflow-y: scroll;
        height: 68vh;
    }
</style>
