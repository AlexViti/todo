require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter);

import VueRouter from 'vue-router';
import routes from './routes';
import App from './views/App.vue'

const router = new VueRouter(routes);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router
});

// const app = new Vue({
//     el: '#app',
//     render: h => h(App),
//     router,
// });


/**
 * Do not throw an exception if push is rejected by redirection from navigation guard
 */
 const originalPush = router.push;
 router.push = function push(location, onResolve, onReject) {
     if (onResolve || onReject) {
         return originalPush.call(this, location, onResolve, onReject);
     }
     return originalPush.call(this, location).catch((err) => {
         let reg = new RegExp('^Redirected when going from "[a-z_.\\/]+" to "[a-z_.\\/]+" via a navigation guard.$');
         if (reg.test(err.message)) {
             // If pushing interrupted because of redirection from navigation guard - ignore it.
             return Promise.resolve(false);
         }
         // Otherwise throw error
         return Promise.reject(err);
     });
 };
