<template>
    <div>
        <!-- <sub-header type="basic"/> -->

        <!-- full table -->

        <section class="content content-menu m-0">
            <div class="container-fluid">

                <tableFilterVue
                    :show_list="show_receipts"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :dataSearch="dataSearch"
                    :list="listReceipts"
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
                                        <a href="#" @click="listReceipts('all')" data-toggle="tab" class="active show">
                                            All
                                            <span class="amount">{{all_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listReceipts('undeposit')" data-toggle="tab">
                                            Undeposited
                                            <span class="amount">{{undeposit_count}}</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" @click="listReceipts('deposit')" data-toggle="tab">
                                            Deposited
                                            <span class="amount">{{deposit_count}}</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="min-width: 138px;">Sales Recipts Date</th>
                                        <th style="min-width: 135px;">Sales Recipts</th>
                                        <th style="min-width: 160px;">Category</th>
                                        <th style="min-width: 160px;">Paid By</th>
                                        <th class="text-right" style="min-width: 120px;">Amount</th>
                                        <th class="text-right" style="min-width: 120px;">Available</th>
                                        <th class="text-right" style="min-width: 120px;">Memo</th>
                                        <th class="text-center" style="min-width: 120px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody v-if="show_receipts">
                                    <tr v-for="show_receipt in show_receipts.data" :key="show_receipt.id">

                                        <td>
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                {{show_receipt.billing_date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                {{show_receipt.code}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                <div v-for="split in show_receipt.receipt_splits" :key="split.id" class="A54VNK-rj-a label-light ellipsis px-1" style="background-color: rgb(234, 245, 243); color: rgb(2, 113, 93);">
                                                    <div class="ellipsis" :title="split.category">{{split.category}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                {{show_receipt.paid_by}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                {{show_receipt.amount}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                {{show_receipt.available_amount}}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis" @click="setReceiptData(show_receipt)">
                                                <div class="badge col-red">{{show_receipt.receipt_status}}</div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination v-if="selected_customer_id" :data="show_receipts" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>

                <!-- table -->
            </div>
        </section>

        <!-- full table -->
    </div>
</template>


<script>
    import tableFilterVue from '../search_components/table_filter.vue';
    // import SubHeader from "../sub_header";

    export default {
        components: {
            // SubHeader,
            tableFilterVue,
        },
        props: ['selected_customer_id','payment_receipt_details','payment_info_reset'],
        name: 'ReceiptInModal',
        data: function () {
            return {
                receipts: {},
                pdf_link:'',
                print_quote_id:0,
                data_sort_type: 'sorted by Creation date',
                data_by_day_name: 'any date',

                data_get_url_status: 'all',

                show_receipts: {},

                all_count: 0,
                undeposit_count: 0,
                deposit_count: 0,

                checked_id:[],

                form: new Form({
                    "id": "",
                    "paid_by": "",
                    "billing_date": "",
                    "receipts_category": "",
                    "is_paid": "",
                    "payment_method": "",
                    "paid_on": "",
                    "bank": "",
                    "transaction_id": "",
                    "attachments": "",
                    "project": "",
                    "assigned_to": "",

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
            this.listReceipts('all');
            this.getResults();
            console.log(this.selected_customer_id);
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/receipts-all-by-user/${this.selected_customer_id}?status=`+status+'&page=' + page)
                    .then(response => {
                        this.show_receipts = this.receipts = response.data.datas;
                    });
            },
            listReceipts: function (status) {
                var that = this;
                this.data_get_url_status = status;
                this.form.get(`/api/receipts-all-by-user/${this.selected_customer_id}?status=`+status).then(function (response) {
                    that.show_receipts = that.receipts = response.data.datas;

                    that.all_count = response.data.all_count;
                    that.undeposit_count = response.data.undeposit_count;
                    that.deposit_count = response.data.deposit_count;
                })
            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/receipts_by_day?key=${dayno}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_receipts = that.receipts = response.data;
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/receipts_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_receipts = that.receipts = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/receipts_search',formData)
                    .then((res)=>{
                        that.show_receipts = this.receipts = res.data;
                    })
            },
            setReceiptData: function(receipt){
                this.payment_info_reset(receipt);
                $('#addPaymentReceipt').modal('hide');
            }
        }
    }
</script>
