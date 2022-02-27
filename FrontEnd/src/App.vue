<template>
  <div id="app">
    <div id="nav">
      <router-link to="/login" v-if="!isLoggedIn">Login  | </router-link>
      <router-link to="/">Home  | </router-link>
      <router-link to="/about">About  | </router-link>
      <router-link to="/job-opportunities" v-if="userType=='jobSeeker'">Job Opportunities | </router-link>
      <router-link to="/create-jobs" v-if="userType=='recruiter'">Create Jobs  |</router-link>
      <router-link to="/check-job-applicants" v-if="userType=='recruiter'">Check Job Applicants  |</router-link>
      <button v-if="isLoggedIn" @click="logoutCurrentUser"> Log Out</button>
    </div>
    <router-view />
  </div>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>

<script>
export default {
  methods: {
    logoutCurrentUser() {
      this.$store.commit('login_module/logout')
      this.$router.push('/')
    }
  },
  computed: {
    userType() {
      return this.$store.getters['login_module/getUserType']
    },
    isLoggedIn() {
      return this.$store.getters['login_module/getloggedInStatus']
    }
  }
}
</script>