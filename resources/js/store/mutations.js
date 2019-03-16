export const setValidationErrors = (state, errors) => {
    state.validation = errors
}

export  const setLoading = (state, trueOrFalse) => {

    state.loading = trueOrFalse
}

export const setRegistrationDetails = (state, data) => {
    state.reg_data = data
}