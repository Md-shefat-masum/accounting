<template>
    <div>
        <sub-header type="basic"/>

        <!-- full table -->

        <section class="content content-menu">
            <div class="container-fluid">

                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
                            <ul class="breadcrumb breadcrumb-style d-inline-block mb-0">
                                <li class="breadcrumb-item">
                                    <h4 style="border: 0;" class="page-title">Quotes</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0 pr-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/sales/quote/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">
                                        New Quotes
                                    </router-link>
                                    <router-link to="/sales/quote/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block">
                                        <i class="fas fa-plus"></i>
                                    </router-link>
                                </li>
                                <!-- <li class="d" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2" href='#'>
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li> -->
                                <li style="float: left;">
                                    <a class="btn new_dot btn-white nav-link dropdown-toggle" href="#"
                                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/quotes-export-to-exel" target="_blank">Export Quotes</a>
                                        <a class="dropdown-item" href="/quotes-line-export-to-exel" target="_blank">Export Quote Lines</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- filter -->

                <div class="row" v-if="checked_id.length>0 ">
                    <div class="col-12">
                        <div class="page-panel A54VNK-Zc-c" style="display: flex;justify-content:space-between;background:white;padding: 5px 10px;">
                            <div class="d-flex align-items-center">
                                <span class="bolder d-flex align-items-center">{{checked_id.length}} selected </span>
                                <a class="A54VNK-Zc-a" role="button" style="display: none;" aria-hidden="true">select all</a>
                                <span style="display: none;" aria-hidden="true">|</span>
                            </div>
                            <div>
                                <button @click="delete_selected_all()" type="button" class="btn btn-danger">Delete</button>
                                <a :href="'/quotes-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank" style="line-height:26px;" class="btn btn-warning">Export Selected</a>
                                <a :href="'/quotes-line-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank"  style="line-height:26px;"  class="btn btn-warning">Export Line Selected</a>

                            </div>
                        </div>
                    </div>
                </div>

                <tableFilterVue
                    v-else
                    :show_list="show_quotes"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :dataSearch="dataSearch"
                    :list="listQuotes"
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
                                        <a href="#" @click="listQuotes()" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{quotes_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listQuotes('open')" data-toggle="tab">
                                            Open
                                            <span class="amount">{{open_quotes_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="mobile_d_none">
                                        <a href="#" @click="listQuotes('won')" data-toggle="tab">
                                            Won
                                            <span class="amount">{{won_quotes_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="mobile_d_none">
                                        <a href="#" @click="listQuotes('lost')" data-toggle="tab">
                                            Lost
                                            <span class="amount">{{lost_quotes_count}}</span>
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
                        <div class="table-responsive" v-if="get_window_width > 992">
                            <table class="table table-hover mb-0">
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
                                        <th style="min-width: 95px;">Quote Date</th>
                                        <th style="min-width: 90px;">Quote No</th>
                                        <th style="min-width: 90px;">Customer</th>
                                        <th class="text-right" style="min-width: 90px;">Amount</th>
                                        <th class="text-center" style="min-width: 125px;">Expiration Date</th>
                                        <th class="text-center" style="min-width: 90px;">Status</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="quote in show_quotes.data" :key="quote.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" @click="checkSingle(quote.id)" :value="quote.id" class="filled-in check_single">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editQuote(quote.id)" class="ellipsis">
                                                {{quote.date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editQuote(quote.id)" class="ellipsis color_blue">
                                                {{quote.code}}
                                                <!-- QST-{{quote.code}} -->
                                            </div>
                                        </td>
                                        <td>
                                            <div v-if="quote.check_customer_exists" @click="gotoCustomerProfile(quote.customer_id)" class="ellipsis color_blue">
                                                {{quote.customer}}
                                            </div>
                                            <div v-else title="customer not exists" class="ellipsis color_blue">
                                                {{quote.customer}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div @click="editQuote(quote.id)" class="ellipsis">
                                                <!-- {{quote.total}} -->
                                                <span class="text-uppercase">{{ get_basic_information.currency }}</span>
                                                {{ quote.amount_number_format }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div @click="editQuote(quote.id)" class="ellipsis">
                                                {{quote.expiration_date}}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div @click="editQuote(quote.id)" class="ellipsis">
                                                <div class="label-light-success" v-if="quote.status == 'open'">{{quote.status}}</div>
                                                <div v-else>
                                                    <span class="label-light-info" v-if="quote.status == 'won'">won</span>
                                                    <span class="label-light-success" v-if="quote.sales_log && quote.sales_log.is_sales_order">ordered</span>
                                                    <span class="label-light-warning" v-if="quote.sales_log && quote.sales_log.is_invoice">invoiced</span>
                                                    <span class="label-light-info" v-if="quote.status == 'lost'">lost</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;"
                                                    class="btn btn-white dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light"
                                                            @click="editQuote(quote.id)">edit
                                                        </a>
                                                        <a class="dropdown-item waves-effect waves-light"
                                                            @click="printData(quote)" href="#">Print
                                                        </a>

                                                        <span v-if="!( quote.sales_log && quote.sales_log.is_sales_order) && !(quote.sales_log && quote.sales_log.is_invoice )">
                                                            <hr style="margin: 2px 0;">
                                                            <a class="dropdown-item waves-effect waves-light"
                                                                @click="QuotesToSaleOrder(quote.id)" href="#">
                                                                Convert to Sales Order
                                                            </a>
                                                            <a class="dropdown-item waves-effect waves-light"
                                                                @click="QuotesToInvoice(quote.id)" href="#">
                                                                Convert to Invoice
                                                            </a>
                                                        </span>

                                                        <hr style="margin: 2px 0;">
                                                        <!-- <a class="dropdown-item waves-effect waves-light"
                                                            @click="sentMail(quote.id)"
                                                            href="#">Send by Email</a>
                                                        <a class="dropdown-item waves-effect waves-light"
                                                            @click="print_quote(quote.id)"
                                                            href="#">Export as PDF</a> -->
                                                        <a class="dropdown-item text-danger waves-effect waves-light"
                                                            @click="deleteQuotes(quote.id)"
                                                            >Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div v-else class="sm_list_card_body">

                            <div class="grid_card" v-for="quote in show_quotes.data" :key="quote.id">
                                <div class="PMRVCW-je-c">
                                    <div class="card rounded-sm">
                                        <div class="PMRVCW-je-d card-body">
                                            <div class="pull-right text-muted PMRVCW-je-i">
                                                <div><span class="">{{quote.date}}</span></div>
                                            </div>
                                            <div>
                                                <div>
                                                    <h4 class="no-margin-top PMRVCW-hk-a">
                                                        <a class="ellipsis-block" @click.prevent="editQuote(quote.id)" href="#" :title="quote.code">Quote {{quote.code}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <ul class="list-inline PMRVCW-je-g">
                                                    <li class="ellipsis-inline">
                                                        <span class="ellipsis-inline PMRVCW-jk-a">
                                                            <a class="text-muted ellipsis-inline PMRVCW-jk-a" v-if="quote.check_customer_exists" @click.prevent="gotoCustomerProfile(quote.customer_id)" href="#" :title="quote.customer">{{quote.customer}}</a>
                                                            <a class="text-muted ellipsis-inline PMRVCW-jk-a" v-else href="#" :title="quote.customer">{{quote.customer}}</a>
                                                            <span class="small" aria-hidden="true" style="display: none;"></span>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <div class="pull-right text-right">
                                                    <div class="PMRVCW-je-a">{{ get_basic_information.currency }} {{ quote.amount_number_format }}</div>
                                                </div>
                                                <ul class="list-inline PMRVCW-je-g PMRVCW-je-h">
                                                    <li>
                                                        <span class="PMRVCW-Rf-a ellipsis">
                                                            <!-- <span title="In 3 weeks">In 3 weeks</span> -->
                                                            <div class="label-light-success" v-if="quote.status == 'open'">{{quote.status}}</div>
                                                            <div v-else>
                                                                <span class="label-light-info" v-if="quote.status == 'won'">won</span>
                                                                <span class="label-light-success" v-if="quote.sales_log && quote.sales_log.is_sales_order">ordered</span>
                                                                <span class="label-light-warning" v-if="quote.sales_log && quote.sales_log.is_invoice">invoiced</span>
                                                                <span class="label-light-info" v-if="quote.status == 'lost'">lost</span>
                                                            </div>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="PMRVCW-Mj-a clearfix actions pb-3 small_card_bottom_action">
                                            <div class="d-flex justify-content-between px-3">
                                                <div class="PMRVCW-fk-b">
                                                    <!-- <button class="btn PMRVCW-fk-a" data-action="CONVERT" data-convert-to-type="SALES_ORDER">
                                                        <span class="picto-font PMRVCW-fk-d"></span>
                                                        <span class="PMRVCW-fk-c">Order</span>
                                                    </button> -->
                                                </div>
                                                <div class="PMRVCW-gk-b">
                                                    <!-- <button class="btn PMRVCW-gk-a" type="button" data-action="EMAIL">
                                                        <span class="picto-font PMRVCW-gk-c" title="Email">M</span>
                                                    </button> -->
                                                </div>
                                                <div class="PMRVCW-Lh-b">
                                                    <button aria-expanded="false" class="btn shadow-none dropdown-toggle PMRVCW-Lh-a" data-toggle="dropdown" type="button" aria-label="More Actions">
                                                        <span class="picto-font PMRVCW-Lh-c"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a @click.prevent="QuotesToSaleOrder(quote.id)" v-if="!( quote.sales_log && quote.sales_log.is_sales_order) && !(quote.sales_log && quote.sales_log.is_invoice )" class="gwt-Anchor" href="#">
                                                                <span class="picto-font PMRVCW-aj-c"></span> <span>Convert to Sales Order</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a @click.prevent="QuotesToInvoice(quote.id)" v-if="!( quote.sales_log && quote.sales_log.is_sales_order) && !(quote.sales_log && quote.sales_log.is_invoice )" class="gwt-Anchor" href="#">
                                                                <span class="picto-font PMRVCW-aj-c"></span> <span>Convert to Invoice</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="gwt-Anchor" @click.prevent="printData(quote)" href="#">
                                                                <span class="picto-font PMRVCW-aj-c">/</span>
                                                                <span>Print</span>
                                                            </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a class="gwt-Anchor" data-action="DUPLICATE" data-duplicate="DATA" href="javascript:void(0)">
                                                                <span class="picto-font PMRVCW-aj-c">r</span> <span>Duplicate</span>
                                                            </a>
                                                        </li> -->
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a class="gwt-Anchor PMRVCW-aj-a" @click.prevent="deleteQuotes(quote.id)" data-action="DELETE" href="#">
                                                                <span class="picto-font PMRVCW-aj-c">#</span>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="PMRVCW-Mj-b" aria-hidden="true" style="display: none;">Processing...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <pagination :data="show_quotes" @pagination-change-page="getResults"></pagination>
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
                            :print_quote="print_quote"
                            :sentMail="sentMail"
                            :edit_content="editQuote"
                            :print_quote_id="print_quote_id">
                        </printDataModalBodyVue>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import printDataModalBodyVue from '../../modal_contents/printDataModalBody.vue';
    import SubHeader from "../sub_header";
    import tableFilterVue from '../../search_components/table_filter.vue';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            SubHeader,
            printDataModalBodyVue,
            tableFilterVue,
        },
        name: 'Quote',

        data: function () {
            return {
                type: 'quotation',

                print_quote_id: null,
                pdf_link:'',
                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',

                selected_data: {},

                data_get_url_status: 'all',

                show_quotes: {},
                quotes: {},
                open_quotes: {},
                won_quotes: {},
                lost_quotes: {},

                quotes_count: 0,
                open_quotes_count: 0,
                won_quotes_count: 0,
                lost_quotes_count: 0,

                checked_id:[],
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "code": "",
                    "date": "",
                    "recipient": "",
                    "status": "",
                    "address": "",
                    "expiration_date": "",
                    "payment_terms": "",
                    "currency": "",
                    "products": "",
                    "document_note": "",
                    "subtotal": "",
                    "discount_rate": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
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
            this.listQuotes('all');
            this.getResults();
        },

        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/quotes?status=`+status+'&page=' + page)
                    .then(response => {
                        this.show_quotes = this.quotes = response.data.datas;
                    });
            },
            listQuotes: function (status) {
                var that = this;
                this.data_by_day_name = 'any date';
                this.data_get_url_status = status;
                this.form.get(`/api/quotes?status=`+status).then(function (response) {
                    that.show_quotes = that.quotes = response.data.datas;
                    that.quotes_count = response.data.quotes_count;
                    that.open_quotes_count = response.data.open_quotes_count;
                    that.won_quotes_count = response.data.won_quotes_count;
                    that.lost_quotes_count = response.data.lost_quotes_count;
                })
            },
            editQuote: function(print_quote_id){
                this.$router.push({ name: 'editQuote', params: { id: print_quote_id }});
            },
            deleteQuotes: function (id) {
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
                        this.form.delete('/api/quotes/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listQuotes('all');
                        }).catch((err) => {
                            // console.log(err.response.data);
                            Toast.fire({
                                icon: 'error',
                                title: err.response.data.message
                            });
                        });
                    }
                })
            },
            printData: function(selected_data){
                this.selected_data = selected_data;
                $('#printModal').modal('show');
                // let that = this;
                this.print_quote_id = selected_data.id;
                // axios.get('/api/print-pdf/quotation/'+quote_id)
                //     .then((res)=>{
                //         that.pdf_link = res.data;
                //         $('#printModal').modal('show');
                //     })
            },
            print_quote: function(quote_id){
                let that = this;
                axios.get('/api/print-pdf/quotation/'+quote_id)
                    .then((res)=>{
                        that.pdf_link = res.data;
                        var win = window.open(that.pdf_link, '_blank');
                        win.focus();
                    })
            },
            sentMail: function(print_quote_id){
                let that = this;
                axios.get('/api/sent-mail/quotation/'+print_quote_id)
                    .then((res)=>{
                        // that.pdf_link = res.data;
                        alert('mail has been sent successfuly.');
                    })
            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/qutation_by_day?key=${dayno}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        if(response.data.datas){
                            that.show_quotes = that.quotes = response.data.datas;
                        }else{
                            that.show_quotes = that.quotes = response.data;
                        }
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/qutation_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        if(response.data.datas){
                            that.show_quotes = that.quotes = response.data.datas;
                        }else{
                            that.show_quotes = that.quotes = response.data;
                        }
                    })
            },
            dataSearch: function(target_value = null){

                let value = target_value ? target_value : $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/quotes_search',formData)
                    .then((res)=>{
                        that.show_quotes = this.quotes = res.data;
                    })
            },
            QuotesToSaleOrder: function(quote_id){
                this.$router.replace({ name: 'QuotesToSaleOrder', params: { id: quote_id }});
            },
            QuotesToInvoice: function(quote_id){
                this.$router.replace({ name: 'QuotesToInvoice', params: { id: quote_id }});
            },
            checkAll: function(){
                if(this.checked_id.length > 0){
                    $('.check_single').prop('checked',false);
                    $('#check_all').prop('checked',false);
                    this.checked_id = [];
                }else{
                    $('.check_single').prop('checked',true);
                    this.show_quotes.data.map((item)=>{
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
                this.form.checked_id = this.checked_id;
                this.form.model_name = 'Quotes';
                this.form.model_related = 'QuoteProduct';
                this.form.model_related_name = 'quote_id';

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
                        this.form.post('/api/delete_selected_all')
                        .then((res)=>{
                            $('#check_all').prop('checked',false)
                            this.checked_id = [];
                            this.listQuotes();
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })

            },
            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/quotes');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            }
        },

        computed: {
            ...mapGetters([
                'get_basic_information',
                'get_window_width',
            ]),
        }
    }
</script>


