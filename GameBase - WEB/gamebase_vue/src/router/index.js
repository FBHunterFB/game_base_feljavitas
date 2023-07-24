import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import("../views/HomeView.vue")
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/addbalance',
      name: 'AddBalance',
      component: () => import('../views/AddBalanceView.vue')
    },
    {
      path: '/library',
      name: 'Library',
      component: () => import('../views/LibraryView.vue')
    }
  ]
})

export default router
