require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import App from './views/App.vue';

Vue.use(VueRouter);
Vue.mixin({
    methods: {
        hexToNumber(hex) {
            return Number(`0x${hex.substring(1)}`);
        }
    }
});

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    render: h => h(App)
});
