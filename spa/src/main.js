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

axios.defaults.baseURL = 'http://localhost/shopify-simple-api/public/v1';
axios.defaults.headers.common['Accept'] = 'application/json';

const api_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaG9waWZ5LXNpbXBsZS1hcGkiLCJzdWIiOiJuYXJoQGxvZ2luLmNvbSIsImlhdCI6MTU1NjA5OTI2MSwiZXhwIjoxNTU4NjkxMjYxfQ.o0ZQcPrXtz1jNN5-lHiU8zNonjqbaWDDTIgoP0eE8zM';

axios.defaults.headers.common['Authorization'] = 'Bearer '+ api_token;

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
