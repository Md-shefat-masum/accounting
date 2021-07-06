<template>
    <div class="row" v-if="customer_id>0">
        <div class="col-12">
            <table class="A54VNK-Sb-y table table-striped table-hover table-link customer_table" cellspacing="0">
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
            </table>
            <div>
                <div class="form-group">
                    <label for=""><b>Mobile Number</b></label>
                    <input type="text" class="form-control customer_number_input" placeholder="Select from list or type" v-model="customer_number">
                </div>
                <div class="form-group">
                    <label for=""><b>Text</b></label>
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
export default {
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
            let msg = '';
            msg += `Dear Customer \r`;
            msg += `your product ${this.get_all_selected_product_name} \r`;
            msg += `will be delivered by ${delivery_info.delivery_method} \r`;
            msg += `Number: ${delivery_info.vehicle_number} \r`;
            msg += `Driver: ${delivery_info.operator_name} \r`;
            msg += `Driver Number: ${delivery_info.operator_phone_number} \r`;
            msg += `Any Delivery Information 01566339339 \r`;
            msg += `Thanks By \r`;
            msg += `ORIKA CORPORATION \r`;
            this.sms_body = msg;
        },
        sms_send: function(){
            let delivery_info = this.form_data;

            let data = new FormData();
            data.append('product',this.get_all_selected_product_name);
            data.append('method',delivery_info.delivery_method);
            data.append('vehicle_number',delivery_info.vehicle_number);
            data.append('driver',delivery_info.operator_phone_number);
            data.append('driver_number',delivery_info.operator_phone_number);

            data.append('number',this.customer_number);
            data.append('message',this.sms_body);

            let that = this;
            axios.post('/Sms_gateway/send-single-sms.php',data)
                .then(function(response) {
                    // handle success
                    // console.log(response.data);
                    if (response.data.api_response_message == 'SUCCESS') {
                        $('#'+that.modal_name).modal('hide');
                        that.go_to_note_list();
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
        },
        close_modal: function(){
            $('#'+this.modal_name).modal('hide');
            this.go_to_note_list();
        }
    },
    computed: {
        get_all_selected_product_name: function(){
            if(this.form_data.selected_products && this.form_data.selected_products.length > 0){

                let name = this.form_data.selected_products.reduce((name,item)=>{
                    return name + item.name + ' ' + (item.description!=null?(item.description+ ', '):', ')
                },'');

                return name;

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
</style>
