
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import datePicker from 'vue-bootstrap-datetimepicker';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
var Awesomplete = require('awesomplete');
import 'awesomplete/awesomplete.css';
import Vuex from 'vuex';
var S = require('string');
window.Vue = require('vue');
Vue.config.devtools = true;
Vue.use(Vuex);
Vue.use(BootstrapVue);
Vue.use(datePicker);

const store = new Vuex.Store({
  state: {
    message: laravel_errors ? laravel_errors[0] : false,
    variant: laravel_errors ? 'danger' : false
  },
  mutations: {
    setMessage (state, params) {
      state.message = params.message;
      state.variant = params.variant ? params.variant : false;
    }
  }
});

window.store = store;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


//Load base components

var baseComponentPath = './components/general/';
var baseComponents = [
	'message',
	'icon',
	'input/buttons/delete-btn',
	'input/buttons/approve-btn',
	'input/buttons/edit-btn',
	'input/form/v-form'
];

baseComponents.forEach(fileName => {
	var compName = fileName.split('/').pop();
	Vue.component(compName, require(baseComponentPath + fileName + '.vue'));
});


//Load regular components

Vue.component('unauthorized-user-list', require('./components/unauthorized_users/UnauthorizedUserList.vue'));
//Vue.component('new-client-form', require('./components/clients/NewClientForm.vue'));
Vue.component('new-property-form', require('./components/properties/NewPropertyForm.vue'));



Vue.mixin({
	methods: {
		humanize: function (str){
			return S(str).humanize().titleCase().s;
		},
		add_autocomplete: function(element, options){
			options.container = function(){
				return document.createElement('div');
			}
			new Awesomplete(element, options);
		},
		get_route: function(action, data=null){
			return route(action, data);
		}
	}
});


const axios = require('axios');
