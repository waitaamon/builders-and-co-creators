<template>
    <div>
        <table class="table table-striped" v-if="memberships.length > 0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>bodies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="membership in memberships" :key="membership.id">
                    <td>{{ membership.title }}</td>
                    <td>{{ membership.description }}</td>
                    <td>
                        <span v-for="body in membership.bodies">
                            {{ body.title | substring(20) }} <br>
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" @click="updateMembership(membership)"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-outline-danger btn-sm" @click="removeMembership(membership)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-center" v-else>No memberships!!</p>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'all-memberships',
        computed: {
            ...mapGetters({
                memberships: 'membership/memberships'
            })
        },
        methods: {
            ...mapActions({
                getMemberships: 'membership/getMemberships',
                deleteMembership: 'membership/deleteMembership'
            }),
            updateMembership(membership) {
                window.location.href = '/admin/config/memberships/' + membership.id + '/edit'
            },
            removeMembership(membership) {
                this.deleteMembership(membership.id)
                    .then(() => {
                        this.$toast.success({
                            title: 'Success',
                            message:'Membership successfully deleted'
                        })
                    })
            }
        },
        created () {
            this.getMemberships()
        }
    }
</script>

<style scoped>
    .media img {
        width: 128px;
    }
</style>