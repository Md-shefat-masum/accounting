<template>
    <div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group floating-label">
                        <input type="text" v-model="delivery_address.address" class="form-control form-component pac-target-input" id="modal_dellivery_address" autocomplete="off">
                        <label  :class="{active: delivery_address.address}" class="control-label form-question ellipsis" for="modal_dellivery_address">Delivery address</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group floating-label">
                        <input type="text" v-model="delivery_address.line2" class="form-control form-component pac-target-input" id="modal_line_2" autocomplete="off">
                        <label :class="{active: delivery_address.line2}" class="control-label form-question ellipsis" for="modal_line_2">Line 2</label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-group floating-label">
                        <input type="text" v-model="delivery_address.city" class="form-control form-component pac-target-input" id="modal_city" autocomplete="off">
                        <label :class="{active: delivery_address.city}" class="control-label form-question ellipsis" for="modal_city">City</label>
                    </div>
                </div>
                <div class="form-group col-md-4" v-if="delivery_address.country != 'Bangladesh'">
                    <div class="form-group floating-label">
                        <input type="text" v-model="delivery_address.state" class="form-control form-component pac-target-input" id="modal_state" autocomplete="off">
                        <label :class="{active: delivery_address.state}" class="control-label form-question ellipsis" for="modal_state">State</label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-group floating-label">
                        <input type="text" v-model="delivery_address.zip_code" class="form-control form-component pac-target-input" id="modal_post_code" autocomplete="off">
                        <label :class="{active: delivery_address.zip_code}" class="control-label form-question ellipsis" for="modal_post_code">Post Code</label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group floating-label focused">
                        <div class="select-panel form-component">
                            <select class="form-control" id="gwt-uid-400"
                                v-model="delivery_address.country"
                                @change="set_address_country_name($event.target.value)">
                                <option v-for="(country,index) in countries" :key="index" :value="country.name">{{ country.name }}</option>
                            </select>
                            <label class="control-label form-question ellipsis" for="gwt-uid-400" style="top: -6px;">Country</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" v-if="Object.keys(this.props_selected_data).length>0" @click="update_data" class="btn btn-primary">Update</button>
            <button type="button" v-else @click="save_data" class="btn btn-primary">Save</button>
        </div>
    </div>
</template>

<script>
export default {
    props:[
            'selected_delivery_address',
            'countries',
            'address_country',
            'set_address_country_name',
            'set_delivery_address',
            'update_delivery_address',
        ],
    name:'customerAddressModal',
    data: function(){
        return {
            country: this.country_name,
            props_selected_data: this.selected_delivery_address,
            delivery_address: this.set_data(),
        }
    },
    methods: {
        set_data: function(){

            return {
                id: this.selected_delivery_address.id || '',
                address: this.selected_delivery_address.address || '',
                line2: this.selected_delivery_address.line2 || '',
                city: this.selected_delivery_address.city || '',
                state: this.selected_delivery_address.state || '',
                zip_code: this.selected_delivery_address.zip_code || '',
                country: this.selected_delivery_address.country || this.address_country,
            }
            // return{
            //     address: '',
            //     line2: '',
            //     city: '',
            //     state: '',
            //     zip_code: '',
            //     country: this.address_country
            // }
        },
        save_data: function(){
            this.set_delivery_address(this.delivery_address);
            this.delivery_address = this.set_data();
            $('.deliver_address_modal').modal('hide');
        },
        update_data: function(){
            this.update_delivery_address(this.delivery_address);
            this.props_selected_data = [],
            $('.deliver_address_modal').modal('hide');
        }
    }
}
</script>

<style>

</style>
