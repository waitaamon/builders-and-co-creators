<template>
    <div>
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-5">
                    <h5 class="h5 mb-0 text-gray-800">Membership types</h5>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newMembershipTypeModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> New membership type</button>
                </div>
                <table class="table table-striped" v-if="membershipTypes.length > 0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>bodies</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="membershipType in membershipTypes" :key="membershipType.id">
                        <td>{{ membershipType.title }}</td>
                        <td>{{ membershipType.description }}</td>
                        <td>
                    <span v-for="body in membershipType.bodies">
                        {{ body.title | substring(20) }} <br>
                    </span>
                        </td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm" @click="updateMembership(membershipType)"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-outline-danger btn-sm" @click="removeMembership(membershipType)"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div v-else>
                    <p class="text-center">No membership types!</p>
                </div>
            </div>
        </div>
        <new-membership-type-modal :membership="membership_id"></new-membership-type-modal>
        <edit-membership-type-modal :membership="membership_id"></edit-membership-type-modal>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import { MultiSelect } from 'vue-search-select'
    import NewMembershipTypeModal from "./NewMembershipTypeModal";
    import EditMembershipTypeModal from './EditMembershipTypeModal';
    export default {
        name: 'membership-type',
        props: ['membership_id'],
        components: {
            EditMembershipTypeModal,
            NewMembershipTypeModal,
            MultiSelect,
        },
        data () {
            return {
                form: {
                   bodies: []
                },
                searchText: '',
                lastSelectItem: {},
                showModal: false
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
                setMembershipType: 'membership/setMembershipType',
                deleteMembershipType: 'membership/deleteMembershipType',
            }),
            onSelect (items, lastSelectItem) {
                this.form.bodies = items
                this.lastSelectItem = lastSelectItem
            },
            update(membershipType) {
                this.setMembershipType(membershipType)
                    .then(() => {
                        $('#editMembershipTypeModal').modal('show')
                    })

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