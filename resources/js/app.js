/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// imports
import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index'
import store from './store/index.js'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Toast from "vue-toastification";
import 'vue-toastification/dist/index.css';
import '@fortawesome/fontawesome-free/css/all.min.css';


const app = createApp(App);

//use the router 
app.use(router);

// user veux
app.use(store);

// VueAxios and axios
app.use(VueAxios,axios) 

const options={
  // You can set your default options here
};

app.use(Toast, options);

const Sweetoptions = {
  confirmButtonColor: '#41b882',
  cancelButtonColor: '#ff7674',
};

//app.use(VueSweetalert2,Sweetoptions)

app.mount('#app');
