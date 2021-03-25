/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';

const app = new Vue({
    el: '#app',
    data: {
        restaurants: "",
        category: '',
        categories: [],
        restaurants: [],
        show: false,
    },
    mounted() {

        axios.get("http://127.0.0.1:8000/api/categories/", {
      }).then(
        (response) => {
          //console.log(response.data);
            app.categories = response.data;
            
        });

        axios.get("http://127.0.0.1:8000/api/restaurants")
        .then((response) => {
          app.restaurants = response.data;
        });
        
    },
    methods: {
        filterCategory: function(category) {

          app.restaurants = [];
          

            axios.get("http://127.0.0.1:8000/api/restaurants/" + category, {
        }).then(
            (response) => {
              console.log(response.data);
                app.restaurants = response.data;
            });
        },

        toggleShow() {
          this.show = !this.show
        }

    }

});