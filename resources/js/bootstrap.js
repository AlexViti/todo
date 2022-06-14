window._ = require('lodash');

window.axios = require('axios');

axios.defaults.withCredentials = true;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.defaults.headers.post['Content-Type'] ='application/json';
axios.defaults.headers.post['Accept'] ='application/json';

axios.interceptors.request.use(function (config) {
    const token = localStorage.getItem('auth_token');
    config.headers.Authorization = token ? 'Bearer ${}':'';
    return config;
});
