require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat').deafult)

const app=new Vue({
    el: "#app"
})
