/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./ekko-lightbox');
require('./summernote');

window.Vue = require('vue');
window.ekkoLightbox = require('ekko-lightbox');
window.summernote = require('summernote/dist/summernote-bs4');
window.dayjs = require('dayjs');

import Toastr from 'vue-toastr';
import VueRouter from 'vue-router';
import YmapPlugin from 'vue-yandex-maps';
import Datepicker from 'vuejs-datepicker';
import Vuelidate from 'vuelidate';

// Yandex.Maps

const settings = {
    apiKey: ''  // TODO: Use .env variable
};

Vue.use(Toastr);
Vue.use(VueRouter);
Vue.use(YmapPlugin, settings);
Vue.use(Datepicker);
Vue.use(Vuelidate);

// Компоненты

Vue.component('image-uploader', require('./components/ImageUploader.vue').default);
Vue.component('hotels', require('./components/Hotels').default);
Vue.component('twitter', require('./components/Twitter').default);
Vue.component('accommodation-location', require('./components/AccommodationLocation').default);
Vue.component('accommodation-markers', require('./components/AccommodationMarkers').default);
Vue.component('landmark-list', require('./components/LandmarkList').default);
Vue.component('landmark', require('./components/Landmark').default);
Vue.component('order', require('./components/Order').default);
Vue.component('datepicker', Datepicker);

// Настройки Vue Router

const router = new VueRouter({
    mode: 'history'
});

// Vue Application

const app = new Vue({
    el: '#app',
    router: router
});
