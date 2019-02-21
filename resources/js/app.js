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

//frontend
Vue.component('image-slider', require('./app/website/components/ImageSlider.vue').default);
Vue.component('subscribe-form', require('./app/website/components/SubscribeForm.vue').default);

/*Admin components*/
//posts
Vue.component('all-posts', require('./app/admin/posts/components/AllPosts.vue').default);
Vue.component('new-post', require('./app/admin/posts/components/NewPost.vue').default);
Vue.component('edit-post', require('./app/admin/posts/components/EditPost.vue').default);

//slider images
Vue.component('all-slider-images', require('./app/admin/slider/components/AllSliderImages.vue').default);
Vue.component('new-slider-image', require('./app/admin/slider/components/NewSliderImage.vue').default);

//videos
Vue.component('new-video', require('./app/admin/videos/components/NewVideo.vue').default);
Vue.component('all-videos', require('./app/admin/videos/components/AllVideos').default);


const app = new Vue({
    store,
    el: '#app'
});
