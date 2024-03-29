/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Vue.js3の記法
import { createApp } from 'vue';
import App from './App.vue';

createApp(App).mount('#app');