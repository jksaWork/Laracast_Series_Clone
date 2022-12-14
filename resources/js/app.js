/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueSweetalert2 from 'vue-sweetalert2';

// global.jQuery = require('jquery');
// window.$ = global.jQuery;


// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import vueVimeoPlayer from 'vue-vimeo-player'

Vue.use(vueVimeoPlayer)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Login', require('./components/Login.vue').default);
Vue.component('lesson-list', require('./components/LessonsList.vue').default);
Vue.component('create-lesson', require('./components/Children/create_lesson.vue').default);
Vue.component('vue-player', require('./components/player.vue').default);
Vue.use(VueSweetalert2);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
});
