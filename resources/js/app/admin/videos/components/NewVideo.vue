<template>
    <div>
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
                    <button class="btn btn-primary btn-user btn-block" type="submit">Create Video</button>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </form>
    </div>
</template>

<script>
    import {MultiSelect} from 'vue-search-select'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        name: 'new-video',
        components: {
            MultiSelect,
        },
        data() {
            return {
                form: {
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
                allTopics: 'topic/topics',
                validation: 'getValidationErrors',
            })
        },
        methods: {
            ...mapActions({
                createVideo: 'video/createVideo',
                getTopics: 'topic/getTopics'
            }),
            onSelect(items, lastSelectItem) {
                this.form.topics = items
                this.lastSelectItem = lastSelectItem
            },
            submit() {
                this.createVideo(this.form)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Video successfully created'
                        })
                        window.location.href = "/videos";
                    })
            }
        },
        created() {
            this.getTopics()
        }
    }
</script>

<style scoped>

</style>