import './bootstrap';
import Vue from 'vue';
import Routes from '@/js/routes.js';

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueCarousel from 'vue-carousel';
import VModal from 'vue-js-modal'
 
import beritaDetail from '@/js/components/berita/detail';
import Embed from 'v-video-embed'
import Vue2TouchEvents from 'vue2-touch-events'
import InfiniteLoading from 'vue-infinite-loading';

Vue.use(InfiniteLoading);
Vue.use(Vue2TouchEvents,{
    tapTolerance: 40,
})

// global register
Vue.use(Embed);
Vue.use(ElementUI);
Vue.use(VueCarousel);
Vue.use(VModal)
const app = new Vue({
    el: '#app',
    router: Routes,
    data: {
        activeLoader: true,
    },
    components:{
        beritaDetail                                                                                                                                                                                                         
    }
});