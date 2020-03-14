require('./bootstrap');

window.Vue = require('vue');

Vue.component('posts', require('./components/PostsComponent.vue').default);

const app = new Vue({
    el: '#app',
})

//ovo sam ja nesto dopisivao a inace je skoro sve ovo po defaultu