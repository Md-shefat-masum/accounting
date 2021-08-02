import axios from 'axios';

// state list
const state = {
    basic_information:{},
    auth_user_info: {},
}

// get state
const getters = {
    get_basic_information: state => state.basic_information,
    get_auth_user_info: state => state.auth_user_info,
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
}

// mutators
const mutations = {
    set_basic_information: function(state,basic_information){
        state.basic_information = basic_information;
    },
    set_user_information: function(state,auth_user_info){
        state.auth_user_info = auth_user_info;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
