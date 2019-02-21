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
                    <button class="btn btn-primary btn-user btn-block" type="submit">Update Article</button>
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
        name: 'edit-post',
        props: ['post_id'],
        components: {
            tinymce,
            MultiSelect,
            NewTopicModal
        },
        data () {
            return {
                form: {
                    id: '',
                    title: '',
                    body: '',
                    publish: true,
                    featured: false,
                    action: 'update',
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
                post: 'post/post',
                allTopics: 'topic/topics'
            })
        },
        watch: {
            post: function (val) {
                if(val !== null) {
                    this.form.id = this.post.id
                    this.form.title = this.post.title
                    this.form.topics = this.post.topics

                    setTimeout(() => {
                        this.form.body = this.post.body
                    }, 1000)
                }
            }
        },
        methods: {
            ...mapActions({
                updatePost: 'post/updatePost',
                getPost: 'post/getPost',
                getTopics: 'topic/getTopics'
            }),
            getSelectedPost(id) {
              this.getPost(id)
            },
            onSelect (items, lastSelectItem) {
                this.form.topics = items
                this.lastSelectItem = lastSelectItem
            },
            submit() {
                this.updatePost(this.form)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Post successfully updated'
                        })
                        setTimeout(() => {
                            window.location.href = '/posts'
                        },1000 )
                    })
            }
        },
        created () {
            this.getTopics()
            this.getSelectedPost(this.post_id)
        }
    }
</script>

<style scoped>

</style>