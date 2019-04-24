import VueRouter from 'vue-router';
import Feed from '../components/Feed';
import Dashboard from '../components/Dashboard';
import Business from '../components/Business';
import Login from '../components/Login';


let routes = [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            guest: true
        }
    },
    {
        name: 'business',
        path: '/businesses',
        component: Business,
        meta: {
            auth: true
        }
    },
    {
        name: 'feed',
        path: '/feeds',
        component: Feed,
        meta: {
            auth: true
        }
    }
];


export default new VueRouter({
    mode: 'history',
    routes: routes
});