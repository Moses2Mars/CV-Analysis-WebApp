import Vue from 'vue'
import Vuex from 'vuex'
import login_module from './modules/login_module'
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

export const store = new Vuex.Store({
    plugins: [createPersistedState()],
    state: {
    },
    getters: {},
    mutations: {

    },
    actions: {},
    modules: {
        login_module
    },
})