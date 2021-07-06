window._ = require('lodash');


window.axios = require('axios');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery;
} catch (e) {}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.select2 = require('select2');

