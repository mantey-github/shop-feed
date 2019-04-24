import VueRouter from 'vue-router';
import Feed from '../components/Feed';
import Dashboard from '../components/Dashboard';
import Business from '../components/Business';


let routes = [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard
    },
    {
        name: 'business',
        path: '/businesses',
        component: Business
    },
    {
        name: 'feed',
        path: '/feeds',
        component: Feed,
    }
];


export default new VueRouter({
    mode: 'history',
    routes: routes
});