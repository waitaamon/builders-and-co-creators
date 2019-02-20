<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="sliderImageEditModal" tabindex="-1" role="dialog" aria-labelledby="sliderImageEditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sliderImageEditModalLabel">Edit slider image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-3">
                            <img :src="image ? image.image_url: ''" class="card-img-top" :alt="image ? image.title: ''">
                        </div>
                        <form method="post" @submit.prevent="submit">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title </label>
                                <input type="text" id="title" class="form-control" :class="{ 'is-invalid': validation.title }"
                                       v-model="form.title" placeholder="Enter video title ...">
                                <div class="invalid-feedback" v-if="validation.title">
                                    {{ validation.title[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sub_title" class="form-control-label">Sub title </label>
                                <input type="text" id="sub_title" class="form-control" :class="{ 'is-invalid': validation.sub_title }"
                                       v-model="form.sub_title" placeholder="Enter video sub title ...">
                                <div class="invalid-feedback" v-if="validation.sub_title">
                                    {{ validation.sub_title[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="form-control-label">Button url </label>
                                <input type="url" id="url" class="form-control" :class="{ 'is-invalid': validation.url }"
                                       v-model="form.url" placeholder="Enter video url ...">
                                <div class="invalid-feedback" v-if="validation.url">
                                    {{ validation.url[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Image order</label>
                                <select class="form-control" :class="{ 'is-invalid': validation.order}" v-model="form.order">
                                    <option value="" disabled>Select order</option>
                                    <option v-for="order in orders" :value="order" >{{ order }}</option>
                                </select>
                                <div class="invalid-feedback" v-if="validation.order">
                                    {{validation.order[0]}}
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Update Image</button>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'edit-slider-image',
        data() {
            return {
                orders: [1,2,3,4,5],
                form: {
                    id: '',
                    title: '',
                    sub_title: '',
                    url: '',
                    order: '',
                    action: 'update'
                }
            }
        },
        computed: {
            ...mapGetters({
                image: 'slider/image',
                validation: 'getValidationErrors'
            })
        },
        watch: {
            image: function(val){
                if(val !== null) {
                    this.form.id = this.image.id
                    this.form.title = this.image.title
                    this.form.sub_title = this.image.sub_title,
                    this.form.order = this.image.order,
                    this.form.url = this.image.url
                }
            }
        },
        methods: {
            ...mapActions({
                updateImage: 'slider/updateImage'
            }),
            submit() {
                this.updateImage(this.form).then(() => {
                    this.$toast.success({
                        title:'Success',
                        message:'Video successfully updated'
                    })
                    $('#sliderImageEditModal').modal('toggle')
                })
            }
        }
    }
</script>

<style scoped>

</style>