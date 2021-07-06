<template>
    <!-- form section -->

    <form @submit.prevent="createProductservice">
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
    import NewFooter from '../../../layouts/partials/new_footer';
    import ProductServiceFormBody from './productServiceFormBody.vue';

    export default {
        components: {
            NewFooter,
            ProductServiceFormBody,
        },
        name: 'Productservice',
        data: function () {
            return {
                type: 'create',
                loaded: false,
                form: new Form({
                    "id": "",
                    "is_services": "",
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
            createProductservice: function(){
                $('.done_btn').addClass('loading').prop("disabled",true);
                this.form.post('/api/productservices')
                    .then(() => {
                        this.form.reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Created successfully'
                        });
                        this.$router.push({name: 'ProductServices'})
                    })
                    .catch(() => {
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
