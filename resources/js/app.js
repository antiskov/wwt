require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat').default)

Vue.filter('formatDate', function(value) {
    if (value) {
        var msUTC = Date.parse(value);
        return new Date(msUTC).toLocaleString()//toString('MM/DD/YYYY hh:mm:ss');
    }
})

const app=new Vue({
    el: "#app"
})
