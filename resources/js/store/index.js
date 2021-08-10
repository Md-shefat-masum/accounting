import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

import basic_information from './modules/basic_information';
import sales_order from './modules/sales_order';
import form_product_list from './modules/form_product_list';

const store = new Vuex.Store({
    modules: {
        basic_information,
        sales_order,
        form_product_list
    },
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    plugins: [createPersistedState()],
});

export default store;
