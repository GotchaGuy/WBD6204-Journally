/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.EventBus = new Vue();
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

import Antd from 'ant-design-vue';
// import App from './App';
import 'ant-design-vue/dist/antd.css';
Vue.config.productionTip = false;

Vue.use(Antd);

window.moment = require('moment');
// var moment = require('moment');
// moment().format();

import Vuetify from 'vuetify';
Vue.use(Vuetify);
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

Vue.component('el-nav', require('./components/NavigationComponent.vue').default);
Vue.component('footer-comp', require('./components/FooterComponent.vue').default);

Vue.component('posts', require('./components/PostsComponent.vue').default);
Vue.component('post', require('./components/PostComponent.vue').default);
Vue.component('post-form', require('./components/PostFormComponent.vue').default);
Vue.component('post-edit', require('./components/PostEditComponent.vue').default);

Vue.component('calendar', require('./components/CalendarComponent.vue').default);
Vue.component('category', require('./components/CategoryComponent.vue').default);

Vue.component('event-form', require('./components/EventFormComponent.vue').default);
Vue.component('event-edit', require('./components/EventEditComponent.vue').default);

Vue.component('category-edit', require('./components/CategoryEditComponent.vue').default);

Vue.component('favorites', require('./components/FavoritesComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});
