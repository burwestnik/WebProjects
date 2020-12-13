import Vue from 'vue'
import App from './App.vue'
import router from './router'
import Axios from 'axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.config.productionTip = false
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.prototype.$http = Axios.create({
  baseURL: 'http://localhost:1199/api/v1'
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
