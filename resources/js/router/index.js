import VueRouter from 'vue-router';
import Vue from "vue";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        redirect: '/books',
    },
    {
        path: '/books',
        component: () => import('../components/BookListing.vue')
    },
    {
        path: '/books/:id/edit',
        component: () => import('../components/EditBook.vue')
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
