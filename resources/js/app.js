require('./bootstrap');

window.Vue = require("vue").default;       //default

import Vue from "vue";                    //for vue-router -1
import VueRouter from "vue-router";       //for vue-router -1
import { routes } from "./routes";        //for routes.js -2
import App from "./App.vue";
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

Vue.use(VueRouter);                       //for vue-router -1

const router = new VueRouter({            //-3
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
