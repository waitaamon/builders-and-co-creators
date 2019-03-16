<template>
    <form @input="submit">
        <div class="row mb-3">
            <div class="col-4" v-for="profession in professions" :key="profession.id">
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck"> {{ profession.name }}</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: 'professional-details',
        data () {
          return {
              form: {
                  professions: [],
                  description: ''
              }
          }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                professions: 'getProfessions'
            })
        },
        methods: {
            submit() {
                this.$emit('update', this.form)
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