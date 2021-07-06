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
                                    <h4 style="border: 0;" class="page-title">Customer Payments</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/sales/customer-payment/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Customer Payments</router-link>
                                    <router-link to="/sales/customer-payment/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white new_dot nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li  style="float: left;">
                                    <a class="btn btn-white new_dot nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">View Customer Due Dates</a>
                                        <a class="dropdown-item" href="#">Export Customer Payments</a>
                                        <a class="dropdown-item" href="#">Make A Bank Deposite</a>
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
                                <!-- <a class="A54VNK-Zc-b" role="button">clear selection</a> -->
                            </div>
                            <div><button @click="delete_selected_all()" type="button" class="btn btn-danger">Delete</button></div>
                        </div>
                    </div>
                </div>

                <tableFilterVue
                    v-else
                    :show_list="customerpayments"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :list="listCustomerpayments"
                    :dataSort="dataSort"
                    :dataSearch="dataSearch"
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
                                        <a href="#messages" @click="listCustomerpayments('all')" class="active show" data-toggle="tab">
                                            All
                                            <span class="amount">{{all_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile"  @click="listCustomerpayments('paid')" data-toggle="tab">
                                            Paid
                                            <span class="amount">{{paid_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#home"  @click="listCustomerpayments('unpaid')" data-toggle="tab" >
                                            Unpaid
                                            <span class="amount">{{unpaid_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#messages" @click="listCustomerpayments('cancel')" data-toggle="tab">
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
                                                        <input type="checkbox" id="check_all" @click="checkAll()"  class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 102px;">Invoice Date</th>
                                        <th style="min-width: 100px;">Invoice NO</th>
                                        <th style="min-width: 125px;">Customer/Lead</th>
                                        <th class="text-right" style="min-width: 110px;">Amount</th>
                                        <th class="text-right" style="min-width: 110px;">Oustanding</th>
                                        <!-- <th style="min-width: 100px;" class="text-center">Due Date</th> -->
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="customer_payment in customerpayments.data" :key="customer_payment.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input @click="checkSingle(customer_payment.id)" :value="customer_payment.id" type="checkbox" class="filled-in check_single">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                {{customer_payment.payment_date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                {{customer_payment.invoice_code}} <br>
                                                {{customer_payment.code}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis text-success" @click="gotoCustomerProfile(customer_payment.customer_id)">
                                                {{customer_payment.customer}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                {{customer_payment.paid}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis">
                                                {{customer_payment.remaining}}
                                            </div>
                                        </td>
                                        <!-- <td class="text-center">
                                            <div class="ellipsis">

                                            </div>
                                        </td> -->
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                <div class="badge col-red">{{customer_payment.status}}</div>
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="printData(customer_payment.id)">Print</a>
                                                        <hr style="margin: 2px 0;">

                                                        <!-- <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Receive Payment</a> -->
                                                        <hr style="margin: 2px 0;">
                                                        <a class="dropdown-item waves-effect waves-light" href="#"  @click="sentMail(customer_payment.id)">Send by Email</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="print_customerpayments(customer_payment.id)">Export as PDF</a>
                                                        <a class="dropdown-item text-danger waves-effect waves-light" href="#" @click="deleteCustomerPayment(customer_payment.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="customerpayments" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>

                <!-- table -->

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
                            :pdf_link="pdf_link"
                            :print_quote="print_customerpayments"
                            :sentMail="sentMail"
                            :edit_content="editCustomerPayment"
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
            printDataModalBodyVue,
            tableFilterVue,
        },
        name: 'Customerpayment',

        data: function(){
            return {
                customerpayments : {},

                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',

                data_get_url_status: 'all',
                print_quote_id: null,
                pdf_link:'',

                all_count:0,
                unpaid_count:0,
                paid_count:0,
                cancel_count:0,

                checked_id:[],
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "invoice_id": "",
                    "code": "",
                    "total": "",
                    "paid": "",
                    "remaining": "",
                    "payment_method": "checque",
                    "bank_reference": "",
                    "payment_date": "",
                    "day_late": "",
                    "remaining_percent": "",
                    "project": "",

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
            this.listCustomerpayments('all');
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/customerpayments?status=`+status+'&page=' + page)
                    .then(response => {
                        this.customerpayments = response.data.datas;
                    });
            },
            listCustomerpayments: function(status){
                var that = this;
                this.data_get_url_status = status;
                axios.get('/api/customerpayments?status='+status).then(function(response){
                    that.customerpayments = response.data.datas;
                    that.all_count = response.data.all_count;
                    that.paid_count = response.data.paid_count;
                    that.unpaid_count = response.data.unpaid_count;
                    that.cancel_count = response.data.cancel_count;
                })

            },
            createCustomerpayment: function(){

                var that = this;
                this.form.post('/api/customerpayments').then(function(response){
                    that.customerpayments.push(response.data);
                    that.form.reset();
                })

            },
            deleteCustomerPayment: function (id) {
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
                        this.form.delete('/api/customerpayments/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listCustomerpayments('all');
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
            },

            editCustomerPayment: function(invoice_id){
                // this.$router.replace({ name: 'editInvoice', params: { id: invoice_id }});
                return 0;
            },

            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/customerpayments_by_day?key=${dayno}&type=${type}`;
                let that = this;

                axios.get(url)
                    .then((response)=>{
                        that.show_invoices = that.invoices = response.data;
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/customerpayments_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.customerpayments = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/customerpayments_search',formData)
                    .then((res)=>{
                        that.customerpayments = res.data;
                    })
            },
            printData: function(id){
                let that = this;
                this.print_quote_id = id;
                axios.get('/api/print-pdf/customerpayments/'+id)
                    .then((res)=>{
                        that.pdf_link = res.data;
                        $('#printModal').modal('show');
                    })
            },
            print_customerpayments: function(id){
                let that = this;
                axios.get('/api/print-pdf/customerpayments/'+id)
                    .then((res)=>{
                        that.pdf_link = res.data;
                        var win = window.open(that.pdf_link, '_blank');
                        win.focus();
                    })
            },
            sentMail: function(id){
                let that = this;
                axios.get('/api/sent-mail/customerpayments/'+id)
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
                    this.customerpayments.data.map((item)=>{
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
                        // this.form.model_name = 'Quotes';
                        // this.form.model_related = 'QuoteProduct';
                        // this.form.model_related_name = 'quote_id';
                        this.form.post('/api/customerpayments_deleteMultiple')
                            .then((res)=>{
                                console.log(res.data);
                                $('#check_all').prop('checked',false)
                                this.checked_id = [];
                                this.listCustomerpayments();
                            })
                    }
                })


            },
            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/customer-payments');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            }

        }
    }
</script>
