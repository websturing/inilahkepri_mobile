<template>
    <div>

        <div v-for="(b,index) in berita.data" :key="index" class="ImageNews">
            <el-card shadow="never" :body-style="{ padding: '10px', height: '100px' }">
                <el-row :gutter="5">
                    <el-col :span="7">
                        <img :src="url.image+'/'+b.Folder+'/'+b.gambar" alt="Placeholder image" class='imgThumbnail imgData'>
                    </el-col>
                    <el-col :span="17">
                        <div class="is-Subjudul" @click="Todetail(index)">{{b.judul_highlight}}</div>
                        <div class="judulBerita" @click="Todetail(index)">{{b.judul}}</div>
                        <div v-if="b.getkategori == null">
                            <div class="is-kategori">{{moment(b.tgl_publish).startOf('day').fromNow()}}</div>
                        </div>
                        <div v-else>
                            <div class="is-kategori" @click="Todetail(index)">{{b.getkategori.nama_kategori}} - {{moment(b.tgl_publish).startOf('day').fromNow()}}</div>
                        </div>
                    </el-col>
                </el-row>
            </el-card>
            <div v-if="index == 3">
                <inilahChannel :detailShow="false"></inilahChannel>
                <img :src="url.iklan+'/bpbatam2.jpg'" class="img-responsive">
            </div>
        </div>
        <infinite-loading @infinite="infiniteHandler"></infinite-loading>
    </div>
</template>

<script>
    import urlBase from '@/js/url';
    import beritaketegori from '@/js/components/berita/kategori';
    import inilahChannel from '@/js/components/videos/videos';
    import moment from 'moment';
    const api = '//hn.algolia.com/api/v1/search_by_date?tags=story';
    export default {
        data() {
            return {
                page: 1,
                list: [],
                isLoading: false,
                berita: {
                    data: [],
                    skip: 0,
                    take: 15,
                    type: 'berita'
                },
                url: {
                    api: urlBase.urlAxios,
                    image: urlBase.urlGambar + '/resources/Artikel_Thumbnail/',
                    iklan: urlBase.iklan,
                },
            }
        },
        created() {
            // this.getBerita();
        },
        methods: {
            moment(arg) {
                moment.locale('id');
                return moment(arg);
            },
            infiniteHandler($state) {
                let skip = this.skip
                console.log("take =" + this.skip)
                axios.post(this.url.api + '/berita', {
                        skip: this.skip,
                        take: this.take,
                        type: this.type
                    })
                    .then(({
                        data
                    }) => {
                        if (data.length) {
                            if (this.berita.data.length == 60) {
                                $state.complete();
                            } else {

                                this.berita.data.push(...data)
                                $state.loaded()
                                skip += data.length
                            }

                        } else {
                            $state.complete();
                        }

                    });


            },
            getBerita() {
                axios.post(this.url.api + '/berita', {
                        skip: this.skip,
                        take: this.take,
                        type: this.type
                    })
                    .then(r => {
                        console.log(r.data)
                        this.berita.data = r.data
                    });
            },
            Todetail(i) {
                // this.$router.push({ name: 'detail', params: { id: this.berita.data[i].id_berita, judul: this.berita.data[i].judul } });
                window.location.href = urlBase.urlWeb + '/berita/' + this.berita.data[i].id_berita + '/' + this.berita.data[i].seo
            },
        },
        props: ["skip", "take", "type", "infinite"],
        components: {
            beritaketegori,
            inilahChannel
        }
    }

</script>

<style scoped>
    .judulBerita {
        font-size: 13px;
        font-weight: bold;
        line-height: 16px;
    }

    .ImageNews .imgData {
        background-color: yellow;
        width: 96px !important;
        height: 80px !important;
        object-fit: cover;
        border-radius: 10px;
    }

    .is-Subjudul {
        font-size: 9px !important;
        color: #1E5DA9 !important;
        font-weight: bolder;
    }

    .is-kategori {
        font-size: 9px !important;
        color: #798087;
    }

    .img-responsive {
        width: 100% !important;
        padding: 10px !important;
    }

</style>
