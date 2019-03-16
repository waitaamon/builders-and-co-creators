export const validate = ({ commit }, payload) => {

    return axios.post(payload.url, payload)
}