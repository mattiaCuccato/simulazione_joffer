import Vue from 'vue'
import App from './App.vue'

import OfferCreate from '@/components/OfferCreate'
import OfferList from '@/components/OfferList'
import OfferDetail from '@/components/OfferDetail'

import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.config.productionTip = false

const routes = [
  {
    path:"/list",
    name:"list_offers",
    component:OfferList
  },
  {
    path:"/detail/:id",
    name:"detail_offer",
    component:OfferDetail
  },
  {
    path:"/create",
    name:"insert_offer",
    component:OfferCreate
  },
  {
    path:"/update",
    name:"update_offer",
    component:OfferCreate
  },
  {
    path:"",
    redirect:"/list"
  }
];

const router = new VueRouter({
  mode:'history',
  routes
});

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
