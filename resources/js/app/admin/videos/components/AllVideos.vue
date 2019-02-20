<template>
    <div class="row">
            <div class="col-sm-6" v-for="video in videos" :key="video.id">
                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ video.title }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Video actions</div>
                                <a class="dropdown-item" @click.prevent="editVideo(video)">Edit video</a>
                                <a class="dropdown-item" @click.prevent="removeVideo(video)"><span class="text-danger">Delete video</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <span v-html="video.url"></span>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-outline-secondary btn-sm mr-1" v-for="topic in video.topics"> {{ topic.text }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <edit-video></edit-video>
            </div>
        </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import EditVideo from "./EditVideo";
    export default {
        name: 'all-videos',
        components: {EditVideo},
        computed: {
            EditVideo
        },
        computed: {
            ...mapGetters({
                videos: 'video/videos'
            })
        },
        methods: {
            ...mapActions({
                getVideos: 'video/allVideos',
                setVideo: 'video/setVideo',
                deleteVideo: 'video/deleteVideo'
            }),
            editVideo(video) {
                this.setVideo(video).then(() => {
                    $('#videoEditModal').modal('toggle')
                })

            },
            removeVideo(video) {
                this.deleteVideo(video.id)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Video successfully deleted'
                        })
                    })
            }
        },
        created () {
            this.getVideos()
        }
    }
</script>