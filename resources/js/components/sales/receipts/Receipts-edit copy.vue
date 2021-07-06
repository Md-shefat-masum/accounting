<template>

    <!-- form section -->
    <form @submit.prevent="updateReceipt">
        <div class="right-content form2">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group floating-label">
                                        <input type="text" class="form-control form-component" v-model="form.paid_by" id="gwt-uid-1" autocomplete="off" data-toggle="dropdown">
                                        <label class="control-label form-question ellipsis" style="top:-6px; color:#26a69a;" for="gwt-uid-1">Paid By</label>
                                        <ul class="dropdown-menu A54VNK-ge-d">
                                            <li class="active">
                                                <a class="ellipsis-block" role="button" data-toggle="modal" data-target="#listOfCustomerOrLeadModal">View all Leads and Customers</a>
                                            </li>
                                            <li class="">
                                                <a class="ellipsis-block" role="button" data-toggle="modal" data-target="#addCustomerOrLeadModal">Create a Lead or Customer</a>
                                            </li>
                                        </ul>
                                        <div class="error-panel"></div>
                                    </div>
                                </div>

                                <!-- addCustomerOrLeadModal Modal -->
                                <div class="modal fade" id="addCustomerOrLeadModal" tabindex="-1" aria-labelledby="addCustomerOrLeadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addCustomerOrLeadModalLabel">New Lead or Customer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <addCustomerOrLead></addCustomerOrLead>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- listOfCustomerOrLeadModal Modal -->
                                <div class="modal fade" id="listOfCustomerOrLeadModal" tabindex="-1" aria-labelledby="listOfCustomerOrLeadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="listOfCustomerOrLeadModalLabel">Customers List</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <listOfCustomerOrLeadVue :getCustomerNameId="getCustomerNameId"></listOfCustomerOrLeadVue>
                                            </div>
                                        </div>
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
                                                <label class="control-label form-question ellipsis" for="gwt-uid-5" style="top:-8px;">Before Vat</label>
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
                            <div class="row">
                                <div class="col-12">
                                    <h4> Payment </h4>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group floating-label">
                                                <input type="text" v-model="form.payment_method" class="form-control form-component" id="gwt-uid-9" autocomplete="off" data-toggle="dropdown">
                                                <label class="control-label form-question ellipsis" for="gwt-uid-9" style="top:-8px">Payment Method</label>
                                                <ul class="dropdown-menu A54VNK-ge-d">
                                                    <li ><a @click="form.payment_method = 'cheque'" class="ellipsis-block" role="button">cheque</a></li>
                                                    <li ><a @click="form.payment_method = 'Debit/Credit Card'" class="ellipsis-block" role="button">Debit/Credit Card</a></li>
                                                    <li ><a @click="form.payment_method = 'Cash'" class="ellipsis-block" role="button">Cash</a></li>
                                                    <li ><a @click="form.payment_method = 'Direct Deibit/ACH'" class="ellipsis-block" role="button">Direct Deibit/ACH</a></li>
                                                    <li ><a @click="form.payment_method = 'Wire Transfer'" class="ellipsis-block" role="button">Wire Transfer</a></li>
                                                    <li ><a @click="form.payment_method = 'Other'" class="ellipsis-block" role="button">Other</a></li>
                                                    <li ><a @click="form.payment_method = 'Gift Cirtificate'" class="ellipsis-block" role="button">Gift Cirtificate</a></li>
                                                    <li ><a @click="form.payment_method = 'Credit Note'" class="ellipsis-block" role="button">Credit Note</a></li>
                                                </ul>
                                                <div class="error-panel"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-bottom: 15px;">
                                                <label class="btn btn-default" for='is_deposited1' style="text-transform: capitalize;">
                                                    <input @click="form.receipt_status='undeposit'" type="radio">Undeposited
                                                </label>
                                                <label class="btn active btn-default" for='is_deposited2' style="text-transform: capitalize;">
                                                    <input @click="form.receipt_status='deposit'" type="radio" checked="">Deposited
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-sm-4 pr-sm-sm1">
                                            <div class="form-group floating-label">
                                                <input v-model="form.bank" type="text" class="form-control form-component" id="gwt-uid-10" autocomplete="off">
                                                <label class="control-label form-question ellipsis" style="top:-8px" for="gwt-uid-10">Bank</label>
                                                <!-- <ul class="dropdown-menu A54VNK-ge-d">
                                                    <li class="active"><a class="ellipsis-block" role="button">11100 (Accounts Receivable:Miscellaneous Customers)</a></li>
                                                    <li class=""><a class="ellipsis-block" role="button">11100 CUS-002 (company1)</a></li>
                                                    <li class=""><a class="ellipsis-block" role="button">11400 (Other Receivables)</a></li>
                                                    <li class=""><a class="ellipsis-block" role="button">11500 (Allowance for Doubtful Account)</a></li>
                                                </ul> -->
                                                <div class="error-panel"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 pl-sm-1">
                                            <div class="form-group floating-label">
                                                <input v-model="form.transaction_id" type="text" class="form-control form-component" id="gwt-uid-11" autocomplete="off">
                                                <label class="control-label form-question ellipsis" style="top:-8px" for="gwt-uid-11">Transaction ID</label>
                                                <div class="error-panel"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 ">
                                            <div class="form-group floating-label">
                                                <input v-model="form.paid_on" type="date" class="form-control form-component" id="gwt-uid-12" autocomplete="off">
                                                <label class="control-label form-question ellipsis" for="gwt-uid-12" style="top:-9px;" >Date <small style="color: red;padding-left: 4px;">*</small></label>
                                            </div>
                                            <div class="error-panel"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 A54VNK-qi-c">
                                    <label><b>Attachments</b></label>
                                </div>
                                <div class="container-fluid">
                                    <div class="row A54VNK-qi-a" id="dvPreview">
                                        <div class="col-12 col-sm-4 col-md-3 A54VNK-kh-b" v-for="(file, m) in form.files" :key="m">
                                            <div class="A54VNK-kh-a">
                                                <div class="A54VNK-kh-g">
                                                    <img class="img-responsive" :src="form.files[m].image">
                                                </div>
                                                <div class="A54VNK-kh-e">
                                                    <div class="ellipsis-block A54VNK-kh-f bolder">{{ form.files[m].name }}</div>
                                                </div>
                                            </div>
                                            <button @click="removeFile(m, file)" type="button" class="A54VNK-kh-c" title="Delete">×</button>
                                        </div>
                                    </div>

                                    <div class="A54VNK-Ri-b">
                                        <div class="A54VNK-Ri-e">
                                            <div class="picto-font A54VNK-Ri-d drap_mob_none"></div>
                                            <div class="drap_mob_none"> Drag files to attach , or </div>
                                            <label for="upload-photo" class="btn btn-link A54VNK-Ri-a" style="margin-bottom: 0;padding-top: 6px;padding-left: 0;padding-bottom: 0;text-transform: capitalize;">Browse files from your device</label>
                                        </div>
                                        <div class="text-muted A54VNK-Ri-c"> or </div>
                                        <label class="btn btn-default" for="upload-photo" style="margin-bottom: 0;text-transform: capitalize;font-weight: 400;">Browse uploaded files</label>
                                        <input @change="addFile" type="file" name="photo" id="upload-photo" multiple="multiple" style='opacity: 0;position: absolute;z-index: -1;' />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h4> Other Details </h4>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-sm-4 pr-sm-1">
                                            <div class="form-group floating-label">
                                                <input type="text" v-model="form.project" class="form-control form-component" id="gwt-uid-13" autocomplete="off" data-toggle="dropdown">
                                                <label style="top:-9px" class="control-label form-question ellipsis" for="gwt-uid-13">Project</label>
                                                <ul class="dropdown-menu A54VNK-ge-d">
                                                    <li><a class="ellipsis-block" @click="form.project = project.name" v-for="project in projects" :key="project.id" role="button">{{project.name}}</a></li>
                                                </ul>
                                                <div class="error-panel"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <new-footer type="basic"/>
                </div>
            </div>
        </div>
    </form>

    <!-- form section -->
</template>

<script>

    import NewFooter from '../../../layouts/partials/new_footer'
    import ReceiptsCategoryVue from './Receipts-category.vue'
    import addCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue'
    import listOfCustomerOrLeadVue from '../../modal_contents/listOfCustomerOrLead.vue'

    export default {
        components: {
            NewFooter,
            ReceiptsCategoryVue,
            addCustomerOrLead,
            listOfCustomerOrLeadVue,
        },

        name: 'editReceipt',
        data: function () {
            return {
                loaded: false,
                selected_category: '',
                splits: [],
                split_id: 0,
                projects: [],
                form: new Form({
                    "id": "",
                    "customer_id": "",
                    "address": "",
                    "code": "",
                    "paid_by": "",
                    "billing_date": "",
                    "receipt_status": "",
                    "receipts_category": "",
                    "amount": 0,
                    "splits": [],
                    "is_paid": "",
                    "payment_method": "",
                    "paid_on": "",
                    "bank": "",
                    "transaction_id": "",
                    "attachments": "",
                    "files": "",
                    "project": "",
                    "assigned_to": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getReceipt();
            this.addSplit();
            this.getProject();
        },
        methods: {
            getProject: function(){
                axios.get('/api/receipts_projects')
                    .then((res)=>{
                        this.projects = res.data;
                    })
            },
            getReceipt: function (Receipt) {

                var that = this;
                this.form.get('/api/receipts/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.splits = response.data.receipt_splits;
                    that.split_id = that.splits[that.splits.length].id;
                    that.loaded = true;
                });

            },
            createReceipt(){
                this.form.splits = this.splits;
                this.form.post('/api/receipts').then(() => {
                    this.form.reset();
                    this.splits = [];
                    this.addSplit();
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
            updateReceipt: function () {

                var that = this;
                this.form.splits = this.splits;
                this.form.put('/api/receipts/' + this.$route.params.id).then(function (response) {
                    // that.form.fill(response.data);
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Updated error'
                    });
                });

            },
            deleteReceipt: function () {

                var that = this;
                this.form.delete('/api/receipts/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/receipts');
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
            addFile(e){
                let file = e.target.files;
                var i;
                for (i = 0; i < file.length; i++) {
                    var file_name = file[i].name;

                    let reader = new FileReader();

                    reader.onloadend = (file) => {
                        this.form.files.push({
                            image: reader.result,
                            file: '',
                            name: file_name,
                        });
                    }
                    reader.readAsDataURL(file[i]);
                }
            },
            removeFile(m, file){
                if (m > -1) {
                    this.form.files.splice(m, 1);
                }
            }
        }
    }
</script>
