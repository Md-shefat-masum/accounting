<template>
    <div>
        <div class="row">
            <div class="col-sm-6">
                <div data-id="v192168000062_1318947716793_655">
                    <div class="form-horizontal">
                        <div class="form-group row"
                                data-id="v192168000008_1062586813328_755">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">Customer</label>
                                <span class="text-danger bold">*</span>
                            </div>
                            <div class="col-sm-8 col-8">
                                <select-customer-dropdown
                                    :old_customer_name="form_data.customer"
                                    :getCustomerRecipent="getCustomerRecipent"
                                    :getCustomerNameId="getCustomerNameId">
                                </select-customer-dropdown>
                            </div>
                        </div>

                        <div class="form-group row"
                                data-id="v192168000004_1132068913109_1142">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">Recipient</label>
                            </div>
                            <div class="col-sm-8 col-8">
                                <div class="dropdown">
                                    <a class="A54VNK-pi-a" style=""><span class="picto-font">D</span> </a>
                                    <input type="text"
                                            class="form-control A54VNK-pi-d"
                                            data-toggle="dropdown"
                                            autocomplete="off"
                                            role="button"
                                            readonly
                                            v-model="form_data.recipient"
                                            placeholder="Contact name">
                                    <ul class="dropdown-menu A54VNK-pi-c">
                                        <li class="disabled" v-for="recipient in recipients" :key="recipient.id">
                                            <span @click="form_data.recipient = recipient.first_name+' '+recipient.last_name" class="d-block" style="cursor:pointer">
                                                {{recipient.first_name+' '+recipient.last_name}}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row"
                                data-id="v192168000004_1132068923531_1143">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">Address</label>
                            </div>
                            <div class="col-sm-8 col-8">
                                <textarea class="form-control"
                                            rows="4"
                                            disabled=""
                                            v-model="form_data.address"
                                            style="resize: vertical; min-height: 50px;"></textarea>

                                <span class="text-danger" v-if="errors.address">{{errors.address[0]}}</span>
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
                                                v-model="form_data.currency"
                                                name="currency">
                                            <option option="TK">TK</option>
                                            <option option="USD">USD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-4" v-if="form_data.currency=='USD'">
                                <div class="A54VNK-ni-a">
                                    <input type="number" step="0.01"
                                        class="form-control A54VNK-pi-d"
                                        placeholder="currency rate"
                                        v-model="form_data.currency_rate"
                                        aria-expanded="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-sm-6">
                <div data-id="v192168000062_1318947754064_656">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">Code</label>
                                <span class="text-danger bold" aria-hidden="true">*</span>
                            </div>
                            <div class="col-sm-8 col-8">
                                <div class="dropdown">
                                    <input type="text"
                                            class="form-control A54VNK-oi-b"
                                            autocomplete="off"
                                            v-model="form_data.code"
                                            placeholder="code">
                                    <span class="text-danger" v-if="errors.code">{{errors.code[0]}}</span>
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
                                    <input
                                        type="date"
                                        v-model="form_data.date"
                                        class="form-control ">
                                    <span class="text-danger" v-if="errors.date">{{errors.date[0]}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">Status</label>
                            </div>
                            <div class="col-sm-8 col-8">
                                <div class="A54VNK-ni-a">
                                    <div class="A54VNK-ni-c">
                                        <select
                                            class="form-control"
                                            v-model="form_data.status"
                                            size="1">

                                            <option value="open" selected >Open</option>
                                            <option value="won">Won</option>
                                            <option value="lost">Lost</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row"
                                data-id="v192168000003_1092663881578_4430">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">
                                    Expiration Date
                                </label>
                                <span class="text-danger bold">*</span></div>
                            <div class="col-sm-8 col-8">
                                <div class="input-group">
                                    <input type="date"
                                        v-model="form_data.expiration_date"
                                        class="form-control">
                                    <span class="text-danger" v-if="errors.expiration_date">{{errors.expiration_date[0]}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row"
                                data-id="v192168000062_1318947796381_657">
                            <div class="col-sm-4 col-4 control-label">
                                <label class="" style="font-weight: normal;">
                                    Payment Terms
                                </label>
                            </div>
                            <div class="col-sm-8 col-8">
                                <payment-terms-dropdown
                                    :set_payment_terms="set_payment_terms"></payment-terms-dropdown>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <salesStatusVue v-if="form_data.status !== 'open' && type == 'edit' " :sales_logs="sales_logs"></salesStatusVue>

        <list-of-product-table
            :old_data="form_data.selected_products"
            :old_document_note="form_data.document_note"
            :currency_rate="form_data.currency_rate"
            :set_selected_product_info="set_selected_product_info">
        </list-of-product-table>

        <div>
            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse" href="#gwt-uid-637">Advanced</a>
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
                                            :old_value="form_data.delivery_contact"
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
                                            :default_address="form_data.delivery_address"
                                            :customer_delivery_addresses="customer_delivery_addresses"
                                            :setCustomerDeliverAddress="setCustomerDeliverAddress"></delivery-address>
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
                                            :old_project_name = "form_data.project"
                                            :set_customer_project="set_customer_project">
                                        </project-dropdown>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-sm-12">
                            <div data-id="v192168000062_1318949340324_734">
                                <div>
                                    <div class="form-horizontal">
                                        <div class="form-group row" style="margin-bottom: 15px !important;" >
                                            <div class="col-sm-4 col-4 control-label">
                                                <label style="font-weight: normal;">Assigned To</label>
                                            </div>
                                            <div class="col-sm-8 col-8">
                                                <div class="dropdown">
                                                    <a class="A54VNK-pi-a" >
                                                        <span class="picto-font">D</span>
                                                    </a>
                                                    <input type="text"
                                                            class="form-control A54VNK-pi-d"
                                                            autocomplete="off"
                                                            readonly
                                                            role="button"
                                                            v-model="form_data.assigned_to"
                                                            placeholder="Assigned To">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label tyle="font-weight: normal;">Private Note</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <textarea class="form-control" rows="3" v-model="form_data.private_note"
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

        <div class="row">
            <div class="col-sm-12 A54VNK-qi-c">
                <label><b>Attachments</b></label>
            </div>
            <file-upload-field :old_files="form_data.files" :set_files="set_files"></file-upload-field>
        </div>
    </div>
</template>

<script>
import DeliveryAddress from '../components/deliveryAddress.vue'
import DeliveryContact from '../components/deliveryContact.vue'
import ListOfProductTable from '../components/listOfProductTable.vue'
import PaymentTermsDropdown from '../components/paymentTermsDropdown.vue'
import ProjectDropdown from '../components/projectDropdown.vue'
import SelectCustomerDropdown from '../components/selectCustomerDropdown.vue'
import salesStatusVue from '../components/sales_status.vue'
import {mapGetters,mapActions,mapMutations} from 'vuex';
import FileUploadField from '../components/fileUploadField.vue'

export default {
    props: ['setFormData','type'],
    components: {
        SelectCustomerDropdown,
        ListOfProductTable,
        DeliveryContact,
        DeliveryAddress,
        ProjectDropdown,
        PaymentTermsDropdown,
        salesStatusVue,
        FileUploadField,
    },
    data: function(){
        return {
            loaded: false,
            today_date: '',
            sales_logs: [],

            errors:[],
            recipients: [],
            customer_contacts:[],
            customer_delivery_addresses:[],
            projects:[],

            form_data: {
                "id": "",
                "customer": "",
                "customer_id": "",
                "code": "",
                "date": "",
                "recipient": "",
                "status": "open",
                "address": "",
                "expiration_date": "",
                "payment_terms": "Due on receipt",
                "payment_date": "",
                "currency": "TK",
                "currency_rate": "0",
                "products": "",
                "selected_products": "",
                "document_note": "",
                "subtotal": "",
                "discount_rate": "0",
                "discount_amount": "",
                "vat": "",
                "total": "",
                "delivery_contact": "",
                "delivery_address": "",
                "delivery_address_id": "",
                "project": "",
                "attachments": "",
                "files": [],
                "assigned_to": '',
                "private_note": "",
                "attachments": "",
                "created_at": "",
                "updated_at": "",
            },
        }
    },
    created: function () {
        this.setInfo();

        if(this.type == 'edit'){
            this.getQuote();
        }

        if(this.get_basic_information){
            this.form_data.assigned_to = this.get_basic_information.assigned_to
        }

    },
    watch: {
        form_data: {
            handler: function(val,oldVal){
                this.setFormData(this.form_data);
            },
            deep: true,
        }
    },
    methods: {
        setInfo: function(){
            this.getQuoteCode();
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            this.today_date =  yyyy+'-'+ mm +'-'+dd ;
            this.form_data.date = this.today_date;
            this.form_data.payment_date = this.today_date;

            let next_month = new Date(today.getFullYear(), today.getMonth()+2, 1);
            next_month = String(next_month.getMonth()).padStart(2,0);
            this.expiration_date =  yyyy+'-'+ (next_month) +'-'+dd ;
            this.form_data.expiration_date = this.expiration_date;
        },

        getQuote: function (Quote) {
            var that = this;
            axios.get('/api/quotes/' + this.$route.params.id)
                .then(function (response) {
                    that.form_data = response.data.quotes;
                    that.form_data.selected_products = response.data.selected_products;
                    that.selected_products = response.data.selected_products;
                    that.loaded = true;
                    that.sales_logs = response.data.quotes.sales_log;

                    // console.log(that.form_data, response.data.quotes);

                    setTimeout(() => {
                        that.get_customer_data(response.data.quotes.customer_id);

                        if(that.form_data.status != 'open'){
                            $('input').attr('disabled',true);
                            $('textarea').attr('disabled',true);
                            $('select').attr('disabled',true);
                            $('button').attr('disabled',true);
                        }
                    }, 2000);
                });

        },

        get_customer_data:function(id){
            axios.get('/api/customers/'+id)
                .then((res)=>{
                    this.recipients = res.data.contacts;
                    this.customer_contacts = res.data.contacts;
                    this.customer_delivery_addresses = res.data.delivery_address;
                })
        },

        getQuoteCode: function (Quote) {
            var that = this;
            axios.get('/api/get-latest-code-id/quotation/QOT').then(function (response) {
                that.form_data.code = response.data;
            });
            that.loaded = true;
        },

        getCustomerNameId: function(name, id, address){
            this.form_data.customer = name;
            this.form_data.id = id;
            this.form_data.customer_id = id;
            this.form_data.address = address;

            axios.get('/api/customers/'+id)
                .then((res)=>{
                    // console.log(res.data);
                    this.form_data.recipient = '',
                    this.form_data.delivery_address = '',
                    this.form_data.delivery_address_id = '',
                    this.form_data.delivery_contact = '',
                    this.customer_contacts = res.data.contacts;
                    this.customer_delivery_addresses = res.data.delivery_address;
                    this.projects = res.data.projects;
                })
            // console.log(name,id,address);
        },

        getCustomerRecipent: function(recipient){
            this.recipients = recipient;
        },

        set_selected_product_info: function(info){
            // console.log(info);
            this.form_data.selected_products = info.selected_products;
            this.form_data.discount_amount = info.discount_amount;
            this.form_data.discount_rate = info.discount_rate;
            this.form_data.document_note = info.document_note;
            this.form_data.subtotal = info.subtotal;
            this.form_data.total = info.total;
            this.form_data.vat = info.vat;
        },

        setDeliveryContact: function(delivery_contact){
            this.form_data.delivery_contact = delivery_contact;
        },

        setCustomerDeliverAddress: function(delivery_address,address_id){
            this.form_data.delivery_address = delivery_address;
            this.form_data.delivery_address_id = address_id;
        },

        set_customer_project: function(project_name){
            this.form_data.project = project_name;
        },

        set_payment_terms: function(payment_term_info){
            this.form_data.payment_terms = payment_term_info.payment_terms;
            this.form_data.payment_date = payment_term_info.payment_date;
        },

        set_files: function(file_info){
            // console.log(file_info);
            this.form_data.files = file_info.files;
            this.form_data.attachments = file_info.attachments;
        }
    },
    computed: {
        ...mapGetters([
            'get_basic_information',
        ]),
    }
}
</script>

<style>

</style>
