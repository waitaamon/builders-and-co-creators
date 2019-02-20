export const createImage = ({commit }, payload) => {

    return axios.post('/sliders', payload)
        .then((response) => {
        commit('setImages', response.data)
    })
}

export const getImages = ({ commit }) => {

    return axios.get('/api/images').then( (response) => {
        commit('setImages', response.data)
    })
}