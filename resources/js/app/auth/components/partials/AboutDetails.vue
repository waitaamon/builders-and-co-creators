<template>
    <form @change="submit">
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label>What do you do ?</label>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: 'about-details',
        data () {
          return {

          }
        },
        watch: {

        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                professions: 'getProfessions'
            })
        },
        methods: {
            submit() {
                this.$emit('update', {})
            }
        }
    }
</script>

<style scoped>

    input {
        background: white;
        height: 0;
        padding-left: 10px;
        border: 1px solid #ced4da;
        margin-bottom: 0;
    }
</style>