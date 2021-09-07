window._ = require('lodash');


window.axios = require('axios');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery;
} catch (e) {}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.response.use((response) => response, (error) => {
    // whatever you want to do with the error
    // console.log(error.response.data.errors);
    let object = error.response.data.errors;
    $(`input`).siblings('.text-danger').remove();
    $(`textarea`).siblings('.text-danger').remove();
    for (const key in object) {
        if (Object.hasOwnProperty.call(object, key)) {
            const element = object[key];
            $(`input[name="${key}"]`).parent('div').append(`<div class="text-danger">${element[0]}</div>`);
            $(`input[name="${key}"]`).trigger('focus');
            $(`textarea[name="${key}"]`).parent('div').append(`<div class="text-danger">${element[0]}</div>`);
            $(`textarea[name="${key}"]`).trigger('focus');
            console.log({
                [key]: element
            });
        }
    }
    throw error;
});

window.select2 = require('select2');
