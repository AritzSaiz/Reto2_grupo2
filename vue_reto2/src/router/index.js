import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Operario from '../views/OperarioView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'iniciarSesion',
      component: HomeView,
      props: true,
    },
    {
      path: '/operario',
      name: 'Operario',
      component: () => import('../views/OperarioView.vue'),
    },
    {
      path: '/operario/:id',
      name: 'Ventana operario',
      redirect: (to) => {
        localStorage.setItem('operarioId', to.params.id)
        return '/operario';
      },
    },
    {
      path: '/incidencias/:id',  // Parámetro dinámico "id"
      name: 'IncidenciaView',
      component: () => import('@/views/IncidenciaView.vue'),
      props: true,  // Pasa la ID como una prop al componente
    },
    {
      path: '/incidenciasResueltas/:id',
      name: 'Ventana incidencias resueltas',
      component: () => import('../views/IncidenciaResuelta.vue'),
    },
    {
      path: '/incidenciasParticipa/:id',
      name: 'Ventana incidencias participadas',
      component: () => import('../views/IncidenciaParticipa.vue'),
    },
    {
      path: '/incidenciaResueltaView',
      name: 'Ventana detalles incidencias resueltas',
      component: () => import('../views/IncidenciaResueltaView.vue'),
    },
  
  ],
})

export default router
