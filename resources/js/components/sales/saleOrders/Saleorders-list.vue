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
                                    <h4 style="border: 0;" class="page-title">Sales Orders</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/sales/sales-order/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Sales Orders</router-link>
                                    <router-link to="/sales/sales-order/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li  style="float: left;">
                                    <a class="btn new_dot btn-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/sale-order-export-to-exel" target="_blank">Export Sales Orders Lines</a>
                                        <a class="dropdown-item" href="/sale-order-line-export-to-exel" target="_blank">Export Sales Orders Details</a>
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
                                <a :href="'/sale-order-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank" style="line-height:26px;" class="btn btn-warning">Export Selected</a>
                                <a :href="'/sale-order-line-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank"  style="line-height:26px;"  class="btn btn-warning">Export Line Selected</a>
                            </div>
                        </div>
                    </div>
                </div>

                <tableFilterVue
                    v-else
                    :show_list="show_orders"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :list="listSaleorders"
                    :dataSearch="dataSearch"
                    :dataSort="dataSort"
                    :data_by_day="data_by_day">
                </tableFilterVue>

                <!-- filter -->

                <!-- tab -->

                <div class="row">
                    <div class="col-12">
                        <div class="card filter content-card" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation">
                                        <a href='#' data-toggle="tab"  @click="listSaleorders('all')" class="active show">
                                            All
                                            <span class="amount">{{all_saleorders_count}}</span>
                                        </a>
                                    </li>

                                    <li role="presentation">
                                        <a href='#' data-toggle="tab" @click="listSaleorders('not_delivered')" >
                                            Not Delivered
                                            <span class="amount">{{not_delivered_count}}</span>
                                        </a>
                                    </li>
                                    <!-- <li role="presentation">
                                        <a href='#' data-toggle="tab"  @click="listSaleorders('pertially_delivered')">
                                            Partially Delivered
                                            <span class="amount">{{pertially_delivered_count}}</span>
                                        </a>
                                    </li> -->
                                    <li role="presentation">
                                        <a href='#' data-toggle="tab"  @click="listSaleorders('delivered')">
                                            Delivered
                                            <span class="amount">{{delivered_count}}</span>
                                        </a>
                                    </li>

                                    <li role="presentation">
                                        <a href='#' data-toggle="tab"  @click="listSaleorders('invoiced')">
                                            Invoiced
                                            <span class="amount">{{invoiced_count}}</span>
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
                                                        <input id="check_all" @click="checkAll()" type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 150px;">Sales Orders Date</th>
                                        <th style="min-width: 130px;">Sales Orders NO</th>
                                        <th style="min-width: 155px;">Customer</th>
                                        <th class="text-right" style="min-width: 120px;">Amount</th>
                                        <th class="text-right" style="min-width: 120px;">PO Number</th>
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="saleorder in show_orders.data" :key="saleorder.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input @click="checkSingle(saleorder.id)" :value="saleorder.id" type="checkbox" class="check_single filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editOrder(saleorder.id)">
                                                {{saleorder.date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editOrder(saleorder.id)">
                                                {{saleorder.code}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis text-info" @click="gotoCustomerProfile(saleorder.customer_id)">
                                                {{saleorder.customer}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis" @click="editOrder(saleorder.id)">
                                                {{saleorder.total}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis" @click="editOrder(saleorder.id)">
                                                {{saleorder.po_number}}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis" @click="editOrder(saleorder.id)">
                                                <div class="label-light-success" v-if="saleorder.status == 'open'">not prepared</div>
                                                <div v-else>
                                                    <span class="label-light-success">delivered</span>
                                                    <span class="label-light-info" v-if="saleorder.sales_log && saleorder.sales_log.is_delivery_note">ordered</span>
                                                    <span class="label-light-warning" v-if="saleorder.sales_log && saleorder.sales_log.is_invoice">invoiced</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" @click="editOrder(saleorder.id)" href="#">Edit</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="printData(saleorder)">Print</a>

                                                        <span v-if="!( saleorder.sales_log && saleorder.sales_log.is_delivery_note) && !(saleorder.sales_log && saleorder.sales_log.is_invoice )">
                                                            <hr style="margin: 2px 0;">
                                                            <a class="dropdown-item waves-effect waves-light" href="#" @click.prevent="convertToDeliveryNote(saleorder.id)">Convert to Delivery</a>
                                                            <a class="dropdown-item waves-effect waves-light" href="#" @click.prevent="convertToInvoice(saleorder.id)">Convert to Invoice</a>
                                                        </span>


                                                        <hr style="margin: 2px 0;">
                                                        <!-- <a class="dropdown-item waves-effect waves-light" href="#/product/edit" @click="sentMail(saleorder.id)">Send by Email</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit" @click="print_saleorder(saleorder.id)">Export as PDF</a> -->
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteOrder(saleorder.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="show_orders" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </section>

        <!-- full table -->

        <!-- printModal Modal -->
        <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="printModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <printDataModalBodyVue
                            :type="type"
                            :selected_data="selected_data"
                            :pdf_link="pdf_link"
                            :sentMail="sentMail"
                            :edit_content="editOrder"
                            :print_quote_id="print_quote_id">
                        </printDataModalBodyVue>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import SubHeader from "../sub_header";
    import tableFilterVue from '../../search_components/table_filter.vue';
    import printDataModalBodyVue from '../../modal_contents/printDataModalBody.vue';

    export default {
        components: {
            SubHeader,
            tableFilterVue,
            printDataModalBodyVue,
        },
        name: 'Saleorder',

        data: function(){
            return {
                type: 'sales_order',

                saleorders : false,

                selected_data: {},

                all_saleorders_count: 0,
                delivered_count: 0,
                invoiced_count: 0,
                not_delivered_count: 0,
                pertially_delivered_count: 0,
                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',

                data_get_url_status: 'all',
                print_quote_id: null,
                pdf_link:'',

                show_orders: {},
                not_delivered_orders: {},
                pertially_delivered_orders: {},
                delivered_orders: {},

                checked_id:[],
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "recipient": "",
                    "address": "",
                    "po_number": "",
                    "date": "",
                    "satus": "open",
                    "paid_satus": "not_delivered",
                    "delivery_date": "",
                    "payment_terms": "",
                    "selected_products":'',
                    "product": "",
                    "document_note": "",
                    "sub_total": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_notes": "",
                    "project": "",
                    "delivery_phone_number": "",
                    "private_note": "",
                    "attachments": "",
                    "files": [],

                    'checked_id':[],
                    "model_name":'',
                    "model_related":'',
                    "model_related_name":'',

                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function(){
            this.listSaleorders('all');
            this.getResults();
        },
        methods: {
            getResults: function(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/saleorders?status=`+status+'&page=' + page)
                    .then(response => {
                        this.show_orders = this.saleorders = response.data.datas;
                    });
            },
            listSaleorders: function (status) {
                var that = this;
                this.data_get_url_status = status;
                this.form.get(`/api/saleorders?status=`+status).then(function (response) {
                    that.show_orders = that.saleorders = response.data.datas;
                    // console.log(response);
                    that.all_saleorders_count = response.data.all_saleorders_count;
                    that.not_delivered_count = response.data.not_delivered_count;
                    that.pertially_delivered_count = response.data.pertially_delivered_count;
                    that.delivered_count = response.data.delivered_count;
                    that.invoiced_count = response.data.invoiced_count;
                })
            },
            createSaleorder: function(){

                var that = this;
                this.form.post('/api/saleorders').then(function(response){
                    that.saleorders.push(response.data);
                    that.form.reset();
                })

            },
            deleteSaleorder: function(id){
                var that = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/saleorder/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listInvoices('all');
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
            },
            showNotDeliveredOrders: function(){
                this.show_orders = this.not_delivered_orders;
            },
            showDeliveredOrders: function(){
                // console.log(this.delivered_orders);
                this.show_orders = this.delivered_orders;
            },
            showPertiallyOrders: function(){
                this.show_orders = this.pertially_delivered_orders;
            },
            editOrder: function(order_id){
                this.$router.replace({ name: 'EditSalesOrder', params: { id: order_id }});
            },
            convertToDeliveryNote: function(order_id){
                this.$router.replace({ name: 'convertSalesOrderToDeliveryNote', params: { id: order_id }});
            },
            convertToInvoice: function(order_id){
                this.$router.replace({ name: 'convertSalesOrderToInvoice', params: { id: order_id }});
            },
            deleteOrder: function (id) {
                var that = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/saleorders/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listSaleorders('all');
                        }).catch((err) => {
                            Toast.fire({
                                icon: 'error',
                                title: err.response.data.message
                            });
                        });
                    }
                })
            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/saleorders_by_day?key=${dayno}&type=${type}`;
                let that = this;

                axios.get(url)
                    .then((response)=>{
                        that.show_orders = that.saleorders = response.data;
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/saleorders_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_orders = that.saleorders = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/saleorders_search',formData)
                    .then((res)=>{
                        that.show_orders = this.saleorders = res.data;
                    })
            },
            printData: function(selected_data){
                this.selected_data = selected_data;
                $('#printModal').modal('show');
                // let that = this;
                // this.print_quote_id = id;
                // axios.get('/api/print-pdf/saleorder/'+id)
                //     .then((res)=>{
                //         that.pdf_link = res.data;
                //         $('#printModal').modal('show');
                //     })
            },
            print_saleorder: function(id){
                let that = this;
                axios.get('/api/print-pdf/saleorder/'+id)
                    .then((res)=>{
                        that.pdf_link = res.data;
                        var win = window.open(that.pdf_link, '_blank');
                        win.focus();
                    })
            },
            sentMail: function(id){
                let that = this;
                axios.get('/api/sent-mail/saleorder/'+id)
                    .then((res)=>{
                        // that.pdf_link = res.data;
                        alert('mail has been sent successfuly.');
                    })
            },
            checkAll: function(){
                if(this.checked_id.length > 0){
                    $('.check_single').prop('checked',false);
                    $('#check_all').prop('checked',false);
                    this.checked_id = [];
                }else{
                    $('.check_single').prop('checked',true);
                    this.show_orders.data.map((item)=>{
                        this.checked_id.push(item.id);
                    },this);
                }

            },
            checkSingle: function(id){
                $('#check_all').prop('checked',false)
                let array = this.checked_id;
                const index = array.indexOf(id);
                if (index > -1) {
                    array.splice(index, 1);
                }else{
                    array.push(id);
                }
                this.checked_id = array;
            },
            delete_selected_all: function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete all!'
                }).then((result) => {
                    if (result.value) {
                        this.form.checked_id = this.checked_id;
                        this.form.model_name = 'Saleorders';
                        this.form.model_related = 'SaleOrderProduct';
                        this.form.model_related_name = 'sale_order_id';
                        this.form.post('/api/delete_selected_all')
                            .then((res)=>{
                                console.log(res.data);
                                $('#check_all').prop('checked',false)
                                this.checked_id = [];
                                this.listSaleorders();
                            })
                    }
                })


            },
            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/sales-orders');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            }
        }
    }
</script>
