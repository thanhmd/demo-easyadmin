import Vue from 'vue';
import VueRouter from 'vue-router';

import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

// app specific
import router from './router/';
import app from './app';
import Vuetify from 'vuetify'


Vue.use(Vuetify)
Vue.use(VueRouter);

// bootstrap the app
let demo = new Vue({
    el: '#vueApp',
    router,
    template: '<app/>',
    components: { app }
})