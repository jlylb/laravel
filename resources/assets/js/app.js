
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 
import ElementUI from 'element-ui';
//import Vuex from 'vuex'

Vue.use(ElementUI);


//Vue.use(Vuex);

Vue.component('example', require('./components/Example.vue'));

Vue.component('user', require('./components/User.vue'));



const app = new Vue({
    el: '#app'
});
