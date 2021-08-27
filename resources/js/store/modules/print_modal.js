import axios from "axios";

// state list
const state = {
    pdf_link: '',
};

// get state
const getters = {
    get_pdf_link: (state) => state.pdf_link,
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
    set_pdf_link: function (state, pdf_link) {
        state.pdf_link = pdf_link;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};

