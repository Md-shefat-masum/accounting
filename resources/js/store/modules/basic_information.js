import axios from 'axios';

// state list
const state = {
    basic_information:{},
}

// get state
const getters = {
    get_basic_information: state => state.basic_information,
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
}

// mutators
const mutations = {
    set_basic_information: function(state,basic_information){
        state.basic_information = basic_information;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
