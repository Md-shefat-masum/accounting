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
                                    <h4 style="border: 0;" class="page-title">Sales Recipts</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to='/sales/receipt/create' class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Sales Recipts</router-link>
                                    <router-link to='/sales/receipt/create' class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
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
                                        <a class="dropdown-item">Export Sales Recipts</a>
                                        <a class="dropdown-item">Make a Bank Deposite</a>
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
                                <a class="A54VNK-Zc-b" role="button">clear selection</a>
                            </div>
                            <div><button @click="delete_selected_all()" type="button" class="btn btn-danger">Delete</button></div>
                        </div>
                    </div>
                </div>

                <tableFilterVue
                    v-else
                    :show_list="show_receipts"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :dataSearch="dataSearch"
                    :list="listReceipts"
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
                                        <a href="#" @click="listReceipts('all')" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{all_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listReceipts('undeposit')" data-toggle="tab">
                                            Undeposited
                                            <span class="amount">{{undeposit_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listReceipts('deposit')" data-toggle="tab">
                                            Deposited
                                            <span class="amount">{{deposit_count}}</span>
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
                                        <th style="min-width: 138px;">Sales Recipts Date</th>
                                        <th style="min-width: 135px;">Sales Recipts</th>
                                        <th style="min-width: 160px;">Category</th>
                                        <th style="min-width: 160px;">Paid By</th>
                                        <th class="text-right" style="min-width: 120px;">Amount</th>
                                        <!-- <th class="text-right" style="min-width: 120px;">Memo</th> -->
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="show_receipt in show_receipts.data" :key="show_receipt.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input @click="checkSingle(show_receipt.id)" :value="show_receipt.id" type="checkbox" class="check_single filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editReceipt(show_receipt.id)">
                                                {{show_receipt.billing_date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editReceipt(show_receipt.id)">
                                                {{show_receipt.code}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editReceipt(show_receipt.id)">
                                                <div v-for="split in show_receipt.receipt_splits" :key="split.id" class="A54VNK-rj-a label-light ellipsis px-1" style="background-color: rgb(234, 245, 243); color: rgb(2, 113, 93);">
                                                    <div class="ellipsis" :title="split.category">{{split.category}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis text-success" @click="gotoCustomerProfile(show_receipt.customer_id)">
                                                {{show_receipt.paid_by}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis" @click="editReceipt(show_receipt.id)">
                                                {{show_receipt.amount}}
                                            </div>
                                        </td>
                                        <!-- <td class="text-right">
                                            <div class="ellipsis" @click="editReceipt(show_receipt.id)">

                                            </div>
                                        </td> -->
                                        <td class="text-center">
                                            <div class="ellipsis" @click="editReceipt(show_receipt.id)">
                                                <div class="badge col-red">{{show_receipt.receipt_status}}</div>
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="printData(show_receipt)">Print</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="sentMail(show_receipt.id)">Send by Email</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="print_quote(show_receipt.id)">Export as PDF</a>
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteReceipt(show_receipt.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="show_receipts" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>

                <!-- table -->

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
                                    :print_quote="print_quote"
                                    :sentMail="sentMail"
                                    :edit_content="editReceipt"
                                    :print_quote_id="print_quote_id">
                                </printDataModalBodyVue>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- full table -->
    </div>
</template>


<script>

    import SubHeader from "../sub_header";
    import tableFilterVue from '../../search_components/table_filter.vue';
    import printDataModalBodyVue from '../../modal_contents/printDataModalBody.vue';

    export default {
        components: {
            SubHeader,
            printDataModalBodyVue,
            tableFilterVue,
        },
        name: 'Receipt',

        data: function () {
            return {
                type: 'receipt',
                receipts: {},
                pdf_link:'',
                print_quote_id:0,
                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',

                selected_data: {},

                data_get_url_status: 'all',

                show_receipts: {},

                all_count: 0,
                undeposit_count: 0,
                deposit_count: 0,

                checked_id:[],

                form: new Form({
                    "id": "",
                    "paid_by": "",
                    "billing_date": "",
                    "receipts_category": "",
                    "is_paid": "",
                    "payment_method": "",
                    "paid_on": "",
                    "bank": "",
                    "transaction_id": "",
                    "attachments": "",
                    "project": "",
                    "assigned_to": "",

                    'checked_id':[],
                    "model_name":'',
                    "model_related":'',
                    "model_related_name":'',

                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listReceipts('all');
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/receipts?status=`+status+'&page=' + page)
                    .then(response => {
                        this.show_receipts = this.receipts = response.data.datas;
                    });
            },
            listReceipts: function (status) {
                var that = this;
                this.data_get_url_status = status;
                this.form.get(`/api/receipts?status=`+status).then(function (response) {
                    that.show_receipts = that.receipts = response.data.datas;

                    that.all_count = response.data.all_count;
                    that.undeposit_count = response.data.undeposit_count;
                    that.deposit_count = response.data.deposit_count;
                })
            },
            createReceipt: function () {

                var that = this;
                this.form.post('/api/receipts').then(function (response) {
                    that.receipts.push(response.data);
                    that.form.reset();
                })

            },
            editReceipt: function(receipt_id){
                this.$router.replace({ name: 'editReceipt', params: { id: receipt_id }});
            },
            deleteReceipt: function (id) {
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
                        this.form.delete('/api/receipts/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listReceipts('all');
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
            },
            printData: function(receipt){
                let that = this;
                this.print_quote_id = receipt.id;
                this.selected_data = receipt;
                $('#printModal').modal('show');
                // axios.get('/api/print-pdf/receipt/'+receipt_Id)
                //     .then((res)=>{
                //         that.pdf_link = res.data;
                //         $('#printModal').modal('show');
                //     })
            },
            print_quote: function(receipt_Id){
                let that = this;
                axios.get('/api/print-pdf/receipt/'+receipt_Id)
                    .then((res)=>{
                        that.pdf_link = res.data;
                        var win = window.open(that.pdf_link, '_blank');
                        win.focus();
                    })
            },
            sentMail: function(print_quote_id){
                let that = this;
                axios.get('/api/sent-mail/receipt/'+print_quote_id)
                    .then((res)=>{
                        // that.pdf_link = res.data;
                        alert('mail has been sent successfuly.');
                    })
            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/receipts_by_day?key=${dayno}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_receipts = that.receipts = response.data;
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/receipts_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_receipts = that.receipts = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/receipts_search',formData)
                    .then((res)=>{
                        that.show_receipts = this.receipts = res.data;
                    })
            },
            checkAll: function(){
                if(this.checked_id.length > 0){
                    $('.check_single').prop('checked',false);
                    $('#check_all').prop('checked',false);
                    this.checked_id = [];
                }else{
                    $('.check_single').prop('checked',true);
                    this.show_receipts.data.map((item)=>{
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
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.checked_id = this.checked_id;
                        this.form.model_name = 'Receipts';
                        this.form.model_related = 'ReceiptSplit';
                        this.form.model_related_name = 'receipt_id';
                        this.form.post('/api/delete_selected_all')
                            .then((res)=>{
                                console.log(res.data);
                                $('#check_all').prop('checked',false)
                                this.checked_id = [];
                                this.listReceipts();
                            })
                    }
                })


            },
            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/receipts');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            }
        }
    }
</script>
