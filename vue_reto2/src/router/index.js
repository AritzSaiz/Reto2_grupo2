import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

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
      path: '/incidenciasResueltas',
      name: 'Incidencias resueltas',
      component: () => import('../views/IncidenciaResuelta.vue'),
    },
    {
      path: '/incidenciasResueltas/:id',
      name: 'Ventana incidencias resueltas',
      redirect: (to) => {
        return '/incidenciasResueltas'
      },
    },
    {
      path: '/incidenciasParticipa',
      name: 'Incidencias participadas',
      component: () => import('../views/IncidenciaParticipa.vue'),
    },
    {
      path: '/incidenciasParticipa/:id',
      name: 'Ventana incidencias participadas',
      redirect: (to) => {
        return '/incidenciasParticipa'
      }
    },
    {
      path: '/incidenciaResueltaView/:id',
      name: 'Ventana detalles incidencias resueltas',
      component: () => import('../views/IncidenciaResueltaView.vue'),
      props: true,
    },
    {
      path: '/incidenciasMias',
      name: 'Mis incidencias',
      component: () => import('../views/IncidenciaMias.vue'),
    },
    {
      path: '/incidenciasMias/:id',
      name: 'Ventana mis incidencias',
      redirect: (to) => {
        return '/incidenciasMias'
      }
    },
  
  ],
})

export default router
