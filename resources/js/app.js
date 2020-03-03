/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');


import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';
//import VueRouter from 'vue-router';
import vuetify from './vuetify.js';
import router from './router.js';
import 'vuetify/dist/vuetify.min.css'

Vue.component('pagination', require('laravel-vue-pagination'));

import Gate from './Gate';

Vue.prototype.$gate=new Gate(window.user);


window.Form =Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '5px'
})



import Swal from 'sweetalert2';
window.Swal=Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast=Toast;

 


window.Fire=new Vue();


// const router = new VueRouter({
// 	mode:'history',
//   	routes // short for `routes: routes`
// })

Vue.filter('upText',function(text){
	return text.charAt(0).toUpperCase()+text.slice(1);
})

Vue.filter('myDate',function(created){
	return moment(created).format('MMMM Do YYYY');
})


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
    'not-found',
    require('./components/NotFound.vue').default
);




import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-content', require('./components/admin/AdminMaster.vue').default);
Vue.component('public-content', require('./components/public/PublicMaster.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 Vue.prototype.$http = axios
 Vue.prototype.$admin_API = 'http://127.0.0.1:8000/api/postaladmin';
 Vue.prototype.$public_API = 'http://127.0.0.1:8000/api';
const app = new Vue({
    el: '#app',
     router,
     vuetify,
     data:{
       	search:''
     },
     methods:{
     	searchit: _.debounce(()=>{
     		Fire.$emit('searching');
     	},2000),
     }

});

