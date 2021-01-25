require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat'))

const app=new Vue({
    el: "#chat_block"
})
