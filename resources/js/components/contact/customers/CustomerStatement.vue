<template>
    <div id="contentRootPanel" class="fullpage" style="margin-top: 80px;">
        <div class="container">
            <div>
                <div class="report-header">
                    <span v-if="customer_info">
                        <h4 class="report-header-title A54VNK-gd-f" v-if="customer_info.is_company"> {{customer_info.company_name}}</h4>
                        <h4 class="report-header-title A54VNK-gd-f" v-else> {{customer_info.first_name + ' '+customer_info.last_name}}</h4>
                    </span>

                    <div class="row">
                        <div class="col-xs-12 card-body">
                            <div class="report-header-kpi-label">Balance:</div>
                            <div class="report-header-kpi-amount">-Tk {{present_balance}}</div>
                        </div>
                    </div>
                </div>
                <div class="card card-body">
                    <table __gwtcellbasedwidgetimpldispatchingfocus="true" __gwtcellbasedwidgetimpldispatchingblur="true"
                        class="A54VNK-ub-y page-panel" cellspacing="0">
                        <colgroup>
                            <col style="width: 100px;" />
                            <col />
                            <col style="width: 150px;" />
                            <col style="width: 150px;" />
                        </colgroup>
                        <thead>
                            <tr __gwt_header_row="0">
                                <th colspan="1" class="A54VNK-ub-h A54VNK-ub-f" __gwt_column="column-gwt-uid-1074" __gwt_header="header-gwt-uid-1075">Date</th>
                                <th colspan="1" class="A54VNK-ub-h" __gwt_column="column-gwt-uid-1076" __gwt_header="header-gwt-uid-1077">Description</th>
                                <th colspan="1" class="A54VNK-ub-h text-right" __gwt_column="column-gwt-uid-1078" __gwt_header="header-gwt-uid-1079">Amount</th>
                                <th colspan="1" class="A54VNK-ub-h A54VNK-ub-p text-right" __gwt_column="column-gwt-uid-1080" __gwt_header="header-gwt-uid-1081">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr __gwt_row="0" __gwt_subrow="0" class="A54VNK-ub-b" v-for="(statement,index) in statements" :key="index">
                                <td class="A54VNK-ub-a A54VNK-ub-c A54VNK-ub-d">
                                    <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-1082">{{ statement.date }}</div>
                                </td>
                                <td class="A54VNK-ub-a A54VNK-ub-c">
                                    <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-1083">
                                        <div class="A54VNK-Jg-a">
                                            <div>
                                                <div class="gwt-Label" v-if="statement.invoice_id">
                                                    Invoice
                                                    <span @click="editInvoice(statement.invoice_id)" class="text-info cursor_pointer">
                                                        {{ statement.invoice_details.code && statement.invoice_details.code }}
                                                    </span>
                                                </div>
                                                <div class="gwt-Label" v-if="statement.receipt_id">
                                                    Receipt
                                                    <span class="text-success cursor_pointer"
                                                        @click="editReceipt(statement.receipt_id)">
                                                        {{ statement.receipt_details.code && statement.receipt_details.code }}
                                                    </span>

                                                    <span v-if="statement.receipt_appliedto">
                                                        &nbsp; &nbsp; applied to &nbsp; &nbsp;
                                                        <span class="badge badge-primary text-light cursor_pointer"
                                                            @click="editInvoice(statement.invoice_id)"
                                                            v-for="(invoice,index2) in JSON.parse(statement.receipt_appliedto)"
                                                            :key="index2">
                                                                {{invoice.code}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="A54VNK-ub-a A54VNK-ub-c" align="right">
                                    <div style="outline-style: none;" class="text-right" __gwt_cell="cell-gwt-uid-1087">
                                        {{ ( statement.receipt_id && '-'+statement.amount ) || statement.amount}}
                                    </div>
                                </td>
                                <td class="A54VNK-ub-a A54VNK-ub-c A54VNK-ub-n" align="right">
                                    <div style="outline-style: none;" class="text-right"  __gwt_cell="cell-gwt-uid-1088">
                                        <!-- {{statement.amount}} -->
                                        {{( statement.receipt_id && getBalance(-statement.amount, index) ) || getBalance(statement.amount, index) }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tbody style="display: none;">
                            <tr>
                                <td align="center" colspan="4">
                                    <div>
                                        <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                            <div aria-hidden="true" style="width: 100%; height: 100%; display: none;"><div class="text-muted text-center" style="padding: 20px;">No items to show</div></div>
                                        </div>
                                        <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                            <div aria-hidden="true" class="A54VNK-ub-q" style="width: 100%; height: 100%; display: none;"><div class="text-muted text-center" style="padding: 20px;">Loading data...</div></div>
                                        </div>
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

</template>


<script>

    import SubHeader from "../sub_header";
    export default {
        components: {
            SubHeader,
        },

        name: 'CustomerStatement',

        data: function () {
            return {
                customers: false,
                customer_info: [],
                statements: [],
                present_balance: 0,

                i: 0,
                new_amount: 0,

                form: new Form({
                    "id": "",
                    "is_company": true,
                    "company_name": "",
                    "first_name": "",
                    "last_name": "",
                    "middle_name": "",
                    "email": "",
                    "phone": "",
                    "website": "",
                    "vat_number": "",
                    "is_pickup_only_customer": true,
                    "billing_address": "",
                    "line_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "18",
                    "is_same_delivery": true,
                    "delivery_address": [{
                        address: '',

                    }],
                    "contacts": [{
                        single_contact: '',
                    }],
                    "payment_terms": "",
                    "price_family": "",
                    "currency": "18",
                    "business_code": "",
                    "opt_in_to_emails": true,
                    "assigned_to": "0",
                    "reference_account": "",
                    "date_as": new Date().toLocaleString(),
                    "note": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            // this.listCustomers();
            // console.log(this.$router.history.current.params.id);
            this.getStatements(this.$router.history.current.params.id);
            setTimeout(() => {
                $('.edit_head_text').text('Customer Statement')
            }, 300);
        },
        methods: {
            getStatements: function(customer_id){
                axios.get('/api/customers/'+customer_id)
                    .then((res)=>{
                        this.customer_info = res.data;
                        // console.log(res.data);
                    })
                axios.get('/api/customer-statements/'+customer_id)
                    .then((res)=>{
                        this.statements = res.data;
                        // console.log(res.data);
                    })
            },
            getBalance: function(amount,index){
                if(index>0){
                    // console.log(index,' ',amount );
                    let old_amount = JSON.parse(sessionStorage.getItem('oldValue'));
                    sessionStorage.removeItem('oldValue');
                    sessionStorage.setItem('oldValue',JSON.stringify(amount+old_amount));
                    this.present_balance = amount+old_amount;
                    return amount+old_amount;
                }else{
                    sessionStorage.setItem('oldValue',JSON.stringify(amount));
                    return amount
                }

            },

            editReceipt: function(receipt_id){
                this.$router.push({ name: 'editReceipt', params: { id: receipt_id }});
            },

            editInvoice: function(invoice_id){
                // console.log(invoice_id);
                this.$router.push({ name: 'editInvoice', params: { id: invoice_id }});
            },
        }
    }
</script>
