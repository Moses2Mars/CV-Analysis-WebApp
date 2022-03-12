<template>
  <div id="app">   
    <nav class="bg-dark navbar navbar-expand-lg navbar-expand-md" style="height: 4.5rem;">
      <div class="container">
        <a class="navbar-brand" href="/"> <i class="fa fa-line-chart"></i> E-Recruitment </a>
        <p v-if="firstName" class="m-auto pl-4">Welcome {{firstName}} </p>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <router-link to="/" class="nav-link text-white">Home </router-link>
                </li>
                <li class="nav-item" v-if="!isLoggedIn">
                  <router-link to="/login" class="nav-link smoothScroll text-white">Login </router-link>
                </li>
                <li class="nav-item" v-if="userType=='jobSeeker'">
                  <router-link to="/job-opportunities" class="nav-link text-white">Job Opportunities </router-link>
                </li>
                <li class="nav-item" v-if="userType=='recruiter'">
                  <router-link to="/create-jobs" class="nav-link text-white">Create Jobs </router-link>
                </li>
                <li class="nav-item" v-if="userType=='recruiter'">
                  <router-link to="/check-job-applicants" class="nav-link text-white">Check Job Applicants </router-link>
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                  <button @click="logoutCurrentUser" class="nav-link contact text-black my-auto"> Log Out</button>
                </li>
            </ul>
        </div>
      </div>
    </nav>
  <router-view class="mb-5" />
  <footer class="py-5 bg-black mt-5">
      <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; AUST Senior Project 2021-2022</p></div>
  </footer>
  </div>
</template>

<style>
@import '../src/assets/css/bootstrap.min.css';
@import '../src/assets/css/font-awesome.min.css';
@import '../src/assets/css/aos.css';
@import '../src/assets/css/owl.carousel.min.css';
@import '../src/assets/css/owl.theme.default.min.css';
@import '../src/assets/css/templatemo-digital-trend.css';
@import '../src/assets/css/styles.css';
@import "https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900";
@import "https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i";

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
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
    },
    firstName() {
      return this.$store.getters['login_module/getFirstName']
    }
  }
}
</script>