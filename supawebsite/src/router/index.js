import Vue from 'vue'
import VueRouter from 'vue-router'
import SignIn from "@/views/SignIn";
import SignUp from "@/views/SignUp";
import Emote from "@/views/Emote";
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/signin/',
    name: 'SignIn',
    component: SignIn
  },
  {
    path: '/signup/',
    name: 'SignUp',
    component: SignUp
  },
  {
    path: '/emote',
    name: 'Emote',
    component: Emote
  }

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
