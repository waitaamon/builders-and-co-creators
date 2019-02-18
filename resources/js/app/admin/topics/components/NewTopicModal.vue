<template>
    <div class="modal fade" id="newTopicModal" tabindex="-1" role="dialog" aria-labelledby="newTopicModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTopicModalLabel">Add New Topic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger mx-4 mt-2" v-if="validation.root">
                    {{ validation.root[0]}}
                </div>
                <form method="post" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="row mb-2" v-for="(topic, index) in topics" :key="index">
                            <div class="col-sm-10">
                                <input v-model="topic.title" class="form-control" placeholder="Enter topic ...">
                                <div class="invalid-feedback" >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn float-right" @click="removeTitle"><i class="fa fa-minus-circle"></i>
                                </button>
                            </div>
                        </div>

                        <button class="btn float-right" @click="addTitle"><i class="fa fa-plus-circle"></i></button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        name: 'new-topic-modal',
        props: ['showModal'],
        data() {
            return {
                topics: [{title: ''}]
            }
        },
        computed: {
            ...mapGetters({
                validation: 'getValidationErrors'
            })
        },
        methods: {
            ...mapActions({
                createTopics: 'topic/createTopics'
            }),
            addTitle() {
                this.topics.push({
                    title: ''
                })
            },
            removeTitle(index) {
                this.topics.splice(index, 1)
            },
            submit() {
                this.createTopics({topics: this.topics})
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Topics successfully created'
                        })
                        this.topics = [{title: ''}]
                        $('#newTopicModal').modal('toggle')
                    })
            }
        }
    }
</script>