import axios from "axios";
import {Form, HasError, AlertError} from 'vform';

// state list
const state = {
    sales_order_form: new Form({
    //     "id": "",
    //     "customer": "",
    //     "customer_id": "",
    //     "code": "",
    //     "recipient": "",
    //     "currency": "TK",
    //     "currency_rate": '',
    //     "address": "",
    //     "po_number": "",
    //     "date": "",
    //     "status": "open",
    //     "paid_satus": "not_delivered",
    //     "delivery_date": "",
    //     "payment_terms": "Due on receipt",
    //     "payment_date": "",
    //     "selected_products":'',
    //     "product": "",
    //     "document_note": "",
    //     "sub_total": "",
    //     "discount_amount": "",
    //     "vat": "",
    //     "total": "",
    //     "delivery_contact": "",
    //     "delivery_address": "",
    //     "delivery_address_id": "",
    //     "delivery_notes": "",
    //     "project": "",
    //     "delivery_phone_number": "",
    //     "private_note": "",
    //     "attachments": "",
    //     "files": [],
    //     "created_at": "",
    //     "updated_at": "",
    }),

    selected_sales_order_all_delivery_notes: [],
    // will changed contents
    selected_sales_order_related_products: [],
    // saved_database_origional_data
    saved_selected_sales_order_related_products: [],
    // save rest of qty that ordered previous
    edited_sales_order_related_products_for_delivery_note: [],
    // checked the sales order to delivery order or not
    converting_sales_order_to_deliver_note: false,
    //if every single product converted will be true and status will be delivered,
    checked_all_sale_order_qty_converted_to_delivery_note: false,


};

// get state
const getters = {
    get_selected_sales_order_all_delivery_notes: (state) => state.selected_sales_order_all_delivery_notes,
    get_selected_sales_order_related_products: (state) => state.selected_sales_order_related_products,
    get_saved_selected_sales_order_related_products: (state) => state.saved_selected_sales_order_related_products,
    get_edited_sales_order_related_products_for_delivery_note: (state) => state.edited_sales_order_related_products_for_delivery_note,
    get_converting_sales_order_to_deliver_note: (state) => state.converting_sales_order_to_deliver_note,
    get_checked_all_sale_order_qty_converted_to_delivery_note: (state) => state.checked_all_sale_order_qty_converted_to_delivery_note,
};

// actions
const actions = {
    // fetch_basic_information: function (state) {
    //     axios.get("/api/").then((res) => {
    //         // console.log(res.data);
    //         this.commit("set_basic_information", res.data);
    //     });
    // },
};

// mutators
const mutations = {
    set_selected_sales_order_all_delivery_notes: function (state, selected_sales_order_all_delivery_notes) {
        state.selected_sales_order_all_delivery_notes = selected_sales_order_all_delivery_notes;
    },

    set_selected_sales_order_related_products: function (state, selected_sales_order_related_products) {
        state.selected_sales_order_related_products = selected_sales_order_related_products;
    },

    set_saved_selected_sales_order_related_products: function (state,sales_order_related_products) {
        state.saved_selected_sales_order_related_products = JSON.parse(JSON.stringify(sales_order_related_products));
    },

    // set chaged qty when making sales to delivery note
    // product_info { arrray_index: , qty: , related_product_id: }
    set_edited_sales_order_related_products_for_delivery_note: function (state, product_info) {
        state.edited_sales_order_related_products_for_delivery_note = JSON.parse(JSON.stringify(state.saved_selected_sales_order_related_products));

        // let changed_item = state.selected_sales_order_related_products.find(item=>product_info.related_product_id == item.related_product_id);

        // find array index by related_product_table -> id
        let index = state.edited_sales_order_related_products_for_delivery_note.findIndex(item=>product_info.related_product_id == item.related_product_id);

        // console.log('changed', product_info, index);
        if(index >=0 ){
            if( product_info.qty >= parseInt(state.edited_sales_order_related_products_for_delivery_note[index].qty) ){
                state.edited_sales_order_related_products_for_delivery_note[index].qty = 0;
            }else{
                state.edited_sales_order_related_products_for_delivery_note[index].qty -= product_info.qty;
            }
            this.commit('set_checked_all_sale_order_qty_converted_to_delivery_note');
            // console.log('saved', state.saved_selected_sales_order_related_products[index].qty);
            // console.log('edited rest amount', state.edited_sales_order_related_products_for_delivery_note[index].qty);
        }else{
            // no action needed , because this product is extra product not from related product.
        }
    },

    // set true or false
    set_converting_sales_order_to_deliver_note: function (state, converting_sales_order_to_deliver_note) {
        state.converting_sales_order_to_deliver_note = converting_sales_order_to_deliver_note;
    },
    // set true or false
    set_checked_all_sale_order_qty_converted_to_delivery_note: function (state) {
        state.edited_sales_order_related_products_for_delivery_note = JSON.parse(JSON.stringify(state.saved_selected_sales_order_related_products));

        // compare saved related product and curent edited related product
        let total_completed = state.saved_selected_sales_order_related_products.reduce((count,item)=>{
            let related_product_id_wise_qty = state.selected_sales_order_related_products.find((s_item)=>{
                if(s_item.related_product_id && s_item.related_product_id == item.related_product_id){
                    return s_item;
                }else{
                    return false;
                }
            });

            if(related_product_id_wise_qty){
                let saved_related_product = state.edited_sales_order_related_products_for_delivery_note
                                                .find((saved_item)=>item.related_product_id == saved_item.related_product_id);

                if(parseInt(related_product_id_wise_qty.qty) >= item.qty ){
                    count++;
                    saved_related_product.qty = 0;
                }else{
                    saved_related_product.qty -= related_product_id_wise_qty.qty;
                }

                // console.log('');
                // console.log('saved_related_product ',saved_related_product.qty);
                // console.log('related product ',parseInt(related_product_id_wise_qty.qty));
                // console.log('item qty ',item.qty);
                // console.log('count ',count);
            }
            return count;
        },0);

        if(total_completed == state.saved_selected_sales_order_related_products.length){
            state.checked_all_sale_order_qty_converted_to_delivery_note = true;
        }else{
            state.checked_all_sale_order_qty_converted_to_delivery_note = false;
        }

        console.log('total_converted_count',total_completed);
        console.log('all_converted',state.checked_all_sale_order_qty_converted_to_delivery_note);
        console.log(state.saved_selected_sales_order_related_products.length);
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};

