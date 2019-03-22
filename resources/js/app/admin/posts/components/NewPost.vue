<template>
    <div>
        <form method="post" @submit.prevent="submit" class="px-3">
            <div class="form-group" :class="{ 'is-invalid': validation.title }">
                <label for="title">Title <span class="required"> * </span></label>
                <input type="text" id="title" class="form-control" v-model="form.title" placeholder="Enter title...">
                <div class="invalid-feedback" v-if="validation.title">
                    {{ validation.title[0] }}
                </div>
            </div>
                <div class="form-group" :class="{ 'is-invalid': validation.featured_image }">
                    <label>Attach featured image</label>
                    <input type="file" class="form-control" ref="featured_image" @change="addFeaturedImage()" placeholder="Choose featured image...">
                    <div class="invalid-feedback" v-if="validation.featured_image">
                        {{ validation.featured_image[0] }}
                    </div>
                </div>
            <div class="row mb-4">
                <div class="col-sm-8">
                    <multi-select :options="allTopics"
                                  :selected-options="form.topics"
                                  placeholder="select topics"
                                  @select="onSelect">
                    </multi-select>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn float-right" data-toggle="modal" data-target="#newTopicModal">
                        Add new topic
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <tinymce id="editor" v-model="form.body"></tinymce>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="publish" v-model="form.publish">
                        <label class="custom-control-label" for="publish">Publish now?</label>
                    </div>
                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="feature" v-model="form.featured">
                        <label class="custom-control-label" for="feature">Mark as featured</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-primary btn-user btn-block" type="submit">Create Article</button>
                </div>
            </div>
        </form>
        <new-topic-modal></new-topic-modal>
    </div>

</template>

<script>
    import tinymce from 'vue-tinymce-editor'
    import NewTopicModal from '../../topics/components/NewTopicModal'
    import { MultiSelect } from 'vue-search-select'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'new-post',
        components: {
            tinymce,
            MultiSelect,
            NewTopicModal
        },
        data () {
            return {
               form: {
                   title: '',
                   body: '',
                   featured_image: '',
                   publish: false,
                   featured: false,
                   action: 'new',
                   topics: []
               },
                searchText: '',
                lastSelectItem: {},
                showModal: false,
            }
        },
        computed:{
            ...mapGetters({
                validation: 'getValidationErrors',
                allTopics: 'topic/topics',
            })
        },
        methods: {
            ...mapActions({
                createPost: 'post/createPost',
                getTopics: 'topic/getTopics'
            }),
            onSelect (items, lastSelectItem) {
                this.form.topics = items
                this.lastSelectItem = lastSelectItem
            },
            addFeaturedImage() {
                this.form.featured_image = this.$refs.featured_image.files[0];
            },
            submit() {

                let formData = new FormData();

                formData.append('title', this.form.title);
                formData.append('body', this.form.body);
                formData.append('publish', this.form.publish);
                formData.append('featured', this.form.featured);
                formData.append('action', this.form.action);
                formData.append('topics', JSON.stringify(this.form.topics));
                formData.append('featured_image', this.form.featured_image);

                this.createPost(formData)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Post successfully created'
                        })
                        setTimeout(() => {
                            window.location.href = '/posts'
                        },1000 )
                    })
            }
        },
        created () {
            this.getTopics()
        }
    }
</script>

<style scoped>

</style>