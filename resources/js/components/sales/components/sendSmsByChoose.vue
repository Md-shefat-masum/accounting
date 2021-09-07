<template>
    <div class="row" v-if="customer_id>0">
        <div class="col-12">
            <!-- <table class="A54VNK-Sb-y table table-striped table-hover table-link customer_table" cellspacing="0">
                <colgroup>
                    <col />
                    <col />
                    <col />
                    <col />
                </colgroup>
                <thead>
                    <tr __gwt_header_row="0">
                        <th colspan="1" class="A54VNK-Sb-h A54VNK-Sb-f">First Name</th>
                        <th colspan="1" class="A54VNK-Sb-h" >Last Name</th>
                        <th colspan="1" class="A54VNK-Sb-h" >Email</th>
                        <th colspan="1" class="A54VNK-Sb-h" >Phone</th>
                    </tr>
                </thead>
                <tbody style="">
                    <tr @click="setContactNumber(contact)" class="A54VNK-Sb-b" v-for="contact in customer_contacts" :key="contact.id">
                        <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.first_name }}</div></td>
                        <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.last_name }}</div></td>
                        <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.email }}</div></td>
                        <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.phone }}</div></td>
                    </tr>
                </tbody>
                <tfoot aria-hidden="true" style="display: none;"></tfoot>
            </table> -->

            <div class="row">
                <div class="col-12">
                    <label for=""><b>Select Contacts</b></label>
                    <div class="form-group contacts" style="w-100">
                        <Select2 v-model="selected_select2_contacts"
                                    :options="customer_contacts"
                                    :settings="{multiple:true,tags:true}"
                                    @change="myChangeEvent($event)"
                                    @select="mySelectEvent($event)"></Select2>
                    </div>
                </div>
            </div>

            <div>
                <!-- <div class="form-group">
                    <label for=""><b>Mobile Number</b></label>
                    <input type="text" class="form-control customer_number_input" placeholder="Select from list or type" v-model="customer_number">
                </div> -->
                <div class="form-group position-relative">
                    <label for=""><b>Text</b></label>
                    <span style="position:absolute; right: 15px;">{{ sms_body.length }}</span>
                    <textarea name="" id="" class="form-control" style="height:224px" v-model="sms_body"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="close_modal">Close</button>
                <button type="button" @click="sms_send()" class="btn btn-primary">Send Sms</button>
            </div>
        </div>
        <span style="display: none;">{{customer_id}}</span>
    </div>
</template>

<script>
import Select2 from 'v-select2-component';
import { mapGetters } from 'vuex';
export default {
    components:{Select2},
    props:['customer_id','form_data','go_to_note_list','modal_name'],
    watch: {
        customer_id: {
            handler: function(){
                this.load_customer();

                let msg = '';
                msg += 'Dear Customer \r';
                msg += 'your product \r';
                msg += 'will be delivered by \r';
                msg += 'Number: \r';
                msg += 'Driver: \r';
                msg += 'Driver Number: \r';
                msg += 'Any Delivery Information 01566339339 \r';
                msg += 'Thanks By \r';
                msg += 'ORIKA CORPORATION \r';

                this.sms_body = msg;
            }
        },
        form_data: {
            handler: function(){
                this.sms_set(this.form_data);
            },
            deep: true,
        }
    },
    data: function(){
        return {
            customer_contacts: [],
            customer_number: '',
            sms_body: ``,

            selected_select2_contacts: '',
            customer_delivery_notes_for_select2: [],
            contact_count: 0,

            // selected_select2_contacts_dynamic: [],
        }
    },
    methods: {
        load_customer: function(){
            axios.get('/api/customers/'+this.customer_id)
                .then((res)=>{
                    this.customer_contacts = res.data.contacts;
                })
        },
        setContactNumber: function(contact){
            this.customer_number = contact.phone;
        },
        sms_set: function(delivery_info){
            `Your Order Ready for deliver
            DN No #
            Item/Product #
            QTY # 720.12 (Units)
            Weight #
            PO #
            Delivered by Truck / Vehicle: DM TA 25 3622
            Operator Details: Ahmmed-0171266545
            Thank You
            Orika Corporation
            www.orika.com.bd
            01566339339`

            let msg = '';
            msg += `Your Order Ready for deliver \r`;
            msg += `DN No # ${this.form_data.code} \r`;
            msg += `Item/Product # ${this.get_all_selected_product_name} \r`;
            msg += `QTY # ${this.get_all_selected_product_qty} ${this.form_data.weight_unit}\r`;
            // if(this.form_data.delivery_weight){
            //     msg += `Weight:  ${this.form_data.delivery_weight ?? ''} ${this.form_data.weight_unit ?? ''} \r`;
            // }
            // if(this.form_data.po_number){
            //     msg += `PO:  ${this.form_data.po_number} \r`;
            // }
            if(delivery_info.delivery_method){
                msg += `delivered by \r ${delivery_info.delivery_method} # ${delivery_info.vehicle_number} \r`;
            }
            if(delivery_info.operator_name){
                msg += `Operator Details # ${delivery_info.operator_name} - ${delivery_info.operator_phone_number} \r`;
            }
            // if(delivery_info.operator_phone_number){
            //     msg += `Driver Number: ${delivery_info.operator_phone_number} \r`;
            // }

            msg += `Thank You \r`;
            msg += `Orika Corporation \r`;
            msg += `www.orika.com.bd \r`;
            msg += `01566339339 \r`;

            // msg += this.get_basic_information.default_sms;
            this.sms_body = msg;
        },
        sms_send: function(){
            let delivery_info = this.form_data;

            this.selected_select2_contacts.forEach(item => {

                axios.get('/api/contacts/'+item)
                    .then((res)=>{
                        let data = new FormData();
                        data.append('product',this.get_all_selected_product_name);
                        data.append('code',`DN No # ${this.form_data.code}`);
                        data.append('qty',`${this.get_all_selected_product_qty} ${this.form_data.weight_unit??''}`);
                        data.append('method',delivery_info.delivery_method);
                        data.append('vehicle_number',delivery_info.vehicle_number);
                        data.append('driver',delivery_info.operator_name);
                        data.append('driver_number',delivery_info.operator_phone_number);
                        data.append('message',this.sms_body);
                        this.contact_count++;

                        let that = this;

                        if(res.data != false){
                            // console.log(res.data);
                            data.append('number',res.data.phone);
                            axios.post(`/Sms_gateway/send-single-sms.php`,data)
                                .then(function(response) {
                                    // handle success
                                    // console.log(response.data);
                                    if (response.data.api_response_message == 'SUCCESS') {
                                        if(that.contact_count == that.selected_select2_contacts.length){
                                            $('#'+that.modal_name).modal('hide');
                                            that.go_to_note_list();
                                        }
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
                                });
                        }else{
                            data.append('number',item);
                            axios.post('/Sms_gateway/send-single-sms.php',data)
                                .then(function(response) {
                                    // handle success
                                    // console.log(response.data);
                                    if (response.data.api_response_message == 'SUCCESS') {
                                        if(that.contact_count == that.selected_select2_contacts.length){
                                            $('#'+that.modal_name).modal('hide');
                                            that.go_to_note_list();
                                        }
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
                                });
                        }
                    })
            });

        },
        close_modal: function(){
            $('#'+this.modal_name).modal('hide');
            this.go_to_note_list();
        },
        myChangeEvent: function(val){
            // console.log(val);
            // console.log(this.selected_select2_contacts);
        },

        mySelectEvent: function({id, text}){
            // console.log('selected value',{id, text});
        }
    },
    computed: {
        ...mapGetters([
            'get_basic_information',
        ]),
        get_all_selected_product_name: function(){
            if(this.form_data.selected_products && this.form_data.selected_products.length > 0){

                let name = this.form_data.selected_products.reduce((name,item)=>{
                    return name + item.name + ' ' + (item.description!=null?(item.description+ ', '):', ')
                },'');

                return name;

            }else{

                return '';

            }

        },
        get_all_selected_product_qty: function(){
            if(this.form_data.selected_products && this.form_data.selected_products.length > 0){

                let total_qty = this.form_data.selected_products.reduce((qty,item)=>{
                    return qty + item.qty
                },0);

                return total_qty;

            }else{
                return '';
            }

        }
    }
}
</script>

<style scoped>
    .customer_number_input{
        border: 1px solid gray !important;
        border-radius: 5px !important;
        padding: 5px !important;
    }
    .customer_table tr td{
        cursor: pointer;
    }
    .select2-container{
        width: 100%!important;
    }
</style>
