<script setup>
    import Header from '@/components/Header.vue';
    import { useRouter } from 'vue-router';
    import {onMounted, ref, computed, watch} from 'vue';
    import api from '@/plugins/axios';

    const incidencias = ref([]);

    const router = useRouter();

    const filtroFecha = ref('1');

    const filteredIncidencias = computed(() => {
      const sortedIncidencias = sortByFecha(incidencias.value);
      return sortedIncidencias
    });

    // Paginación

    const currentPage = ref(1);
    const itemsPerPage = 4;

    const paginatedIncidencias = computed(() => {
      if (!filteredIncidencias.value || filteredIncidencias.value.length === 0) return [];
      const start = (currentPage.value - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      return filteredIncidencias.value.slice(start, end);
    });

    const totalPages = computed(() => {
      if (!filteredIncidencias.value || filteredIncidencias.value.length === 0) return 1;
      return Math.ceil(filteredIncidencias.value.length / itemsPerPage);
    });

    const previousPage = () => {
      if (currentPage.value > 1) {
        currentPage.value--;
      }
    };

    const nextPage = () => {
      if (currentPage.value < totalPages.value) {
        currentPage.value++;
      }
    };

    // Filtrar por fecha
    const sortByFecha = (incidencias) => {
      if (filtroFecha.value === '2') {
        // Más antiguas primero
        return [...incidencias].sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
      }
      else {
        // Más recientes primero
        return [...incidencias].sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
      }
    };

    function volver(){
      const operarioId = localStorage.getItem('operarioId');
      if (operarioId) {
        router.push(`/operario/${operarioId}`);
      } else {
        console.error("No se encontró el ID del operario.");
      }
    }

    function detalle(incidenciaId) {
      try {
        router.push(`/incidenciaResueltaView/${incidenciaId}`);
      }
      catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    async function fetchIncidencias() {
      try {
        const response = await api.get('/incidencias');
        incidencias.value = response.data.filter(incidencia => incidencia.abierta === 0);
      }
      catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    onMounted(() => {
      fetchIncidencias();
    });

    watch(filtroFecha, () => {
      currentPage.value = 1
    });

</script>

<template>
    <Header />
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="crear-form p-4">
            <h1 class="titulo text-center mb-4">Incidencias que he resuelto</h1>

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning">Volver</button>
            </div>

            <div class="mb-4">
                <select name="filtroFecha" class="form-select d-inline-block w-auto" v-model="filtroFecha">
                    <option value="1">Más recientes</option>
                    <option value="2">Más antiguas</option>
                </select>
            </div>

            <div class="ver">
                <p class="cantIncidencias mb-0">
                    Se ha{{ (filteredIncidencias.length === 0 || filteredIncidencias.length > 1) ? 'n' : '' }} encontrado
                    <span class="badge estiloBadge">{{ filteredIncidencias.length }}</span>
                    incidencia{{ (filteredIncidencias.length === 0 || filteredIncidencias.length > 1) ? 's' : '' }} con los filtros especificados.
                </p>

                <div class="listaIncidencias">
                    <div v-for="(incidencia, index) in paginatedIncidencias" :key="index" class="mb-3">
                        <div class="incidencia mb-3">
                            <p class="mb-0">{{ incidencia.titulo }}</p>
                            <button @click="detalle(incidencia.id)" type="button" class="btn btn-detalle">Detalle</button>
                        </div>
                    </div>

                    <div class="pagination justify-content-center">
                        <button @click="previousPage" :disabled="currentPage === 1" class="btn btn-prev">Anterior</button>
                        <span>Pagina {{ currentPage }} de {{ totalPages }}</span>
                        <button @click="nextPage" :disabled="currentPage === totalPages" class="btn btn-next">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>