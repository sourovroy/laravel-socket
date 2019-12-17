try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.Vue = require('vue');

/**
 * Axios
 */
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * socket.io client
 */
/*let io = require('socket.io-client');
window.socketIo = io('http://localhost:8081', {
    query: {
        connection: 0
    }
});*/

var App = require('./App.vue').default;
var store = require('./store.js').default;

new Vue({
    store,
    render: h => h(App),
}).$mount("#app");
