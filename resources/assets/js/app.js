
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueFormGenerator from "vue-form-generator/dist/vfg-core.js";
import "vue-form-generator/dist/vfg-core.css";  // optional core css additions

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


//Load base components

var baseComponentPath = './components/general/';
var baseComponents = [
	'input/buttons/btn',
	'input/buttons/delete-btn',
	'input/buttons/approve-btn',
	'input/fields/text-base'
];

baseComponents.forEach(fileName => {
	var compName = fileName.split('/').pop();
	Vue.component(compName, require(baseComponentPath + fileName + '.vue'));
});


//Load regular components

Vue.component('unauthorized-user-list', require('./components/unauthorized_users/UnauthorizedUserList.vue'));
Vue.component('new-client-form', require('./components/clients/NewClientForm.vue'));

const app = new Vue({
    el: '#app'
});

const axios = require('axios');