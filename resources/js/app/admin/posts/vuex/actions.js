export const createPost = ({ dispatch }, payload) => {

    return axios.post('/posts', payload,  {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
}