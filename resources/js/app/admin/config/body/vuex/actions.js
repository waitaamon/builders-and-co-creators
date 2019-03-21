export const createBody = ({ commit }, payload) => {

    return axios.post('/bodies', payload)
}

export const getBodies= ({ commit }) => {
    return axios.get('/api/bodies')
        .then(response => {
            commit('setBodies', response.data)
        })
}

export const updateBody = ({ commit }, payload) => {

    return axios.patch('/bodies/' + payload.id, payload)
}

export const deleteBody = ({ commit }, id) => {

    return axios.delete('/bodies/' + id)
        .then(response => {
            commit('setBodies', response.data)
        })
}