export const createUser = ({ commit }, payload) => {

    return axios.post('/posts', payload)
}