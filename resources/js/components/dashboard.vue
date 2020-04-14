<template>
    <div>

        <headline></headline>
        <berita :skip='0' :type="'berita'" :take="15" :infinite="true"/>
    </div>
</template>

<script>
import urlBase from '@/js/url'
import beritaketegori from '@/js/components/berita/kategori';
import headline from '@/js/components/berita/headline';
import berita from '@/js/components/berita/berita';
import moment from 'moment';

export default {
    data(){
        return{
            url : {
                images : urlBase.urlWeb+'/public/imagine/images'
            },
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
    },
    components:{
        'berita' : berita,
        'berita2' : berita,
        beritaketegori,
        headline

    }
}
</script>
