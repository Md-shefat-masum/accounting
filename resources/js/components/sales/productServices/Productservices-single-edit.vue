<template>
    <!-- form section -->

    <form @submit.prevent="updateProductservice">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <product-service-form-body
                            :type="type"
                            :setFormData="setFormData"
                        ></product-service-form-body>
                    </div>

                    <new-footer type="basic"/>
                </div>
            </div>
        </div>
    </form>

    <!-- form section -->
</template>

<script>
import NewFooter from '../../../layouts/partials/new_footer'
import ProductServiceFormBody from './productServiceFormBody.vue';

    export default {
        components: {
            NewFooter,
            ProductServiceFormBody,
        },
        name: 'Productservice',
        data: function () {
            return {
                type: 'edit',
                loaded: false,
                form: new Form({
                    "id": "",
                    "is_services": "0",
                    "name": "",
                    "unit": "",
                    "sales_price": "",
                    "purchase_price": "",
                    "item_number": "",
                    "description": "",
                    "family": "",
                    "private_note": "",
                    "income_account": "",
                    "vat_on_sales": "",
                    "is_track_inventory": "1",
                    "valuation_costing": "",
                    "authorize_negative_stock": "no",
                    "minimum_stock_quantity": "",
                    "receiving_location": "",
                    "picking_delivery_location": "",
                    "inventory_account": "",
                    "inventory_transit_account": "",
                    "net_weight": "",
                    "width": "",
                    "length": "",
                    "height": "",
                    "dimension_unit": "",
                    "cogs_account": "",
                    "vat_on_purchases": "",
                    "created_at": "",
                    "updated_at": "",
                }),
            }
        },
        methods: {
            updateProductservice: function () {
                var that = this;
                this.form.put('/api/productservices/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Updated error'
                    });
                });

            },
            setFormData: function(form_data){
                this.form = form_data;
                console.log(form_data);
            },
        }
    }
</script>
