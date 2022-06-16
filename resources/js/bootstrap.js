window._ = require('lodash');

window.axios = require('axios');

// window.flowbite = require('flowbite')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
