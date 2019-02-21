<template>
    <carousel-3d
            :autoplay="true"
            :autoplay-timeout="5000"
            :autoplayPauseHover="true"
            :controls-visible="false"
            :clickable="false"
            :width="1000"
            :height="500"
    >
        <slide v-for="(image, i) in images" :index="i" :key="i">
            <figure>
                <img :src="image.image_url">
                <figcaption>
                    {{ image.sub_title}}
                </figcaption>
            </figure>
        </slide>
    </carousel-3d>
</template>

<script>
    import { Carousel3d, Slide } from 'vue-carousel-3d'
    import { mapGetters, mapActions } from 'vuex'
    export default  {
        name: 'carousel-component',
        components: {
            'carousel-3d': Carousel3d,
            'slide': Slide
        },
        data () {
            return {
                slides: 7
            }
        },
        computed: {
            ...mapGetters({
                images: 'slider/images'
            })
        },
        methods: {
            ...mapActions({
                getImages: 'slider/getImages'
            })
        },
        created () {
            this.getImages()
        }
    }
</script>

<style scoped>
    .carousel-3d-container figure {
        margin: 0;
        padding: 20px auto;
    }
    .carousel-3d-container {
        margin: 0
    }
    .carousel-3d-slide{
        border: none;
    }
    .carousel-3d-container figcaption {
        position: absolute;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        bottom: 0;
        position: absolute;
        bottom: 0;
        padding: 15px;
        font-size: 12px;
        min-width: 100%;
        box-sizing: border-box;
    }

</style>