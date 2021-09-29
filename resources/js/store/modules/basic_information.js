import axios from 'axios';

// state list
const state = {
    basic_information:{},
    auth_user_info: {},
    countries: {},
    tax_and_vat: [],
    window_width: '',
}

// get state
const getters = {
    get_basic_information: state => state.basic_information,
    get_auth_user_info: state => state.auth_user_info,
    get_countries: state => state.countries,
    get_tax_and_vat: state => state.tax_and_vat,
    get_window_width: state => state.window_width,
}

// actions
const actions = {
    fetch_basic_information: function(state){
        axios.get('/api/customer-get-basic-information')
            .then((res)=>{
                // console.log(res.data);
                this.commit('set_basic_information',res.data);
            })
    },

    fetch_user_information: function(state){
        axios.get('/api/user-information')
            .then((res)=>{
                // console.log(res.data);
                this.commit('set_user_information',res.data);
            })
    },

    fetch_countries: function(state){
        axios.get('/api/country-list')
            .then((res)=>{
                // console.log(res.data);
                this.commit('set_countries',res.data);
            })
    },

    fetch_tax_and_vat: function(state){
        axios.get('/api/vat-and-tax')
            .then((res)=>{
                // console.log(res.data);
                this.commit('set_tax_and_vat',res.data);
            })
    },
}

// mutators
const mutations = {
    set_basic_information: function(state,basic_information){
        state.basic_information = basic_information;
    },
    set_user_information: function(state,auth_user_info){
        state.auth_user_info = auth_user_info;
    },
    set_countries: function(state,countries){
        state.countries = countries;
    },
    set_tax_and_vat: function(state,tax_and_vat){
        state.tax_and_vat = tax_and_vat;
    },
    set_window_width: function(state,window_width){
        state.window_width = window_width;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
