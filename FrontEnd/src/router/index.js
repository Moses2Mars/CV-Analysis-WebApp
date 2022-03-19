import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import FindWork from '../views/FindWork.vue'
import CheckJobApplicants from '../views/CheckJobApplicants.vue'
import CreateJobs from '../views/CreateJobs.vue'
import ApplyToJob from '../views/ApplyToJob.vue'
import { store } from '../store/index.js';
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
  },
  {
    path: '/create-jobs',
    name: 'CreateJobs',
    component: CreateJobs,
  },
  {
    path: '/check-job-applicants',
    name: 'CheckJobApplicants',
    component: CheckJobApplicants,
    meta: { requiresAuth: true },
  },
  {
    path: '/apply-to-job/:uuid',
    name: 'ApplyToJob',
    component: ApplyToJob,
    meta: { requiresAuth: true },
  },
  { path: '*', redirect: '/' }
]





const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  const isLoggedIn = store.getters['login_module/getLoggedInStatus']
  if (to.meta.requiresAuth && !isLoggedIn) next({ name: 'Login' })
  else next()
})

export default router
