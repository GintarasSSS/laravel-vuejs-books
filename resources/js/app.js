import './bootstrap';
import Vue from 'vue';
import router from './router';
import store from './store';

Vue.component('TopHeader', () => import('./components/TopHeader.vue'));

new Vue({
    router,
    store,
    el: '#app',
    template: `
    <div>
        <TopHeader />
        <router-view />
    </div>`
});
