require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import App from './views/App.vue';

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    render: h => h(App)
});
