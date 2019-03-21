<template>
    <div>

    </div>
</template>

<script>
    import { MultiSelect } from 'vue-search-select'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'edit-membership-modal',
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
                getBodies: 'body/getBodies'
            }),
            onSelect (items, lastSelectItem) {
                this.form.bodies = items
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
            this.getBodies()
        }
    }
</script>

<style scoped>

</style>