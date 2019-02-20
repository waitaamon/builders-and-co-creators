export const createVideo = ({commit }, payload) => {

    return axios.post('/videos', payload)
}

export const allVideos = ({ commit }) => {

    return axios.get('/api/videos')
        .then(response => {
            commit('setVideos', response.data)
        })
}

export const setVideo = ({ commit }, video ) => {
    commit('setVideo', video)

    return Promise.resolve(video)
}

export const updateVideo = ({ commit, dispatch }, payload) => {

    return axios.patch('/videos/' + payload.id, payload)
        .then(response => {
            dispatch('clearValidationErrors', {}, {root: true})
            commit('setVideos', response.data)
        })
}

export const deleteVideo = ({ commit }, id) => {

    return axios.delete('/videos/' + id )
        .then(response => {
            commit('setVideos', response.data)
        })
}