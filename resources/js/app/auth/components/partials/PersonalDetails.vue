<template>
    <form @input="submit">
        <div class="row mb-3">
            <div class="col-6">
                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': errors.first_name }" v-model="form.first_name" placeholder="Enter first name">
                    <div class="invalid-feedback" v-if="errors.first_name">
                        {{ errors.first_name[0] }}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': errors.last_name }" v-model="form.last_name" placeholder="Enter last name">
                    <div class="invalid-feedback" v-if="errors.last_name">
                        {{ errors.last_name[0] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <div class="form-group">
                    <label>Email address *</label>
                    <input type="email" class="form-control" :class="{ 'is-invalid': errors.email }" v-model="form.email" placeholder="Enter email address">
                    <div class="invalid-feedback" v-if="errors.email">
                        {{ errors.email[0] }}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Phone number *</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': errors.phone }" v-model="form.phone" placeholder="Enter phone number">
                    <div class="invalid-feedback" v-if="errors.phone">
                        {{ errors.phone[0] }}
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: 'personal-details',
        data () {
          return {
              form: {
                  first_name: '',
                  last_name: '',
                  email: '',
                  phone: ''
              }
          }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors'
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