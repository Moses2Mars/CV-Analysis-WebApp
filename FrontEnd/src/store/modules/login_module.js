import axios from 'axios';

const login_module = {
    namespaced: true,
    state: {
        name: null,
        isLoggedIn: false,
        purpose: null,
    },
    mutations: {
        login (state, payload) {
            state.firstName = payload.firstName
            state.isLoggedIn = true;
            state.purpose = payload.purpose
        },
        logout (state) {
            state.firstName = null
            state.isLoggedIn = false
            state.purpose = null
        }
    },
    actions: {
        authenticate ({ commit }, { email, password }) {
            return axios.post('/login', {email: email, password: password})
            .then( (response)=> {
                commit('login', {name: response.data.name, purpose: response.data.purpose})
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
        getPurpose (state) {
            return state.purpose
        }
    }
}
export default login_module