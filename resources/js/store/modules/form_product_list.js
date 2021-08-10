import axios from "axios";

// state list
const state = {
    total_vat_information: [],
    form_product_list_info: {
        discount_rate: '',
        discount_amount: '',
        vat: '',
        subtotal: '',
        total: '',
        selected_products: '',
        document_note: '',
        selected_products: '',
        document_note: '',
    }
};

// get state
const getters = {
    get_total_vat_information: (state) => state.total_vat_information,
    get_form_product_list_info: (state) => state.form_product_list_info,
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
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};

