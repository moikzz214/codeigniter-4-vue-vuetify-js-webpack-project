// src/main.js
import '@babel/polyfill'
import Vue from 'vue'
import vuetify from './plugins/vuetify' // path to vuetify export
import './sass/custom.scss' // path to custom sass
import axios from 'axios'

//window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Vue.component('registration-form', require('./components/RegistrationForm.vue').default);
new Vue({
  vuetify, 
  axios, 
  data: () => ({
    drawer: null
  }),
}).$mount('#app') 