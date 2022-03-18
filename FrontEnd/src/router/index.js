import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import FindWork from '../views/FindWork.vue'
import CheckJobApplicants from '../views/CheckJobApplicants.vue'
import JobListing from '../views/JobListing.vue'
import CreateJobs from '../views/CreateJobs.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
  {
    path: '/find-work',
    name: 'FindWork',
    component: FindWork,
    meta: { requiresAuth: true },
  },
  {
    path: '/create-jobs',
    name: 'CreateJobs',
    component: CreateJobs,
    meta: { requiresAuth: true },
  },
  {
    path: '/check-job-applicants',
    name: 'CheckJobApplicants',
    component: CheckJobApplicants,
    meta: { requiresAuth: true },
  },
  {
    path: '/job-listing/:uuid',
    name: 'JobListing',
    component: JobListing,
    meta: { requiresAuth: true },
  },
  { path: '*', redirect: '/' }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
