// var $ = require('jquery');

import Vue from 'vue'
import Vuetify from 'vuetify'

// import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'
import './product.css'
import colors from "vuetify/es5/util/colors";

// import {MODEL} from './constant'

import axios from 'axios';

Vue.use(Vuetify, {
    theme: {
        primary: colors.red.darken1, // #E53935
        secondary: colors.red.lighten4, // #FFCDD2
        accent: colors.indigo.base // #3F51B5
    }
})

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

        //category tag
        select: [],
        items: [],

        //product tags
        tags_items: ['1','2','3','4'],
        model: [],
        search: null
    }),

    created: function() {
        axios.get('http://localhost:8000/api/getCategories')
            .then(response => {
                this.items = response.data.map(function(item){
                    return item.name;
                })
                // console.log(response.data)
            })
            .catch(e => {
                this.errors.push(e)
            })
    },

    methods: {
        test_input: function (event) {
            // console.log("event trigger!");

        }
    }



    // watch: {
    //     model (val) {
    //         if (val.length > 5) {
    //             this.$nextTick(() => this.model.pop())
    //         }
    //     }
    // }
});
