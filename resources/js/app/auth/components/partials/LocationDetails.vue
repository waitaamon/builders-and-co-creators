<template>
    <form @change="submit">
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label>Select country *</label>
                    <select class="form-control" v-model="country"">
                        <option value="" disabled>Select country</option>
                        <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                    </select>
                    <div class="invalid-feedback" v-if="errors.country">
                        {{ errors.country[0] }}
                    </div>
                </div>
                <span>Selected: {{ country }}</span>
            </div>
        </div>
        <div class="row mb-3" v-if="state_visibility">
            <div class="col-12">
                <div class="form-group">
                    <label>State *</label>
                    <input type="text" class="form-control" v-model="state" placeholder="Enter state">
                    <div class="invalid-feedback" v-if="errors.state">
                        {{ errors.state[0] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3" v-if="!state_visibility">
            <div class="col-6">
                <div class="form-group">
                    <label>Select county *</label>
                    <select class="form-control" v-model="county">
                        <option value="" disabled>Select county</option>
                        <option v-for="county in counties" :key="county.id" :value="county.id">{{ county.name }}</option>
                    </select>
                    <div class="invalid-feedback" v-if="errors.county">
                        {{ errors.county[0] }}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Select sub county / constituency *</label>
                    <select class="form-control" v-model="sub_county">
                        <option value="" disabled>Select sub county</option>
                        <option v-for="sub_county in sub_counties" :key="sub_county.id" :value="sub_county.id" @on>{{ sub_county.name }}</option>
                    </select>
                    <div class="invalid-feedback" v-if="errors.sub_county">
                        {{ errors.sub_county[0] }}
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import { mapGetters } from 'vuex'
    import VSelect from 'vue-select'
    export default {
        name: 'location-details',
        components: {
            VSelect
        },
        data () {
          return {
              country: '',
              county: '',
              sub_county: '',
              state: '',
              state_visibility: false,
              counties: [],
              sub_counties: []
          }
        },
        watch: {
            country: function (val) {
                if(this.country === 104) {
                    this.state_visibility = false
                    this.counties = this.countries[103].counties
                } else {
                    this.state_visibility = true
                }
            },
            county: function (val) {
                this.state_visibility = false
                this.sub_counties = this.countries[103].counties[val - 1].sub_counties
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                countries: 'getLocations'
            })
        },
        methods: {
            submit() {
                this.$emit('update', {
                    country: this.country,
                    county: this.county,
                    sub_county: this.sub_county,
                    state: this.state
                })
            }
        }
    }
</script>

<style scoped>
    .form-control {
        font-size: 1.3rem
    }
    select {
        margin-bottom: 1rem;
    }
    input {
        background: white;
        height: 0;
        padding-left: 10px;
        border: 1px solid #ced4da;
        margin-bottom: 0;
    }
</style>