import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

import basic_information from './modules/basic_information';

const store = new Vuex.Store({
    modules: {
        basic_information,
    },
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    plugins: [createPersistedState()],
});

export default store;
