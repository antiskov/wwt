require('./bootstrap');
import moment from 'moment'

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat').default)

Vue.filter('formatDate', function(value) {
    if (value) {
        var msUTC = Date.parse(value);
        return dateFormat(msUTC, 'MM/DD/YYYY hh:mm:ss');
    }
})

const app=new Vue({
    el: "#app"
})
