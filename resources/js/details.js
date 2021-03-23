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
        this.totalPrice();
        this.totalCount();
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
                            price: dish_price
                        };
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

                        if(dish_count == 0) {
                            return element = {
                                name: "",
                                count: dish_count,
                                price: 0
                            }
                        } else {
                            return element = {
                                name: dish_name,
                                count: dish_count,
                                price: dish_price
                            }
                        }
                       
                    } else return element;
                    
                }
            );
            this.totalPrice();
            this.totalCount();
        },
        totalPrice() {
            var total = 0;
            this.order.forEach(
                element => {
                    total = total + element['price'];
                }
            );  
            this.total = total;
        },
        totalCount() {
            var count = 0;
            this.order.forEach(
                element => {
                    count = count + element['count'];
                }
            );  
            this.count = count;
        },
        deleteOrder() {
            app.total = "";
            app.order = [];
            localStorage.total = 0;
            localStorage.order = [];
        },
        deleteDishOrder(name) {
            this.order.forEach(element => {
                if(element['name'] == name) {
                    element['count'] = 0;
                    element['price'] = 0;
                    element['name'] = "";
                    
                }
            this.totalPrice();
            this.totalCount();
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
            if(app.chartVisibility == 'hidden' || app.chartVisibility == 'out') {
                app.chartVisibility = 'animate__animated animate__bounceInRight';
            } else {
                app.chartVisibility = 'out';
            }
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