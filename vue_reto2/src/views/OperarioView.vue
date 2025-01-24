<script setup>

    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {onMounted, ref, watch} from 'vue';
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

    // Listas reactivas con datos obtenidos de la API.
    const campus = ref([]);
    const secciones = ref([]);
    const categorias = ref([]);
    const incidencias = ref([]);
    const maquinas = ref([]);

    // Copia de las incidencias originales. Hay que guardar los datos originales de las incidencias para no perderlos al filtrar. Este array no se modificará.
    const incidenciasOriginal = ref([]);

    // Constantes reutilizables con las rutas para obtener datos.
    const API_ROUTES = {
      CAMPUS: '/campus',
      SECCIONES: '/secciones',
      CATEGORIAS: '/categorias',
      INCIDENCIAS: '/incidencias',
      MAQUINAS: '/maquinas',
    };

    const tiene_tecnico = JSON.parse(localStorage.getItem('tiene_tecnico'));
    const operarioId = Number(localStorage.getItem('operarioId'));

    const descripcion = ref("");
    const categoria = ref("");
    const gravedad = ref("");
    const maquina = ref("");

    const detalles = ref([]);

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

      // Empezar con todas las incidencias originales
      let incidenciasFiltradas = [...incidenciasOriginal.value];

      // Filtrar por estado
      if (filtroEstado.value !== '1') {
        incidenciasFiltradas = incidenciasFiltradas.filter(incidencia => {
          if (filtroEstado.value === '2') {
            return incidencia.abierta; // Solo abiertas
          } else if (filtroEstado.value === '3') {
            return !incidencia.abierta; // Solo cerradas
          }
          return true;
        });
      }

      // TODO : NO FUNCIONAN LAS OPCIONES DE "No funciona" (SACA INCIDENCIAS DE MÁS) Y "Mantenimiento preventivo" (SACA INCIDENCIAS DE MENOS)
      // Filtrar por gravedad
      if (filtroGravedad.value !== '1') {
        incidenciasFiltradas = incidenciasFiltradas.filter(incidencia => {
          return incidencia.gravedad === getGravedadById(filtroGravedad.value);
        });
      }

      // TODO : NO FUNCIONA (SE PONEN TODAS COMO "1 - Crítica")
      // Filtrar por prioridad (basada en el atributo de la máquina asociada a la incidencia)
      if (filtroPrioridad.value !== '1') {
        incidenciasFiltradas = incidenciasFiltradas.filter(incidencia => {
          const maquinaAsociada = maquinas.value.find(maquina => maquina.id === incidencia.maquina_id);
          return maquinaAsociada && maquinaAsociada.prioridad === parseInt(filtroPrioridad.value, 10);
        });
      }

      // TODO : NO FUNCIONA (no se ordena de ninguna manera; no cambia)
      // Filtrar por fecha (ascendente o descendente, sin descartar elementos)
      if (filtroFecha.value !== '1') {
        incidenciasFiltradas.sort((a, b) => {
          const fechaA = new Date(a.created_at);
          const fechaB = new Date(b.created_at);
          return filtroFecha.value === '2' ? fechaB - fechaA : fechaA - fechaB;
        });
      }

      // Filtrar por campus (acceso mediante relaciones entre tablas)
      if (filtroCampus.value) {
        incidenciasFiltradas = incidenciasFiltradas.filter(incidencia => {
          const maquinaAsociada = maquinas.value.find(maquina => maquina.id === incidencia.maquina_id);
          const seccionAsociada = secciones.value.find(seccion => seccion.id === maquinaAsociada?.seccion_id);
          return seccionAsociada?.campus_id === parseInt(filtroCampus.value, 10);
        });
      }

      // TODO : TIENE QUE RELLENARSE CON LAS SECCIONES DEL CAMPUS SELECCIONADO (Y SI NO HAY CAMPUS SELECCIONADO QUE SE QUEDE EN LA DEFAULT DE "-- Elige...")
      // Filtrar por sección (a través de relaciones)
      if (filtroSeccion.value) {
        incidenciasFiltradas = incidenciasFiltradas.filter(incidencia => {
          const maquinaAsociada = maquinas.value.find(maquina => maquina.id === incidencia.maquina_id);
          return maquinaAsociada?.seccion_id === parseInt(filtroSeccion.value, 10);
        });
      }

      // Filtrar por categoría (basada en el atributo `categoria_id` de la incidencia)
      if (filtroCategoria.value) {
        incidenciasFiltradas = incidenciasFiltradas.filter(incidencia => {
          return incidencia.categoria_id === parseInt(filtroCategoria.value, 10);
        });
      }

      // Actualizar el array de incidencias con las incidencias filtradas
      incidencias.value = incidenciasFiltradas;

    }

    // Función para obtener la gravedad en base a su ID
    function getGravedadById(id) {
      const gravedades = {
        '1': 'No funciona',
        '2': 'Sí funciona',
        '3': 'Aviso',
        '4': 'Mantenimiento preventivo'
      };
      return gravedades[id] || '';
    }

    // Función para restablecer los filtros
    function resetearFiltros() {
      // Restablecer las variables reactivas de los filtros.
      filtroEstado.value = '2'; // Pendientes
      filtroGravedad.value = '1'; // No funciona
      filtroPrioridad.value = '1'; // 1 - Crítica
      filtroFecha.value = '1'; // Más antiguas
      filtroCampus.value = '';
      filtroSeccion.value = '';
      filtroCategoria.value = '';

      // Restaurar todas las incidencias desde la lista original.
      // El operador de propagación '...' crea una nueva lista (array) basada en "incidenciasOriginal.value" (lo rellena con los datos del original).
      incidencias.value = [...incidenciasOriginal.value];

      // Aplicarlos ya que la opción por default puede que no sea la primera en la lista (como en "Estado" que está en "Pendiente" en vez de "Todas").
      aplicarFiltros();
    }


    // TODO : Hacer lo correspondiente de "Crear incidencia".

    // Validación de la creación de incidencia
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

    // Función para obtener detalles de una incidencia
    async function detalle(incidenciaId) {
      try {
        const response = await api.get(`/incidencias/${incidenciaId}`);
        detalles.value = response.data.data;
        router.push(`/incidencias/${incidenciaId}`);
      }
      catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    // Ciclo de vida: Al montar el componente, se ejecutan las funciones para cargar los datos desde el backend y controlar los filtros.
    onMounted(async () => {

      // Cargar datos de la API
      await Promise.all([
        fetchDatos(API_ROUTES.CAMPUS, campus),
        fetchDatos(API_ROUTES.SECCIONES, secciones),
        fetchDatos(API_ROUTES.CATEGORIAS, categorias),
        fetchDatos(API_ROUTES.INCIDENCIAS, incidencias),
        fetchDatos(API_ROUTES.MAQUINAS, maquinas),
      ]);

      // Guardar una copia de las incidencias originales
      incidenciasOriginal.value = [...incidencias.value];

      // Aplicar los filtros iniciales
      aplicarFiltros();
    });

    // Observar los filtros para aplicar cambios
    watch([filtroEstado, filtroGravedad, filtroPrioridad, filtroFecha, filtroCampus, filtroSeccion,
      filtroCategoria], () => {
      aplicarFiltros();

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
                <!-- Evento '@change': Cada vez que cambie el valor de un filtro, se ejecutará la función 'aplicarFiltros'. -->
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

            <p class="cantIncidencias mb-0">
              Se ha{{ (incidencias.length === 0 || incidencias.length > 1) ? 'n' : '' }} encontrado
              <span class="badge estiloBadge">{{ incidencias.length }}</span>
              incidencia{{ (incidencias.length === 0 || incidencias.length > 1) ? 's' : '' }} con los filtros especificados.
            </p>

            <div class="listaIncidencias">
              <div v-if="tiene_tecnico === false">
                <div v-for="(incidencia, index) in incidencias" :key="index" class="mb-3">
                  <div v-if="incidencia.operario_id === operarioId" class="incidencia mb-3">
                    <p class="mb-0">{{ incidencia.descripcion }}</p>
                    <button @click="detalle(incidencia.id)" type="button" class="btn btn-detalle">Detalle</button>
                  </div>
                </div>
              </div>

              <div v-if="tiene_tecnico === true">
                <div v-for="(incidencia, index) in incidencias" :key="index" class="incidencia mb-3">
                  <p class="mb-0">{{ incidencia.descripcion }}</p>
                  <button @click="detalle(incidencia.id)" type="button" class="btn btn-detalle">Detalle</button>
                </div>
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