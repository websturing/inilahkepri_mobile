import Vue from 'vue';
import VueRouter from 'vue-router';

import urlBase from '@/js/url';
import Dashboard from '@/js/components/dashboard';
import BeritaDetail from '@/js/components/berita/detail';
import Beritavideos from '@/js/components/videos/videos';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: urlBase.urlBase,
    hash: false,
    routes: [
        {
            path: '/',
            name: '/',
            component: Dashboard,
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
        },
        {
            path: '/detailBerita',
            name: 'berita-detail',
            component: BeritaDetail,
        }, 
        {
            path: '/videos',
            name: 'berita-videos',
            component: Beritavideos,
        },  
    ]
});

export default router;