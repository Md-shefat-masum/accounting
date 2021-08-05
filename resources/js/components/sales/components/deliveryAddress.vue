<template>
    <div>
        <div class="dropdown">
            <a class="clear_input" @click="delivery_address = ''"><span class="picto-font">D</span></a>
            <textarea type="text"
                class="form-control A54VNK-pi-d"
                style="height:71px;"
                data-toggle="modal"
                data-target="#addCustomerDeliveryAddress"
                autocomplete="off"
                readonly
                v-html="delivery_address"
                placeholder="Delivery address"></textarea>
        </div>

        <!-- addCustomerDeliveryAddress Modal -->
        <div class="modal fade" id="addCustomerDeliveryAddress" tabindex="-1" aria-labelledby="addCustomerDeliveryAddressLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerDeliveryAddressLabel">Customer Delivery Address</h5>
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
                                <col />
                                <col />
                            </colgroup>
                            <thead>
                                <tr __gwt_header_row="0">
                                    <th colspan="1" class="A54VNK-Sb-h A54VNK-Sb-f">Delivery Address</th>
                                    <th colspan="1" class="A54VNK-Sb-h" >Line 2</th>
                                    <th colspan="1" class="A54VNK-Sb-h" >City</th>
                                    <th colspan="1" class="A54VNK-Sb-h" >State</th>
                                    <th colspan="1" class="A54VNK-Sb-h" >Post Code</th>
                                    <th colspan="1" class="A54VNK-Sb-h" >Country</th>
                                </tr>
                            </thead>
                            <tbody style="">
                                <tr @click="setDeliveryAddress(address)" class="A54VNK-Sb-b" v-for="address in customer_delivery_addresses" :key="address.id">
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ address.address }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ address.line2 }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ address.city }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ address.state }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ address.zip_code }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ address.country }}</div></td>
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
        props: ['setCustomerDeliverAddress','customer_delivery_addresses','default_address'],
        data: function(){
            return {
                delivery_address: '',
            }
        },
        created: function(){
            this.$watch('default_address', (newVal, oldVal) => {
                this.delivery_address = this.default_address;
            });
        },
        methods: {
            setDeliveryAddress: function(contact){
                let address = '';
                let address_id = contact.id;
                contact.address ? address += contact.address + ' - ' : '';
                contact.line2 ? address += contact.line2 + '\r' : '';
                contact.city ? address += contact.city + ' ' : '';
                contact.zip_code ? address += contact.zip_code + '\r' : '';
                contact.state ? address += contact.state + '\r' : '';
                contact.country ? address += contact.country + ' ' : '';

                this.delivery_address = address;
                this.setCustomerDeliverAddress(address,address_id);
                $('#addCustomerDeliveryAddress').modal('hide');
            }
        }

    };
</script>

<style>
</style>
