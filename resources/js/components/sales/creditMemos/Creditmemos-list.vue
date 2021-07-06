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
                                    <h4 style="border: 0;" class="page-title">Credit Memos</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/sales/credit-memo/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Credit Memos</router-link>
                                    <router-link to="/sales/credit-memo/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
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
                                        <a class="dropdown-item" href="/credit-memos-export-to-exel" target="_blank">Export Credit Memos</a>
                                        <a class="dropdown-item"  href="/credit-memos-line-export-to-exel" target="_blank">Export Credit Memos Line</a>
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

                <tableFilterVue
                    v-else
                    :show_list="show_creditmemos"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :dataSearch="dataSearch"
                    :list="listMemos"
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
                                        <a href="#home" @click="listMemos('all')" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{memo_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#messages" @click="listMemos('cancel')" data-toggle="tab">
                                            Cancel
                                            <span class="amount">{{cancel_count}}</span>
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
                                                        <input type="checkbox" id="check_all" @click="checkAll()" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 120px;">Invoice Date</th>
                                        <th style="min-width: 120px;">Payment</th>
                                        <th style="min-width: 155px;">Customer/Lead</th>
                                        <th class="text-right" style="min-width: 120px;">Amount</th>
                                        <!-- <th style="min-width: 110px;" class="text-right">Due Date</th>
                                        <th style="min-width: 110px;" class="text-center">Paid Date</th> -->
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="credit_memo in show_creditmemos.data" :key="credit_memo.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" @click="checkSingle(credit_memo.id)" :value="credit_memo.id" class="filled-in check_single">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editCreditMemo(credit_memo.id)" class="ellipsis">
                                                {{credit_memo.date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editCreditMemo(credit_memo.id)" class="ellipsis">
                                                {{credit_memo.payment_terms}}
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="gotoCustomerProfile(credit_memo.customer_id)" class="ellipsis text-success">
                                                {{credit_memo.customer}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div @click="editCreditMemo(credit_memo.id)" class="ellipsis">
                                                Tk {{credit_memo.total}}
                                            </div>
                                        </td>
                                        <!-- <td class="text-right">
                                            <div class="ellipsis">
                                                24/11/2020
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                24/11/2020
                                            </div>
                                        </td> -->
                                        <td class="text-center">
                                            <div @click="editCreditMemo(credit_memo.id)" class="ellipsis">
                                                <div class="badge col-red">{{credit_memo.memo_status}}</div>
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Close</a>
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteCreditmemo(credit_memo.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="show_creditmemos" @pagination-change-page="getResults"></pagination>
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
    import tableFilterVue from '../../search_components/table_filter.vue';
    import SubHeader from "../sub_header";

    export default {
        components: {
            SubHeader,
            tableFilterVue,
        },
        name: 'Creditmemo',

        data: function(){
            return {
            creditmemos : {},
            show_creditmemos : {},

            data_sort_type: 'sorted by Creation date',
            data_by_day_name: 'any date',
            data_get_url_status: 'all',

            memo_count: 0,
            cancel_count: 0,

            checked_id:[],
            form: new Form({
                    "id" : "",
                    "customer" : "",
                    "date" : "",
                    "recipient" : "",
                    "payment_terms" : "",
                    "address" : "",
                    "currency" : "",
                    "products" : "",
                    "document_note" : "",
                    "subtotal" : "",
                    "discount_rate" : "",
                    "discount_amount" : "",
                    "vat" : "",
                    "total" : "",
                    "delivery_contact" : "",
                    "delivery_address" : "",
                    "project" : "",
                    "assigned_to" : "",
                    "private_note" : "",
                    "attachments" : "",

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
            this.listMemos();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/creditmemos?status=`+status+'&page=' + page)
                    .then(response => {
                        that.show_creditmemos = that.creditmemos = response.data.datas;
                    });
            },
            listMemos: function (status) {
                var that = this;
                this.data_get_url_status = status;
                this.form.get(`/api/creditmemos?status=`+status).then(function (response) {
                    that.show_creditmemos = that.creditmemos = response.data.datas;

                    that.memo_count = response.data.memo_count;
                    that.cancel_count = response.data.cancel_count;
                })
            },
            createCreditmemo: function(){

                var that = this;
                this.form.post('/api/creditmemos').then(function(response){
                    that.creditmemos.push(response.data);
                    that.form.reset();
                })

            },
            deleteCreditmemo: function(id){

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
                        this.form.delete('/api/creditmemos/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listMemos('all');
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
            },
            editCreditMemo: function(memo_id){
                this.$router.replace({ name: 'editCreditMemo', params: { id: memo_id }});
            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/creditmemos_by_day?key=${dayno}&type=${type}`;
                let that = this;

                axios.get(url)
                    .then((response)=>{
                        that.show_creditmemos = that.creditmemos = response.data;
                        // console.log(response);
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/creditmemos_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_creditmemos = that.creditmemos = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/creditmemos_search',formData)
                    .then((res)=>{
                        that.show_creditmemos = this.creditmemos = res.data;
                    })
            },
            checkAll: function(){
                if(this.checked_id.length > 0){
                    $('.check_single').prop('checked',false);
                    $('#check_all').prop('checked',false);
                    this.checked_id = [];
                }else{
                    $('.check_single').prop('checked',true);
                    this.show_creditmemos.data.map((item)=>{
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
                        this.form.model_name = 'Creditmemos';
                        this.form.model_related = 'creditMemosProduct';
                        this.form.model_related_name = 'credit_memo_id';
                        this.form.post('/api/delete_selected_all')
                            .then((res)=>{
                                console.log(res.data);
                                $('#check_all').prop('checked',false)
                                this.checked_id = [];
                                this.listMemos();
                            })
                    }
                })


            },
            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/credit-memos');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            }
        }
    }
</script>
