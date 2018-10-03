// /*
//  * Welcome to your app's main JavaScript file!
//  *
//  * We recommend including the built version of this JavaScript file
//  * (and its CSS file) in your base layout (base.html.twig).
//  */
//
// // any CSS you require will output into a single css file (app.css in this case)
// require('../css/app.css');
//
// // Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// // var $ = require('jquery');
//
// //console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
//
// var $ = require('jquery');
//
// var greet = require('./greet.js');
//
// $(document).ready(function() {
//     $('body').prepend('<h1>'+greet('john')+'</h1>');
// });
//

var $ = require('jquery');

import Vue from 'vue'
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import './app.css'

Vue.use(Vuetify)

new Vue({
    delimiters: ['${', '}'],
    el: '#main',
    data: () => ({
        // show: false,
        //time picker
        time: null,
        menu_time: false,

        //date picker
        date: null,
        menu_date: false,

        //tag
        select: ['Vuetify', 'Programming'],
        items: [
            'Programming',
            'Design',
            'Vue',
            'Vuetify'
        ],


        //product tags
        tags_items: ['Gaming', 'Programming', 'Vue', 'Vuetify'],
        model: ['Vuetify'],
        search: null
    }),

    // watch: {
    //     model (val) {
    //         if (val.length > 5) {
    //             this.$nextTick(() => this.model.pop())
    //         }
    //     }
    // }
});
