<template>

    <!-- form section -->
    <form @submit.prevent="createCustomerpayment">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a">
                    <div class="page-panel panel-default page-right-content">
                        <div>
                            <div class="panel-body page-panel-body">
                                <div>
                                    <div>
                                        <div>
                                            <div class="form-horizontal">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-xs-4 control-label">
                                                        <label class="" style="font-weight: normal;">Start Date</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="input-group">
                                                            <input type="date" v-model="start_date" class="form-control" />
                                                            <div class="input-group-btn">
                                                                <!-- <button type="button" class="btn btn-default"
                                                                            tabindex="-1" style="border: none !important;">
                                                                        <span class="picto-font">\</span></button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-xs-4 control-label">
                                                        <label class="" style="font-weight: normal;">End Date</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="input-group">
                                                            <input type="date" v-model="end_date" class="form-control" />
                                                            <!-- <div class="input-group-btn">
                                                                    <button type="button" class="btn btn-default"
                                                                            tabindex="-1" style="border: none !important;">
                                                                        <span class="picto-font">\</span></button>
                                                                </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar A54VNK-Pi-a" style="">
                                            <button @click="invoiceSearch()" type="button" class="btn btn-default">
                                                <span class="picto-font">e</span>
                                                Apply filters
                                            </button>
                                        </div>
                                        <hr />
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>
                                                    <div>
                                                        <div class="form-horizontal">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <span class="picto-font">i</span>
                                                                    <span class="">
                                                                        To convert an Installment into a Payment deposit, select a row then click the button below.
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="btn-toolbar A54VNK-Pi-a" aria-hidden="true" style="display: none;"></div>
                                                    <hr />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <table class="A54VNK-Ff-y table table-hover table-link empty" cellspacing="0" style="table-layout: fixed;">
                                                    <colgroup>
                                                        <col style="width: 25%;" />
                                                        <col style="width: 20%;" />
                                                        <col style="width: 25%;" />
                                                        <col style="width: 30%;" />
                                                        <col style="width: 30%;" />
                                                        <col style="width: 25%;" />
                                                        <col style="width: 25%;" />
                                                        <col style="width: 25%;" />
                                                        <col style="width: 20%;" />
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-f">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Customer" data-toggle="tooltip">Customer</span>
                                                                    <span class="header-normal">Customer</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="1" class="A54VNK-Ff-h">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Customer Invoice" data-toggle="tooltip">code</span>
                                                                    <span class="header-normal">code</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="1" class="A54VNK-Ff-h">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Date" data-toggle="tooltip">Date</span>
                                                                    <span class="header-normal">Date</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="1" class="A54VNK-Ff-h">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Total" data-toggle="tooltip">Total</span>
                                                                    <span class="header-normal">Total</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="1" class="A54VNK-Ff-h">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Paid" data-toggle="tooltip">Paid</span>
                                                                    <span class="header-normal">Paid</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="1" class="A54VNK-Ff-h">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Remaining" data-toggle="tooltip">Remaining</span>
                                                                    <span class="header-normal">Remaining</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="1" class="A54VNK-Ff-h">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="% Remaining" data-toggle="tooltip">% Remaining</span>
                                                                    <span class="header-normal">% Remaining</span>
                                                                </div>
                                                            </th>
                                                            <!-- <th colspan="1" class="A54VNK-Ff-h">
                                                                    <div><span class="ellipsis ellipsis-block header-small" data-title="Employee"
                                                                            data-toggle="tooltip">Employee</span>
                                                                        <span
                                                                            class="header-normal">Employee</span>
                                                                    </div>
                                                                </th> -->
                                                            <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-p">
                                                                <div>
                                                                    <span class="ellipsis ellipsis-block header-small" data-title="Project" data-toggle="tooltip">Project</span>
                                                                    <span class="header-normal">Project</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-if="invoices.length > 0">
                                                        <tr v-for="show_invoice in invoices" :key="show_invoice.id">
                                                            <td>
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.customer}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.code}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.date}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.total}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.paid}}
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.total - show_invoice.paid}}
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{100 - parseInt(show_invoice.paid * 100 / show_invoice.total)}} %
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="ellipsis" @click="selectInvoice(show_invoice,$event)">
                                                                    {{show_invoice.project}}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody v-else>
                                                        <tr>
                                                            <td align="center" colspan="9">
                                                                <div>
                                                                    <div style="width: 100%; height: 100%; padding: 0px; margin: 0px;">
                                                                        <div style="width: 100%; height: 100%;">
                                                                            <div class="text-muted text-left">No items to show</div>
                                                                        </div>
                                                                    </div>
                                                                    <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                                                        <div aria-hidden="true" class="A54VNK-Ff-q" style="width: 100%; height: 100%; display: none;">
                                                                            <div class="text-muted text-left">Loading data...</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot aria-hidden="true" style="display: none;"></tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar A54VNK-Pi-a" aria-hidden="true" style="display: none;"></div>
                                    </div>

                                    <div class="btn-toolbar A54VNK-bj-a" style="">
                                        <!-- <button type="button" class="btn btn-default"><span class="picto-font">;</span> Convert the selected Installment into a Payment</button> -->
                                        <button @click="set_modal_data" type="button" data-toggle="modal" data-target="#addPaymentReceipt" class="btn btn-default"><span class="picto-font">s</span> Allocate a payment deposit</button>
                                        <!-- <button type="button" class="btn btn-default"><span class="picto-font">s</span> Use a Credit Note</button> -->
                                    </div>

                                    <!-- addPaymentReceipt Modal -->
                                    <div class="modal fade" id="addPaymentReceipt" tabindex="-1" aria-labelledby="addPaymentReceiptLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addPaymentReceiptLabel">Receipt List</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" v-if="form.customer_id">
                                                    <CustomerReceiptModalListVue
                                                        :key="customer_receipt_modal_key"
                                                        :payment_receipt_details="payment_receipt_details"
                                                        :payment_info_reset="payment_info_reset"
                                                        :selected_customer_id="selected_customer_id">
                                                    </CustomerReceiptModalListVue>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt-4" aria-hidden="true" v-if="form_view_status">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div>
                                                        <div class="form-horizontal">
                                                            <div class="form-group">
                                                                <div class="col-sm-12"><span class="picto-font">i</span><span class="">You can manually edit the Amount Received and the Payment Method.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="btn-toolbar A54VNK-Pi-a" aria-hidden="true" style="display: none;"></div>
                                                    <hr />
                                                </div>
                                                <div class="col-sm-12">
                                                    <div>
                                                        <div>
                                                            <table class="A54VNK-Ff-y table table-hover table-link A54VNK-Ff-z empty" cellspacing="0" style="table-layout: fixed;">
                                                                <colgroup>
                                                                    <col style="width: 30%;" />
                                                                    <col style="width: 30%;" />
                                                                    <col style="width: 30%;" />
                                                                    <col style="width: 30%;" />
                                                                </colgroup>
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-f">
                                                                            <div>
                                                                                <span class="ellipsis ellipsis-block header-small" data-title="Payment Date" data-toggle="tooltip">Payment Date</span>
                                                                                <span class="header-normal">Payment Date</span>
                                                                            </div>
                                                                        </th>
                                                                        <th colspan="1" class="A54VNK-Ff-h">
                                                                            <div>
                                                                                <span class="ellipsis ellipsis-block header-small" data-title="Amount Received" data-toggle="tooltip">Amount Received</span>
                                                                                <span class="header-normal">Amount Received</span>
                                                                            </div>
                                                                        </th>
                                                                        <th colspan="1" class="A54VNK-Ff-h">
                                                                            <div>
                                                                                <span class="ellipsis ellipsis-block header-small" data-title="Receipt Code" data-toggle="tooltip">Receipt Code</span>
                                                                                <span class="header-normal">Receipt Code</span>
                                                                            </div>
                                                                        </th>
                                                                        <th colspan="1" class="A54VNK-Ff-h">
                                                                            <div>
                                                                                <span class="ellipsis ellipsis-block header-small" data-title="Receipt Available" data-toggle="tooltip">Receipt Available</span>
                                                                                <span class="header-normal">Receipt Available</span>
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <tr __gwt_row="0" __gwt_subrow="0" class="A54VNK-Nf-b primary">
                                                                        <td class="A54VNK-Nf-a A54VNK-Nf-c A54VNK-Nf-d">
                                                                            <div style="outline-style: none;" data-row="0" data-column="0" __gwt_cell="cell-gwt-uid-289">
                                                                                <input type="date" @change="setPaymentDate()" v-model="payment_date" class="form-control" style="font-weight:600;" />
                                                                            </div>
                                                                        </td>
                                                                        <td class="A54VNK-Nf-a A54VNK-Nf-c">
                                                                            <div style="outline-style: none;" data-row="0" data-column="1" __gwt_cell="cell-gwt-uid-290">
                                                                                <input type="text" @keyup="setAmountReceive()" v-model="selected_invoice.remaining" class="form-control" style="font-weight:600;"/>
                                                                            </div>
                                                                        </td>
                                                                        <td class="A54VNK-Nf-a A54VNK-Nf-c">
                                                                            <div style="outline-style: none;" data-row="0" data-column="3" __gwt_cell="cell-gwt-uid-296">
                                                                                <input type="text" readonly v-model="form.receipt_code" class="form-control" style="font-weight:600;"/>
                                                                            </div>
                                                                        </td>
                                                                        <td class="A54VNK-Nf-a A54VNK-Nf-c">
                                                                            <div style="outline-style: none;" data-row="0" data-column="3" __gwt_cell="cell-gwt-uid-296">
                                                                                <input type="text" readonly v-model="form.present_receipt_amount" class="form-control" style="font-weight:600;"/>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                                <tfoot aria-hidden="true" style="display: none;"></tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <new-footer type="basic" />
                </div>
            </div>
        </div>
    </form>


    <!-- form section -->
</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer';
    import CustomerReceiptModalListVue from '../../modal_contents/CustomerReceiptModalList.vue';

    export default {
        components: {
            NewFooter,
            CustomerReceiptModalListVue
        },
        name: 'Customerpayment',
        data: function () {
            return {
                loaded: false,
                invoices: [],
                selected_invoice:{},
                payment_date: '',
                start_date:'',
                end_date:'',

                form_view_status: false,

                customer_receipt_modal_key: 0,
                selected_customer_id:'',
                payment_receipt_details:[],

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",

                    "invoice_id": "",
                    "invoice_code": "",
                    "present_invoice_amount": "",

                    "receipt_id": "",
                    "receipt_code": "",
                    "present_receipt_amount": "",

                    "code": "",
                    "total": "",
                    "paid": 0,
                    "remaining": "",
                    "payment_method": "checque",
                    "bank_reference": "",
                    "payment_date": "",
                    "day_late": "",
                    "remaining_percent": "",
                    "project": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            // this.getCustomerpayment();
            this.get_start_end_date();
        },
        methods: {
            get_start_end_date: function(){
                var that = this;
                axios.get('/api/customerpayments_get_start_end')
                    .then((res)=>{
                        that.start_date = res.data.start_date;
                        that.end_date = res.data.end_date;
                        that.payment_date = res.data.end_date;
                    })
            },
            invoiceSearch: function(){
                var that = this;
                axios.get('/api/customerpayments_search?start_date='+this.start_date+'&end_date='+this.end_date)
                    .then((res)=>{
                        that.invoices = res.data;
                    })
            },
            selectInvoice: function(invoice,event){
                // console.log(invoice,Object.keys(this.selected_invoice).length);
                this.form_view_status = false;
                this.selected_customer_id = invoice.customer_id;
                this.form.fill(invoice);
                this.form.payment_date = this.payment_date;
                this.form.payment_method = 'sales receipt';
                this.form.invoice_id = invoice.id;

                this.selected_invoice = invoice;

                this.form.paid = this.selected_invoice.remaining = this.selected_invoice.total - this.selected_invoice.paid;
                this.form.remaining = 0;

                $($(event.target).parents('tr')).siblings('tr').removeClass('active');
                $(event.target).parents('tr').addClass('active');
            },
            setAmountReceive: function(){

                let old_remaining = this.selected_invoice.total - this.selected_invoice.paid;
                if(this.selected_invoice.remaining > old_remaining){
                    Toast.fire({
                        icon: 'error',
                        title: 'receive amount exceed remaining amount'
                    });
                    this.selected_invoice.remaining = old_remaining;
                    return 0;
                }
                this.form.paid = this.selected_invoice.remaining;
                this.form.remaining = old_remaining - this.form.paid ;
                // console.log(this.form.paid, this.form.remaining, this.selected_invoice.remaining);
            },
            setPaymentDate: function(){
                this.form.payment_date = this.payment_date;
            },
            createCustomerpayment : function(){
                this.form.post('/api/customerpayments').then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.invoiceSearch();
                    this.selected_invoice={};
                    this.form_view_status = false;
                    // this.$router.replace({name: 'customerLists'})
                }).catch((err) => {
                    console.log(err.response);
                    Toast.fire({
                        icon: 'error',
                        title: err.response.message
                    });
                });
            },
            set_modal_data: function(){
                this.customer_receipt_modal_key++;
            },
            payment_info_reset: function(receipt){

                this.form.invoice_id = this.selected_invoice.id;
                this.form.invoice_code = this.selected_invoice.code;
                this.form.invoice_total = this.selected_invoice.total;

                this.form.receipt_id = receipt.id;
                this.form.receipt_code = receipt.code;
                this.form.receipt_total = receipt.total;

                this.form.payment_with = 'Sales Receipt';
                this.form.total = this.selected_invoice.total;

                this.form.present_receipt_amount = receipt.available_amount;
                this.form.present_invoice_amount = this.selected_invoice.total;

                this.form_view_status = true;

                console.log(this.selected_invoice);
            }
        }
    }
</script>
