require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Vue from 'vue';
const app = new Vue({
    el: '#app',
    data: {
        order: [],
        total: 0,
        count: 0,
        chartVisibility: 'hidden'
    },
    mounted() {
        if (localStorage.total) {
            this.total = localStorage.total;
        }
        if(localStorage.getItem('order')) {
            this.order = JSON.parse(localStorage.getItem('order'));
        }
        if (localStorage.count) {
            this.count = localStorage.count;
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
                app.totalCount();
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
            app.totalCount();
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
            app.totalCount();
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
        totalCount() {
            var count = 0;
            app.order.forEach(
                element => {
                    count = count + element['count'];
                }
            );  
            app.count = count;
        },
        deleteOrder() {
            app.total = 0;
            app.order = [];
        },
        deleteDishOrder(name) {
            app.order.forEach(element => {
                if(element['name'] == name) {
                    element['count'] = 0;
                    element['price'] = 0;
                }
            app.totalPrice();
            app.totalCount();
            });
        },
        inOrder(name) {
            var filtered = this.order.filter(
                (element) => {
                    return element['name'] == name;
                }); 
            if(filtered.length == 0) {
                return false;
            } else return true;
        },
        changeVisibility() {
            if(app.chartVisibility == 'hidden') {
                app.chartVisibility = 'visible';
            } else app.chartVisibility = 'hidden';
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
        },
        counter(newCount) {
            localStorage.count = newCount;
        }
    }
});