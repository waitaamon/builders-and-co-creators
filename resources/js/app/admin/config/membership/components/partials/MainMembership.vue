<template>
    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
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
                    <div class="col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import { MultiSelect } from 'vue-search-select'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'main-membership',
        props: ['membership_id'],
        components: {
            MultiSelect,
        },
        data () {
            return {
                form: {
                    id: '',
                    title: '',
                    description: '',
                    action: 'update',
                    bodies: []
                },
                searchText: '',
                lastSelectItem: {},
            }
        },
        computed:{
            ...mapGetters({
                validation: 'getValidationErrors',
                membership: 'membership/membership',
                bodies: 'body/bodies'
            })
        },
        watch: {
            membership: function (val) {
                if(val !== null) {
                    this.form.id = this.membership.id
                    this.form.title = this.membership.title
                    this.form.description = this.membership.description
                    this.form.bodies = this.membership.bodies
                }
            }
        },
        methods: {
            ...mapActions({
                updateMembership: 'membership/updateMembership',
                getMembership: 'membership/getMembership',
                getBodies: 'body/getBodies'
            }),
            onSelect (items, lastSelectItem) {
                this.form.bodies = items
                this.lastSelectItem = lastSelectItem
            },
            submit() {

                this.updateMembership(this.form)
                    .then(() => {
                        this.$toast.success({
                            title:'Success',
                            message:'Membership successfully updated'
                        })
                        setTimeout(() => {
                            window.location.href = '/admin/config/memberships'
                        },1000 )
                    })
            }
        },
        created () {
            this.getBodies()
            this.getMembership(this.membership_id)
        }
    }
</script>

<style scoped>

</style>