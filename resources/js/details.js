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
        order: [],
        total: 0
    },
    mounted() {
        
    },
    methods: {
        chart(name,price) {
            var dish = [name, 1, price];
            console.log(dish);
            if (app.order.length == 0) {
                app.order.push(dish);
            } else {
                var filtered = app.order.filter(
                    (element) => {
                        return element[0] == dish[0];
                    }); 
                if(filtered.length == 0) {
                    app.order.push(dish);
                    filtered = false;
                }
            }
            if(app.order.length > 0) {
                app.totalPrice();
            }
        },
        addDish(name) {
            var filtered = app.order.filter(
                element => {
                    return element[0] == name;
                });
                
            app.order = app.order.map(
                element=> {
                    if(element[0] == filtered[0][0]) {
                        var dish_name = element[0];
                        var dish_count = element[1]+1;
                        var dish_price = element[2]+(element[2] / element[1]);

                        return element = [dish_name, dish_count, dish_price];
                    } else return element;
                    
                }
            );
            app.totalPrice();
        },
        leaveDish(name) {
            var filtered = app.order.filter(
                element => {
                    return element[0] == name;
                });
                
            app.order = app.order.map(
                element=> {
                    if(element[0] == filtered[0][0]) {
                        var dish_name = element[0];
                        var dish_count = element[1]-1;
                        var dish_price = element[2]-(element[2] / element[1]);

                        return element = [dish_name, dish_count, dish_price];
                    } else return element;
                    
                }
            );
            app.totalPrice();
        },
        totalPrice() {
            var total = 0;
            app.order.forEach(
                element => {
                    total = total+element[2];
                }
            );  
            app.total = total;
        }
    }
});