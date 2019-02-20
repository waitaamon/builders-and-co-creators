<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newSliderImageModal">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i> New Slider Image
        </button>

        <!-- Modal -->
        <div class="modal fade" id="newSliderImageModal" tabindex="-1" role="dialog" aria-labelledby="newSliderImageModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSliderImageModalLabel">New slider image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" @submit.prevent="submit">
                        <div class="modal-body">
                            <div class="form-group is-invalid" :class="{ 'is-invalid': validation.slider_image}">
                                <label class="form-control-label" for="image">Attach slider image</label>
                                <input type="file" class="form-control" ref="slider_image" id="image" placeholder="Attach image" required>
                                <div class="invalid-feedback" v-if="validation.slider_image">
                                    {{validation.slider_image[0]}}
                                </div>
                            </div>
                            {{ validation }}
                            <div class="form-group" :class="{ 'has-error': validation.order}">
                                <label class="form-control-label" for="image">Image order</label>
                                <select class="form-control" v-model="form.order" required :class="{ 'is-invalid': validation.order }">
                                    <option value="" disabled>Select order</option>
                                    <option v-for="order in orders" :value="order" disabled >{{ order }}</option>
                                </select>
                                <div class="invalid-feedback" v-if="validation.order">
                                    {{validation.order[0]}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn">Upload Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    order: ''
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

                this.createImage(formData)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Image successfully created'
                        })
                        this.reset()
                        $('#newSliderImageModal').modal('toggle')
                    })
            },
            reset () {
                this.form = { slider_image: '', order: ''}
            }
        }
    }
</script>

<style scoped>

</style>