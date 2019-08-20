/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./ekko-lightbox');

window.Vue = require('vue');
window.ekkoLightbox = require('ekko-lightbox');

// Плагины

import Toastr from 'vue-toastr';
import VueRouter from 'vue-router';
import YmapPlugin from 'vue-yandex-maps';

// Настройки компонента Яндекс Карт

const settings = {
    apiKey: ''  // TODO: Use .env variable
};

Vue.use(Toastr);
Vue.use(VueRouter);
Vue.use(YmapPlugin, settings);

// Компоненты

Vue.component('image-uploader', require('./components/ImageUploader.vue').default);
Vue.component('accommodation-catalogue', require('./components/AccommodationCatalogue').default);
Vue.component('twitter', require('./components/Twitter').default);
Vue.component('accommodation-location', require('./components/AccommodationLocation').default);
Vue.component('accommodation-markers', require('./components/AccommodationMarkers').default);

// Настройки Vue Router

const router = new VueRouter({
    mode: 'history'
});

// Vue Application

const app = new Vue({
    el: '#app',
    router: router
});
