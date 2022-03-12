const login_module = {
    namespaced: true,
    state: {
        firstName: null,
        isLoggedIn: false,
        userType: null,
    },
    mutations: {
        login (state, payload) {
            state.firstName = payload.firstName
            state.isLoggedIn = true;
            state.userType = payload.purpose
        },
        logout (state) {
            state.firstName = null
            state.isLoggedIn = false
            state.userType = null
        }
    },
    actions: {
        authenticate ({ commit }, { email, password, purpose }) {
            //validate these credentials with the backend, for now we will console.log them 
            //so we dont get "unused vars" error
            console.log(email, password, purpose)
            if(purpose == 'recruiter')
                commit('login', {firstName: 'AUST', purpose: purpose})
            else 
                commit('login', {firstName: 'Moussa', purpose: purpose})
        },
    },
    getters: {
        getloggedInStatus (state) {
            return state.isLoggedIn
        },
        getFirstName (state) {
            return state.firstName
        },
        getUserType (state) {
            return state.userType
        }
    }
}
export default login_module