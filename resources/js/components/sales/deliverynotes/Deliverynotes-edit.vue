<template>
    <!-- form section -->

    <form @submit.prevent="updateDeliverynote">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">
                            <delivery-note-form-body
                                :type="type"
                                :setFormData="setFormData">
                            </delivery-note-form-body>
                        </div>
                    </div>

                    <new-footer v-if="form.status !== 'invoiced'" type="basic"/>
                </div>
            </div>
        </div>
    </form>

    <!-- customer modal -->
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'

    import NewFooter from '../../../layouts/partials/new_footer'
    import DeliveryNoteFormBody from './DeliveryNoteFormBody.vue'

    export default {
        components: {
            NewFooter,
            DeliveryNoteFormBody,
        },
        name: 'Deliverynote',
        data: function () {
            return {
                loaded: false,
                type: 'delivery_note_edit',

                form: new Form({
                    "id": "",
                    "customer": "",
                    "customer_id": "",
                    "address": "",
                    "delivery_contact": "",
                    "delivery_address": "",
                    "currency": "",
                    "code": "",
                    "date": "",
                    "status": "",
                    "note_status": "",
                    "po_number": "",
                    "delivery_method": "",
                    "vehicle_number": "",
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
            this.reset_form_product_list_store();
        },
        methods: {
            ...mapMutations([
                'reset_form_product_list_store',
            ]),
            updateDeliverynote: function () {
                $('.done_btn').addClass('loading').prop("disabled",true);

                // get data from store
                this.form.selected_products = this.get_old_data;
                this.form.vat = JSON.stringify(this.get_total_vat_information);
                this.form.discount_amount = this.get_form_product_list_info.discount_amount;
                this.form.discount_rate = this.get_form_product_list_info.discount_rate;
                this.form.subtotal = this.get_form_product_list_info.subtotal;
                this.form.total = this.get_form_product_list_info.total;

                var that = this;
                this.form.put('/api/delivery-note/' + this.$route.params.id).then(function (response) {
                    // that.form.fill(response.data);
                    // that.getDeliverynote();
                    Toast.fire({
                        icon: 'success',
                        title: 'updated successfully'
                    });
                    that.$router.replace({name: 'deliveryNoteList'})
                });
            },
            setFormData: function(form_data){
                this.form = form_data;
                // console.log(form_data);
            },
        },
        computed: {
            ...mapGetters([
                'get_form_product_list_info',
                'get_old_data',
                'get_total_vat_information',
            ]),
        }
    }
</script>
