<template>
    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <h5 class="h5 mb-0 text-gray-800">Membership types</h5>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> New membership type</a>
            </div>
            <div v-if="membershipTypes.length > 0">
                <div class="form-row" v-for=" membershipType in membershipTypes" :key="membershipType.id" :ref="'input-' + membershipType.id">
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control"  placeholder="Title" :value="membershipType.title">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="Description" :value="membershipType.description">
                    </div>
                    <div class="col-3">
                        <multi-select :options="bodies"
                                      :selected-options="form.bodies"
                                      placeholder="select professional bodies"
                                      @select="onSelect">
                        </multi-select>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-outline-primary btn-sm" @click="update(membershipType)"><i class="fa fa-arrow-circle-up"></i></button>
                        <button class="btn btn-outline-danger btn-sm" @click="remove(membershipType)"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div v-else>
                <p class="text-center">No membership types!</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import { MultiSelect } from 'vue-search-select'
    export default {
        name: 'membership-type',
        props: ['membership_id'],
        components: {
            MultiSelect,
        },
        data () {
            return {
                form: {
                   bodies: []
                },
                searchText: '',
                lastSelectItem: {},
            }
        },
        computed: {
            ...mapGetters({
                membershipTypes: 'membership/membershipTypes',
                bodies: 'body/bodies'
            })
        },
        methods: {
            ...mapActions({
                deleteMembershipType: 'membership/deleteMembershipType',
            }),
            onSelect (items, lastSelectItem) {
                this.form.bodies = items
                this.lastSelectItem = lastSelectItem
            },
            update(membershipType) {
                console.log(membershipType)
            },
            remove(membershipType) {
                this.deleteMembershipType(membershipType.id)
                    .then(() => {
                        this.$toast.success({
                            title: 'Success',
                            message:'Membership type successfully deleted'
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>