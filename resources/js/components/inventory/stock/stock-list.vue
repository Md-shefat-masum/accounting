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
                                    <h4 style="border: 0;" class="page-title">Stock</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">Automatic Inventory Ordering</router-link>
                                    <router-link to="/#" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
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
                                        <a class="dropdown-item" href="#">Inventory Withdrawals</a>
                                        <a class="dropdown-item" href="#">Inventory Transfer</a>
                                        <a class="dropdown-item" href="#">Inventory Count Sheet</a>
                                        <a class="dropdown-item" href="#">Export Inventory On Hand</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- filter -->
                <div class="row" v-if="checked_id.length>0">
                    <div class="col-12">
                        <div class="page-panel A54VNK-Zc-c" style="display: flex;justify-content:space-between;background:white;padding: 5px 10px;">
                            <div class="d-flex align-items-center">
                                <span class="bolder d-flex align-items-center">{{checked_id.length}} selected </span>
                                <a class="A54VNK-Zc-a" role="button" style="display: none;" aria-hidden="true">select all</a>
                                <span style="display: none;" aria-hidden="true">|</span>
                            </div>
                            <div>
                                <button @click="delete_selected_all()" type="button" class="btn btn-danger">Delete</button>
                                <a :href="'/credit-memos-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank" style="line-height:26px;" class="btn btn-warning">Export Selected</a>
                                <a :href="'/credit-memos-line-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank"  style="line-height:26px;"  class="btn btn-warning">Export Line Selected</a>
                            </div>
                        </div>
                    </div>
                </div>

                <productServiceTableFilter
                    v-else
                    :show_list="show_product_service"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :list="listProductservices"
                    :dataSearch="dataSearch"
                    :dataSort="dataSort"
                    :data_by_type="data_by_type">
                </productServiceTableFilter>

                <!-- filter -->

                <!-- table -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th style="width: 5%;padding: 5px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input id="check_all" @click="checkAll()" type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th> -->
                                        <th style="min-width: 110px;">Product Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Cost</th>
                                        <th>Unit</th>
                                        <th>Location</th>
                                        <!-- <th>Qty on hand</th> -->
                                        <th>Available</th>
                                        <!-- <th class="text-center" style="width: 70px;min-width: 70px;"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="productservice in productservices.data" :key="productservice.id">
                                        <!-- <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" @click="checkSingle(productservice.id)" :value="productservice.id" class="filled-in check_single">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td> -->
                                        <td>
                                            <div class="ellipsis">
                                                {{productservice.code}}
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
                                        <td>
                                            <div class="ellipsis">
                                                {{productservice.unit}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                {{productservice.receiving_location}}
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <div class="ellipsis">
                                                {{'1000'}}
                                            </div>
                                        </td> -->
                                        <td>
                                            <div class="ellipsis">
                                                {{getAvailable(productservice.product_log)}}
                                            </div>
                                        </td>
                                        <!-- <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Close</a>
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteProductservice(productservice.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="show_product_service" @pagination-change-page="getResults"></pagination>
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
    import productServiceTableFilter from '../../search_components/product_service_table_filter.vue';

    export default {
        components: {
            SubHeader,
            productServiceTableFilter,
        },
        name: 'Productservice',

        data: function(){
            return {
            productservices : false,
            data_sort_type: 'sorted by Creation date',
            data_by_day_name: 'Product and service',
            show_product_service : {},

            stock_log: [],

            checked_id:[],
            form: new Form({
                    "id" : "",
                    "is_services" : "",
                    "name" : "",
                    "unit" : "",
                    "sales_price" : "",
                    "purchase_price" : "",
                    "item_number" : "",
                    "description" : "",
                    "family" : "",
                    "private_note" : "",
                    "income_account" : "",
                    "vat_on_sales" : "",
                    "is_track_inventory" : "",
                    "valuation_costing" : "",
                    "authorize_negative_stock" : "",
                    "minimum_stock_quantity" : "",
                    "receiving_location" : "",
                    "picking_delivery_location" : "",
                    "inventory_account" : "",
                    "inventory_transit_account" : "",
                    "net_weight" : "",
                    "width" : "",
                    "length" : "",
                    "height" : "",
                    "dimension_unit" : "",
                    "cogs_account" : "",
                    "vat_on_purchases" : "",

                    'checked_id':[],
                    "model_name":'',
                    "model_related":'',
                    "model_related_name":'',

                    "created_at" : "",
                    "updated_at" : "",
                })
        }
        },
        created: function(){
            this.listProductservices();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/productservices?status=`+status+'&page=' + page)
                    .then(response => {
                        this.show_product_service = this.productservices = response.data.datas;
                    });
            },
            listProductservices: function(){

                var that = this;
                this.form.get('/api/productservices').then(function(response){
                    that.show_product_service = that.productservices = response.data;
                })

            },
            createProductservice: function(){

                var that = this;
                this.form.post('/api/productservices').then(function(response){
                    that.productservices.push(response.data);
                    that.form.reset();
                })
            },
            data_by_type: function(type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/productservices_by_day?key=${type}`;
                let that = this;

                axios.get(url)
                    .then((response)=>{
                        that.show_product_service = that.productservices = response.data;
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/productservices_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_product_service = that.productservices = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/product_service_search',formData)
                    .then((res)=>{
                        that.show_product_service = this.productservices = res.data;
                    })
            },
            getAvailable: function(product_log){
                // console.log(product_log);

                if(product_log.length === 0){
                    return 0;
                }else{
                    let total_sale = product_log.filter((item)=>item.is_sale==1).reduce((total,item)=>{
                        return total + item.qty;
                    },0)

                    let total_purchase = product_log.filter((item)=>item.is_purchase==1).reduce((total,item)=>{
                        return total + item.qty;
                    },0)

                    // console.log(total_sale, total_purchase);
                    return total_purchase - total_sale;
                }
            }
        }
    }
</script>
