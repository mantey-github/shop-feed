import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './utils/routes'
import VueAxios from 'vue-axios';
import axios from 'axios';
import NProgress from 'nprogress';

// CSS Files
import '../node_modules/bootstrap/dist/css/bootstrap.min.css';
import '../node_modules/nprogress/nprogress.css';

import App from './App.vue'

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

Vue.config.productionTip = false;

Vue.mixin({
    data: function () {
        return {
            auth_user: {},
            token: '',
            is_auth: false
        }
    },

    created: function() {
        this.auth_user = JSON.parse(localStorage.getItem('user'));
        this.is_auth = localStorage.getItem('token') != null;
        this.token = localStorage.getItem('token');

        axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
    },

    methods: {

    }
});


/**
 * Axios configurations
 */
axios.defaults.baseURL = 'http://localhost/shop-feed/api/public/v1';
axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['Content-Type'] = 'application/json';


/**
 * Routes navigation guards
 */
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.auth)) {
        if (localStorage.getItem('token') == null) {
            next({
                path: '/login',
                params: {nextUrl: to.fullPath}
            })
        } else {
            next()
        }

    } else if (to.matched.some(record => record.meta.guest)) {
        if (localStorage.getItem('token') == null) {
            next()
        }
        else {
            next({name: 'dashboard'})
        }

    } else {
        next()
    }

});

router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start()
    }
    next()
});

router.afterEach(() => {
    NProgress.done()
});



new Vue({
    render: h => h(App),
    router
}).$mount('#app');
