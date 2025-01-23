<script setup>

    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {onMounted, ref} from 'vue';
    import { useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

    /*
    Importar la instancia de Axios previamente configurada en su archivo.
    Axios permite realizar solicitudes HTTP a la API de Laravel.
     */
    import api from '@/plugins/axios';
    import alert from "bootstrap/js/src/alert.js";

    // TODO
    // Mejorar el manejo de errores con SweetAlert2 u otra cosa (es una biblioteca de notificaciones).
    //import Swal from 'sweetalert2';

    const router = useRouter();

    // Variable que controla el contenido de la ventana (para listar incidencias o crear una)
    const mostrarCrear = ref(true);

    // Valores de los filtros de búsqueda
    const filtroEstado = ref('2');
    const filtroGravedad = ref('1');
    const filtroPrioridad = ref('1');
    const filtroFecha = ref('1');
    const filtroCampus = ref('');
    const filtroSeccion = ref('');
    const filtroCategoria = ref('');

    const descripcion = ref("");
    const categoria = ref("");
    const gravedad = ref("");
    const maquina = ref("");

    // Listas reactivas que contienen los datos obtenidos de la API.
    const campus = ref([]);
    const secciones = ref([]);
    const categorias = ref([]);
    const incidencias = ref([]);
    const maquinas = ref([]);
    
    const detalles = ref([]);

    // Guardar los datos originales de las incidencias para no perderlos al filtrar.
    const incidenciasOriginal = ref([]);

    // Constantes reutilizables con las rutas para obtener datos.
    const API_ROUTES = {
      CAMPUS: '/campus',
      SECCIONES: '/secciones',
      CATEGORIAS: '/categorias',
      INCIDENCIAS: '/incidencias',
      MAQUINAS: '/maquinas',
    };

    // Función para obtener los datos desde el backend.
    // Se conecta con la API de Laravel utilizando Axios y realiza una solicitud GET a '/datos'.
    async function fetchDatos(rutaDatos, variableRef) {
      try {
        // Realiza la solicitud GET a la ruta proporcionada.
        const response = await api.get(rutaDatos);
        //  Guardar los datos recibidos en la variable reactiva correspondiente.
        variableRef.value = response.data;
      }
      catch (error) {
        console.error('Error al cargar datos desde ${rutaDatos}:', error);
        alert('Hubo un problema al cargar los datos de ${rutaDatos}. Inténtalo más tarde.');
      }
    }

    // Función que aplica todos los filtros seleccionados al array de incidencias.
    function aplicarFiltros() {
      incidencias.value = incidenciasOriginal.value.filter((incidencia) => {
        // Filtro por estado (Pendiente, Solucionadas, Todas)
        if (filtroEstado.value !== '1' && incidencia.abierta !== parseInt(filtroEstado.value) - 2) {
          return false;
        }

        // Filtro por gravedad
        if (filtroGravedad.value !== '1' && incidencia.gravedad !== filtroGravedad.value) {
          return false;
        }

        // Filtro por prioridad de máquina
        if (filtroPrioridad.value !== '1' && incidencia.prioridad !== parseInt(filtroPrioridad.value)) {
          return false;
        }

        // Filtro por fecha (simplificado: más recientes o más antiguas)
        if (filtroFecha.value === '1' && incidencia.fecha > Date.now()) {
          return false; // Ejemplo de comparación
        }
        if (filtroFecha.value === '2' && incidencia.fecha < Date.now()) {
          return false;
        }

        // Filtro por campus
        if (filtroCampus.value && incidencia.campusId !== parseInt(filtroCampus.value)) {
          return false;
        }

        // Filtro por sección
        if (filtroSeccion.value && incidencia.seccionId !== parseInt(filtroSeccion.value)) {
          return false;
        }

        // Filtro por categoría
        if (filtroCategoria.value && incidencia.categoriaId !== parseInt(filtroCategoria.value)) {
          return false;
        }

        return true;
      });
    }

    function resetearFiltros() {
      // Restablecer las variables reactivas de los filtros.
      filtroEstado.value = '2'; // Pendientes
      filtroGravedad.value = '1'; // No funciona
      filtroPrioridad.value = '1'; // 1 - Crítica
      filtroFecha.value = '1'; // Más antiguas
      filtroCampus.value = '1';
      filtroSeccion.value = '1';
      filtroCategoria.value = '1';

      // Aplicar los filtros para actualizar la lista de incidencias con los valores restablecidos.
      aplicarFiltros();
    }


    // TODO
    function validarIncidencia() {
      if (!descripcion.value) return 'La descripción está vacía.';
      if (!categoria.value) return 'La categoría no está seleccionada.';
      if (!gravedad.value) return 'La gravedad no está seleccionada.';
      if (!maquina.value) return 'La máquina no está seleccionada.';
      // Sin errores, devolver null.
      return null;
    }

    function crearIncidencia() {
      const error = validarIncidencia();
      if (error) {
        alert(error);
        return;
      }
      // Si es válido, redirigir.
      router.push('/operario');
    }

    async function detalle(incidenciaId) {
      try {
        const response = await api.get(`/incidencias/${incidenciaId}`);
        detalles.value = response.data.data;
        router.push(`/incidencias/${incidenciaId}`);
      } catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    // Ciclo de vida: Al montar el componente, se ejecutan las funciones para cargar los datos desde el backend.
    onMounted(() => {
      const rutasApi = [
        { ruta: API_ROUTES.CAMPUS, variable: campus },
        { ruta: API_ROUTES.SECCIONES, variable: secciones },
        { ruta: API_ROUTES.CATEGORIAS, variable: categorias },
        { ruta: API_ROUTES.INCIDENCIAS, variable: incidencias },
        { ruta: API_ROUTES.MAQUINAS, variable: maquinas },
      ];

      rutasApi.forEach(({ ruta, variable }) => fetchDatos(ruta, variable));
    });

</script>

<template>

    <Header />

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="crear-form p-4">
          <h1 class="titulo text-center mb-4" v-show="!mostrarCrear">Creación de incidencias</h1>
          <h1 class="titulo text-center mb-4" v-show="mostrarCrear">Lista de incidencias</h1>

          <div class="button-group mb-4 text-center">
            <button :class="{ active: mostrarCrear }" @click="mostrarCrear = true" class="btn btn-warning me-2">Ver</button>
            <button :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" class="btn btn-warning">Crear</button>
          </div>

          <form class="ver" v-show="mostrarCrear">

            <h2 class="mt-5">Filtros</h2>

            <!-- Habrá 2 filas de 4 filtros cada una, en este orden. -->

            <!-- TODO : Mejorar que sea responsivo en diferentes tamaños de pantallas. -->

            <div class="row gy-3">
              <div class="col-md-3">
                <label for="filtroEstado" class="form-label text-dark">Estado de incidencia</label>
                <!-- Evento '@change' ~~> Cada vez que cambie el valor de un filtro, se ejecutará la función 'aplicarFiltros'. -->
                <select id="filtroEstado" name="filtroEstado" class="form-select" v-model="filtroEstado" @change="aplicarFiltros">
                  <option value="1">Todas</option>
                  <option value="2" selected>Pendientes</option>
                  <option value="3">Solucionadas</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filtroGravedad" class="form-label text-dark">Gravedad de incidencia</label>
                <select id="filtroGravedad" name="filtroGravedad" class="form-select" v-model="filtroGravedad" @change="aplicarFiltros">
                  <option value="1" selected>No funciona</option>
                  <option value="2">Sí funciona</option>
                  <option value="3">Aviso</option>
                  <option value="4">Mantenimiento preventivo</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filtroPrioridad" class="form-label text-dark">Prioridad de máquina</label>
                <select id="filtroPrioridad" name="filtroPrioridad" class="form-select" v-model="filtroPrioridad" @change="aplicarFiltros">
                  <option value="1" selected>1 - Crítica</option>
                  <option value="2">2 - Moderada</option>
                  <option value="3">3 - Baja</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filtroFecha" class="form-label text-dark">Fecha de incidencia</label>
                <select id="filtroFecha" name="filtroFecha" class="form-select" v-model="filtroFecha" @change="aplicarFiltros">
                  <option value="1" selected>Más antiguas</option>
                  <option value="2">Más recientes</option>
                </select>
              </div>
            </div>
            <div class="row gy-3 mb-5">
              <div class="col-md-3">
                <label for="filtroCampus" class="form-label text-dark">Campus</label>
                <select id="filtroCampus" name="filtroCampus" class="form-select" v-model="filtroCampus" @change="aplicarFiltros">
                  <option value="" disabled selected>-- Elige un campus --</option>
                  <option v-for="(camp, index) in campus" :key="index" :value="camp.id">
                    {{ camp.nombre }}
                  </option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filtroSeccion" class="form-label text-dark">Sección</label>
                <select id="filtroSeccion" name="filtroSeccion" class="form-select" v-model="filtroSeccion" @change="aplicarFiltros">
                  <option value="" disabled selected>-- Elige una sección --</option>
                  <option v-for="(secci, index) in secciones" :key="index" :value="secci.id">
                    {{ secci.codigo }}
                  </option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filtroCategoria" class="form-label text-dark">Categoría de incidencia</label>
                <select id="filtroCategoria" name="filtroCategoria" class="form-select" v-model="filtroCategoria" @change="aplicarFiltros">
                  <option value="" disabled selected>-- Elige una categoría --</option>
                  <option v-for="(cate, index) in categorias" :key="index" :value="cate.id">
                    {{ cate.nombre }}
                  </option>
                </select>
              </div>
              <!-- Botón para resetear filtros. -->
              <div class="col-md-3 d-flex align-items-end">
                <button type="button" class="btn w-100" @click="resetearFiltros">Resetear filtros</button>
              </div>
            </div>

            <!-- Acceder a las incidencias obtenidas para mostrar el número total y sus datos. -->

            <p class="cantIncidencias mb-0">Se han encontrado <span class="badge estiloBadge">{{ incidencias.length }}</span> incidencias con los filtros especificados.</p>

            <div class="listaIncidencias">
              <div v-for="(incidencia, index) in incidencias" :key="index" class="incidencia mb-3">
                <p class="mb-0">{{ incidencia.descripcion }}</p>
                <button @click="detalle(incidencia.id)" type="button" class="btn btn-detalle">Detalle</button>
                <!--
                <button class="btn btn-resolver">Resolver</button>
                -->
              </div>
            </div>

          </form>

          <form class="crear" v-show="!mostrarCrear">
            <div class="form-group mb-3">
              <div class="descripcion">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" v-model="descripcion" rows="3"></textarea>
              </div>

              <!-- TODO : Poner los 3 primeros filtros en una fila, y abajo los otros 2 en otra fila. -->
              <div class="datos d-flex mt-3">
                <div class="col mb-3 me-1">
                  <label for="campus" class="form-label">Campus</label>
                  <select name="campus" class="form-select">
                    <option v-for="(camp, index) in campus" :key="index" :value="camp.id">
                      {{ camp.nombre }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="seccion" class="form-label">Sección</label>
                  <select name="seccion" class="form-select">
                    <option v-for="(secci, index) in secciones" :key="index" :value="secci.id">
                      {{ secci.codigo }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="maquina" class="form-label">Máquina</label>
                  <select name="maquina" class="form-select">
                    <option v-for="(maqui, index) in maquinas" :key="index" :value="maqui.id">
                      {{ maqui.nombre }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="categoria" class="form-label">Categoría</label>
                  <select name="categoria" class="form-select">
                    <option v-for="(cate, index) in categorias" :key="index" :value="cate.id">
                      {{ cate.nombre }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="gravedad" class="form-label">Gravedad</label>
                  <select name="gravedad" class="form-select">
                    <option value="no">No funciona</option>
                    <option value="si">Sí funciona</option>
                    <option value="aviso">Aviso</option>
                    <option value="mantenimiento">Mantenimiento preventivo</option>
                  </select>
                </div>
              </div>
            </div>

            <div>
              <button id="crearIncidencia" @click="crearIncidencia" class="btn btn-warning">Crear incidencia</button>
            </div>
          </form>
        </div>
    </div>

</template>

<style scoped>

/* TODO : Poner donde corresponde. */
.estiloBadge{
  background-color: #FFFFFF;
  color: green !important;
  font-size: 14px;
  /* font-weight: normal; */
}

</style>