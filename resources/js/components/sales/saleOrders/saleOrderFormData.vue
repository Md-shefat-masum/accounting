<template>
    <div>
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
                            <input type="text"
                                        class="form-control A54VNK-pi-d"
                                        data-toggle="dropdown"
                                        autocomplete="off"
                                        role="button"
                                        readonly
                                        v-model="form.recipient"
                                        placeholder="Contact name">
                                <ul class="dropdown-menu A54VNK-pi-c">
                                    <li class="disabled" v-for="recipient in recipients" :key="recipient.id"
                                        @click="form.recipient = recipient.first_name+' '+recipient.last_name">
                                        <span class="d-block" style="cursor:pointer">
                                            {{recipient.first_name+' '+recipient.last_name}}
                                        </span>
                                    </li>
                                </ul>
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
                                        <option option="TK">TK</option>
                                        <option option="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4" v-if="form.currency=='USD'">
                            <div class="A54VNK-ni-a">
                                <input type="number" step="0.01"
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

                    <div class="form-group row" data-id="v192168000062_1318947796381_657">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Code</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <input type="text" v-model="form.code" class="form-control A54VNK-oi-b" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000062_1318947796381_657">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">PO Number</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <input type="text" v-model="form.po_number" class="form-control A54VNK-oi-b" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000003_1092663879328_4429">
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

                    <div class="form-group row" data-id="v192168000062_1318947796381_657">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Status</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <input type="text"
                                        class="form-control A54VNK-oi-b"
                                        data-toggle="dropdown"
                                        autocomplete="off" role="button"
                                        v-model="form.status"
                                        readonly
                                        placeholder="Select">
                                <ul class="dropdown-menu A54VNK-oi-a">
                                    <li class="">
                                        <a class="ellipsis-block" @click="form.status = 'open'" role="button">Open</a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="form.status = 'closed'" role="button">Closed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000003_1092663879328_4429">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Delivery Date</label>
                            <span class="text-danger bold">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="input-group">
                                <input type="date" v-model="form.delivery_date" class="form-control">
                            </div>
                            <div class="error-panel"></div>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000062_1318947796381_657">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Payment Terms</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <payment-terms-dropdown
                                :set_payment_terms="set_payment_terms">
                            </payment-terms-dropdown>
                        </div>
                    </div>

                </div>
                <hr>
            </div>
        </div>

        <sales-status v-if="sales_logs && ( type == 'edit' || type == 'quote_to_sales_order' ) " :type="'sales_order_edit'" :sales_logs="sales_logs"></sales-status>

        <list-of-product-table
            :old_data="form.selected_products"
            :old_document_note="form.document_note"
            :currency_rate="form.currency_rate"
            :set_selected_product_info="set_selected_product_info">
        </list-of-product-table>

        <div>
            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse"
                href="#gwt-uid-637">Advanced</a>
            <div class="panel-collapse collapse" id="gwt-uid-637">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label style="font-weight: normal;">Delivery Contact</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <delivery-contact
                                            :old_value="form.delivery_contact"
                                            :setDeliveryContact="setDeliveryContact"
                                            :customer_contacts="customer_contacts"></delivery-contact>
                                    </div>
                                </div>

                                <div class="form-group row" style="margin-bottom: 15px !important;">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label style="font-weight: normal;">
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
                                            <a class="A54VNK-pi-a" style="">
                                                <span class="picto-font">D</span>
                                            </a>
                                            <input type="text"
                                                    class="form-control A54VNK-pi-d"
                                                    autocomplete="off"
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
                                    <div class="col-sm-4 col-4 control-label">
                                        <label style="font-weight: normal;">Project</label>
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
                                        <label tyle="font-weight: normal;">Private Note</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <textarea class="form-control" rows="3" v-model="form.private_note"
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
    import { mapGetters, mapMutations } from 'vuex'
    import addCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue'
    import listOfCustomerOrLeadVue from '../../modal_contents/listOfCustomerOrLead.vue'
    import listOfProductOrServiceVue from '../../modal_contents/listOfProductOrService.vue'
    import DeliveryAddress from '../components/deliveryAddress.vue'
    import DeliveryContact from '../components/deliveryContact.vue'
    import FileUploadField from '../components/fileUploadField.vue'
    import ListOfProductTable from '../components/listOfProductTable.vue'
    import PaymentTermsDropdown from '../components/paymentTermsDropdown.vue'
    import ProjectDropdown from '../components/projectDropdown.vue'
    import SalesStatus from '../components/sales_status.vue'
    import SelectCustomerDropdown from '../components/selectCustomerDropdown.vue'
    export default {
        props: ['setFormData','type'],
        components: {
            addCustomerOrLead,
            listOfCustomerOrLeadVue,
            listOfProductOrServiceVue,
            FileUploadField,
            SelectCustomerDropdown,
            SalesStatus,
            ListOfProductTable,
            PaymentTermsDropdown,
            DeliveryContact,
            DeliveryAddress,
            ProjectDropdown,
        },
        data: function () {
            return {
                loaded: false,
                selected_products: [],
                today_date: '',
                delivery_date: '',
                vat_on_sales: '',
                product_selected_row_id: '',
                status: 'open',
                customer_list_random_number: 0,
                product_random_number: 0,

                sales_logs:[],

                customer_delivery_addresses:[],

                errors:[],
                recipients: [],
                customer_contacts:[],
                customer_delivery_addresses:[],
                projects:[],

                product_receive_location: [],

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "code": "",
                    "recipient": "",
                    "currency": "TK",
                    "currency_rate": '',
                    "address": "",
                    "po_number": "",
                    "date": "",
                    "status": "open",
                    "paid_satus": "not_delivered",
                    "delivery_date": "",
                    "payment_terms": "Due on receipt",
                    "payment_date": "",
                    "selected_products":'',
                    "product": "",
                    "document_note": "",
                    "sub_total": "",
                    "discount_amount": "",
                    "vat": "",
                    "total": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_address_id": "",
                    "delivery_notes": "",
                    "project": "",
                    "delivery_phone_number": "",
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
            if(this.type == 'edit'){
                this.getSales();
            }
            else if(this.type == 'quote_to_sales_order'){
                this.getQuote();
            }else{
                this.basicInfo();
            }
        },
        watch: {
            form: {
                handler: function(val,oldVal){
                    this.setFormData(this.form);
                },
                deep: true,
            },
        },
        methods: {
            ...mapMutations([
                'set_selected_sales_order_related_products',
                'set_edited_sales_order_related_products_for_delivery_note',
                'set_selected_sales_order_all_delivery_notes',
                'set_old_data',
                'set_form_product_list_info',
            ]),
            basicInfo: function(){
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                this.today_date =  yyyy+'-'+ mm +'-'+dd ;
                this.form.date = this.today_date;

                let next_month = new Date(today.getFullYear(), today.getMonth()+2, 1);
                next_month = String(next_month.getMonth()).padStart(2,0);
                this.delivery_date =  yyyy+'-'+ (next_month) +'-'+dd ;
                this.form.delivery_date = this.delivery_date;

                var that = this;
                this.form.get('/api/get-latest-code-id/sales_order/CORD').then(function (response) {
                    that.form.code = response.data;
                });

                this.form.get('/api/productrecivelocation').then(function (response) {
                    that.productrecivelocation = response.data;
                });
            },

            getSales: function () {
                var that = this;
                this.form.get('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data.orders);
                    that.form.selected_products = response.data.selected_products;
                    that.selected_products = response.data.selected_products;
                    that.loaded = true;

                    that.set_selected_sales_order_all_delivery_notes( response.data.orders.delivery_list_info_json );

                    that.sales_logs = response.data.orders.sales_log;
                    setTimeout(() => {
                        that.get_customer_data(response.data.orders.customer_id);
                        that.basicInfo();
                        if(that.form.status === 'delivered' || that.form.status === 'invoiced'){
                            $('input').attr('disabled',true);
                            $('textarea').attr('disabled',true);
                            $('select').attr('disabled',true);
                            $('button').attr('disabled',true);
                        }
                    }, 2000);
                });
                that.loaded = true;
            },

            get_customer_data:function(id){
                axios.get('/api/customers/'+id)
                    .then((res)=>{
                        // console.log(res.data);
                        this.customer_contacts = res.data.contacts;
                        this.customer_delivery_addresses = res.data.delivery_address;
                        this.customer_sale_receipts = res.data.sale_receipts;
                        this.recipients = res.data.contacts;
                        this.projects = res.data.projects;
                    })
            },

            getQuote: function (Quote) {
                var that = this;
                axios.get('/api/quotes/' + this.$route.params.id)
                    .then(function (response) {
                        that.form.fill(response.data.quotes);
                        that.form.selected_products = response.data.selected_products;
                        that.selected_products = response.data.selected_products;
                        that.loaded = true;
                        that.sales_logs = response.data.quotes.sales_log;

                        // call store function
                        that.set_old_data(response.data.selected_products);
                        that.set_form_product_list_info({key: "discount_rate", value: response.data.quotes.discount_rate});
                        that.set_form_product_list_info({key: "discount_amount", value: response.data.quotes.discount_amount});
                        that.set_form_product_list_info({key: "document_note", value: response.data.quotes.document_note});

                        // console.log(that.form_data, response.data.quotes);
                        setTimeout(() => {
                            that.get_customer_data(response.data.quotes.customer_id);
                            that.basicInfo();
                            if(that.form.status != 'open'){
                                $('input').attr('disabled',true);
                                $('textarea').attr('disabled',true);
                                $('select').attr('disabled',true);
                                $('button').attr('disabled',true);
                            }
                        }, 1000);
                    });

            },

            createSales: function(){
                this.form.selected_products = this.selected_products;
                this.form.status = this.status;
                this.form.post('/api/saleorders').then(() => {
                    this.form.reset();
                    this.selected_products = [];
                    this.basicInfo();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.replace({name: 'salesOrderList'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },

            updateSales: function () {
                var that = this;
                this.form.put('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                })
            },

            getCustomerNameId: function(name, id, address){
                this.form.customer = name;
                this.form.id = id;
                this.form.customer_id = id;
                this.form.address = address;

                axios.get('/api/customers/'+id)
                    .then((res)=>{
                        // console.log(res.data);
                        this.customer_contacts = res.data.contacts;
                        this.customer_delivery_addresses = res.data.delivery_address;
                        this.projects = res.data.projects;
                    })
            },

            getCustomerRecipent: function(recipient){
                this.recipients = recipient;
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

            set_selected_product_info: function(info){
                // console.log(info);
                this.form.selected_products = info.selected_products;
                this.form.discount_amount = info.discount_amount;
                this.form.discount_rate = info.discount_rate;
                this.form.document_note = info.document_note;
                this.form.subtotal = info.subtotal;
                this.form.total = info.total;
                this.form.vat = info.vat;
            },

            set_files: function(file_info){
                // console.log(file_info);
                this.form.files = file_info.files;
                this.form.attachments = file_info.attachments;
            },

            set_payment_terms: function(payment_term_info){
                this.form.payment_terms = payment_term_info.payment_terms;
                this.form.payment_date = payment_term_info.payment_date;
            },

            setDeliveryContact: function(delivery_contact){
                this.form.delivery_contact = delivery_contact;
            },

            setCustomerDeliverAddress: function(delivery_address,address_id){
                this.form.delivery_address = delivery_address;
                this.form.delivery_address_id = address_id;
            },

            set_customer_project: function(project_name){
                this.form.project = project_name;
            },
        },
        computed: {

        }
    }
</script>

<style>

</style>
