import './bootstrap';
import Vue from 'vue';
import router from './router';

Vue.component('TopHeader', () => import('./components/TopHeader.vue'));

new Vue({
    router,
    el: '#app',
    template: `
    <div>
        <TopHeader />
        <router-view />
    </div>`
});
