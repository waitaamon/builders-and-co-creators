import Vue from 'vue';
import Vuex from 'vuex'

import post from '../app/admin/posts/vuex'
import topic from '../app/admin/topics/vuex'
import slider from '../app/admin/slider/vuex'
import video from '../app/admin/videos/vuex'
import web from '../app/website/vuex'

import state from './state'
import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
    state,
    mutations,
    actions,
    getters,
    modules: {
        post,
        topic,
        slider,
        video,
        web
    }
})