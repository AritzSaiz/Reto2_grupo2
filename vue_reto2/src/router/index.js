import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'iniciarSesion',
      component: HomeView,
    },
    {
      path: '/operario',
      name: 'Ventana operario',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/OperarioView.vue'),
    },
    {
      path: '/incidencia',
      name: 'Ventana incidencia',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/IncidenciaView.vue'),
    },
    {
      path: '/incidenciasResueltas',
      name: 'Ventana incidencias resueltas',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/IncidenciaResuelta.vue'),
    },
    {
      path: '/incidenciasParticipa',
      name: 'Ventana incidencias participadas',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/IncidenciaParticipa.vue'),
    },
    {
      path: '/incidenciaResueltaView',
      name: 'Ventana detalles incidencias resueltas',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/IncidenciaResueltaView.vue'),
    },
  ],
})

export default router
