export const createMembership = ({ commit }, payload) => {
    return axios.post('/admin/config/memberships', payload)
}

export const getMemberships = ({ commit }) => {

    return axios.get('/api/memberships')
        .then(response => {
            commit('setMemberships', response.data)
        })
}

export const getMembership = ({ commit }, id) => {

    return axios.get('/api/membership/' + id)
        .then(response => {
            commit('setMembership', response.data)
        })
}

export const updateMembership = ({ commit }, payload) => {
    console.log(payload)

    return axios.patch('/admin/config/memberships/' + payload.id, payload)
}

export const deleteMembership = ({ commit }, id) => {

    return axios.delete('/admin/config/memberships/' + id)
        .then(response => {
            commit('setMemberships', response.data)
        })
}

//Membership types
export const getMembershipTypes = ({ commit }) => {

    return axios.get('/api/membership-types')
        .then(response => {
            commit('setMembershipTypes', response.data)
        })
}

export const setMembershipType = ({ commit }, payload) => {

    return new Promise((resolve, reject) => {
        commit('setMembershipType', payload)
        resolve(true)
    })
}

export const createMembershipType = ({ commit }, payload) => {
    console.log(payload)
    return axios.post('/admin/config/membership-types', payload)
        .then(response => {
            commit('setMembership', response.data)
        })
}

export const updateMembershipType = ({ commit }, payload) => {

    return axios.patch('/admin/config/membership-types/' + payload.id, payload)
        .then(response => {
            commit('setMembership', response.data)
        })
}

export const deleteMembershipType = ({ commit }, id) => {

    return axios.delete('/admin/config/membership-types/' + id)
        .then(response => {
            commit('setMembership', response.data)
        })
}