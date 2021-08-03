<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <table
                    class="A54VNK-Ff-y table table-hover table-link A54VNK-Ff-z empty"
                    cellspacing="0"
                    style="table-layout: fixed;">

                    <colgroup>
                        <col style="width: 15%;" />
                        <col style="width: 25%;" />
                        <col style="width: 40%;" />
                        <col style="width: 15%;" />
                        <col style="width: 25%;" />
                        <col style="width: 20%;" />
                        <col style="width: 25%;" />
                        <col style="width: 40%;" />
                    </colgroup>

                    <thead>
                        <tr>
                            <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-f" __gwt_column="column-gwt-uid-687" __gwt_header="header-gwt-uid-688">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="" data-toggle="tooltip">Code</span>
                                    <span class="header-normal">Code</span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-689" __gwt_header="header-gwt-uid-690">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="" data-toggle="tooltip">Name</span>
                                    <span class="header-normal">Name</span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-691" __gwt_header="header-gwt-uid-692">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="Description" data-toggle="tooltip">Description</span>
                                    <span class="header-normal">Description</span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-693" __gwt_header="header-gwt-uid-694">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="Qty" data-toggle="tooltip">Qty</span>
                                    <span class="header-normal">Qty</span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-695" __gwt_header="header-gwt-uid-696">
                                <div class="text-right" style="padding-right:20px;">
                                    <span class="ellipsis ellipsis-block header-small" data-title="Price" data-toggle="tooltip">Price</span>
                                    <span class="header-normal">Price </span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-697" __gwt_header="header-gwt-uid-698">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="Disc.%" data-toggle="tooltip">Disc.%</span>
                                    <span class="header-normal">Disc.%</span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h" __gwt_column="column-gwt-uid-699" __gwt_header="header-gwt-uid-700">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="Total" data-toggle="tooltip">Total</span>
                                    <span class="header-normal">Total</span>
                                </div>
                            </th>
                            <th colspan="1" class="A54VNK-Ff-h A54VNK-Ff-p" __gwt_column="column-gwt-uid-701" __gwt_header="header-gwt-uid-702">
                                <div>
                                    <span class="ellipsis ellipsis-block header-small" data-title="VAT%" data-toggle="tooltip">VAT%</span>
                                    <span class="header-normal">VAT%</span>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody v-if="selected_products.length > 0">
                        <tr @click="product_selected_row(selected_product.id,index,$event)"
                            class="A54VNK-Ff-r product_seleted_row"
                            v-for="(selected_product, index) in show_selected_products"
                            :key="index">
                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-d">
                                <div style="outline-style: none;" data-row="1" data-column="0">
                                    {{selected_product.code}}
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                <div style="outline-style: none;" data-row="1" data-column="1">
                                    {{selected_product.name}}
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                <div style="outline-style: none;" data-row="1" data-column="2">
                                    <textarea class="form-control" rows="1" v-model="selected_product.description"></textarea>
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                <div style="outline-style: none;" data-row="1" data-column="3">
                                    <input type="text" @keyup="calculateTotal()" v-model="selected_product.qty" class="form-control" />
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                <div style="outline-style: none;" data-row="1" data-column="4">
                                    <input type="text" v-model="selected_product.sales_price" @keyup="calculateTotal(selected_product.id)" style="padding-right:20px;" class="form-control text-right" />
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s">
                                <div style="outline-style: none;" data-row="1" data-column="5">
                                    <input type="text" v-model="selected_product.disc" @keyup="calculateTotal(selected_product.id)" class="form-control" />
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-A" style="padding-top: 8px;">
                                <div style="outline-style: none;" data-row="1" data-column="6">
                                    <input type="text" readonly v-model="selected_product.total_price" class="form-control" />
                                </div>
                            </td>
                            <td class="A54VNK-Ff-a A54VNK-Ff-s A54VNK-Ff-n">
                                <Select2 :key="index" v-model="selected_product.selected_select2_tax_and_vat"
                                    :options="tax_and_vats_for_select2"
                                    :settings="{multiple:true}"
                                    @change="myChangeEvent($event, selected_product, index)"
                                    @select="mySelectEvent($event, selected_product, index)">
                                </Select2>
                            </td>
                        </tr>
                    </tbody>

                    <tbody v-else>
                        <tr>
                            <td align="center" colspan="8">
                                <div>
                                    <div style="width: 100%; height: 100%; padding: 0px; margin: 0px;">
                                        <div style="width: 100%; height: 100%;">
                                            <div class="text-muted text-left">
                                                No items to show
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                        <div aria-hidden="true" class="A54VNK-Ff-q" style="width: 100%; height: 100%; display: none;">
                                            <div class="text-muted text-left">
                                                Loading data...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-toolbar A54VNK-Ki-a">
                    <button type="button" data-toggle="modal" @click="productListRender()" data-target="#addProductOrService" class="btn btn-default mt-2"><span class="picto-font">s</span> Add Product or Service</button>
                    <button type="button" @click="removeProductFormList()" class="btn btn-default ml-2 mt-2"><span class="picto-font">-</span> Delete</button>
                    <!-- <button type="button" class="btn btn-default ml-2 mt-2"
                            disabled>
                        <span class="picto-font"></span>
                    </button>
                    <button type="button" class="btn btn-default ml-2 mt-2">
                        <span class="picto-font"></span>
                    </button> -->
                </div>
            </div>
        </div>

        <!-- addProductOrService Modal -->
        <div class="modal fade" id="addProductOrService" tabindex="-1" aria-labelledby="addProductOrServiceLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductOrServiceLabel">Product List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <list-of-product-or-service
                            :key="product_random_number"
                            :selected_products="selected_products"
                            :resetSelectedProductList="resetSelectedProductList">
                        </list-of-product-or-service>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-horizontal">
                    <div class="form-group row"
                            style="margin-bottom: 15px !important;">
                        <div class="col-sm-4 col-4 control-label">
                            <label class="" style="font-weight: normal;">Document Note</label>
                        </div>
                        <div class="col-sm-8 col-8">
                            <textarea class="form-control" rows="3"
                                v-model="document_note" style="resize: vertical; min-height: 50px;"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-horizontal">
                            <div class="form-group row"
                                    style="margin-bottom: 15px !important;">
                                <div class="col-sm-4 col-4 control-label">
                                    <label style="font-weight: normal;">Subtotal</label>
                                </div>
                                <div class="col-sm-8 col-8">
                                    <input type="text"
                                            class="form-control"
                                            disabled=""
                                            v-model="get_subtotal"
                                            style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-horizontal">
                            <div class="form-group row" style="margin-bottom: 15px !important;" >
                                <div class="col-sm-4 col-4 control-label">
                                    <label style="font-weight: normal;">Flat Amount</label>
                                </div>
                                <div class="col-sm-8 col-8">
                                    <!-- discount rate e flat amount hobe. percentage er jaygay tkar amount hobe -->
                                    <input type="text"
                                            v-model="discount_rate"
                                            @keyup="calculate_discount_rate_after_some_time()"
                                            class="form-control" style="text-align: right;">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 15px !important;">
                                <div class="col-sm-4 col-4 control-label">
                                    <label style="font-weight: normal;">Discount Amount</label>
                                </div>
                                <div class="col-sm-8 col-8">
                                    <input type="text"
                                            class="form-control"
                                            v-model="discount_amount"
                                            disabled=""
                                            style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-horizontal">
                            <div class="form-group row" style="margin-bottom: 15px !important;">
                                <div class="col-sm-4 col-4 control-label">
                                    <label style="font-weight: normal;">VAT</label>
                                </div>
                                <div class="col-sm-8 col-8">
                                    <input type="text"
                                            class="form-control"
                                            disabled=""
                                            v-model="vat" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-horizontal">
                            <div class="form-group row" style="margin-bottom: 15px !important;">
                                <div class="col-sm-4 col-4 control-label">
                                    <label style="font-weight: normal;">Source Tax</label>
                                </div>
                                <div class="col-sm-8 col-8">
                                    <input type="text"
                                            class="form-control"
                                            disabled=""
                                            v-model="source_tax" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-horizontal">
                            <div class="form-group row" style="margin-bottom: 15px !important;" >
                                <div class="col-sm-4 col-4 control-label">
                                    <label style="font-weight: normal;">Total</label>
                                </div>
                                <div class="col-sm-8 col-8">
                                    <input type="text"
                                            class="form-control"
                                            disabled=""
                                            v-model="total"
                                            style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <!-- <input type="text" style="display:none;" disabled v-model="currency_rate"> -->
    </div>
</template>

<script>
    import ListOfProductOrService from '../../modal_contents/listOfProductOrService.vue';
    import Select2 from 'v-select2-component';

    export default {
        props: ['set_selected_product_info','currency_rate','old_data','old_document_note'],
        components: {
            ListOfProductOrService,
            Select2,
        },
        updated: function(){
            let info = {
                discount_rate: this.discount_rate,
                discount_amount: this.discount_amount,
                subtotal: this.subtotal,
                vat: this.vat,
                total: this.total,
                selected_products: this.selected_products,
                document_note: this.document_note,
            }

            this.calculateTotal();
            this.set_selected_product_info(info);

            // if(parseFloat(this.currency_rate) > 0 ){

            // }else{
            //     this.calculateTotal();
            //     this.set_selected_product_info(info);
            // }
        },
        watch: {
            old_data: {
                handler: function(val){
                    this.selected_products = this.old_data;
                },
                deep: true
            },
            old_document_note: {
                handler: function(val){
                    this.document_note = this.old_document_note;
                },
                deep: true
            }
        },
        created: function(){
            this.get_tax_and_vat();

            // this.$watch('currency_rate', (newVal, oldVal) => {
            //     this.selected_products = JSON.parse(localStorage.getItem('selected_products'));
            //     this.edited_currency_price_products = JSON.parse(localStorage.getItem('selected_products'));
            //     this.set_currency_price();
            //     this.calculateTotal();
            // })
        },
        data: function(){
            return {
                product_random_number: 0,
                discount_rate: 0,
                discount_amount: 0,
                subtotal: 0,
                vat: 0,
                source_tax: 0,
                total: 0,
                selected_products: [],
                edited_currency_price_products: [],
                show_selected_products: [],
                document_note: '',
                tax_and_vats_for_select2: [],
                selected_select2_tax_and_vat: [],
            }
        },
        methods: {
            productListRender: function(){
                this.product_random_number++;
            },

            get_tax_and_vat: function(){
                axios.get('/api/vat-and-tax')
                    .then((res)=>{
                        this.tax_and_vats_for_select2 = res.data;
                    })
            },

            resetSelectedProductList: function(products){
                localStorage.setItem('selected_products',JSON.stringify(products));
                this.selected_products = products;
                this.edited_currency_price_products = products;
                this.calculateTotal();
            },

            calculate_vat: function(vatValue, product_id){
                let key = this.show_selected_products.findIndex(function(item){
                    return item.id == product_id;
                });

                let element = this.show_selected_products[key];

                element.vat_on_sales = +vatValue;
                this.calculateTotal();
            },

            calculateTotal: function(){
                let subtotal = 0;
                let discount_rate = this.discount_rate;
                let discount_amount = this.discount_amount;
                let vat = 0;
                let total = 0;
                let vat_info_total = {
                    vat: 0,
                    source_tax: 0,
                };

                if(parseFloat(this.currency_rate)>0){
                    // console.log(JSON.parse(localStorage.getItem('selected_products')));
                    // this.edited_currency_price_products = [...JSON.parse(localStorage.getItem('selected_products'))];
                    for (const key in this.edited_currency_price_products) {
                        if (Object.hasOwnProperty.call(this.edited_currency_price_products, key)) {
                            const element = this.edited_currency_price_products[key];

                            // let sales_price = (parseFloat(element.sales_price)/parseFloat(this.currency_rate)).toFixed(3);
                            let sales_price = parseFloat(element.sales_price).toFixed(3);
                            element.total_price = (sales_price*element.qty).toFixed(3);

                            // console.log(element.qty, element.sales_price , element.total_price);

                            let disc = element.disc;

                            if(disc > 0){

                                /* discount rate jodi percentage e hoy */
                                // let dis = disc / 100;
                                // sales_price = sales_price - ( sales_price * dis );
                                // sales_price = sales_price.toFixed(3);
                                // element.total_price = sales_price*element.qty;


                                /* discount rate flat rate er jonno, no change*/
                                sales_price = parseFloat(disc).toFixed(2);
                                element.total_price = sales_price*element.qty;
                            }

                            subtotal += parseFloat(element.total_price);
                            subtotal.toFixed(3);

                            if(element.vat_on_sales > 0){
                                vat += (sales_price / 100) * (element.vat_on_sales+100) - sales_price;
                            }

                            // element.sales_price = (parseFloat(element.sales_price)/parseFloat(this.currency_rate)).toFixed(3);
                        }
                    }
                    this.show_selected_products = this.edited_currency_price_products;

                }else{

                    for (const key in this.selected_products) {
                        if (Object.hasOwnProperty.call(this.selected_products, key)) {
                            const element = this.selected_products[key];

                            let sales_price = element.sales_price;
                            element.total_price = sales_price*element.qty;

                            // console.log(element.qty, element.sales_price , element.total_price);

                            let disc = element.disc;
                            if(disc > 0){
                                let dis = disc / 100;
                                sales_price = sales_price - ( sales_price * dis );
                                sales_price = sales_price.toFixed(3);
                                element.total_price = sales_price*element.qty;
                            }

                            subtotal += parseFloat(element.total_price);

                            if(element.vat_info){
                                for (const key in element.vat_info) {
                                    if (Object.hasOwnProperty.call(element.vat_info, key)) {
                                        const data = element.vat_info[key];

                                        let sales_price_with_qty = element.sales_price * element.qty;

                                        if(vat_info_total[key]){
                                            // vat_info_total[key] += (element.sales_price / 100) * (data+100) - element.sales_price;
                                            vat_info_total[key] += (sales_price_with_qty / 100) * (data+100) - sales_price_with_qty;
                                        }else{
                                            vat_info_total[key] = (sales_price_with_qty / 100) * (data+100) - sales_price_with_qty;
                                        }

                                    }
                                }
                                // console.log(vat_info_total);
                                // if(element.vat_on_sales > 0){
                                //     vat += (element.sales_price / 100) * (element.vat_on_sales+100) - element.sales_price;
                                // }
                            }

                        }
                    }
                    this.show_selected_products = this.selected_products;

                }

                this.subtotal = subtotal;
                if(discount_rate > 0){
                    /* discount rate jodi percentage e hoy */

                    // let dis = discount_rate / 100;
                    // discount_amount = subtotal - ( subtotal * dis );
                    // discount_amount = discount_amount.toFixed(3);

                    /* discount rate flat rate er jonno, no change*/
                    discount_amount = parseFloat(discount_rate).toFixed(2);
                }else{
                   discount_amount = 0;
                }

                this.discount_rate = discount_rate;
                this.discount_amount = discount_amount;
                this.vat = vat_info_total.vat.toFixed(2);
                this.source_tax = vat_info_total.source_tax.toFixed(2);
                this.vat_info_total = vat_info_total;
                total = subtotal - discount_amount + parseFloat(this.vat) + parseFloat(this.source_tax);
                this.total = parseFloat(total).toFixed(2);
            },

            calculate_discount_rate_after_some_time:function(){
                // console.log();
                window._.debounce(()=>{this.calculateTotal()},300);
            },

            product_selected_row: function(product_id,index,event){
                this.product_selected_row_id = index;
                $(event.target).parents('tr').siblings('tr').removeClass('product_row_active');
                $(event.target).parents('tr').addClass('product_row_active');
            },

            removeProductFormList: function(){
                let index = this.product_selected_row_id;
                if (index > -1) {
                    this.selected_products.splice(index, 1);
                }
                localStorage.setItem('selected_products',JSON.stringify(this.selected_products));
                this.calculateTotal();
            },

            set_currency_price: function(){
                this.edited_currency_price_products.map(item => item.sales_price = (item.sales_price/this.currency_rate).toFixed(3));
            },

            myChangeEvent: function(vats, selected_product, index){

            },

            mySelectEvent: function({id, text}, selected_product, index){
                // console.log('selected value',{id, text, index, selected_product});

                const found_id = selected_product.selected_select2_tax_and_vat.find(el => el == id);
                const slected_vat = this.tax_and_vats_for_select2.find(el => el.id == id);
                const vat_name = slected_vat.tax_name.replace(" ","_");

                if(!found_id){
                    selected_product['vat_info'][vat_name] = 0;
                }else{
                    if(selected_product['vat_info']){
                        selected_product['vat_info'][vat_name] = slected_vat.tax_rate;
                    }else{
                        selected_product['vat_info'] = {
                            [vat_name] : slected_vat.tax_rate
                        }
                    }
                    // selected_product['vat_info'][slected_vat.tax_name] = slected_vat.tax_rate;
                }

            },
        },
        computed: {
            get_subtotal:function(){
                return this.subtotal.toFixed(2);
            }
        }
    }
</script>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
        padding-left: 18px!important;
    }
    .select2-container--default .select2-selection--multiple,
    .select2-container--default.select2-container--focus .select2-selection--multiple{
        height: max-content!important;
    }
    .select2-selection.select2-selection--multiple,
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--single,
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple{
        padding: 0!important;
    }

    input:not([type]):disabled,
    input:not([type])[readonly="readonly"],
    input[type="text"]:not(.browser-default):disabled,
    input[type="text"]:not(.browser-default)[readonly="readonly"],
    input[type="password"]:not(.browser-default):disabled,
    input[type="password"]:not(.browser-default)[readonly="readonly"],
    input[type="email"]:not(.browser-default):disabled,
    input[type="email"]:not(.browser-default)[readonly="readonly"],
    input[type="url"]:not(.browser-default):disabled,
    input[type="url"]:not(.browser-default)[readonly="readonly"],
    input[type="time"]:not(.browser-default):disabled,
    input[type="time"]:not(.browser-default)[readonly="readonly"],
    input[type="date"]:not(.browser-default):disabled,
    input[type="date"]:not(.browser-default)[readonly="readonly"],
    input[type="datetime"]:not(.browser-default):disabled,
    input[type="datetime"]:not(.browser-default)[readonly="readonly"],
    input[type="datetime-local"]:not(.browser-default):disabled,
    input[type="datetime-local"]:not(.browser-default)[readonly="readonly"],
    input[type="tel"]:not(.browser-default):disabled,
    input[type="tel"]:not(.browser-default)[readonly="readonly"],
    input[type="number"]:not(.browser-default):disabled,
    input[type="number"]:not(.browser-default)[readonly="readonly"],
    input[type="search"]:not(.browser-default):disabled,
    input[type="search"]:not(.browser-default)[readonly="readonly"],
    textarea.materialize-textarea:disabled,
    textarea.materialize-textarea[readonly="readonly"] {
        color: black;
    }

</style>
