<template>
    <div>
        <ul class="list-unstyled" v-if="posts.length > 0">
            <li class="media mb-3" v-for="post in posts" :key="post.id">
                <img :src="post.featured_image_url" class="mr-3" alt="">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ post.title }}</h5>
                    <div class="row">
                        <div class="col-sm-8">
                            <p v-html="post.body.substring(0, 200)"></p>
                        </div>
                        <div class="col-sm-4">
                            <div class="float-right">
                                <button class="btn btn-primary btn-sm" @click="editPost(post)">Edit</button>
                                <button class="btn btn-danger btn-sm" @click="removePost(post)">Delete</button>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
        </ul>
        <p class="text-center" v-else>No posts!!</p>
    </div>

</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'all-posts',
        computed: {
            ...mapGetters({
                posts: 'post/posts'
            })
        },
        methods: {
            ...mapActions({
                getPosts: 'post/getPosts',
                deletePost: 'post/deletePost'
            }),
            editPost(post) {
                window.location.href = '/posts/' + post.id + '/edit'
            },
            removePost(post) {
                this.deletePost(post.id)
                    .then(() => {
                        this.$toast.success({
                            title: 'Success',
                            message:'Post successfully deleted'
                        })
                    })
            }
        },
        created () {
            this.getPosts()
        }
    }
</script>

<style scoped>
    .media img {
        width: 128px;
    }
</style>