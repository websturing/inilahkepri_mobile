<template>
<div class="site-section" style="overflow: hidden;">
    <div class="container detailImage">
     <br/><br/><br/>
        <div v-for="(b, index) in detail" :key="b.id_berita">
            <h5>{{b.judul}}</h5>
            <img :src="url.image+'/'+b.Folder+'/'+b.gambar" alt="Placeholder image" class="img-fluid">
            <p class="ketGambar">{{b.ket_gambar}}</p>
            <el-divider></el-divider>
            <p v-html="b.isi_berita"></p>
          
        </div>
    </div>
      <berita :take="5" :skip="0" :type="'berita'" :infinite="true"/>
</div>
</template>


<script>
import berita from '@/js/components/berita/berita';
import urlBase from '@/js/url';
import moment from 'moment';
import Parallax from 'vue-parallaxy'

export default {
    data(){
        return{
            idNew : 0,
            // id : 4202,
            berita:{
                data:[]
            },
            detail :[],
            url : {
                api : urlBase.urlAxios,
                image : urlBase.urlGambar+'/resources/Artikel_Thumbnail/',
            },
        }
    },
    props:['id'],
    created(){
        this.getBerita();       
    },
    mounted(){
        this.getBerita();
    },
    methods:{
        getBerita(){
            axios.post(this.url.api+'/berita',{
                type : "id",
                id : this.id
            })
                .then(r => {
                    this.detail = r.data
                });
        },
    },
    components:{
        berita,
        Parallax
    }
}
</script>
<style scoped>
h5{
    font-weight: 900;
    color: #333;
}
p{
    color: #333;
}
.ketGambar{
    font-size: 11px !important;
    font-style: italic;
    
}
.detailImage img{
    border-radius: 5px;
}

</style>