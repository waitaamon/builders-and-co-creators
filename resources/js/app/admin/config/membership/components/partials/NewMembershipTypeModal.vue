<template>
    <div class="modal fade" id="newMembershipTypeModal" tabindex="-1" role="dialog" aria-labelledby="newMembershipTypeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMembershipTypeModalLabel">Add new membership type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger mx-4 mt-2" v-if="errors.root">
                    {{ errors.root[0] }}
                </div>
                <form method="post" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group" :class="{ 'is-invalid': errors.title }">
                            <label for="title">Title *</label>
                            <input id="title" class="form-control" v-model="form.title" placeholder="Enter title...">
                            <div class="invalid-feedback" v-if="errors.title">
                                {{ errors.title[0] }}
                            </div>
                        </div>
                        <div class="form-group" :class="{ 'is-invalid': errors.description }">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" v-model="form.description" placeholder="Enter description..."></textarea>
                            <div class="invalid-feedback" v-if="errors.description">
                                {{ errors.description[0] }}
                            </div>
                        </div>
                        <div class="form-group" :class="{ 'is-invalid': errors.bodies }">
                            <label for="description">Professional bodies</label>
                            <multi-select :options="bodies"
                                          :selected-options="form.bodies"
                                          placeholder="select professional bodies"
                                          @select="onSelect">
                            </multi-select>
                            <div class="invalid-feedback" v-if="errors.bodies">
                                {{ errors.bodies[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import { MultiSelect } from 'vue-search-select'
    export default {
        name: 'new-membership-type-modal',
        props: ['membership'],
        components: {
            MultiSelect,
        },
        data () {
            return {
                form: {
                    title: '',
                    description: '',
                    bodies: [],
                    is_specialized: false,
                    is_engineer: false
                },
                searchText: '',
                lastSelectItem: {},
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                bodies: 'body/bodies'
            })
        },
        methods: {
            ...mapActions({
                createMembershipType: 'membership/createMembershipType'
            }),
            onSelect (items, lastSelectItem) {
                this.form.bodies = items
                this.lastSelectItem = lastSelectItem
            },
            submit() {
                this.createMembershipType({
                    action: 'create',
                    membership: this.membership,
                    title: this.form.title,
                    description: this.form.description,
                    bodies: this.form.bodies,
                    is_specialized: this.form.is_specialized,
                    is_engineer: this.form.is_engineer
                })
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Membership type successfully created'
                        })

                        $('#newMembershipTypeModal').modal('toggle')
                    })
            }
        }
    }
</script>

<style scoped>

</style>