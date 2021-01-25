require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat').default)

const app=new Vue({
    el: "#app"
})
