<template>
    <div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group floating-label custom_form_drop_down">
                    <!-- <input type="text" class="form-control form-component" v-model="form.paid_by" id="gwt-uid-1" autocomplete="off" data-toggle="dropdown"> -->
                    <label class="control-label form-question ellipsis" style="top:-6px; color:#26a69a;z-index: 9;opacity:1;background: transparent" for="gwt-uid-1">Paid By</label>
                    <select-customer-dropdown
                        :old_customer_name="form.paid_by"
                        :getCustomerRecipent="getCustomerRecipent"
                        :getCustomerNameId="getCustomerNameId">
                    </select-customer-dropdown>
                </div>
            </div>

            <div class="col-12 offset-0 col-sm-2 offset-sm-3 pr-sm-sm0">
                <!-- <div class="form-group floating-label">
                    <input type="text" class="form-control form-component" id="gwt-uid-2" autocomplete="off">
                    <label class="control-label form-question ellipsis not_float" for="gwt-uid-2" style="top: -4px;opacity: 1;z-index: 0;background: transparent;">Code <small style="color: red;padding-left: 4px;">*</small></label>
                </div>
                <div class="error-panel"></div> -->
            </div>
            <div class="col-12 col-sm-3 pl-sm-1">
                <div class="form-group floating-label">
                    <input type="date" v-model="form.billing_date" class="form-control form-component" id="gwt-uid-1df"
                    autocomplete="off">
                    <label class="control-label form-question ellipsis active" style="top:-6px; color:#26a69a;" for="gwt-uid-1df">Date</label>
                    <div class="error-panel"></div>
                </div>
                <div class="error-panel"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row" v-for="split in splits" :key="split.id">
                    <div class="col-12 col-sm-3 pr-sm-1">
                        <div class="form-group floating-label">
                            <input type="text" class="form-control form-component" v-model="split.category" id="gwt-uid-4" autocomplete="off" data-toggle="dropdown">
                            <label class="control-label form-question ellipsis" style="top:-6px; color:#26a69a;" for="gwt-uid-4">Category</label>
                            <ReceiptsCategoryVue :addCategoryToSplit="addCategoryToSplit" :id="split.id"></ReceiptsCategoryVue>
                            <div class="error-panel"></div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-2 px-sm-1">
                        <div class="form-group floating-label">
                            <!-- @keyup="addDataToSplit(split.id,'before_vat',$event)" -->
                            <input type="text" v-model="split.before_vat" @keyup="calculateAmount(split,split.id)"  class="form-control form-component" id="gwt-uid-5" autocomplete="off">
                            <label class="control-label form-question ellipsis" style="top:-8px" for="gwt-uid-5">Before Vat</label>
                            <div class="error-panel"></div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-2 px-sm-1">
                        <div class="form-group floating-label">
                            <input type="text" v-model="split.vat" class="form-control form-component" id="gwt-uid-1df3"
                            autocomplete="off" data-toggle="dropdown">
                            <label class="control-label form-question ellipsis active" style="top:-6px; color:#26a69a;" for="gwt-uid-1df3">vat</label>
                            <ul class="dropdown-menu A54VNK-ge-d" >
                                <li> <a @click="setVat(0,split.id)" href="#">None</a> </li>
                                <li> <a @click="setVat(20,split.id)" href="#">20.0% Standard rate (Collected)</a> </li>
                                <li> <a @click="setVat(5,split.id)" href="#">5.0% Lower rate (Collected)</a> </li>
                                <li> <a @click="setVat(0,split.id)" href="#">0.0% Zero-rated (Collected)</a> </li>
                                <li> <a @click="setVat(0,split.id)" href="#">0.0% Exempt (Collected)</a> </li>
                            </ul>
                            <div class="error-panel"></div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-2 px-sm-1">
                        <div class="form-group floating-label">
                            <input v-model="split.amount" type="text" disabled class="form-control form-component" id="gwt-uid-7" autocomplete="off" data-toggle="dropdown">
                            <label class="control-label form-question ellipsis" style="top:-9px" for="gwt-uid-7">Amount+Vat</label>
                            <div class="error-panel"></div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-2 pl-sm-1">
                        <div class="form-group floating-label">
                            <textarea class="form-control form-component" v-model="split.note" placeholder="note" id="gwt-uid-8" autocomplete="off" rows="10"></textarea>
                            <label class="control-label form-question ellipsis" for="gwt-uid-8">Notes</label>
                        </div>
                    </div>

                    <div v-if="splits.length !== 1" class="col-12 col-sm-1 d-flex delete_field d-none justify-content-center align-items-center text-right object-list-last-cell A54VNK-Pg-a">
                        <button type="button" @click="removeSplit(split.id)" class="btn btn-danger A54VNK-Pg-b">
                            <span class="picto-font">#</span>
                        </button>
                    </div>

                </div>
                <button type="button" @click="addSplit()" class="btn btn-default A54VNK-Ef-a" style="text-transform: capitalize;position: relative;z-index: 99;">Add a split</button>
            </div>
        </div>
        <hr>

        <set-receipt-payment-method
            :set_payment_method = "set_payment_method"
            ></set-receipt-payment-method>
        <hr>
        <div class="row">
            <div class="col-sm-12 A54VNK-qi-c">
                <label><b>Attachments</b></label>
            </div>
            <file-upload-field :old_files="form.files" :set_files="set_files"></file-upload-field>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h4> Other Details </h4>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-horizontal">
                            <div class="form-group row custom_project_dropdown" style="margin-bottom: 15px !important;">
                                <div class="col-sm-12">
                                    <label>Project</label>
                                    <project-dropdown
                                        :old_project_name = "form.project"
                                        :set_customer_project="set_customer_project">
                                    </project-dropdown>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import addCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue'
import ReceiptsCategoryVue from './Receipts-category.vue'
import listOfCustomerOrLeadVue from '../../modal_contents/listOfCustomerOrLead.vue'
import addProjectModalVue from '../../modal_contents/addProjectModal.vue'
import SelectCustomerDropdown from '../components/selectCustomerDropdown.vue'
import setReceiptPaymentMethod from './setReceiptPaymentMethod.vue'
import ProjectDropdown from '../components/projectDropdown.vue'
import FileUploadField from '../components/fileUploadField.vue'

export default {
    props: ['setFormData','type'],
    components: {
        ReceiptsCategoryVue,

        listOfCustomerOrLeadVue,
        addCustomerOrLead,
        addProjectModalVue,
        SelectCustomerDropdown,
        setReceiptPaymentMethod,
        ProjectDropdown,
        FileUploadField,
    },
    created: function () {
        this.addSplit();
        this.getProject();
        this.basicInfo();

        if(this.type == 'edit'){
            this.getReceipt();
        }
    },
    watch: {
        form: {
            handler: function(val,oldVal){
                this.setFormData(this.form);
            },
            deep: true,
        },
        splits: {
            handler: function(val,oldVal){
                this.form.splits = this.splits;
            },
            deep: true,
        }
    },
    data: function () {
        return {
            loaded: false,
            selected_category: '',
            splits: [],
            split_id: 0,
            projects: [],
            customer_list_random_number: 0,

            form: new Form({
                "id": "",
                "customer_id": "",
                "address": "",
                "code": "",
                "paid_by": "",
                "billing_date": "",
                "receipt_status": "deposit",
                "receipts_category": "",
                "amount": 0,
                "splits": [],
                "is_paid": "",
                "payment_method": "cash",
                "paid_on": "",
                "bank": "",
                "bank_id": "",
                "transaction_id": "",
                "from_bank_name": '',
                "from_bank_id": '',
                "check_number": '',
                "transaction_date": '',
                "payment_processor": '',
                "payment_processor_id": '',
                "card_holder_name": '',
                "card_number": '',

                "attachments": "",
                "files": [],
                "project": "",
                "project_id": "",
                "assigned_to": "",
                "created_at": "",
                "updated_at": "",
            })
        }
    },
    methods: {
        getReceipt: function (Receipt) {
            var that = this;
            this.form.get('/api/receipts/' + this.$route.params.id)
                .then(function (response) {
                    // console.log(response.data.receipt_splits.length);
                    that.form.fill(response.data);
                    that.splits = response.data.receipt_splits;
                    that.form.splits = response.data.receipt_splits;
                    that.split_id = that.splits[that.splits.length-1].id;
                    // that.loaded = true;
            });
        },
        basicInfo: function(){
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            this.today_date =  yyyy+'-'+ mm +'-'+dd ;
            this.form.billing_date = this.today_date;
            this.form.paid_on = this.today_date;
            this.form.transaction_date = this.today_date;
        },
        getProject: function(){
            axios.get('/api/receipts_projects')
                .then((res)=>{
                    this.projects = res.data;
                })
        },
        getCustomerNameId: function(name, id, address){
            this.form.paid_by = name;
            this.form.id = id;
            this.form.customer_id = id;
            this.form.address = address;
        },
        addSplit: function(){
            let temp_splits = {
                id: this.split_id,
                category: '',
                before_vat: 0,
                vat: '',
                amount: 0,
                note:'',
            };
            this.split_id++;
            this.splits.push(temp_splits);
        },
        removeSplit: function(id){
            let new_splits = this.splits.filter((item)=>{return item.id !== id},id);
            this.splits = new_splits;
        },
        addCategoryToSplit: function(id,key,value){
            let index = this.splits.findIndex((item)=>{return item.id == id});
            this.splits[index][key] = value;
            // console.log(this.splits[index][key], this.splits);
            // console.log(id,key,value);
        },
        setVat: function(vat,id){
            let index = this.splits.findIndex((item)=>{return item.id == id});
            this.splits[index]['vat'] = vat;
            this.calculateAmount(this.splits[index],id);
        },
        calculateAmount: function(split,id){
            let index = this.splits.findIndex((item)=>{return item.id == id});

            this.splits[index]['amount'] = split.before_vat;
            if(split.vat > 0){
                let calc_vat = (split.before_vat / 100) * (split.vat+100);
                this.splits[index]['amount'] = calc_vat;
            }

            // console.log(this.splits,calc_vat,vat,split,id);
        },
        customerListRender: function(){
            this.customer_list_random_number++;
        },
        getCustomerNameId: function(name, id, address){
            this.form.paid_by = name;
            this.form.id = id;
            this.form.customer_id = id;
            this.form.address = address;
            this.form.delivery_address = address;

            // axios.get('/api/customers/'+id)
            //     .then((res)=>{
            //         this.customer_contacts = res.data.contacts;
            //         this.customer_delivery_addresses = res.data.delivery_address;
            //         this.customer_sale_receipts = res.data.sale_receipts;
            //         this.projects = res.data.projects;
            //     })
        },
        getCustomerRecipent: function(recipient){
            // this.recipients = recipient;
        },
        set_payment_method: function(payment_method_info){
            // console.log(payment_method_info);
            this.form.payment_method = payment_method_info.payment_method;
            this.form.receipt_status = payment_method_info.receipt_status;
            this.form.bank = payment_method_info.bank_name;
            this.form.bank_id = payment_method_info.bank_id;
            this.form.from_bank_name = payment_method_info.from_bank_name;
            this.form.from_bank_id = payment_method_info.from_bank_id;
            this.form.check_number = payment_method_info.check_number;
            this.form.transaction_date = payment_method_info.transaction_date;
            this.form.transaction_id = payment_method_info.transaction_id;
            this.form.payment_processor = payment_method_info.payment_processor;
            this.form.payment_processor_id = payment_method_info.payment_processor_id;
            this.form.card_holder_name = payment_method_info.card_holder_name;
            this.form.card_number = payment_method_info.card_number;
        },
        set_customer_project: function(project_name,project_info){
            this.form.project = project_name;
            this.form.project_id = project_info.id;
        },
        set_files: function(file_info){
            // console.log(file_info);
            this.form.files = file_info.files;
            this.form.attachments = file_info.attachments;
        }

    }

}
</script>

<style>

</style>
