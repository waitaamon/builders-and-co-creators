export const createPost = ({ dispatch }, payload) => {

    return axios.post('/posts', payload)
}