// var $ = require('jquery');

import Vue from 'vue'
import Vuetify from 'vuetify'

// import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'
import './product.css'
import colors from "vuetify/es5/util/colors";

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
