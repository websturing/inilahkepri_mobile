<template>
    <div>
         <div class="" v-for="(b,index) in berita.data">
            <div class="card-berita">
                <div v-if="index == 0">
                    <div class="kategoriNews">
                        <img :src="url.image+'/'+b.Folder+'/'+b.gambar" alt="Placeholder image">
                    </div>
                    <p class="is-Subjudul">{{b.judul_highlight}}</p>
                    <p class="title is-6">{{b.judul}}</p>
                    <p class="is-kategori">{{b.getkategori.nama_kategori}}</p>
                </div>
                <div v-else>
                    <div class="media">
                        <div class="media-content">
                            <p class="is-Subjudul">{{b.judul_highlight}}</p>
                            <p class="is-judul">{{b.judul}}</p>
                            <p class="is-kategori">{{b.getkategori.nama_kategori}}</p>
                        </div>
                        <div class="media-right ImageNews">
                            <figure class="image is-5x12">
                            <img :src="url.image+'/'+b.Folder+'/'+b.gambar" alt="Placeholder image">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</template>

<script>

import urlBase from '@/js/url';

export default {
    data(){
        return{
            berita:{
                data : [],
                skip : 0,
                take : 5,
                kategori : 15,
                type: "kategori"
            },
            url : {
                api : urlBase.urlAxios,
                image : urlBase.urlWeb+'/storage/Artikel_Thumbnail/',
            }
        }
    },
    created(){
        this.getBerita();
    },
    methods:{
        getBerita(){
            axios.post(this.url.api+'/berita',{
                skip : this.berita.skip,
                take : this.berita.take,
                type : this.berita.type,
                kategori : this.berita.kategori
            })
                .then(r => {
                    this.berita.data = r.data
                });
        }
    }
}
</script>