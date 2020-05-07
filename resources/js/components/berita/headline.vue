<template>
    <div>

    <el-carousel :interval="5000" arrow="always" height="650px">
        <el-carousel-item v-for="(b, i) in h.data" :key="i">
            <div class="site-blocks-cover" style="overflow: hidden;">
                <div class="container">
                    <div class="row align-items-center justify-content-center">

                    <div class="col-md-12" style="position: relative;">
                        
                        <img :src="url.images+'/'+b.Folder+'/'+b.gambar" alt="Image" class="img-fluid img-absolute">

                        <div class="row mb-4">
                        <div class="col-lg-6 mr-auto">
                            <h4 @click="Todetail(i)">{{b.judul}}</h4>
                            <p class="mb-5" v-html="b.description"></p>
                        </div>
                        
                        
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </el-carousel-item>
    </el-carousel>

    </div>
</template>


<script>
import moment from 'moment';
import urlBase from '@/js/url';

export default {
    data(){
        return{
            h:{
                data:[]
            },
            skip:0,
            take:10,
            type: "headline",
            headline:{
                progress: true,
                progressType: 'is-info',
                indicatorStyle: 'is-dot',
            },
            url : {
                api : urlBase.urlAxios,
                images : urlBase.urlGambar+'/resources/Artikel_Thumbnail/',
            },
        }
    },
    created(){
        this.getBerita();  
    },
    methods:{
        getBerita(){
            axios.post(this.url.api+'/berita',{
                skip : this.skip,
                take : this.take,
                type : this.type
            })
                .then(r => {
                    this.h.data = r.data
                    console.log(r.data)
                });
        },
        Todetail(i){
            // this.$router.push({ name: 'detail', params: { id: this.berita.data[i].id_berita, judul: this.berita.data[i].judul } });
            window.location.href = urlBase.urlWeb+'/berita/'+this.h.data[i].id_berita+'/'+this.h.data[i].judul
        },
         moment(arg) {
             moment.locale('id');
             return moment(arg);
         } 
    },
}
</script>