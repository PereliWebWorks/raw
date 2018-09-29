
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
    
    message: {
    	text: response_data.errors ? response_data.errors[0] : false,
	    variant: response_data.errors ? 'danger' : false 
    },
    data: response_data
  },
  mutations: {
    setMessage(state, params) {
      state.message.text = params.message;
      state.message.variant = params.variant ? params.variant : false;
    },
    //Right now assumes this is just for removing an entry from an array in 'data'
    deleteData(state, params) {
    	var index = state.data[params.type].findIndex(el => el.id === params.id);
    	state.data[params.type].splice(index, 1);
    },
    addData(state, params) {
    	state.data[params.type].push(params.data);
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
Vue.component('referrant-org-list', require('./components/referrant_orgs/ReferrantOrgList.vue'));



Vue.mixin({
	methods: {
		humanize: function (str){
			return S(str).humanize().titleCase().s;
		},
		add_autocomplete: function(element, options){
			var defaultOptions = {
				minChars: 0,
				autoFirst: true
			};
			Object.assign(defaultOptions, options);
			var awesomplete_element = new Awesomplete(element, defaultOptions);
			$(element).focus(() => {
				awesomplete_element.open();
				awesomplete_element.evaluate();
			});
			if (options.dropdown_btn){
				options.dropdown_btn.addEventListener("click", function() {
					if (awesomplete_element.ul.childNodes.length === 0) {
						awesomplete_element.minChars = 0;
						awesomplete_element.evaluate();
					}
					else if (awesomplete_element.ul.hasAttribute('hidden')) {
						awesomplete_element.open();
					}
					else {
						awesomplete_element.close();
					}
				});
			}
		},
		get_route: function(action, data=null){
			return route(action, data);
		}
	}
});


const axios = require('axios');

