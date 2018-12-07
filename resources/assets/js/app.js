
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/black-green-dark.css' // This line here

Vue.use(VueMaterial);

import { library } from '@fortawesome/fontawesome-svg-core'
import { faBed, faBath, faBuilding, faCar, faRubleSign } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faBed, faBath,faBuilding,faCar,faRubleSign);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.component('main-page-component', require('./components/MainPage/MainPageComponent'));

const app = new Vue({
    el: '#app'
});
