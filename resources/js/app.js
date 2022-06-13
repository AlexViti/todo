require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter);

import VueRouter from 'vue-router';
import routes from './routes';
import App from './views/App.vue'


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: new VueRouter(routes)
});

// const app = new Vue({
//     el: '#app',
//     render: h => h(App),
//     router,
// });
