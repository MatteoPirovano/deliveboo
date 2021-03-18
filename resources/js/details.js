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
        total: 0,
        orderStorage: []
    },
    mounted() {
        if (localStorage.total) {
            this.total = localStorage.total;
        }
        if(localStorage.getItem('order')) {
            this.order = JSON.parse(localStorage.getItem('order'));
        }
    },
    methods: {
        chart(name,price) {
            var dish = {
                name: name,
                count: 1,
                price: price
            };
            if (app.order.length == 0) {
                app.order.push(dish);
            } else {
                var filtered = app.order.filter(
                    (element) => {
                        return element['name'] == dish['name'];
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
                    return element['name'] == name;
                });
                
            app.order = app.order.map(
                element=> {
                    if(element['name'] == filtered[0]['name']) {
                        var dish_name = element['name'];
                        var dish_count = element['count']+1;
                        var dish_price = element['price']+(element['price'] / element['count']);

                        return element = {
                            name: dish_name,
                            count: dish_count,
                            price: dish_price};
                    } else return element;
                    
                }
            );
            app.totalPrice();
        },
        leaveDish(name) {
            var filtered = app.order.filter(
                element => {
                    return element['name'] == name;
                });
                
            app.order = app.order.map(
                element=> {
                    if(element['name'] == filtered[0]['name']) {
                        var dish_name = element['name'];
                        var dish_count = element['count']-1;
                        var dish_price = element['price']-(element['price'] / element['count']);

                        return element = {
                            name: dish_name,
                            count: dish_count,
                            price: dish_price
                        }
                    } else return element;
                    
                }
            );
            app.totalPrice();
        },
        totalPrice() {
            var total = 0;
            app.order.forEach(
                element => {
                    total = total + element['price'];
                }
            );  
            app.total = total;
        },
        deleteOrder() {
            app.total = 0;
            app.order = [];
        }
    },
    watch: {
        total(newtotal) {
            localStorage.total = newtotal;
        },
        order: {
            handler() {
                localStorage.setItem('order', JSON.stringify(this.order));
            },
            deep: true
        }
    }
});