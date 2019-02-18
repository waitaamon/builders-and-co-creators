import store from './store'
import CxltToastr from 'cxlt-vue2-toastr'
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./interceptors');

window.Vue = require('vue');

const toastrConfigs = {
    position: 'top right',
    showDuration: 2000
}
Vue.use(CxltToastr, toastrConfigs)

Vue.component('carousel-component', require('./app/website/CarouselComponent.vue').default);
Vue.component('subscribe-form', require('./app/website/SubscribeForm.vue').default);

/*Admin components*/
//posts
Vue.component('new-post', require('./app/admin/posts/components/NewPost.vue').default);

const app = new Vue({
    store,
    el: '#app'
});
