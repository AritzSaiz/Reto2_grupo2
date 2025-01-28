<script setup>
    import Header from '@/components/Header.vue';
    import { useRouter } from 'vue-router';
    import {onMounted, ref, computed} from 'vue';

    import api from '@/plugins/axios';

    const props = defineProps({
        id: {
            type: [String, Number],
            required: true
        }
    });

    const operarioId = localStorage.getItem('operarioId');

    const incidencias = ref([]);
    const filtro = ref('1');

    const router = useRouter();

    function volver(){
        const operarioId = localStorage.getItem('operarioId');
        if (operarioId) {
            router.push(`/operario/${operarioId}`);
        } else {
            console.error("No se encontró el ID del operario.");
        }
    }

    // Paginación
    const currentPage = ref(1);
    const itemsPerPage = 4;

    const paginatedIncidencias = computed(() => {
      if (incidencias.value.length === 0) return [];
      const start = (currentPage.value - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      return incidencias.value.slice(start, end);
    });

    const totalPages = computed(() => {
      if (incidencias.value.length === 0) return 1;
      return Math.ceil(incidencias.value.length / itemsPerPage);
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

    async function detalle(incidenciaId) {
      try {
        router.push(`/incidencias/${incidenciaId}`);
      }
      catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    async function fetchIncidencias() {
      try {
        const response = await api.get('/incidencias');
        incidencias.value = response.data.filter(incidencia => incidencia.operario_id == operarioId);
        filtrarIncidencias();
      } catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    function filtrarIncidencias() {
        if (filtro.value === '1') {
            // Mostrar todas las incidencias
            return;
        }
        if (filtro.value === '2') {
            // Mostrar solo abiertas
            incidencias.value = incidencias.value.filter(incidencia => incidencia.abierta === 1);
        } else if (filtro.value === '3') {
            // Mostrar solo cerradas
            incidencias.value = incidencias.value.filter(incidencia => incidencia.abierta === 0);
        }
    }

    onMounted(() => {
      fetchIncidencias();
    });
</script>

<template>
    <Header />
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="crear-form p-4">
            <h1 class="titulo text-center mb-4">Tus incidencias</h1>

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning">Volver</button>
            </div>

            <div class="mb-4">
                <select :class="{ active: !mostrarCrear }" v-model="filtro" @change="filtrarIncidencias" name="filtroFecha" class="form-select d-inline-block w-auto">
                    <option value="1">Todas</option>
                    <option value="2">Abiertas</option>
                    <option value="3">Cerradas</option>
                </select>
            </div>

            <form class="ver">
                <p class="cantIncidencias mb-0">
                    Se ha{{ (incidencias.length === 0 || incidencias.length > 1) ? 'n' : '' }} encontrado
                    <span class="badge estiloBadge">{{ incidencias.length }}</span>
                    incidencia{{ (incidencias.length === 0 || incidencias.length > 1) ? 's' : '' }} con los filtros especificados.
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

                <!--
                <div class="listaIncidencias">
                    <div v-for="(incidencia, index) in incidencias" :key="index" class="incidencia mb-3">
                        <p class="mb-0">{{ incidencia.descripcion }}</p>
                        <button @click="detalle" type="button" class="btn btn-detalle btn-sm">Detalle</button>
                    </div>
                </div>
                -->
            </form>
        </div>
    </div>
</template>