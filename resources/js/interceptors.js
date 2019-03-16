import axios from 'axios'
import store from './store'

axios.interceptors.response.use((response) => {
    store.dispatch('clearValidationErrors')
  return Promise.resolve(response)

}, (error) => {

  if(error.response.status === 422) {

    store.dispatch('setValidationErrors', error.response.data.errors)
  }
  
  return Promise.reject(error)
})