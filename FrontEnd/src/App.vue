<template>
  <div id="app">   
    <nav class="bg-white navbar navbar-expand-lg navbar-expand-md border-bottom border-light" style="height: 4.5rem;">
      <div class="container">
        <a class="navbar-brand text-dark fw-bold fs-4" href="/"> <i class="fa fa-line-chart me-2 blue-dash"></i><span class="blue-dash">Recruit</span>World</a>
        <p v-if="name" class="m-auto pl-4"> Welcome {{name}} </p> 
        <div class="collapse navbar-collapse ms-5" id="navbarNav">
            <ul class="navbar-nav ms-5">
                <li class="nav-item mt-2 link-style" v-if="userType=='recruiter' || !isLoggedIn">
                  <router-link to='/create-jobs' class="nav-link text-dark fw-bold">Hire Talent</router-link>
                </li>
                <li class="nav-item mt-2 link-style">
                  <router-link to="/find-work" class="nav-link text-dark fw-bold">Find Work</router-link>
                </li>
                <li class="nav-item mt-2 link-style" v-if="userType=='recruiter'">
                  <router-link to="/check-job-applicants" class="nav-link text-dark fw-bold">Check Job Applicants </router-link>
                </li>
                <li class="nav-item mt-2 link-style">
                  <router-link to="/#help-section" class="nav-link text-dark fw-bold">Help Center</router-link>
                </li>
                <li class="nav-item mt-2 link-style">
                  <router-link to="/#about-us" class="nav-link text-dark fw-bold">About Us</router-link>
                </li>
                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link to="/login" class="nav-link smoothScroll text-dark">
                      <button class="btn-login fw-bold blue-dash ms-5">
                        Login
                      </button>
                    </router-link>
                </li>
                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link to="/register" class="nav-link smoothScroll text-dark">
                      <button class="btn-signup fw-bold me-5">
                        Sign Up
                      </button> 
                    </router-link>
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                  <nav class="nav-link smoothScroll text-dark">
                      <button class="btn-login fw-bold me-5" @click="logoutCurrentUser">
                        Log Out
                      </button> 
                  </nav>
                </li>
            </ul>
        </div>
      </div>
    </nav>
  <router-view  :key='$route.fullPath' class="mb-5" />
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
<style scoped>
.nav-item {
  margin: auto;
}
.btn-signup {
  color: white;
  transition: 0.2s;
  border: 1px solid rgb(41, 64, 136);
}
.btn-signup:hover {
  background-color: white;
  color: rgb(88, 109, 175);
}
.btn-login {
  color: rgb(31, 114, 168);
  transition: 0.2s;
  border: 1px solid rgb(41, 64, 136);
}
.btn-login:hover {
  background-color:rgb(10, 142, 230);
  color: white;
  border: 1px solid rgb(41, 64, 136);
}
.link-style {
  border-radius: 12px;
}
.link-style:hover {
  background-color: rgb(174, 201, 226);
  transition: 0.3s;
}
</style>
<script>
export default {
  methods: {
    logoutCurrentUser() {
      this.$store.commit('login_module/logout')
      this.$router.push('/')
    },
    setAllCountries(){
      this.$store.dispatch('getCountriesFromDatabase')
    },
    setAllJobFields(){
      this.$store.dispatch('getJobFieldsFromDatabase')
    }
  },
  computed: {
    userType() {
      return this.$store.getters['login_module/getPurpose']
    },
    isLoggedIn() {
      return this.$store.getters['login_module/getLoggedInStatus']
    },
    name() {
      return this.$store.getters['login_module/getName']
    },
  },
  mounted() {
    this.setAllCountries()
    this.setAllJobFields()
  }

}
</script>