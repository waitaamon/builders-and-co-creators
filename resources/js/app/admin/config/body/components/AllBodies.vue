<template>
    <div>
        <table class="table table-striped" v-if="bodies.length > 0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Memberships</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="body in bodies" :key="body.id">
                    <td>{{ body.title }}</td>
                    <td>{{ body.description }}</td>
                    <td>
                        <span v-for="membership in body.memberships">
                            {{ membership.title }} |
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" @click="updateBody(body)"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-outline-danger btn-sm" @click="removeBody(body)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-center" v-else>No bodies!!</p>
        <edit-body-modal></edit-body-modal>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import EditBodyModal from './EditBodyModal'
    export default {
        name: 'all-bodies',
        components: {EditBodyModal},
        data () {
          return {
              showModal: false,
          }
        },
        computed: {
            ...mapGetters({
                bodies: 'body/bodies'
            })
        },
        methods: {
            ...mapActions({
                getBodies: 'body/getBodies',
                deleteBody: 'membership/deleteBody'
            }),
            updateBody(body) {

            },
            removeBody(body) {
                this.deleteBody(body.id)
                    .then(() => {
                        this.$toast.success({
                            title: 'Success',
                            message:'Body successfully deleted'
                        })
                    })
            }
        },
        created () {
            this.getBodies()
        }
    }
</script>

<style scoped>
    .media img {
        width: 128px;
    }
</style>