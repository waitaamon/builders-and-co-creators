<template>
    <div class="row">
        <div class="col-sm-4" v-for="image in images" :key="image.id">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ image.title }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Image actions</div>
                            <a class="dropdown-item" @click.prevent="editImage(image)">Edit image</a>
                            <a class="dropdown-item" @click.prevent="removeImage(image)"><span class="text-danger">Delete image</span></a>
                        </div>
                    </div>
                </div>
                <img :src="image.image_url" class="card-img-top" :alt="image.title">
                <!-- Card Body -->
                <div class="card-body">

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <p>{{ image.sub_title }}</p>
                            <a href="">Go to link →</a>
                        </div>
                    </div>
                </div>
            </div>
            <edit-image></edit-image>
        </div>
    </div>
</template>

<script>
    import EditImage from './EditImage'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'all-slider-images',
        components: {
            EditImage
        },
        computed: {
            ...mapGetters({
                images: 'slider/images'
            })
        },
        methods: {
            ...mapActions({
                getImages: 'slider/getImages',
                setImage: 'slider/setImage',
                deleteImage: 'slider/deleteImage'
            }),
            removeImage(image) {
                this.deleteImage(image.id)
            },
            editImage(image) {
                this.setImage(image).then(() => {
                    $('#sliderImageEditModal').modal('toggle')
                })
            }
        },
        created() {
            this.getImages()
        }
    }
</script>

<style scoped>

</style>