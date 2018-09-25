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


import Vue from 'vue';
import Example from './components/Example'

new Vue({
    el: '#app',
    components: {Example}
});