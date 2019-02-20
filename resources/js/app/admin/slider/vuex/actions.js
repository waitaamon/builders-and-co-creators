export const createImage = ({commit }, payload) => {
    return axios.post('/sliders', payload)
}

export const setImage = ({ commit }, image) => {
    commit('setImage', image)

    return Promise.resolve(image)
}

export const getImages = ({ commit }) => {
    return axios.get('/api/slider-images').then( (response) => {
        commit('setImages', response.data)
    })
}

export const updateImage = ({ commit }, payload) => {

    return axios.patch('/sliders/' + payload.id, payload).then( (response) => {
        commit('setImages', response.data)
    })
}

export const deleteImage = ({ commit }, id) => {
    return axios.delete('/sliders/' + id).then( (response) => {
        commit('setImages', response.data)
    })
}