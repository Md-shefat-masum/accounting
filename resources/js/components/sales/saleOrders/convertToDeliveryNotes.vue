<template>
    <!-- form section -->

    <form @submit.prevent="createDeliverynote">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a" data-id="eaf59416-1dc1-4844-a76b-f22ed8dd0971">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">
                            <delivery-note-form-body
                                :type="type"
                                :setFormData="setFormData">
                            </delivery-note-form-body>
                        </div>
                    </div>

                    <new-footer
                        v-if="!(sales_logs && sales_logs.is_delivery_note) &&
                        !(sales_logs && sales_logs.is_invoice)"
                        type="basic"/>
                </div>
            </div>
        </div>
    </form>

    <!-- customer modal -->
</template>

<script>

    import NewFooter from '../../../layouts/partials/new_footer'
    import DeliveryNoteFormBody from '../deliverynotes/DeliveryNoteFormBody.vue';

    export default {
        components: {
            NewFooter,
            DeliveryNoteFormBody,
        },
        name: 'SaleOrderToDeliverynote',
        data: function () {
            return {
                type: 'sale_order_to_delivery_note',
                sales_logs:[],
                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "address": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "currency": "tk",
                    "code": "",
                    "date": "",
                    "status": "not invoiced",
                    "note_status": "not invoiced",
                    "po_number": "",
                    "delivery_method": "",
                    "vehicle_number": "",
                    "driver_name": "",
                    "driver_number": "",
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

                    "delivery_weight": "",
                    "weight_unit": "",
                    "project": "",
                    "sales_rep": "",
                    "private_note": "",
                    "attachments": "",
                    "files": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getSales();
            setTimeout(() => {
                $('.edit_head_text').text('Convert Sales Order to Delivery Note');
            }, 300);
        },
        methods: {
            getSales: function () {
                var that = this;
                this.form.get('/api/saleorders/' + this.$route.params.id).then(function (response) {
                    that.sales_logs = response.data.orders.sales_log;
                    setTimeout(() => {
                        if(that.sales_logs.is_delivery_note){
                            $('input').attr('disabled',true);
                            $('textarea').attr('disabled',true);
                            $('select').attr('disabled',true);
                            $('button').attr('disabled',true);
                        }
                    }, 2000);
                });
                that.loaded = true;
            },

            createDeliverynote: function() {
                // this.form.selected_products = this.selected_products;
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.post('/api/delivery-note?sales_order_sales_log_id='+this.sales_logs.id)
                .then(() => {
                    // this.form.reset();
                    // this.selected_products = [];
                    // this.basicinfo();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    this.$router.replace({name: 'deliveryNoteList'})
                }).catch(() => {
                    $('.done_btn').removeClass('loading').prop("disabled",false);
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },

            setFormData: function(form_data){
                this.form = form_data;
            },
        }
    }
</script>
