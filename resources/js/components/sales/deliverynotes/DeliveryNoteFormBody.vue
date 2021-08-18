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

                    <div class="form-group row" data-id="v192168000004_1132068923531_1143">
                        <div class="col-sm-4 col-4 control-label">
                            <label style="font-weight: normal;">Delivery Address</label>
                            <span class="text-danger bold">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <delivery-address
                                :default_address="form.delivery_address"
                                :customer_delivery_addresses="customer_delivery_addresses"
                                :setCustomerDeliverAddress="setCustomerDeliverAddress"></delivery-address>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000004_1132068913109_1142">
                        <div class="col-sm-4 col-4 control-label">
                            <label style="font-weight: normal;">Delivery Contact</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <delivery-contact
                                :setDeliveryContact="setDeliveryContact"
                                :customer_contacts="customer_contacts"></delivery-contact>
                        </div>
                    </div>

                    <div class="form-group row">
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
                            <span class="text-danger bold" aria-hidden="true">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <input v-model="form.code" type="text" class="form-control A54VNK-oi-b" autocomplete="off" placeholder="code">
                            <div class="error-panel"></div>
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

                    <!-- <div class="form-group row" data-id="v192168001012_1418222522948_291">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Status</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="A54VNK-ni-a">
                                <div class="select-panel A54VNK-ni-c">
                                    <select class="form-control" v-model="form.status" size="1">
                                        <option value="invoiced">Invoice</option>
                                        <option value="not invoiced">Not Invoiced</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group row" data-id="v192168000062_1318947796381_657">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">PO Number</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <input type="text" v-model="form.po_number" class="form-control A54VNK-oi-b">
                        </div>
                    </div>
                    <div class="form-group row" data-id="v192168000062_1318947796381_657">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Delivery Method</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="dropdown">
                                <input type="text" v-model="form.delivery_method" class="form-control A54VNK-oi-b" data-toggle="dropdown" autocomplete="off" role="button" placeholder="Delivery Method">

                                <ul class="dropdown-menu A54VNK-oi-a">
                                    <li class="active">
                                        <a class="ellipsis-block" @click="form.delivery_method = 'truck'" role="button" title="truck">
                                            truck
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="ellipsis-block" @click="form.delivery_method = 'vehicle'" role="button" title="vehicle">
                                            vehicle
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="ellipsis-block" @click="form.delivery_method = 'courier'" role="button" title="courier">
                                            courier
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="ellipsis-block" @click="form.delivery_method = 'transport'" role="button" title="transport">
                                            transport
                                        </a>
                                    </li>
                                    <!-- <li class="divider"></li>
                                    <li class="">
                                        <a class="ellipsis-block" role="button">Start the search</a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" role="button">Create a new...</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" data-id="v192168000062_1318947796381_657"
                        v-if="form.delivery_method == 'vehicle' || form.delivery_method == 'truck'">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Vehicle Number</label>
                            <span class="text-danger bold" aria-hidden="true">*</span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <input type="text" v-model="form.vehicle_number" class="form-control A54VNK-oi-b">
                            <div class="error-panel"></div>
                        </div>
                    </div>
                    <div class="form-group row" data-id="v192168000062_1318947796381_657"
                        v-if="form.delivery_method == 'vehicle' || form.delivery_method == 'truck'">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Driver Details</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" v-model="form.operator_name" class="form-control A54VNK-oi-b" placeholder="Driver Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" v-model="form.operator_phone_number" class="form-control A54VNK-oi-b" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" data-id="v192168000062_1318947796381_657"
                        v-if="form.delivery_method == 'courier'">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Oparator Details</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" v-model="form.courier_name" class="form-control A54VNK-oi-b" placeholder="Courier Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" data-id="v192168000062_1318947796381_657"
                        v-if="form.delivery_method == 'transport'">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Oparator Details</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" v-model="form.transport_name" class="form-control A54VNK-oi-b" title="eg: pathao" placeholder="transport Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" v-model="form.operator_name" class="form-control A54VNK-oi-b" placeholder="Oparator Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" v-model="form.operator_phone_number" class="form-control A54VNK-oi-b" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <salesStatusVue v-if="sales_logs && ( type == 'edit' || type == 'invoice_to_delivery_note' || type == 'sale_order_to_delivery_note' ) "
            :sales_logs="sales_logs" :type="'sale_order_to_delivery_note'">
        </salesStatusVue>

        <list-of-product-table
            :old_data="form.selected_products"
            :old_document_note="form.document_note"
            :currency_rate="form.currency_rate"
            :set_selected_product_info="set_selected_product_info">
        </list-of-product-table>

        <div>
            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse" href="#gwt-uid-637">Advanced</a>
            <div class="panel-collapse collapse" id="gwt-uid-637">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v010010010010_1247057509118_255">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label class="" style="font-weight: normal;">End of delivery</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <input v-model="form.end_of_delivery" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v010010010010_1247057509118_255">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label class="" style="font-weight: normal;">Delivery Weight</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <input v-model="form.delivery_weight" type="number" step=".01" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168001109_1309274770885_3348">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label class="" style="font-weight: normal;">weight Unit</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <div class="dropdown">
                                            <a class="A54VNK-pi-a">
                                                <span class="picto-font">D</span>
                                            </a>
                                            <input type="text"
                                                    class="form-control A54VNK-pi-d"
                                                    data-toggle="dropdown"
                                                    autocomplete="off"
                                                    v-model="form.weight_unit"
                                                    role="button"
                                                    placeholder="Weight unit">
                                            <ul class="dropdown-menu A54VNK-pi-c">
                                                <li @click="form.weight_unit='gram'" class="p-1">Gram</li>
                                                <li @click="form.weight_unit='kg'" class="p-1">Kg</li>
                                                <li @click="form.weight_unit='peice'" class="p-1">Peice</li>
                                                <li @click="form.weight_unit='ton'" class="p-1">Ton</li>
                                                <li @click="form.weight_unit='cft'" class="p-1">Cft</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-sm-12">
                            <div data-id="v192168000062_1318949340324_734">
                                <div class="form-horizontal">
                                    <div class="form-group row" style="margin-bottom: 15px !important;">
                                        <div class="col-sm-4 col-4 control-label">
                                            <label tyle="font-weight: normal;">Project</label>
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
                        </div>

                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168001109_1309274770885_3348">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label class="" style="font-weight: normal;">Asign to.</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <div class="dropdown">
                                            <a class="A54VNK-pi-a">
                                                <span class="picto-font">D</span>
                                            </a>
                                            <!-- <input type="text"
                                                    class="form-control A54VNK-pi-d"
                                                    data-toggle="dropdown"
                                                    autocomplete="off"
                                                    v-model="form.sales_rep"
                                                    role="button"
                                                    placeholder="Sales Receipt"> -->
                                            <input type="text"
                                                    class="form-control A54VNK-pi-d"
                                                    autocomplete="off"
                                                    value="orika"
                                                    placeholder="Sales Receipt">
                                            <!-- <ul class="dropdown-menu A54VNK-pi-c">
                                                <li class="disabled" v-for="sales_rep in customer_sale_receipts" :key="sales_rep.id">
                                                    <a @click="form.sales_rep = sales_rep.code+' - '+sales_rep.paid_by">
                                                        {{ sales_rep.code }} -
                                                        {{ sales_rep.paid_by }} -
                                                        {{ sales_rep.billing_date }}
                                                    </a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="form-group row" style="margin-bottom: 15px !important;" data-id="v192168000003_1092669209984_8401">
                                    <div class="col-sm-4 col-4 control-label">
                                        <label class="" style="font-weight: normal;">Private Note</label>
                                    </div>
                                    <div class="col-sm-8 col-8">
                                        <textarea class="form-control" v-model="form.private_note" rows="3" style="resize: vertical; min-height: 50px;"></textarea>
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
            <file-upload-field :old_files="form.files" :set_files="set_files"></file-upload-field>
        </div>
    </div>
</template>

<script>
    import SelectCustomerDropdown from '../components/selectCustomerDropdown.vue'
    import DeliveryAddress from '../components/deliveryAddress.vue'
    import DeliveryContact from '../components/deliveryContact.vue'
    import ListOfProductTable from '../components/listOfProductTable.vue'
    import salesStatusVue from '../components/sales_status.vue'
    import ProjectDropdown from '../components/projectDropdown.vue'
    import FileUploadField from '../components/fileUploadField.vue'
import { mapActions, mapGetters, mapMutations } from 'vuex'

    export default {
        props: ['setFormData','type'],
        components: {
            SelectCustomerDropdown,
            DeliveryContact,
            DeliveryAddress,
            ListOfProductTable,
            salesStatusVue,
            ProjectDropdown,
            FileUploadField,
        },
        watch: {
            form: {
                handler: function(val,oldVal){
                    this.setFormData(this.form);
                    this.set_currency_rate( this.form.currency_rate );
                    this.set_old_document_note( this.form.document_note );
                },
                deep: true,
            },
        },
        data: function () {
            return {
                loaded: false,
                selected_products: [],
                today_date: '',
                vat_on_sales: '',
                product_selected_row_id: '',
                customer_list_random_number: 0,
                errors:[],
                product_random_number: 0,

                customer_contacts:[],
                customer_delivery_addresses:[],
                customer_sale_receipts:[],
                projects:[],

                product_receive_location: [],

                sales_logs: [],

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "customer_mobile_number": "",
                    "address": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "delivery_address_id": "",
                    "currency": "TK",
                    "currency_rate": '',
                    "code": "",
                    "date": "",
                    "status": "not invoiced",
                    "note_status": "not invoiced",
                    "po_number": "",
                    "delivery_method": "truck",
                    "vehicle_number": "",
                    "courier_name": "",
                    "transport_name": "",
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

                    "selected_products": "",

                    "delivery_weight": "",
                    "weight_unit": "",
                    "project": "",
                    "sales_rep": "",
                    "private_note": "",
                    "attachments": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {

            if(this.type == 'edit'){
                this.getDeliverynote();
            }

            this.set_converting_sales_order_to_deliver_note(false);
            if(this.type == 'sale_order_to_delivery_note'){
                this.getSales();
                this.set_converting_sales_order_to_deliver_note(true);
            }

            if(this.type == 'invoice_to_delivery_note'){
                this.getInvoice();
            }

            this.basicinfo();


        },
        methods: {
            ...mapMutations([
                'set_selected_sales_order_related_products',
                'set_saved_selected_sales_order_related_products',
                'set_converting_sales_order_to_deliver_note',
                'set_checked_all_sale_order_qty_converted_to_delivery_note',
                'set_selected_sales_order_all_delivery_notes',
                'set_old_data',
                'set_old_document_note',
                'set_currency_rate',
            ]),
            basicinfo: function(){
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                this.today_date =  yyyy+'-'+ mm +'-'+dd ;
                this.form.date = this.today_date;
                this.form.end_of_delivery = this.today_date;

                var that = this;
                this.form.get('/api/get-latest-code-id/delivery_note/DEN').then(function (response) {
                    that.form.code = response.data;
                });

                this.form.get('/api/productrecivelocation').then(function (response) {
                    that.productrecivelocation = response.data;
                });
            },

            getSales: function () {
                var that = this;
                this.form.get('/api/saleorders/' + this.$route.params.id + '?convert_to_delivery_note=1')
                    .then(function (response) {
                        that.form.fill(response.data.orders);
                        that.form.currency = 'TK';
                        that.form.status = 'not invoiced';
                        that.form.delivery_method = 'truck';

                        that.form.selected_products = response.data.selected_products;

                        if(response.data.orders.delivery_list_info != null){
                            let list = response.data.orders.delivery_list_info_json;
                            console.log(list);
                            list = list[ list.length-1 ].related_product;
                            that.selected_products = list;
                            that.set_selected_sales_order_related_products( list );
                            that.set_saved_selected_sales_order_related_products( list );
                            that.set_selected_sales_order_all_delivery_notes( response.data.orders.delivery_list_info_json );
                            that.form.selected_products = list;
                        }else{
                            that.selected_products = response.data.selected_products;
                            that.set_selected_sales_order_related_products( response.data.selected_products );
                            that.set_saved_selected_sales_order_related_products(response.data.selected_products);
                            that.set_selected_sales_order_all_delivery_notes( [] );
                            that.form.selected_products = response.data.selected_products;
                        }

                        that.set_checked_all_sale_order_qty_converted_to_delivery_note();

                        // console.log(JSON.parse(JSON.stringify(response.data.selected_products)));
                        that.loaded = true;
                        // console.log(response.data.selected_products);
                        that.sales_logs = response.data.orders.sales_log;
                        setTimeout(() => {
                            that.get_customer_data(response.data.orders.customer_id);
                            // if(that.sales_logs && that.sales_logs.is_delivery_note){
                            if(response.data.orders.is_delivered){
                                $('input').attr('disabled',true);
                                $('textarea').attr('disabled',true);
                                $('select').attr('disabled',true);
                                $('button').attr('disabled',true);
                            }
                        }, 2000);
                    });
                that.loaded = true;

                this.form.get('/api/get-latest-code-id/delivery_note/DEN').then(function (response) {
                    that.form.code = response.data;
                });
            },

            getInvoice: function (Invoice) {
                var that = this;
                this.form.get('/api/invoices/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data.invoice);
                    that.form.selected_products = response.data.selected_products;
                    that.selected_products = response.data.selected_products;
                    that.form.status = 'invoiced';
                    // that.calculateTotal();
                    that.loaded = true;

                    that.sales_logs = response.data.invoice.sales_log;

                    that.basicinfo();

                    setTimeout(() => {
                        that.get_customer_data(response.data.invoice.customer_id);
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
                        that.form.selected_products = response.data.selected_products;
                        that.loaded = true;

                        // call store function
                        this.set_old_data(response.data.selected_products);
                        this.set_old_document_note(response.data.document_note);

                        that.sales_logs = response.data.delivery_note.sales_log;

                        setTimeout(() => {
                            that.get_customer_data(response.data.delivery_note.customer_id);
                            if(response.data.delivery_note.status === 'invoiced'){
                                $('input').attr('disabled',true);
                                $('textarea').attr('disabled',true);
                                $('select').attr('disabled',true);
                                $('button').attr('disabled',true);
                            }
                        }, 2000);

                    });
            },

            get_customer_data: function(id){
                axios.get('/api/customers/'+id)
                    .then((res)=>{
                        this.customer_contacts = res.data.contacts;
                        this.customer_delivery_addresses = res.data.delivery_address;
                        this.customer_sale_receipts = res.data.sale_receipts;
                        this.projects = res.data.projects;
                    })
            },

            createDeliverynote: function(){
                this.form.selected_products = this.selected_products;
                this.form.post('/api/delivery-note').then(() => {
                    this.form.reset();
                    this.selected_products = [];
                    this.basicinfo();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    // this.$router.replace({name: 'customerLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },

            updateDeliverynote: function(){

                var that = this;
                this.form.put('/api/delivery-note/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                })

            },

            getCustomerNameId: function(name, id, address, customer){
                this.form.customer = name;
                this.form.id = id;
                this.form.customer_id = id;
                this.form.address = address;
                this.form.customer_mobile_number = customer.phone;

                // this.form.delivery_address = address;

                axios.get('/api/customers/'+id)
                    .then((res)=>{
                        this.customer_contacts = res.data.contacts;
                        this.customer_delivery_addresses = res.data.delivery_address;
                        this.customer_sale_receipts = res.data.sale_receipts;
                        this.projects = res.data.projects;
                    })
            },

            getCustomerRecipent: function(recipient){
                this.recipients = recipient;
            },

            resetSelectedProductList: function(products){
                this.selected_products = products;
                this.form.selected_products = products;
                this.calculateTotal();
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

            set_payment_terms: function(payment_term_info){
                this.form.payment_terms = payment_term_info.payment_terms;
                this.form.payment_date = payment_term_info.payment_date;
            },

            set_files: function(file_info){
                // console.log(file_info);
                this.form.files = file_info.files;
                this.form.attachments = file_info.attachments;
            }
        },
        computed: {
            ...mapGetters([
                'get_selected_sales_order_related_products',
                'get_edited_sales_order_related_products_for_delivery_note',
            ])
        }

    }
</script>

<style>

</style>

