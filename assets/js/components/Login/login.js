import Vue from 'vue'
import Vuetify from 'vuetify'

// import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'
import './login.css'
import colors from 'vuetify/es5/util/colors'

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

    }),
});