<template>
    <form method="post" @submit.prevent="submit">
           <div class="form-group is-invalid" >
                <label class="form-control-label" for="image">Attach slider image</label>
                <input type="file" class="form-control" :class="{ 'is-invalid': validation.slider_image}" ref="slider_image" @change="addSliderImage" id="image" placeholder="Attach image">
                <div class="invalid-feedback" v-if="validation.slider_image">
                    {{validation.slider_image[0]}}
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="image">Image title</label>
                <input type="text" class="form-control" :class="{ 'is-invalid': validation.title}" v-model="form.title" placeholder="Enter title ...">
                <div class="invalid-feedback" v-if="validation.title">
                    {{validation.title[0]}}
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="image">Image sub title</label>
                <input type="text" class="form-control" :class="{ 'is-invalid': validation.sub_title}" v-model="form.sub_title" placeholder="Enter sub title ...">
                <div class="invalid-feedback" v-if="validation.sub_title">
                    {{validation.sub_title[0]}}
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="image">Image url</label>
                <input type="url" class="form-control" :class="{ 'is-invalid': validation.url}" v-model="form.url" placeholder="Enter url ...">
                <div class="invalid-feedback" v-if="validation.url">
                    {{validation.url[0]}}
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="image">Image order</label>
                <select class="form-control" :class="{ 'is-invalid': validation.order}" v-model="form.order">
                    <option value="" disabled>Select order</option>
                    <option v-for="order in orders" :value="order" >{{ order }}</option>
                </select>
                <div class="invalid-feedback" v-if="validation.order">
                    {{validation.order[0]}}
                </div>
            </div>
        <button type="submit" class="btn btn-primary btn-user">Upload Image</button>
    </form>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    export default {
        name: "new-slider-image",
        data () {
            return {
                orders: [1,2,3,4,5],
                form: {
                    slider_image: '',
                    order: '',
                    title: '',
                    sub_title: '',
                    url: ''
                }
            }
        },
        computed: {
            ...mapGetters({
                validation: 'getValidationErrors'
            })
        },
        methods: {
            ...mapActions({
                createImage: 'slider/createImage'
            }),
            addSliderImage() {
              this.form.slider_image = this.$refs.slider_image.files[0]
            },
            submit () {
                let formData = new FormData()

                formData.append('slider_image', this.form.slider_image)
                formData.append('order', this.form.order)
                formData.append('title', this.form.title)
                formData.append('sub_title', this.form.sub_title)
                formData.append('url', this.form.url)

                this.createImage(formData)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Image successfully created'
                        })
                        this.reset()
                        window.location.href = '/sliders'
                    })
            },
            reset () {
                this.form = { slider_image: '', order: '', title: '', sub_title: '', url: ''}
            }
        }
    }
</script>

<style scoped>

</style>