<template>
        <div>
            {{infiniteData}}
        <div  v-for="(b,index) in berita.data" :key="index" class="ImageNews">
            <el-card shadow="never" :body-style="{ padding: '10px', height: '100px' }">
                <el-row :gutter="5">
                    <el-col :span="7">
                        <img :src="url.image+'/'+b.Folder+'/'+b.gambar" alt="Placeholder image" class='imgThumbnail'>
                    </el-col>
                    <el-col :span="17">
                        <div class="is-Subjudul" @click="Todetail(index)">{{b.judul_highlight}}</div>
                        <div class="judulBerita" @click="Todetail(index)">{{b.judul}}</div>
                        <div class="is-kategori" @click="Todetail(index)">{{b.getkategori.nama_kategori}} -  {{moment(b.tgl_publish).startOf('day').fromNow()}}</div>
                    </el-col>
                </el-row>
            </el-card>
            <div v-if="index == 3">
               <inilahChannel :detailShow="false"></inilahChannel>
            </div>
        </div>
        <div v-loading="isLoading" v-if="isLoading"><br/><br/></div>   
        </div>
</template>

<script>

import urlBase from '@/js/url';
import beritaketegori from '@/js/components/berita/kategori';
import inilahChannel from '@/js/components/videos/videos';
import moment from 'moment';

export default {
    data(){
        return{
            isLoading : false,
            berita:{
                data : [],
                skip : 0,
                take : 15,
                type : 'berita'
            },
            infiniteData :{
                scroll : 0,
                skip : this.take,
            },
            url : {
                api : urlBase.urlAxios,
                image : urlBase.urlWeb+'/storage/Artikel_Thumbnail/',
            },
            windowHeigh : 0,
            windowTop : 0
        }
    },
    created(){
        this.getBerita();
        this.windowHeigh = window.innerHeight
    },
    mounted(){
        window.addEventListener("scroll", this.scroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.scroll);
    },
    methods:{
         moment(arg) {
             moment.locale('id');
             return moment(arg);
        },
        getBerita(){
            axios.post(this.url.api+'/berita',{
                skip : this.skip,
                take : this.take,
                type : this.type
            })
                .then(r => {
                    console.log(r.data)
                    this.berita.data = r.data
                });
        },
        Todetail(i){
            // this.$router.push({ name: 'detail', params: { id: this.berita.data[i].id_berita, judul: this.berita.data[i].judul } });
            window.location.href = urlBase.urlWeb+'/berita/'+this.berita.data[i].id_berita+'/'+this.berita.data[i].judul
        },
        scroll (e) {
            window.onscroll = () => {
            let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

            if (bottomOfWindow) {
                alert();
            }
            };
    
        }
    },
    props:["skip","take","type","infinite"],
    components:{
        beritaketegori,
        inilahChannel
    }
}
</script>

<style scoped>
    .judulBerita{
        font-size: 13px;
        font-weight: bold;
        line-height: 16px;
    }
    .ImageNews img{
        background-color: black;
        width: 96px !important;
        height: 80px !important;
        object-fit: cover;
        border-radius: 10px;
    }
    .is-Subjudul{
        font-size: 9px !important;
        color: #1E5DA9 !important;
        font-weight: bolder;
    }
    .is-kategori{
        font-size: 9px !important;
        color: #798087;
    }

</style>