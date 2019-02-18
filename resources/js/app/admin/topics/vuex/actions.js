export const createTopics = ({commit }, payload) => {

    return axios.post('/topics', payload)
        .then((response) => {
        commit('setTopics', response.data)
    })
}

export const getTopics = ({ commit }) => {

    return axios.get('/api/topics').then( (response) => {
        commit('setTopics', response.data)
    })
}