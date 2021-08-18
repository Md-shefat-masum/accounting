import axios from "axios";

// state list
const state = {
    total_vat_information: [],
    form_product_list_info: {
        discount_rate: '',
        discount_amount: '',
        vat: '',
        source_tax: '',
        subtotal: '',
        total: '',
        selected_products: '',
        document_note: '',
    },

    // get props data
    old_data: [],
    old_document_note: '',
    currency_rate: null,

};

// get state
const getters = {
    get_total_vat_information: (state) => state.total_vat_information,
    get_form_product_list_info: (state) => state.form_product_list_info,
    get_old_data: (state) => state.old_data,
    get_old_document_note: (state) => state.old_document_note,
    get_currency_rate: (state) => state.currency_rate,
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
    set_total_vat_information: function (state, total_vat_information) {
        state.total_vat_information = total_vat_information;
    },
    set_form_product_list_info: function (state, form_product_list_info) {
        state.form_product_list_info = form_product_list_info;
        console.log(form_product_list_info);
    },
    set_old_data: function (state, old_data) {
        state.old_data = old_data;
        // console.log(old_data);
    },
    remove_product_form_old_data: function(state,old_data_index) {
        if (old_data_index > -1) {
            state.old_data.splice(old_data_index, 1);
        }
    },
    set_old_document_note: function (state, old_document_note) {
        state.old_document_note = old_document_note.target && old_document_note.target.value;
        // console.log(old_document_note.target && old_document_note.target.value);
    },
    set_currency_rate: function (state, currency_rate) {
        state.currency_rate = currency_rate;
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
};

