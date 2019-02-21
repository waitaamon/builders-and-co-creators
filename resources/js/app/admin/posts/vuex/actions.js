export const createPost = ({ commit }, payload) => {

    return axios.post('/posts', payload,  {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
}

export const getPosts = ({ commit }) => {

    return axios.get('/api/posts')
        .then(response => {
            commit('setPosts', response.data)
        })
}

export const getPost = ({ commit }, id) => {

    return axios.get('/api/post/' + id)
        .then(response => {
            commit('setPost', response.data)
        })
}

export const updatePost = ({ commit }, payload) => {

    return axios.patch('/posts/' + payload.id, payload)
}

export const deletePost = ({ commit }, id) => {

    return axios.delete('/posts/' + id)
        .then(response => {
            commit('setPosts', response.data)
        })
}