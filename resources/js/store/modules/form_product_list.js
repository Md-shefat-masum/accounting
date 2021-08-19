import axios from "axios";

// state list
const state = {
    total_vat_information: [],
    form_product_list_info: {
        discount_rate: 0.00,
        discount_amount: 0.00,
        vat: '',
        subtotal: '',
        total: '',
        selected_products: [],
        document_note: '',
    },

    // get props data
    old_data: [],
};

// get state
const getters = {
    get_total_vat_information: (state) => state.total_vat_information,
    get_form_product_list_info: (state) => state.form_product_list_info,
    get_old_data: (state) => state.old_data,
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
    set_form_product_list_info: function (state, form_product_list_info_value) {
        state.form_product_list_info[form_product_list_info_value.key] = form_product_list_info_value.value;
        // console.log(form_product_list_info_value);
    },
    set_old_data: function (state, old_data) {
        state.old_data = old_data;
        // console.log(old_data);
    },
    remove_product_form_old_data: function (state, old_data_index) {
        if (old_data_index > -1) {
            state.old_data.splice(old_data_index, 1);
        }
    },
    reset_form_product_list_store: function (state) {
        state.total_vat_information = [];
        state.form_product_list_info = {
            discount_rate: 0.00,
            discount_amount: 0.00,
            vat: '',
            subtotal: '',
            total: '',
            selected_products: [],
            document_note: '',
        };

        // get props data
        state.old_data = [];
        state.old_document_note = '';
        state.currency_rate = null;
    }

};

export default {
    state,
    getters,
    actions,
    mutations,
};
