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
                                    <h4 style="border: 0;" class="page-title">Delivery Notes</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/sales/delivery-note/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Delivery Notes</router-link>
                                    <router-link to="/sales/delivery-note/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li style="float: left;">
                                    <a class="btn new_dot btn-white nav-link dropdown-toggle" href="#"
                                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Convert Delivery Notes to Invoice</a>
                                        <a class="dropdown-item" href="#">Storage Location</a>
                                        <a class="dropdown-item">Export Delivery Notes Lines</a>
                                        <a class="dropdown-item">Export Delivery Notes Details</a>
                                        <a class="dropdown-item" href="#">Manage Delivery Method</a>
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
                                <a :href="'/deliverynotes-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank" style="line-height:26px;" class="btn btn-warning">Export Selected</a>
                                <a :href="'/deliverynotes-line-export-to-exel-selected?checked_id='+JSON.stringify(checked_id)" target="_blank"  style="line-height:26px;"  class="btn btn-warning">Export Line Selected</a>
                            </div>
                        </div>
                    </div>
                </div>

                <tableFilterVue
                    v-else
                    :show_list="show_deliverynotes"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :dataSearch="dataSearch"
                    :list="listDeliverynotes"
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
                                        <a href="#" @click="listDeliverynotes('all')" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{all_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#"  @click="listDeliverynotes('not invoiced')" data-toggle="tab">
                                            Not Invoiced
                                            <span  class="amount">{{not_invoiced_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#"  @click="listDeliverynotes('invoiced')" data-toggle="tab">
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
                                        <th style="min-width: 168px;">Delivery Notes Date</th>
                                        <th style="min-width: 145px;">Delivery Notes NO</th>
                                        <th style="min-width: 121px;">Customer</th>
                                        <th style="min-width: 200px;" class="text-center">Note</th>
                                        <th style="min-width: 129px;">Delivery Address</th>
                                        <th style="min-width: 120px;" class="text-center">Status</th>
                                        <th style="width: 165px;min-width: 165px;" class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="deliverynote in show_deliverynotes.data" :key="deliverynote.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox"  @click="checkSingle(deliverynote.id)" :value="deliverynote.id" class="filled-in check_single">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editDeliveryNote(deliverynote.id)">
                                                {{deliverynote.date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editDeliveryNote(deliverynote.id)">
                                                {{deliverynote.code}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis cursor_pointer text-success" @click="gotoCustomerProfile(deliverynote.customer_id)" >
                                                {{deliverynote.customer}}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis" @click="editDeliveryNote(deliverynote.id)">
                                                {{deliverynote.document_note}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="editDeliveryNote(deliverynote.id)">
                                                {{deliverynote.delivery_address}}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis" @click="editDeliveryNote(deliverynote.id)">
                                                <div class="custom_status_color" v-if="deliverynote.status == 'not delivered'">{{deliverynote.status}}</div>
                                                <div v-else>
                                                    <!-- <span class="custom_status_color">delivered</span> -->
                                                    <span class="custom_status_color" v-if="deliverynote.sales_log && deliverynote.sales_log.is_delivery_note">ordered</span>
                                                    <span class="custom_status_color" v-if="deliverynote.sales_log && deliverynote.sales_log.is_invoice">invoiced</span>
                                                </div>
                                            </div>
                                            <!-- <div class="ellipsis" @click="editDeliveryNote(deliverynote.id)">
                                                <div class="badge col-red">{{deliverynote.status}}</div>
                                            </div> -->
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <a href="#" class="btn btn-white"
                                            style="display: inline-block;padding: 0 32px;height: 30px;line-height: 30px;margin-right: 10px;">
                                                Email </a>
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;"
                                                    class="btn btn-white dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light"
                                                            href="#"  @click="editDeliveryNote(deliverynote.id)">Edit</a>
                                                        <a class="dropdown-item waves-effect waves-light"
                                                            href="#" @click="printData(deliverynote)">Print</a>
                                                        <hr style="margin: 2px 0;">
                                                        <span v-if="deliverynote.status == 'not invoiced'">
                                                            <a class="dropdown-item waves-effect waves-light"
                                                                @click="DeliveryNotesToInvoice(deliverynote.id)"
                                                                href="#">Convert to Invoice
                                                            </a>
                                                            <hr style="margin: 2px 0;">
                                                        </span>

                                                        <!-- <a class="dropdown-item waves-effect waves-light"
                                                            @click="sentMail(deliverynote.id)"
                                                            href="#">Send by Email
                                                        </a>
                                                        <a class="dropdown-item waves-effect waves-light"
                                                            @click="printNote(deliverynote.id)"
                                                            href="#">Export as PDF
                                                        </a> -->
                                                        <a class="dropdown-item text-danger waves-effect waves-light"
                                                            @click="deleteDeliverynote(deliverynote.id)"
                                                            data-toggle="modal" data-target="#exampleModal">Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="show_deliverynotes" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>

            </div>
        </section>

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
                            :print_quote="printNote"
                            :edit_content="editDeliveryNote"
                            :sentMail="sentMail"
                            :print_quote_id="print_quote_id">
                        </printDataModalBodyVue>
                    </div>
                </div>
            </div>
        </div>

        <!-- full table -->
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
        name: 'Deliverynote',

        data: function () {
            return {
                type: 'deliverynote',

                deliverynotes: {},
                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',
                data_get_url_status: 'all',

                all_count: 0,
                not_invoiced_count: 0,
                invoiced_count: 0,

                print_quote_id: null,
                pdf_link:'',

                show_deliverynotes: {},
                not_invoiced_deliverynotes: [],
                invoiced_deliverynotes: [],

                selected_data: {},

                checked_id:[],

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "address": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "currency": "",
                    "code": "",
                    "date": "",
                    "status": "",
                    "note_status": "not invoiced",
                    "po_number": "",
                    "delivery_method": "",
                    "vehicle_number": "",
                    "operator_name": "",
                    "operator_phone_number": "",
                    "is_product": "",
                    "is_expense": "",

                    "document_note": "",
                    "subtotal": "",
                    "discount_rate": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "end_of_delivery": "",

                    "delivery_weight": "",
                    "weight_unit": "",
                    "project": "",
                    "sales_rep": "",
                    "private_note": "",
                    "attachments": "",
                    "files": "",

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
            this.listDeliverynotes(this.data_get_url_status);
            this.getResults();
        },
        methods: {
            getResults: function(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/delivery-note?status=`+status+'&page=' + page)
                    .then(response => {
                        that.show_deliverynotes = that.deliverynotes = response.data.datas;
                    });
            },
            listDeliverynotes: function (status) {
                var that = this;
                this.data_get_url_status = status;
                this.form.get(`/api/delivery-note?status=`+status).then(function (response) {
                    that.show_deliverynotes = that.deliverynotes = response.data.datas;

                    that.all_count = response.data.all_count;
                    that.not_invoiced_count = response.data.not_invoiced_count;
                    that.invoiced_count = response.data.invoiced_count;
                })
            },
            deleteDeliverynote: function (id) {

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
                        this.form.delete('/api/delivery-note/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listDeliverynotes('all');
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })

            },
            editDeliveryNote: function(deliverynote_id){
                this.$router.replace({ name: 'editDeliveryNote', params: { id: deliverynote_id }});
            },
            sentMail: function(print_id){
                let that = this;
                axios.get('/api/sent-mail/delivery_note/'+print_id)
                    .then((res)=>{
                        // that.pdf_link = res.data;
                        alert('mail has been sent successfuly.');
                    })
            },
            printData: function(selected_data){
                this.selected_data = selected_data;
                $('#printModal').modal('show');
            },
            printNote: function(note_id){
                let that = this;
                axios.get('/api/print-pdf/delivery_note/'+note_id)
                    .then((res)=>{
                        that.pdf_link = res.data;
                        var win = window.open(that.pdf_link, '_blank');
                        win.focus();
                    })
            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/delivery_by_day?key=${dayno}&type=${type}`;
                let that = this;

                axios.get(url)
                    .then((response)=>{
                        that.show_deliverynotes = that.deliverynotes = response.data;
                        // console.log(response);
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/delivery_note_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_deliverynotes = that.deliverynotes = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/delivery_notes_search',formData)
                    .then((res)=>{
                        that.show_deliverynotes = this.deliverynotes = res.data;
                    })
            },
            checkAll: function(){
                if(this.checked_id.length > 0){
                    $('.check_single').prop('checked',false);
                    $('#check_all').prop('checked',false);
                    this.checked_id = [];
                }else{
                    console.log(this.show_deliverynotes);
                    $('.check_single').prop('checked',true);
                    this.show_deliverynotes.data.map((item)=>{
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
                        this.form.model_name = 'Deliverynote';
                        this.form.model_related = 'DeliveryNoteProduct';
                        this.form.model_related_name = 'delivery_note_id';
                        this.form.post('/api/delete_selected_all')
                            .then((res)=>{
                                $('#check_all').prop('checked',false)
                                this.checked_id = [];
                                this.listDeliverynotes();
                            })
                    }
                })

            },
            DeliveryNotesToInvoice: function(delivery_note_id){
                this.$router.replace({ name: 'DeliveryNotesToInvoice', params: { id: delivery_note_id }});
            },
            gotoCustomerProfile: function(customer_id){
                sessionStorage.setItem('url','/sales/delivery-notes');
                this.$router.replace({name: 'customer_details', params: { id: customer_id }})
            },

        }
    }
</script>
