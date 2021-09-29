import Vue from "vue";

window.Vue = require('vue');

// import vuex
const {
    default: store
} = require('./store/index');
import {
    mapGetters,
    mapActions,
    mapMutations
} from 'vuex';

import router from './router';

require('./bootstrap');

window.Fire = new Vue();

Vue.component('pagination', require('laravel-vue-pagination'));

// single components vue
Vue.component('tableTest', require('./components/test/tableTest.vue'));

// import Select2 from 'v-select2-component';
// Vue.component ('Select2', Select2);

require('./library');

const app = new Vue({
    el: '#app',
    router,
    mode: 'history',
    store,
    created: function(){
        this.fetch_basic_information();
        this.fetch_all_customers({page:1});
        this.check_window_width();
    },
    methods: {
        ...mapActions([
            'fetch_basic_information',
            'fetch_all_customers',
        ]),
        ...mapMutations([
            'set_window_width',
        ]),
        check_window_width: function(){
            let window_width = window.innerWidth;
            this.set_window_width(window_width);
        },
        // ...mapMutations([

        // ]),
    },
    computed: {
        ...mapGetters([
            'get_basic_information',
        ]),
    }
});

