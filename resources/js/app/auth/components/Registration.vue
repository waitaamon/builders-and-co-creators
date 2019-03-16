<template>
    <div>
        <form-wizard @on-complete="onComplete"
                     shape="circle"
                     color="#111860"
                     title="Builders & Co-Creators"
                     subtitle="Welcome to Builders & Co-Creators Directory"
                     @on-change="handleTabChanged"
        >
            <tab-content title="Personal details" :before-change="validateAsync" icon="far fa-user">
                <personal-details @update="processStep" ></personal-details>
            </tab-content>
            <tab-content title="Location Info" icon="fa fa-map-marker-alt" :before-change="validateAsync">
                <location-details @update="processStep"></location-details>
            </tab-content>
            <tab-content title="Professional Info" icon="fa fa-map-marker-alt" :before-change="validateAsync">
                <professional-details @update="processStep"></professional-details>
            </tab-content>
            <tab-content title="Last step"
                         icon="ti-check">
                Third tab
            </tab-content>
        </form-wizard>
        {{ form }}
    </div>
</template>

<script>
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import { mapActions } from 'vuex'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    import PersonalDetails from "./partials/PersonalDetails";
    import LocationDetails from "./partials/LocationDetails";
    import ProfessionalDetails from "./partials/ProfessionalDetails";
    export default {
        name: 'user-registration',
        components: {
            ProfessionalDetails,
            LocationDetails,
            PersonalDetails,
            FormWizard,
            TabContent
        },
        data(){
            return {
                step: 0,
                form: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    country: '',
                    county: '',
                    sub_county: '',
                    state: ''
                }
            }
        },
        methods: {
            ...mapActions({
                validate: 'auth/validate',
                getRegistrationDetails: 'getRegistrationDetails'
            }),
            processStep (data) {
                Object.assign(this.form, data)
            },
            onComplete() {
                alert('Yay. Done!');
            },
            handleTabChanged(prevIndex, nextIndex){
                this.step = nextIndex
            },
            validateAsync:function() {
                let formData = {}

                switch (this.step) {
                    case 0:
                        formData = {
                            url: '/personal-details',
                            first_name: this.form.first_name,
                            last_name: this.form.last_name,
                            email: this.form.email,
                            facebook_name: this.form.facebook_name,
                            phone: this.form.phone
                        }
                        break
                    case 1:
                        formData = {
                            url: '/location-details',
                            country: this.form.country,
                            county: this.form.county,
                            sub_county: this.form.sub_county,
                            state: this.form.state
                        }
                        break
                }
                return new Promise((resolve, reject) => {
                    console.log(formData)
                    this.validate(formData)
                        .then(() => {
                            resolve(true)
                        })
                        .catch(e => {
                            reject(false)
                        })
                })
            },
        },
        created() {
            this.getRegistrationDetails()
        }
    }
</script>

<style>
    span.error{
        color:#e74c3c;
        font-size:20px;
        display:flex;
        justify-content:center;
    }
</style>