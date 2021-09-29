import axios from "axios";

// state list
const state = {
    all_customers: {},
};

// get state
const getters = {
    get_all_customers: (state) => state.all_customers,
};

// actions
const actions = {
    fetch_all_customers: function (state,params={page:1}) {
        axios.get(`/api/customers-paginate` + '?page=' + params.page)
            .then((res) => {
                // console.log(res.data);
                this.commit("set_all_customers", res.data);
            });
    },
};

// mutators
const mutations = {
    set_all_customers: function (state, all_customers) {
        state.all_customers = all_customers;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
