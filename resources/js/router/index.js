const Home = require('../pages/Home.vue').default;
const ManageApplication = require('../pages/ManageApp.vue').default;

const routes = [
    {path: '/', component: Home, name: 'home'},
    {path: '/manage-application', component: ManageApplication, name: 'manage-application'}
];

module.exports = routes;
