import axios from 'axios';

const login_module = {
    namespaced: true,
    state: {
        name: null,
        isLoggedIn: false,
        purpose: null,
        email: null,
        user_id: null,
    },
    mutations: {
        login (state, payload) {
            state.name = payload.name
            state.isLoggedIn = true;
            state.purpose = payload.purpose
            state.email = payload.email
            state.user_id = payload.id
        },
        logout (state) {
            state.name = null
            state.isLoggedIn = false
            state.purpose = null
            state.email = null
        }
    },
    actions: {
        authenticate ({ commit }, { email, password }) {
            return axios.post('/login', {email: email, password: password})
            .then( (response)=> {
                commit('login', {name: response.data.name, email: response.data.email, purpose: response.data.purpose, id: response.data.id})
            })
        },
    },
    getters: {
        getLoggedInStatus (state) {
            return state.isLoggedIn
        },
        getName (state) {
            return state.name
        },
        getEmail (state) {
            return state.email
        },
        getPurpose (state) {
            return state.purpose
        },
        getUserID (state) {
            return state.user_id;
        }
    }
}
export default login_module