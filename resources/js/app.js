require('./bootstrap');
window.Vue = require('vue').default;

const VueRouter = require('vue-router');
const routes = require('./router');

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history'
});

Vue.component('app', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    router
});
