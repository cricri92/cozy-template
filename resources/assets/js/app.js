
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-resource');

window.Vue = require('vue');

/** Vue Components */
Vue.component('search-properties', require('./components/search-properties.vue'));

const sidebar = new Vue({
    el: '#search-properties'
})