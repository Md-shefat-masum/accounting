<template>
    <div>
        <div class="dropdown">
            <a class="clear_input" @click="delivery_contact=''"><span class="picto-font">D</span></a>
            <input type="text"
                    class="form-control A54VNK-pi-d"
                    autocomplete="off"
                    role="button"
                    data-toggle="modal"
                    data-target="#addCustomerDeliveryContact"
                    v-model="delivery_contact"
                    placeholder="Contact name">
        </div>

        <!-- addCustomerDeliveryContact Modal -->
        <div class="modal fade" id="addCustomerDeliveryContact" tabindex="-1" aria-labelledby="addCustomerDeliveryContactLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerDeliveryContactLabel">Customer Contact List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="A54VNK-Sb-y table table-striped table-hover table-link" cellspacing="0">
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
                                <tr @click="setContactAddress(contact)" class="A54VNK-Sb-b" v-for="contact in customer_contacts" :key="contact.id">
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.first_name }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.last_name }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.email }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ contact.phone }}</div></td>
                                </tr>
                            </tbody>
                            <tfoot aria-hidden="true" style="display: none;"></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['setDeliveryContact','customer_contacts','old_value'],
        data: function(){
            return {
                delivery_contact: '',
            }
        },
        created: function(){
            this.$watch('customer_contacts', (newVal, oldVal) => {
                this.delivery_contact = '';
                if(this.old_value){
                    this.delivery_contact = this.old_value;
                }
            });
        },

        methods: {
            setContactAddress: function(contact){
                let name = contact.first_name + ' ' + contact.last_name;
                this.delivery_contact = name;
                this.setDeliveryContact(name);
                $('#addCustomerDeliveryContact').modal('hide');
            }
        }

    };
</script>

<style>
</style>
