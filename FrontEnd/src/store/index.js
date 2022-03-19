import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import login_module from './modules/login_module'
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

export const store = new Vuex.Store({
    plugins: [createPersistedState()],
    state: {
        all_countries: [],
        all_job_fields: [],
    },
    getters: {
        getAllCountries(state) {
            return state.all_countries
        },
        getAllJobFields(state){
            return state.all_job_fields
        }
    },
    mutations: {
        setAllCountries (state, payload) {
            state.all_countries = payload;
        },
        setAllJobFields (state, payload) {
            state.all_job_fields = payload;
        }
    },
    actions: {
        getCountriesFromDatabase ({ commit  }) {
            axios.get('/all-countries')
              .then(response => {
                commit('setAllCountries', response.data)
              })
          },
        getJobFieldsFromDatabase ({ commit  }) {
            axios.get('/all-job-fields')
                .then(response => {
                    commit('setAllJobFields', response.data)
                })
        },
    },
    modules: {
        login_module
    },
})