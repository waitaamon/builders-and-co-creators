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
            <div class="form-group" :class="{ 'is-invalid': validation.description }">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" v-model="form.description" placeholder="Enter description..."></textarea>
                <div class="invalid-feedback" v-if="validation.description">
                    {{ validation.description[0] }}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-8">
                    <multi-select :options="bodies"
                                  :selected-options="form.bodies"
                                  placeholder="select professional bodies"
                                  @select="onSelect">
                    </multi-select>
                </div>
            </div>
        </form>
    </div>

</template>

<script>
    import { MultiSelect } from 'vue-search-select'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'new-membership',
        components: {
            MultiSelect,
        },
        data () {
            return {
               form: {
                   title: '',
                   description: '',
                   action: 'new',
                   bodies: []
               },
                searchText: '',
                lastSelectItem: {},
            }
        },
        computed:{
            ...mapGetters({
                validation: 'getValidationErrors',
                bodies: 'body/bodies',
            })
        },
        methods: {
            ...mapActions({
                createMembership: 'membership/createMembership',
                getBodies: 'body/getBodies'
            }),
            onSelect (items, lastSelectItem) {
                this.form.bodies = items
                this.lastSelectItem = lastSelectItem
            },
            submit() {
                this.createMembership(this.form)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'professional body successfully created'
                        })
                        setTimeout(() => {
                            window.location.href = '/admin/config/bodies'
                        },1000 )
                    })
            }
        },
        created () {
            this.getBodies()
        }
    }
</script>

<style scoped>

</style>