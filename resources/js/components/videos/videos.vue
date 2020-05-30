<template>
    <div>
        <el-divider content-position="right"><span class="tittleDev">INILAH CHANNEL</span></el-divider>
        <div v-loading="isLoading"></div>
        <carousel :perPage="3" :paginationEnabled="false">
            <slide v-for="(v,index) in videosData" :key="index">
                <div class="wrapvideo">
                    <img :src="v.thumbnails" alt="Placeholder image" class="img-fluid" @click="showModal(index)">
                    <div class="judulVideo" @click="showModal(index)">{{v.title}}</div>
                    <div class="is-kategori">{{moment(v.publishedAt).startOf('day').fromNow()}}</div>
                </div>
            </slide>
        </carousel>

        <div v-for="(v,index) in videosData" :key="index" class="ImageNews" v-if="detailShow">
            <el-card shadow="never" :body-style="{ padding: '10px', height: '100px' }">
                <el-row :gutter="5">
                    <el-col :span="7">
                        <img :src="v.thumbnails" alt="Placeholder image" class='imgThumbnail'>
                    </el-col>
                    <el-col :span="16">
                        <div class="judulBerita" @click="showModal(index)">{{v.title}}</div>
                        <div class="is-kategori">{{moment(v.publishedAt).startOf('day').fromNow()}}</div>
                    </el-col>
                </el-row>
            </el-card>
        </div>
        <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog slideInUp animated faster" role="document">
                <div class="modal-content" style="width:100%; padding:0px; margin:0px">
                    <div class="modal-body">
                        <video-embed :params="{autoplay: 1}" :src="playing.url" allow="autoplay"></video-embed>
                        <p class="judulBerita">{{playing.title}}</p>
                        <div class="is-kategori">{{moment(playing.publishedAt).startOf('day').fromNow()}}</div>
                        <p>{{playing.description}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="tutupmodal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {
        Carousel,
        Slide
    } from 'vue-carousel';
    import urlBase from '@/js/url';
    import moment from 'moment';

    export default {
        data() {
            return {
                isLoading: true,
                videosData: [],
                playing: {
                    url: null,
                    title: null,
                    publishedAt: null,
                    description: null,
                },
                url: {
                    images: urlBase.urlWeb + '/public/imagine/images',
                    iklan: urlBase.iklan
                },

            }
        },
        created() {
            this.getVideos()
        },
        props: ['detailShow'],
        components: {
            'courselContainer': Carousel,
            'SliderCoursel': Slide,
        },
        methods: {
            moment(arg) {
                moment.locale('id');
                return moment(arg);
            },
            getVideos() {
                axios.post(urlBase.urlAxios + '/videos', {
                        type: "videos",
                    })
                    .then(r => {
                        this.videosData = r.data,
                            this.isLoading = false

                    });
            },
            showModal(i) {
                $("#exampleModal").modal("show");
                this.playing = this.videosData[i]
            },
            tutupmodal() {
                $("#exampleModal").modal("hide")
                this.playing.url = null
            }

        },
    }

</script>

<style scoped>
    .overflow {
        width: 100%;
        height: 30px;
        padding: 5px;
        line-height: 12px;
        font-size: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        text-transform: lowercase;
    }

    .big-box h2 {
        text-align: center;
        width: 100%;
        font-size: 1.8em;
        letter-spacing: 2px;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
    }

    .modal-dialog {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
    }

    .modal-content {
        height: 100%;
        border-radius: 0;
        color: #333;
        overflow: auto;
    }

    .modal-title {
        font-size: 3em;
        font-weight: 300;
        margin: 0 0 10px 0;
    }

    .close {
        color: black ! important;
        opacity: 1.0;
    }

    .judulBerita {
        font-size: 12px;
        font-weight: bold;
        line-height: 16px;
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

    .wrapvideo {
        width: 200px;
        height: 230px;
        padding: 5px;
        margin: 0px 3px 0px 0px;
    }

    .judulVideo {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        text-transform: lowercase;
        height: 30px;
        font-size: 12px;
        font-weight: bold;
        line-height: 16px;
    }

    .wrapvideo img {
        object-fit: cover;
        height: 130px !important;
        width: 100% !important;
        border-radius: 0px !important;
    }

    .tittleDev {
        font-size: 14px;
        font-weight: bold;
    }

</style>


<style>
    .img-responsive {
        width: 100% !important;
        padding: 10px !important;
    }

</style>
