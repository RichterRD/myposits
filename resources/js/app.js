require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import Vuetify from 'vuetify'
import axios from 'axios'
import 'vuetify/dist/vuetify.min.css'
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()

Vue.use(plugin)
Vue.use(Vuetify)
Vue.prototype.$http = axios
Vue.prototype.$route = (...args) => route(...args).url()

const el = document.getElementById('app')

new Vue({
    vuetify: new Vuetify(),
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el)

