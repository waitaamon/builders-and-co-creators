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
            <div class="custom-file my-3">
                <div class="form-group" :class="{ 'is-invalid': validation.featured_image }">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose featured image...</label>
                    <div class="invalid-feedback" v-if="validation.featured_image">
                        {{ validation.featured_image[0] }}
                    </div>
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
                   image: '',
                   publish: true,
                   featured: false,
                   topics: []
               },
                searchText: '',
                lastSelectItem: {},
                showModal: false
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
            submit() {
                this.createPost(this.form)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Post successfully created'
                        })
                        window.location.href = "/posts";
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