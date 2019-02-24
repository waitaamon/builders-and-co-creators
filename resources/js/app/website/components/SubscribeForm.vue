<template>
    <div class="subscribe-form">
        <form id="mc-form" class="group" @submit.prevent="submit">

            <input type="email" class="email" id="mc-email" placeholder="Email Address" required v-model="form.email">

            <input type="submit" value="Send">

            <label for="mc-email" class="subscribe-message" v-if="validation.email">{{ validation.email[0] }}</label>

        </form>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'subscribe-form',
        data() {
            return {
                form: {
                    email: ''
                }
            }
        },
        computed: {
            ...mapGetters({
                validation: 'getValidationErrors'
            })
        },
        methods: {
            ...mapActions({
                subscribe: 'web/subscribe'
            }),
            submit() {
                this.subscribe(this.form)
                    .then(() => {
                        this.form.email = ''
                        this.$toast.success({
                            title: 'Success',
                            message: 'Successfully subscribed to our newsletter.'
                        })
                    })
            }
        }
    }
</script>

<style scoped>
    .form-control {
        border-radius: 0;
    }
    .btn {
        border-radius: 0;
    }
</style>