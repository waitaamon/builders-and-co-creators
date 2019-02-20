<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="videoEditModal" tabindex="-1" role="dialog" aria-labelledby="videoEditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoEditModalLabel">Edit Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" @submit.prevent="submit">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title *</label>
                                <input type="text" id="title" class="form-control" :class="{ 'is-invalid': validation.title }"
                                       v-model="form.title" placeholder="Enter video title ...">
                                <div class="invalid-feedback" v-if="validation.title">
                                    {{ validation.title[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="iframe" class="form-control-label">Iframe *</label>
                                <input type="text" id="iframe" class="form-control" :class="{ 'is-invalid': validation.iframe }"
                                       v-model="form.iframe" placeholder="Enter video iframe text ...">
                                <div class="invalid-feedback" v-if="validation.iframe">
                                    {{ validation.iframe[0] }}
                                </div>
                            </div>
                            <label class="form-control-label">Select topics *</label>
                            <multi-select :options="allTopics"
                                          :selected-options="form.topics"
                                          placeholder="select topics"
                                          @select="onSelect">
                            </multi-select>
                            <div class="invalid-feedback" v-if="validation.topics">
                                {{ validation.topics[0] }}
                            </div>
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Update Video</button>
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
    import {MultiSelect} from 'vue-search-select'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'edit-video',
        components: {
            MultiSelect
        },
        data() {
            return {
                form: {
                    id: '',
                    title: '',
                    iframe: '',
                    topics: []
                },
                searchText: '',
                lastSelectItem: {},
            }
        },
        computed: {
            ...mapGetters({
                video: 'video/video',
                validation: 'getValidationErrors',
                allTopics: 'topic/topics'
            })
        },
        watch: {
            video: function(val){
                if(val !== null) {
                    this.form.id = this.video.id
                    this.form.title = this.video.title
                    this.form.iframe = this.video.url
                    this.form.topics = this.video.topics
                }
            }
        },
        methods: {
            ...mapActions({
                getTopics: 'topic/getTopics',
                updateVideo: 'video/updateVideo'
            }),
            onSelect(items, lastSelectItem) {
                this.form.topics = items
                this.lastSelectItem = lastSelectItem
            },
            submit() {
                this.updateVideo(this.form).then(() => {
                    this.$toast.success({
                        title:'Success',
                        message:'Video successfully updated'
                    })
                    $('#videoEditModal').modal('toggle')
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