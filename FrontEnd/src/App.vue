<template>

  <div id="app">
    
    <!-- Navbar -->
    <nav class="flex-container top-navbar">

      <a class="navbar-brand text-dark fw-bold fs-4" href="/"> 
        <i class="fa fa-line-chart me-2 blue-dash"></i>
        <span class="blue-dash"> Recruit </span> World
      </a>

      <div v-if="name" class="welcome"> Welcome {{name}} </div> 

      <div class="flex-container router-section">
        <router-link v-if="userType=='recruiter' || !isLoggedIn" to='/create-jobs' class="item-link">
          Hire Talent
        </router-link>
        <router-link v-if="userType=='recruiter'" to="/check-job-applicants" class="item-link">
          Check Job Applicants 
        </router-link>
        <router-link to="/find-work" class="item-link">Find Work</router-link>
        <router-link to="/#about-us" class="item-link">About Us</router-link>
        <nav v-if="!isLoggedIn">
          <button class="btn-login fw-bold blue-dash mx-4" @click="$router.push('/login')">
            Login
          </button>
        </nav>
        <nav v-if="!isLoggedIn">
          <button class="btn-signup fw-bold" @click="$router.push('/register')">
            Sign Up
          </button> 
        </nav>
        <nav v-if="isLoggedIn">
            <button class="btn-login fw-bold mx-4" @click="logoutCurrentUser">
              Log Out
            </button> 
        </nav>
      </div>
    </nav>

  <!-- Main View -->
  <router-view  :key='$route.fullPath' class="mb-5" />

  <!-- Footer -->
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
.flex-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  color: black;
  padding: 1em;
}
.top-navbar {
  gap: 1em;
}
.router-section {
  gap: 0.2em;
}
.welcome {
  color: rgb(102, 102, 102);
  text-transform: capitalize;
  font-size: 0.9em;
  font-weight: 600;
}
.item-link {
  text-decoration: none;
  padding: 1em;
  color: black;
  font-weight: 500;
  transition: 0.2s;
  border-radius: 18px;
}

.item-link:hover {
  background-color: rgb(113, 180, 255);
}
.router-link-active {
  background-color: rgb(34, 137, 255);
  color: white;
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