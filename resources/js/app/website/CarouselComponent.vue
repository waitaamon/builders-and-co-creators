<template>
    <carousel-3d :autoplay="true" :autoplay-timeout="5000" :controls-visible="true" :controls-prev-html="'&#10092;'" :controls-next-html="'&#10093;'"
                 :controls-width="30" :controls-height="60" :clickable="false" :width="450" :height="400">
        <slide v-for="(slide, i) in slides" :index="i" :key="i">
            <figure>
                <img src="https://placehold.it/450x400">
            </figure>
        </slide>
    </carousel-3d>
</template>

<script>
    import { Carousel3d, Slide } from 'vue-carousel-3d'
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