import './bootstrap';
import Vue from 'vue';
import Routes from '@/js/routes.js';

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueCarousel from 'vue-carousel';
import VModal from 'vue-js-modal'
 
import beritaDetail from '@/js/components/berita/detail';
import Embed from 'v-video-embed'

// global register
Vue.use(Embed);
Vue.use(ElementUI);
Vue.use(VueCarousel);
Vue.use(VModal)
const app = new Vue({
    el: '#app',
    router: Routes,
    components:{
        beritaDetail                                                                                                                                                                                                         
    }
});