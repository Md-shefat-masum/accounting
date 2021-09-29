import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

import basic_information from './modules/basic_information';
import customer from './modules/customer';
import sales_order from './modules/sales_order';
import form_product_list from './modules/form_product_list';
import print_modal from './modules/print_modal';

const store = new Vuex.Store({
    modules: {
        basic_information,
        sales_order,
        form_product_list,
        print_modal,
        customer,
    },
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    plugins: [createPersistedState()],
});

export default store;
