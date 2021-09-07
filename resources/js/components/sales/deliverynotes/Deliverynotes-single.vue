<template>
    <!-- form section -->

    <form @submit.prevent="createDeliverynote">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="A54VNK-ce-a" data-id="eaf59416-1dc1-4844-a76b-f22ed8dd0971">
                    <div class="page-panel panel-default page-right-content">
                        <div class="panel-body page-panel-body">
                            <delivery-note-form-body :setFormData="setFormData"></delivery-note-form-body>
                        </div>
                    </div>
                    <new-footer type="basic"/>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="sendSmsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="sendSmsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sendSmsModalLabel">Send SMS To customer</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <send-sms-by-choose
                            :customer_id="form.customer_id"
                            :form_data="form"
                            :go_to_note_list="go_to_note_list"
                            :modal_name="'sendSmsModal'"
                        ></send-sms-by-choose>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <!-- customer modal -->
</template>

<script>
    import { mapActions, mapGetters, mapMutations } from 'vuex'

    import NewFooter from '../../../layouts/partials/new_footer'
    import SendSmsByChoose from '../components/sendSmsByChoose.vue'
    import DeliveryNoteFormBody from './DeliveryNoteFormBody.vue'


    export default {
        components: {
            NewFooter,
            DeliveryNoteFormBody,
            SendSmsByChoose,
        },
        name: 'Deliverynote',
        data: function () {
            return {
                loaded: false,
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
        created: function(){
            this.reset_form_product_list_store();
        },
        methods: {
            ...mapMutations([
                'reset_form_product_list_store',
            ]),
            createDeliverynote: function() {
                $('.done_btn').addClass('loading').prop("disabled",true);

                // get data from store
                this.form.selected_products = this.get_old_data;
                this.form.vat = JSON.stringify(this.get_total_vat_information);
                this.form.discount_amount = this.get_form_product_list_info.discount_amount;
                this.form.discount_rate = this.get_form_product_list_info.discount_rate;
                this.form.subtotal = this.get_form_product_list_info.subtotal;
                this.form.total = this.get_form_product_list_info.total;
                this.form.document_note = this.get_form_product_list_info.document_note;

                this.form.post('/api/delivery-note').then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    // this.sms(this.form);
                    $('#sendSmsModal').modal('show');
                }).catch(() => {
                    $('.done_btn').removeClass('loading').prop("disabled",false);
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },
            go_to_note_list: function(){
                // console.log(this.$router.resolve({name: 'deliveryNoteList'}));
                if(location.pathname != this.$router.resolve({name: 'deliveryNoteList'}).href){
                    this.$router.push({name: 'deliveryNoteList'});
                }
            },
            setFormData: function(form_data){
                this.form = form_data;
                // console.log(form_data);
            },
            sms: function(delivery_info){
                // console.log(delivery_info);
                let msg = '';
                msg += `& product=${this.get_all_selected_product_name}` ;
                msg += `& method=${delivery_info.delivery_method}`;
                msg += `& vehicle_number=${delivery_info.vehicle_number}`;
                msg += `& driver=${delivery_info.operator_name}`;
                msg += `& driver_number=${delivery_info.operator_phone_number}`;

                axios.get('/Sms_gateway/send-single-sms.php?number=' + this.form.customer_mobile_number + msg)
                    .then(function(response) {
                        // handle success
                        if (response.data.api_response_message == 'SUCCESS') {

                        } else {
                            swal({
                                title: 'Error',
                                text: 'Enter a valid phone number with country code.',
                                type: 'error',
                                timer: 3000
                            });
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            }
        },
        computed: {
            ...mapGetters([
                'get_form_product_list_info',
                'get_old_data',
                'get_total_vat_information',
            ]),
            get_all_selected_product_name: function(){
                let name = this.form.selected_products.reduce((name,item)=>{
                    return name + item.name + ' ' + (item.description!=null?item.description+ ', ':'')
                },'');

                return name;
            }
        }
    }

</script>
