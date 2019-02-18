export const setValidationErrors = ({ commit }, errors) => {
    commit('setValidationErrors', errors)
}

export const clearValidationErrors = ({ commit }) => {
    commit('setValidationErrors', null)
}

export const setLoading = ({ commit }, trueOrFalse) => {
    commit('setLoading', trueOrFalse)
}