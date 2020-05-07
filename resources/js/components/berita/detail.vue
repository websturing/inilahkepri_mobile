<template>
<div class="site-section" style="overflow: hidden;">
    <div class="container detailImage">
     <br/><br/><br/>
            <h5>{{detail.judul}}</h5>

            <div class="share-sosial">
              <el-row :gutter="5">
                    <el-col :span="18">
                        <div class="is-kategori">{{moment(tglPublish).format('LLLL')}}</div>
                    </el-col>
                    <el-col :span="8">
                        <div class="addthis_inline_share_toolbox"></div>
                    </el-col>
              </el-row>
            </div>

            <img :src="url.image+'/'+detail.Folder+'/'+detail.gambar" alt="Placeholder image" class="img-fluid">
            <p class="ketGambar">{{detail.ket_gambar}}</p>
            <el-divider></el-divider>
            <p v-html="detail.isi_berita"></p>
          
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
            detail :{},
            url : {
                api : urlBase.urlAxios,
                image : urlBase.urlGambar+'/resources/Artikel_Thumbnail/',
            },
        }
    },
    props:['id'],
    computed:{
        tglPublish: function () {
            return this.detail.tgl_publish+" "+this.detail.jam
        }
    },
    created(){
        this.getBerita();       
    },
    mounted(){
        this.getBerita();
    },
    methods:{
        moment(arg) {
             moment.locale('id');
             return moment(arg);
        },
        getBerita(){
            axios.post(this.url.api+'/berita',{
                type : "id",
                id : this.id
            })
                .then(r => {
                    this.detail = r.data[0]
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

.is-kategori{
    font-size: 12px !important;
}

.detailImage img{
    border-radius: 5px;
}
.share-sosial{
    margin: 10px 0px 15px 0px;
}
</style>