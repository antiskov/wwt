require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat').default)

Vue.filter('formatDate', function(value) {
    if (value) {
        return String(value).format('MM/DD/YYYY hh:mm:ss')
    }
})

const app=new Vue({
    el: "#app"
})
