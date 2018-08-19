/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require( 'datatables.net-bs4' );
import '@coreui/coreui';

window.Vue = require('vue')
window.Laravel = {
    csrfToken: document.querySelector('meta[name="csrf-token"]').
        getAttribute('content'),
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Predict from './components/Predict.vue'
import Dataset from './components/Dataset.vue'

window.app = new Vue({
    el: '#app',

    components: {
        Predict,
        Dataset,
    },

})

$('.data-table').DataTable();

$('.data-table[data-base-url] tbody').on('click', 'tr', (event) => {
    switch (event.target.tagName.toLowerCase()) {
        case 'a':
        case 'button':
        case 'i':
            return;
    }

    const row = event.currentTarget;
    const urlPrefix = row.parentNode.parentNode.dataset.baseUrl;
    const urlSuffix = row.dataset.suffix;

    window.location.href = `${urlPrefix}${urlSuffix}`;
});
