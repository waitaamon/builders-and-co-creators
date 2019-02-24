export const subscribe = ({ commit }, payload) => {
    return axios.post('/subscribe-to-newsletter', payload)
}