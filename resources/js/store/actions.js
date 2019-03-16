export const setValidationErrors = ({ commit }, errors) => {
    commit('setValidationErrors', errors)
}

export const clearValidationErrors = ({ commit }) => {
    commit('setValidationErrors', [])
}

export const setLoading = ({ commit }, trueOrFalse) => {
    commit('setLoading', trueOrFalse)
}

export const getRegistrationDetails = ({ commit }) => {
    axios.get('registration-details')
        .then(response => {
            commit('setRegistrationDetails', response.data)
        })
}