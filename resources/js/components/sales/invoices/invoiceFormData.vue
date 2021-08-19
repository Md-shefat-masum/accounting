<template>
    <div >
        <div class="row">
            <div class="col-sm-6">
                <div class="form-horizontal">
                    <div class="form-group row" data-id="v192168000008_1062586813328_755">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Customer</label>
                            <span class="text-danger bold">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <select-customer-dropdown
                                :old_customer_name="form.customer"
                                :getCustomerRecipent="getCustomerRecipent"
                                :getCustomerNameId="getCustomerNameId">
                            </select-customer-dropdown>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000004_1132068913109_1142">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Recipient</label>
                        </div>
                        <div class="col-sm-8 col-8">
                                <div class="dropdown">
                                <a class="A54VNK-pi-a"
                                    style="">
                                    <span
                                        class="picto-font">D</span>
                                </a>
                                <input type="text"
                                        class="form-control A54VNK-pi-d"
                                        data-toggle="dropdown"
                                        autocomplete="off"
                                        role="button"
                                        v-model="form.recipient"
                                        placeholder="Contact name">
                                <ul class="dropdown-menu A54VNK-pi-c">
                                    <li class="disabled" v-for="recipient in recipients" :key="recipient.id">
                                        <span @click="form.recipient = (recipient.first_name+' '+recipient.last_name)" class="d-block" style="cursor:pointer">
                                            {{recipient.first_name+' '+recipient.last_name}}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000004_1132068923531_1143">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Address</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <textarea class="form-control" rows="4" v-model="form.address"
                                disabled=""
                                style="resize: vertical; min-height: 50px;"></textarea>
                        </div>
                    </div>

                    <div class="form-group row"
                            data-id="v010010010010_1249894205531_1038">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Currency</label>
                        </div>
                        <div class="col-sm-4 col-4">
                            <div class="A54VNK-ni-a">
                                <div class="select-panel A54VNK-ni-c">
                                    <select class="form-control"
                                            size="1"
                                            v-model="form.currency"
                                            name="currency">
                                        <option value="TK">TK</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4" v-if="form.currency=='USD'">
                            <div class="A54VNK-ni-a">
                                <input type="text"
                                    class="form-control A54VNK-pi-d"
                                    placeholder="currency rate"
                                    v-model="form.currency_rate"
                                    aria-expanded="true">
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
            </div>
            <div class="col-sm-6">
                <div class="form-horizontal">
                    <div class="form-group row">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Code</label>
                            <span class="text-danger bold" aria-hidden="true">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <input v-model="form.code" type="text"
                                    class="form-control A54VNK-oi-b"
                                    autocomplete="off" placeholder="code">
                            </div>
                            <div class="error-panel"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">PO Number</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <input type="text" v-model="form.po_number" class="form-control A54VNK-oi-b" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Date</label>
                            <span class="text-danger bold">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="input-group">
                                <input type="date" v-model="form.date" class="form-control">
                            </div>
                            <div class="error-panel"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Payment Terms</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <payment-terms-dropdown
                                :set_payment_terms="set_payment_terms">
                            </payment-terms-dropdown>
                        </div>
                    </div>
                    <div class="form-group row" data-id="v192168000062_1318947796381_657" v-if="type == 'create'">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Delivery Notes</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <Select2 v-model="selected_select2_delivery_notes"
                                    :options="customer_delivery_notes_for_select2"
                                    :settings="{multiple:true}"
                                    @change="myChangeEvent($event)"
                                    @select="mySelectEvent($event)"></Select2>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <sales-status v-if="sales_logs && ( type == 'edit' || type == 'quote_to_invoice' || type == 'sales_order_to_invoice' || type == 'delivery_note_to_invoice' )"
            :sales_logs="sales_logs" :type="'delivery_note_to_invoice'">
        </sales-status>

        <list-of-product-table
            :old_data = "selected_products"
            :old_document_note = "form.document_note"
            :currency_rate = "form.currency_rate"
            :set_selected_product_info = "set_selected_product_info">
        </list-of-product-table>

        <div>
            <div>
                <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse"
                    href="#gwt-uid-637">Advanced</a>
                <div class="panel-collapse collapse" id="gwt-uid-637">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-horizontal">
                                    <div class="form-group row" style="margin-bottom: 15px !important;" >
                                        <div class="col-sm-4 col-4 control-label">
                                            <label style="font-weight: normal;"> Delivery Date</label>
                                        </div>
                                        <div class="col-sm-8 col-8">
                                            <div class="input-group">
                                                <input type="date" v-model="form.delivery_date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-bottom: 15px !important;">
                                        <div
                                            class="col-sm-4 col-4 control-label">
                                            <label style="font-weight: normal;">Delivery Contact</label>
                                        </div>
                                        <div class="col-sm-8 col-8">
                                            <delivery-contact
                                                :old_value="form.delivery_contact"
                                                :setDeliveryContact="setDeliveryContact"
                                                :customer_contacts="customer_contacts"></delivery-contact>
                                        </div>
                                    </div>

                                    <div class="form-group row"
                                            style="margin-bottom: 15px !important;"
                                            data-id="v010010010010_1247057514555_256">
                                        <div class="col-sm-4 col-4 control-label">
                                            <label class="" style="font-weight: normal;">
                                                Delivery address
                                            </label>
                                        </div>
                                        <div class="col-sm-8 col-8">
                                            <delivery-address
                                                :default_address="form.delivery_address"
                                                :customer_delivery_addresses="customer_delivery_addresses"
                                                :setCustomerDeliverAddress="setCustomerDeliverAddress"></delivery-address>
                                        </div>
                                    </div>

                                    <div class="form-group row"
                                            style="margin-bottom: 15px !important;"
                                            data-id="v010010010010_1247057514555_256">
                                        <div class="col-sm-4 col-4 control-label">
                                            <label class="" style="font-weight: normal;">
                                                Phone Number
                                            </label>
                                        </div>
                                        <div class="col-sm-8 col-8">
                                            <div class="dropdown">
                                                <a class="A54VNK-pi-a">
                                                    <span class="picto-font">D</span>
                                                </a>
                                                <input type="text"
                                                        class="form-control A54VNK-pi-d"
                                                        v-model="form.delivery_phone_number"
                                                        placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-horizontal">
                                    <div class="form-group row" style="margin-bottom: 15px !important;">
                                        <div
                                            class="col-sm-4 col-4 control-label">
                                            <label class=""
                                                    style="font-weight: normal;">Project</label>
                                        </div>
                                        <div class="col-sm-8 col-8">
                                            <project-dropdown
                                                :old_project_name = "form.project"
                                                :set_customer_project="set_customer_project">
                                            </project-dropdown>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-horizontal">
                                    <div class="form-group row" style="margin-bottom: 15px !important;">
                                        <div class="col-sm-4 col-4 control-label">
                                            <label style="font-weight: normal;">Private Note</label>
                                        </div>
                                        <div class="col-sm-8 col-8">
                                            <textarea class="form-control"
                                                        rows="3"
                                                        v-model="form.private_note"
                                                        style="resize: vertical; min-height: 50px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm-12 A54VNK-qi-c">
                <label><b>Attachments</b></label>
            </div>
            <file-upload-field :old_files="form.files" :set_files="set_files"></file-upload-field>
        </div>
    </div>
</template>

<script>
import addCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue'
import listOfCustomerOrLeadVue from '../../modal_contents/listOfCustomerOrLead.vue'
import listOfProductOrServiceVue from '../../modal_contents/listOfProductOrService.vue'
import SelectCustomerDropdown from '../components/selectCustomerDropdown.vue'
import ListOfProductTable from '../components/listOfProductTable.vue'
import PaymentTermsDropdown from '../components/paymentTermsDropdown.vue'
import DeliveryAddress from '../components/deliveryAddress.vue'
import DeliveryContact from '../components/deliveryContact.vue'
import ProjectDropdown from '../components/projectDropdown.vue'
import FileUploadField from '../components/fileUploadField.vue'
import Select2 from 'v-select2-component';
import SalesStatus from '../components/sales_status.vue'
import { mapGetters, mapMutations } from 'vuex'

export default {
    props: ['setFormData','type'],
    components: {
        SelectCustomerDropdown,
        addCustomerOrLead,
        listOfCustomerOrLeadVue,
        listOfProductOrServiceVue,
        ListOfProductTable,
        PaymentTermsDropdown,
        DeliveryAddress,
        DeliveryContact,
        ProjectDropdown,
        FileUploadField,
        Select2,
        SalesStatus,
    },
    data: function () {
        return {
            loaded: false,
            selected_products: [],
            today_date: '',
            vat_on_sales: '',
            product_selected_row_id: '',
            customer_list_random_number: 0,
            product_random_number: 0,

            errors:[],
            recipients: [],
            customer_contacts:[],
            customer_delivery_addresses:[],
            customer_sale_receipts:[],
            projects:[],

            selected_select2_delivery_notes: '',
            customer_delivery_notes_for_select2: [],

            sales_logs: [],

            form: new Form({
                "id": "",
                "customer": "",
                "customer_id": "",
                "recipient": "",
                "address": "",
                "currency": "TK",
                "exchange_rate": "",
                "code": "",
                "po_number": "",
                "date": "",
                "payment_terms": "Due on receipt",
                "payment_date": "",
                "is_product_and_service": true,
                "is_expense": false,
                "selected_products":'',
                "selected_select2_delivery_notes":[],
                "is_upload": "",
                "deposit_to": "",
                "product": "",
                "document_note": "",
                "sub_total": "",
                "discount_amount": "",
                "vat": "",
                "total": "",
                "delivery_date": "",
                "delivery_contact": "",
                "delivery_address": "",
                "delivery_address_id": "",
                "delivery_notes": "",
                "project": "",
                "delivery_phone_number": "",
                "assigned_to": "",
                "private_note": "",
                "attachments": "",
                "files": [],
                "created_at": "",
                "updated_at": "",
            })
        }
    },
    created: function () {
        // this.getInvoice();
        this.form.payment_date = this.set_form_data_payment_terms(this.form.payment_terms);
        if(this.type=='edit'){
            this.getInvoice();
        }
        else if(this.type=='quote_to_invoice'){
            this.getQuote();
            this.setDateAndCode();
        }
        else if(this.type=='sales_order_to_invoice'){
            this.getSalesOrder();
            this.setDateAndCode();
        }
        else if(this.type=='delivery_note_to_invoice'){
            this.getDeliverynote();
            this.setDateAndCode();
        }else{
            this.setDateAndCode();
        }

    },
    watch: {
        form: {
            handler: function(val,oldVal){
                this.form.invoice_no = this.form.code;
                this.setFormData(this.form);
            },
            deep: true,
        },
    },
    methods: {
        ...mapMutations([
            'set_old_data',
            'set_form_product_list_info',
        ]),

        setDateAndCode: function (){
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            this.today_date =  yyyy+'-'+ mm +'-'+dd ;
            this.form.date = this.today_date;
            this.form.delivery_date = this.today_date;

            var that = this;
            this.form.get('/api/get-latest-code-id/invoice/INV').then(function (response) {
                that.form.code = response.data;
            });
        },

        getQuote: function (Quote) {
            var that = this;
            axios.get('/api/quotes/' + this.$route.params.id)
                .then(function (response) {
                    that.form.fill(response.data.quotes);
                    that.selected_products = response.data.selected_products;
                    that.form.selected_products = response.data.selected_products;
                    that.loaded = true;
                    that.sales_logs = response.data.quotes.sales_log;

                    // console.log(that.form_data, response.data.quotes);

                    // call store function
                    that.set_old_data(response.data.selected_products);
                    that.set_form_product_list_info({key: "discount_rate", value: response.data.quotes.discount_rate});
                    that.set_form_product_list_info({key: "discount_amount", value: response.data.quotes.discount_amount});
                    that.set_form_product_list_info({key: "document_note", value: response.data.quotes.document_note});

                    setTimeout(() => {
                        that.get_customer_data(response.data.quotes.customer_id);

                        // if(that.form.status != 'open'){
                        //     $('input').attr('disabled',true);
                        //     $('textarea').attr('disabled',true);
                        //     $('select').attr('disabled',true);
                        //     $('button').attr('disabled',true);
                        // }
                    }, 2000);
                });

        },

        getSalesOrder: function (Deliverynote) {
            var that = this;
            this.form.get('/api/saleorders/' + this.$route.params.id)
                .then(function (response) {
                    that.form.fill(response.data.orders);
                    that.form.selected_products = response.data.selected_products;
                    that.selected_products = response.data.selected_products;
                    that.loaded = true;
                    // console.log(response.data,response.data.orders.customer_id);
                    that.sales_logs = response.data.orders.sales_log;

                    // call store function
                    that.set_old_data(response.data.selected_products);
                    that.set_form_product_list_info({key: "discount_rate", value: response.data.orders.discount_rate});
                    that.set_form_product_list_info({key: "discount_amount", value: response.data.orders.discount_amount});
                    that.set_form_product_list_info({key: "document_note", value: response.data.orders.document_note});

                    setTimeout(() => {
                        that.get_customer_data(response.data.orders.customer_id);
                        that.form.get('/api/get-latest-code-id/invoice/INV').then(function (response) {
                            that.form.code = response.data;
                        });
                    }, 2000);

                });
        },

        getDeliverynote: function (Deliverynote) {
            var that = this;
            this.form.get('/api/delivery-note/' + this.$route.params.id)
                .then(function (response) {
                    that.form.fill(response.data.delivery_note);
                    that.form.selected_products = response.data.selected_products;
                    that.selected_products = response.data.selected_products;
                    that.loaded = true;
                    // console.log(response.data,response.data.delivery_note.customer_id);
                    // that.calculateTotal();
                    that.sales_logs = response.data.delivery_note.sales_log;

                    // call store function
                    that.set_old_data(response.data.selected_products);
                    that.set_form_product_list_info({key: "discount_rate", value: response.data.delivery_note.discount_rate});
                    that.set_form_product_list_info({key: "discount_amount", value: response.data.delivery_note.discount_amount});
                    that.set_form_product_list_info({key: "document_note", value: response.data.delivery_note.document_note});

                    setTimeout(() => {
                        that.get_customer_data(response.data.delivery_note.customer_id);
                        that.form.get('/api/get-latest-code-id/invoice/INV').then(function (response) {
                            that.form.code = response.data;
                        });
                    }, 2000);

                });
        },

        getInvoice: function (Invoice) {
            var that = this;
            this.form.get('/api/invoices/' + this.$route.params.id).then(function (response) {
                that.form.fill(response.data.invoice);
                that.form.selected_products = response.data.selected_products;
                that.selected_products = response.data.selected_products;
                // that.calculateTotal();
                that.loaded = true;

                that.sales_logs = response.data.invoice.sales_log;

                // call store function
                that.set_old_data(response.data.selected_products);
                that.set_form_product_list_info({key: "discount_rate", value: response.data.invoice.discount_rate});
                that.set_form_product_list_info({key: "discount_amount", value: response.data.invoice.discount_amount});
                that.set_form_product_list_info({key: "document_note", value: response.data.invoice.document_note});

                setTimeout(() => {
                    that.get_customer_data(response.data.invoice.customer_id);
                }, 2000);
            });
        },

        get_customer_data:function(id){
            axios.get('/api/customers/'+id)
                .then((res)=>{
                    this.customer_contacts = res.data.contacts;
                    this.recipients = res.data.contacts;
                    this.customer_delivery_addresses = res.data.delivery_address;
                    this.customer_sale_receipts = res.data.sale_receipts;
                    this.projects = res.data.projects;
                })
        },

        createInvoice: function(){
            // console.log( this.set_payment_terms(this.form.payment_terms) );
            this.form.selected_products = this.selected_products;
            this.form.payment_date = this.set_payment_terms(this.form.payment_terms);

            this.form.post('/api/invoices').then(() => {
                this.form.reset();
                this.selected_products = [];
                Toast.fire({
                    icon: 'success',
                    title: 'Created successfully'
                });
                this.setDateAndCode();
                this.$router.push({name: 'invoiceList'})
            }).catch(() => {
                Toast.fire({
                    icon: 'error',
                    title: 'Created error'
                });
            });
        },

        set_form_data_payment_terms: function(term){
            if(term == 'At 30 days'){
                var d = new Date();
                d.setDate(d.getDate() + 30);
                return d.toISOString().split('T')[0];

            }else if(term == 'At 90 days'){
                var d = new Date();
                d.setDate(d.getDate() + 90);
                return d.toISOString().split('T')[0];
            }else if(term == 'Due on receipt'){
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }else if(term == 'In two installments'){
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }else if(term == 'In three installments'){
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }else{
                // return today
                var d = new Date();
                d.setDate(d.getDate() + 0);
                return d.toISOString().split('T')[0];
            }
        },

        updateInvoice: function () {

            var that = this;
            this.form.put('/api/invoices/' + this.$route.params.id).then(function (response) {
                that.form.fill(response.data);
            })

        },

        deleteInvoice: function () {
            var that = this;
            this.form.delete('/api/invoices/' + this.$route.params.id).then(function (response) {
                that.form.fill(response.data);
                that.$router.push('/super-admin/invoices');
            })
        },

        getCustomerNameId: function(name, customer_id, address){
            this.form.customer = name;
            this.form.id = customer_id;
            this.form.customer_id = customer_id;
            this.form.address = address;

            axios.get('/api/customers/'+customer_id)
                .then((res)=>{
                    this.customer_contacts = res.data.contacts;
                    this.customer_delivery_addresses = res.data.delivery_address;
                    this.customer_sale_receipts = res.data.sale_receipts;
                    this.projects = res.data.projects;
                })

            axios.get('/api/not-invoiced-delivery-note/'+customer_id)
                .then((res)=>{
                    // console.log(res);
                    this.customer_delivery_notes_for_select2 = res.data;
                })
        },

        getCustomerRecipent: function(recipient){
            this.recipients = recipient;
        },

        customerListRender: function(){
            this.customer_list_random_number++;
        },

        toggleProductServiceOrExpense: function(type){
            if(type == 'porduct_service'){
                this.form.is_product_and_service = true;
                this.form.is_expense = false;
            }
            if(type == 'expense'){
                this.form.is_product_and_service = false;
                this.form.is_expense = true;
            }
        },

        set_payment_terms: function(payment_term_info){
            this.form.payment_terms = payment_term_info.payment_terms;
            this.form.payment_date = payment_term_info.payment_date;
        },

        set_files: function(file_info){
            // console.log(file_info);
            this.form.files = file_info.files;
            this.form.attachments = file_info.attachments;
        },

        setDeliveryContact: function(delivery_contact){
            this.form.delivery_contact = delivery_contact;
        },

        setCustomerDeliverAddress: function(delivery_address,address_id){
            this.form.delivery_address = delivery_address;
            this.form.delivery_address_id = address_id;

            if(this.type == 'create'){
                axios.get('/api/not-invoiced-delivery-note/'+this.form.customer_id+`?delivery_address_id=${address_id}`)
                    .then((res)=>{
                        this.customer_delivery_notes_for_select2 = res.data;
                    })
            }

        },

        set_customer_project: function(project_name){
            this.form.project = project_name;
        },

        set_selected_product_info: function(info){
            // console.log(info);
            this.selected_products = info.selected_products;
            this.form.selected_products = info.selected_products;
            this.form.discount_amount = info.discount_amount;
            this.form.discount_rate = info.discount_rate;
            this.form.document_note = info.document_note;
            this.form.subtotal = info.subtotal;
            this.form.total = info.total;
            this.form.vat = info.vat;
        },

        myChangeEvent: function(val){
            console.log(val, this.selected_select2_delivery_notes);
            this.form.selected_select2_delivery_notes = this.selected_select2_delivery_notes;
        },

        mySelectEvent: function({id, text}){
            // console.log('selected value',{id, text});
            let selected_products = this.get_form_product_list_info.selected_products;
            const found = selected_products.some(el => el.type_id == id);
            if(found){
                selected_products = selected_products.filter((item)=>item.type_id != id);
            }else{
                axios.get('/api/delivery-note-products/' +id)
                    .then((res)=>{
                        // console.log(res.data);
                        res.data.map((item)=>selected_products.push(item));
                        this.set_form_product_list_info({ key:'selected_products',value:selected_products });
                        this.set_old_data(selected_products);
                    })
            }
        }
    },
    computed: {
        ...mapGetters([
            'get_form_product_list_info',
        ]),
    }
}
</script>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
        padding-left: 20px;
    }
</style>
