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
                                    <h4 style="border: 0;" class="page-title">Invoice</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to='/sales/invoice/create' class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Invoice</router-link>
                                    <router-link to="/sales/invoice/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
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
                                        <a class="dropdown-item" href="/invoice-export-to-exel" target="_blank">Export Invoice</a>
                                        <a class="dropdown-item" href="/invoice-line-export-to-exel" target="_blank">Export Invoice Line</a>
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
                                <a :href="'/invoice-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank" style="line-height:26px;" class="btn btn-warning">Export Selected</a>
                                <a :href="'/invoice-line-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank"  style="line-height:26px;"  class="btn btn-warning">Export Line Selected</a>
                            </div>
                        </div>
                    </div>
                </div>

                <tableFilterVue
                    v-else
                    :show_list="show_invoices"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :list="listInvoices"
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
                                        <a href="#" @click="listInvoices('all')" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{all_invoices_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listInvoices('unpaid')" data-toggle="tab" >
                                            Unpaid
                                            <span class="amount">{{unpaid_invoices_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listInvoices('paid')" data-toggle="tab">
                                            Paid
                                            <span class="amount">{{paid_invoices_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listInvoices('cancel')" data-toggle="tab">
                                            Cancel
                                            <span class="amount">{{cancel_invoices_count}}</span>
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
                                        <th style="min-width: 102px;">Invoice Date</th>
                                        <th style="min-width: 100px;">Invoice NO</th>
                                        <th style="min-width: 125px;">Customer/Lead</th>
                                        <th class="text-right" style="min-width: 110px;">Amount</th>
                                        <th class="text-right" style="min-width: 110px;">Oustanding</th>
                                        <th style="min-width: 100px;" class="text-center">Due Date</th>
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                        <th class="text-center" style="width: 165px;min-width: 165px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="show_invoice in show_invoices.data" :key="show_invoice.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input @click="checkSingle(show_invoice.id)" :value="show_invoice.id" type="checkbox" class="filled-in check_single">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis"  @click="editInvoice(show_invoice.id)">
                                                {{show_invoice.date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis"  @click="editInvoice(show_invoice.id)">
                                                {{show_invoice.code}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis text-success"  @click="gotoCustomerProfile(show_invoice.customer_id)">
                                                {{show_invoice.customer}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis"  @click="editInvoice(show_invoice.id)">
                                                {{show_invoice.total}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis"  @click="editInvoice(show_invoice.id)">
                                                {{show_invoice.total - show_invoice.paid}}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis"  @click="editInvoice(show_invoice.id)">
                                                {{show_invoice.payment_date}}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis"  @click="editInvoice(show_invoice.id)">
                                                <span v-html="payment_status(show_invoice)"></span>
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <a href="#" class="btn btn-white invoice_btn"
                                                v-if="show_invoice.sales_log && show_invoice.sales_log.is_delivery_note">
                                                Email
                                            </a>
                                            <a href="#" class="btn btn-white invoice_btn"
                                                @click.prevent="convertToDeliveryNote(show_invoice)" v-else>
                                                Deliver
                                            </a>
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="editInvoice(show_invoice.id)">Edit</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="printData(show_invoice)">Print</a>
                                                        <hr style="margin: 2px 0;">

                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Receive Payment</a>
                                                        <hr style="margin: 2px 0;">
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="sentMail(show_invoice.id)">Send by Email</a>
                                                        <a class="dropdown-item waves-effect waves-light" href="#" @click="print_invoice(show_invoice.id)">Export as PDF</a>
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteInvoice(show_invoice.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="show_invoices" @pagination-change-page="getResults"></pagination>
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
                            :print_quote="print_invoice"
                            :sentMail="sentMail"
                            :edit_content="editInvoice"
                            :print_quote_id="print_quote_id">
                        </printDataModalBodyVue>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import tableFilterVue from '../../search_components/table_filter.vue';
    import SubHeader from "../sub_header";
    import printDataModalBodyVue from '../../modal_contents/printDataModalBody.vue';

    export default {
        components: {
            SubHeader,
            printDataModalBodyVue,
            tableFilterVue,
        },

        name: 'Invoice',

        data: function () {
            return {
                type: 'invoice',
                selected_data: {},

                invoices: false,
                invoices_count: 0,
                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',

                data_get_url_status: 'all',
                print_quote_id: null,
                pdf_link:'',

                unpaid_invoices_count: 0,
                paid_invoices_count: 0,
                all_invoices_count: 0,
                cancel_invoices_count: 0,

                show_invoices: {},
                paid_invoices: {},
                unpaid_invoices: {},
                all_invoices: {},
                cancel_invoices: {},

                checked_id:[],

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "date": "",
                    "recipient": "",
                    "payment_terms": "",
                    "address": "",
                    "currency": "",
                    "is_upload": "",
                    "deposit_to": "",
                    "product": "",
                    "document_note": "",
                    "sub_total": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "po_number": "",
                    "project": "",
                    "assigned_to": "",
                    "private_note": "",
                    "attachments": "",

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
            this.listInvoices('all');
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/invoices?status=`+status+'&page=' + page)
                    .then(response => {
                        this.show_invoices = this.invoices = response.data.datas;
                    });
            },
            listInvoices: function (status) {
                var that = this;
                this.data_get_url_status = status;
                this.form.get(`/api/invoices?status=`+status).then(function (response) {
                    that.show_invoices = that.invoices = response.data.datas;

                    that.all_invoices_count = response.data.all_invoices_count;
                    that.unpaid_invoices_count = response.data.unpaid_invoices_count;
                    that.paid_invoices_count = response.data.paid_invoices_count;
                    that.cancel_invoices_count = response.data.cancel_invoices_count;
                })
            },

            deleteInvoice: function (id) {
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
                        this.form.delete('/api/invoices/' + id).then(() => {
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

            editInvoice: function(invoice_id){
                this.$router.replace({ name: 'editInvoice', params: { id: invoice_id }});
            },

            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/invoices_by_day?key=${dayno}&type=${type}`;
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
                let url = `/api/invoices_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_invoices = that.invoices = response.data;
                    })
            },

            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/invoices_search',formData)
                    .then((res)=>{
                        that.show_invoices = this.invoices = res.data;
                    })
            },

            printData: function(selected_data){
                this.selected_data = selected_data;
                $('#printModal').modal('show');

                // let that = this;
                // this.print_quote_id = id;
                // axios.get('/api/print-pdf/invoice/'+id)
                //     .then((res)=>{
                //         that.pdf_link = res.data;
                //         $('#printModal').modal('show');
                //     })
            },

            print_invoice: function(id){
                let that = this;
                // axios.get('/api/print-pdf/invoice/'+id)
                //     .then((res)=>{
                //         that.pdf_link = res.data;
                //         var win = window.open(that.pdf_link, '_blank');
                //         win.focus();
                //     })
            },

            sentMail: function(id){
                let that = this;
                axios.get('/api/sent-mail/invoice/'+id)
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
                    this.show_invoices.data.map((item)=>{
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
                        this.form.checked_id = this.checked_id;
                        this.form.model_name = 'Invoices';
                        this.form.model_related = 'InvoiceProduct';
                        this.form.model_related_name = 'invoice_id';
                        this.form.post('/api/delete_selected_all')
                            .then((res)=>{
                                console.log(res.data);
                                $('#check_all').prop('checked',false)
                                this.checked_id = [];
                                this.listInvoices();
                            })
                    }
                })
            },

            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/invoices');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            },

            payment_status: function(invoice){
                const date1 = new Date(new Date().toISOString().replace(/T.*/,'').split('-').join('-'));
                const date2 = new Date(invoice.payment_date);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                // console.log(diffTime + " milliseconds");
                // console.log(diffDays + " days", date1 > date2);

                if(invoice.status == 'paid'){
                    return `<span class="A54VNK-Of-a ellipsis label-light label-light-success">
                                <span title="paid">paid</span>
                            </span>`;
                }
                if(invoice.status == 'cancelled'){
                    return `<span class="A54VNK-Of-a ellipsis label-light label-light-info">
                                <span title="Cancelled">Cancelled</span>
                            </span>`;
                }
                if(date1 > date2){
                    return `<span class="A54VNK-Of-a ellipsis label-light label-light-danger">
                                <span title="${diffDays + ' days late'}">${diffDays + ' days late'}</span>
                            </span>`;
                }else{
                    return `<span class="A54VNK-Of-a ellipsis label-light label-light-warning">
                                <span title="${diffDays + ' days left'}">${diffDays + ' days left'}</span>
                            </span>`;
                }
            },

            convertToDeliveryNote: function(invoice){
                this.$router.push({ name: 'InvoiceToDeliveryNotes', params: { id: invoice.id }});
            }
        },
        computed: {

        }
    }
</script>
