<script setup>
    import {onMounted, ref, computed, watch} from 'vue';
    import { useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

    /*
    Importar la instancia de Axios previamente configurada en su archivo.
    Axios permite realizar solicitudes HTTP a la API de Laravel.
     */
    import api from '@/plugins/axios';

    const router = useRouter();

    const tiene_tecnico = JSON.parse(localStorage.getItem('tiene_tecnico'));
    const operarioId = Number(localStorage.getItem('operarioId'));

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
    const maquinas = ref([]);

    // Copia de las incidencias originales. Hay que guardar los datos originales de las incidencias para no perderlos al filtrar. Este array no se filtrará.
    const incidenciasOriginal = ref([]);

    // Array que contiene el listado de las incidencias cada vez que se le aplican filtros
    const incidenciasFiltradas = ref([]);

    // Constantes reutilizables con las rutas para obtener datos.
    const API_ROUTES = {
      CAMPUS: '/campus',
      SECCIONES: '/secciones',
      CATEGORIAS: '/categorias',
      INCIDENCIAS: '/incidencias',
      INCIDENCIAS_PROPIAS: '/incidenciasPropias',
      MAQUINAS: '/maquinas',
    };

    // Variable reactiva para controlar la visualización de la capa "dOverlay" que contiene el icono de "tick-correcto"
    const mostrarOverlay = ref(false);

    // Valores de las casillas al crear una incidencia.
    const tituloCrear = ref("");
    const descripcionCrear = ref("");
    const campusCrear = ref("");
    const seccionCrear = ref("");
    const maquinaCrear = ref("");
    const categoriaCrear = ref("");
    const gravedadCrear = ref("");

    // Paginación

    const currentPage = ref(1);
    const itemsPerPage = 4;

    const paginatedIncidencias = computed(() => {
      if (incidenciasFiltradas.value.length === 0) return [];
      const start = (currentPage.value - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      return incidenciasFiltradas.value.slice(start, end);
    });

    const totalPages = computed(() => {
      if (incidenciasFiltradas.value.length === 0) return 1;
      return Math.ceil(incidenciasFiltradas.value.length / itemsPerPage);
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

    // Función para obtener los datos desde el backend.
    // Se conecta con la API de Laravel utilizando Axios y realiza una solicitud GET a '/rutaDatos'.
    async function fetchDatos(rutaDatos, variableRef) {
      try {

        let response;

        // Si se quieran obtener las incidencias que han sido creadas por el usuario logueado, habrá que pasarle el valor del localStorage "operarioId".
        if (rutaDatos === API_ROUTES.INCIDENCIAS_PROPIAS){
          response = await api.get(rutaDatos, {
            params: {
              operario_id: operarioId,
            },
          });
        }
        else {
          // Realiza la solicitud GET a la ruta proporcionada.
          response = await api.get(rutaDatos);
        }

        // Verificar si la respuesta fue exitosa (código 200)
        if (response.status === 200) {
          //  Guardar los datos recibidos en la variable reactiva correspondiente.
          variableRef.value = response.data;
        } else {
          console.error(`Error al cargar datos desde ${rutaDatos}:`, response.status, response.data);
          alert(`Hubo un problema al cargar los datos de ${rutaDatos}. Código de error: ${response.status}.`);
        }

      }
      catch (error) {
        console.error('Error al cargar datos desde ${rutaDatos}:', error);
        alert('Hubo un problema al cargar los datos de ${rutaDatos}. Inténtalo más tarde.');
      }
    }

    // Funciones de filtro auxiliares.

    // Filtrar por estado
    const filterByEstado = (incidencias) => {
      if (filtroEstado.value === '1') {
        return incidencias; // Todas las incidencias.
      }
      else if (filtroEstado.value === '2') {
        return incidencias.filter(incidencia => incidencia.abierta); // Solo abiertas.
      }
      else {
        return incidencias.filter(incidencia => !incidencia.abierta); // Solo cerradas.
      }
    };

    // Filtrar por gravedad
    const filterByGravedad = (incidencias) => {
      return incidencias.filter(incidencia => incidencia.gravedad === getGravedadById(filtroGravedad.value));
    };

    // Filtrar por prioridad (basada en el atributo de la máquina asociada a la incidencia)
    const filterByPrioridad = (incidencias) => {
      return incidencias.filter(incidencia => {
        const maquinaAsociada = maquinas.value.find(maquina => maquina.id === incidencia.maquina_id);
        return maquinaAsociada && maquinaAsociada.prioridad === filtroPrioridad.value;
      });
    };

    // Filtrar por fecha ("ORDER BY" ascendente o descendente, sin descartar elementos)
    const sortByFecha = (incidencias) => {
      if (filtroFecha.value === '1') {
        // Más antiguas primero
        return [...incidencias].sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
      }
      else {
        // Más recientes primero
        return [...incidencias].sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
      }
    };

    // Filtrar por campus (acceso mediante relaciones entre tablas)
    const filterByCampus = (incidencias) => {
      if (!filtroCampus.value) return incidencias;

      return incidencias.filter(incidencia => {
        const maquinaAsociada = maquinas.value.find(maquina => maquina.id === incidencia.maquina_id);
        const seccionAsociada = secciones.value.find(seccion => seccion.id === maquinaAsociada?.seccion_id);
        return seccionAsociada?.campus_id === parseInt(filtroCampus.value, 10);
      });
    };

    // Filtrar por sección (a través de relaciones)
    const filterBySeccion = (incidencias) => {
      if (!filtroSeccion.value) return incidencias;
      return incidencias.filter(incidencia => {
        const maquinaAsociada = maquinas.value.find(maquina => maquina.id === incidencia.maquina_id);
        return maquinaAsociada?.seccion_id === parseInt(filtroSeccion.value, 10);
      });
    };

    // Filtrar por categoría (basada en el atributo `categoria_id` de la incidencia)
    const filterByCategoria = (incidencias) => {
      if (!filtroCategoria.value) return incidencias;
      return incidencias.filter(incidencia => incidencia.categoria_id === parseInt(filtroCategoria.value, 10));
    };

    // Computed property para filtrar las secciones por el campus seleccionado
    const filteredSecciones = computed(() => {
      if (!filtroCampus.value) {
        return secciones.value; // Si no hay campus, mostrar todas las secciones
      }
      return secciones.value.filter(seccion => seccion.campus_id === parseInt(filtroCampus.value, 10));
    });

    // Función que aplica todos los filtros seleccionados al array de incidencias.
    function aplicarFiltros() {
      // Empezar con todas las incidencias originales
      let incidencias = [...incidenciasOriginal.value];

      incidencias = filterByEstado(incidencias);
      incidencias = filterByGravedad(incidencias);
      incidencias = filterByPrioridad(incidencias);
      incidencias = sortByFecha(incidencias);
      incidencias = filterByCampus(incidencias);
      incidencias = filterBySeccion(incidencias);
      incidencias = filterByCategoria(incidencias);

      // Actualizar el array de incidencias con las incidencias filtradas
      incidenciasFiltradas.value = incidencias;

      // Resetear la paginación al aplicar filtros.
      currentPage.value = 1;
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
      incidenciasFiltradas.value = [...incidenciasOriginal.value];

      // Aplicarlos ya que la opción por default puede que no sea la primera en la lista (como en "Estado" que está en "Pendiente" en vez de "Todas").
      aplicarFiltros();
    }

    async function crearIncidencia() {
      try {

        const error = validarIncidencia();
        if (error) {
          alert(error);
          return;
        }

        // Si es válido habrá que crear, redirigir y mostrar una imagen.
        const operarioId = localStorage.getItem('operarioId');
        if (operarioId) {

          console.log({
            titulo: tituloCrear.value,
            descripcion: descripcionCrear.value,
            gravedad: gravedadCrear.value,
            categoria_id: categoriaCrear.value,
            operario_id: operarioId,
            maquina_id: maquinaCrear.value,
          });

          const response = await api.post('/createIncidencia', {
            // Todos los valores que se le pasan son los de las casillas, menos el 'operario_id' que es el almacenado.
            titulo: tituloCrear.value,
            descripcion: descripcionCrear.value,
            gravedad: gravedadCrear.value,
            categoria_id: categoriaCrear.value,
            operario_id: operarioId,
            maquina_id: maquinaCrear.value,
          });

          // Si se ha creado la incidencia podrá continuar.
          if (response.status === 200) {

            // Habría que "recargar" la página (limpiando casillas para poder crear más incidencias si se necesita).
            tituloCrear.value = "";
            descripcionCrear.value = "";
            campusCrear.value = "";
            seccionCrear.value = "";
            maquinaCrear.value = "";
            categoriaCrear.value = "";
            gravedadCrear.value = "";

            // Mostrar temporalmente (durante 2 segundos) el icono de "tick-correcto".
            mostrarOverlay.value = true;

            setTimeout(() => {
              mostrarOverlay.value = false;
            }, 2000);

          }
          else {
            console.error("Error al crear la incidencia:", response.data.message);
          }

        }
        else {
          console.error("La sesión se ha cerrado inesperadamente y no se ha podido realizar la operación. Inténtalo más tarde.");
        }

      }
      catch (error) {
        console.error("Error en la creación de una incidencia:", error);
      }
    }

    // Validación de los datos de creación de incidencia
    function validarIncidencia() {
      let mensajeError = "";

      if (!tituloCrear.value) mensajeError += 'El título está vacío.\n';
      if (!descripcionCrear.value) mensajeError += 'La descripción está vacía.\n';
      if (!campusCrear.value) mensajeError += 'El campus no está seleccionado.\n';
      if (!seccionCrear.value) mensajeError += 'La sección no está seleccionada.\n';
      if (!maquinaCrear.value) mensajeError += 'La máquina no está seleccionada.\n';
      if (!categoriaCrear.value) mensajeError += 'La categoría no está seleccionada.\n';
      if (!gravedadCrear.value) mensajeError += 'La gravedad no está seleccionada.\n';

      if (mensajeError !== ""){
        return mensajeError;
      }
      else{
        // Sin errores, devolver null.
        return null;
      }
    }

    // Función para obtener detalles de una incidencia
    async function detalle(incidenciaId) {
      try {
        router.push(`/incidencias/${incidenciaId}`);
      }
      catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
      }
    }

    function recargarPagina(){
      mostrarCrear.value = true;
      // Recargar la página para mostrar todas las incidencias (las nuevas incluidas)
      window.location.reload();
    }

    // Ciclo de vida: Al montar el componente, se ejecutan las funciones para cargar los datos desde el backend y controlar los filtros.
    onMounted(async () => {

      let incidenciasPersonalizadas = API_ROUTES.INCIDENCIAS;

      // Dependiendo de si el usuario logueado es técnico o no, mostrará todas o solo las creadas por él.
      if (!tiene_tecnico){
        incidenciasPersonalizadas = API_ROUTES.INCIDENCIAS_PROPIAS;
      }

      // Cargar datos de la API
      await Promise.all([
        fetchDatos(API_ROUTES.CAMPUS, campus),
        fetchDatos(API_ROUTES.SECCIONES, secciones),
        fetchDatos(API_ROUTES.CATEGORIAS, categorias),
        fetchDatos(incidenciasPersonalizadas, incidenciasOriginal),
        fetchDatos(API_ROUTES.MAQUINAS, maquinas),
      ]);

      // Inicializar `incidenciasFiltradas` con los valores de `incidenciasOriginal`
      incidenciasFiltradas.value = [...incidenciasOriginal.value];

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
        <div class="crear-form p-4 mt-5">

          <h1 class="titulo text-center mb-4" v-show="!mostrarCrear">Creación de incidencias</h1>
          <h1 class="titulo text-center mb-4" v-show="mostrarCrear">Lista de incidencias</h1>

          <div class="button-group mb-4 text-center">
            <button :class="{ active: mostrarCrear }" @click="recargarPagina" class="btn btn-warning me-2">Ver</button>
            <button :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" class="btn btn-warning">Crear</button>
          </div>

          <form class="ver" v-show="mostrarCrear">

            <h2 class="mt-5">Filtros</h2>

            <!-- Habrá 2 filas de 4 filtros cada una, en este orden. -->

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
                  <!-- Se rellenará con las secciones del campus seleccionado (y si no hay campus seleccionado aparecerán todas las secciones existentes/operativas) -->
                  <option value="" disabled selected>-- Elige una sección --</option>
                  <option v-for="(secci, index) in filteredSecciones" :key="index" :value="secci.id">
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
              Se ha{{ (incidenciasFiltradas.length === 0 || incidenciasFiltradas.length > 1) ? 'n' : '' }} encontrado
              <span class="badge estiloBadge">{{ incidenciasFiltradas.length }}</span>
              incidencia{{ (incidenciasFiltradas.length === 0 || incidenciasFiltradas.length > 1) ? 's' : '' }} con los filtros especificados.
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
                <span>Página {{ currentPage }} de {{ totalPages }}</span>
                <button @click="nextPage" :disabled="currentPage === totalPages" class="btn btn-next">Siguiente</button>
              </div>
            </div>

          </form>

          <form @submit.prevent="crearIncidencia" class="crear" v-show="!mostrarCrear">
            <!-- Icono de un tick que inicialmente estará invisible y solo aparecerá temporalmente al crear exitosamente una incidencia.-->
            <div id="dOverlay" class="d-flex justify-content-center align-items-center" v-if="mostrarOverlay">
              <img src="../assets/tick.png" alt="Icono de tick-correcto" class="iOverlay img-fluid">
            </div>

            <div class="form-group mb-3">
              <div class="descripcion mb-4">
                <label for="tituloCrear" class="form-label">Título</label>
                <textarea id="tituloCrear" name="tituloCrear" class="form-control" style="height: 60px" v-model="tituloCrear" rows="3"></textarea>
              </div>

              <div class="descripcion">
                <label for="descripcionCrear" class="form-label">Descripción</label>
                <textarea id="descripcionCrear" name="descripcionCrear" class="form-control" style="height: 120px" v-model="descripcionCrear" rows="3"></textarea>
              </div>

              <div class="datos d-flex mt-3">
                <div class="col mb-3 me-1">
                  <label for="campusCrear" class="form-label">Campus</label>
                  <select name="campusCrear" class="form-select" v-model="campusCrear">
                    <option value="" disabled selected>-- Elige un campus --</option>
                    <option v-for="(camp, index) in campus" :key="index" :value="camp.id">
                      {{ camp.nombre }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="seccionCrear" class="form-label">Sección</label>
                  <select name="seccionCrear" class="form-select" v-model="seccionCrear">
                    <option value="" disabled selected>-- Elige una sección --</option>
                    <option v-for="(secci, index) in secciones" :key="index" :value="secci.id">
                      {{ secci.codigo }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="maquinaCrear" class="form-label">Máquina</label>
                  <select name="maquinaCrear" class="form-select" v-model="maquinaCrear">
                    <option value="" disabled selected>-- Elige una máquina --</option>
                    <option v-for="(maqui, index) in maquinas" :key="index" :value="maqui.id">
                      {{ maqui.codigo }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="datos d-flex mt-3">
                <div class="col mb-3 me-1">
                  <label for="categoriaCrear" class="form-label">Categoría</label>
                  <select name="categoriaCrear" class="form-select" v-model="categoriaCrear">
                    <option value="" disabled selected>-- Elige una categoría --</option>
                    <option v-for="(cate, index) in categorias" :key="index" :value="cate.id">
                      {{ cate.nombre }}
                    </option>
                  </select>
                </div>

                <div class="col mb-3 me-1">
                  <label for="gravedadCrear" class="form-label">Gravedad</label>
                  <select name="gravedadCrear" class="form-select" v-model="gravedadCrear">
                    <option value="" disabled selected>-- Elige una gravedad --</option>
                    <option value="No funciona">No funciona</option>
                    <option value="Sí funciona">Sí funciona</option>
                    <option value="Aviso">Aviso</option>
                    <!--
                    No hay que poner la opción de "Mantenimiento preventivo" ya que solo se puede asignar
                    ese tipo de gravedad cuando un admin relaciona un mantenimiento con una máquina.
                    -->
                    <!-- <option value="mantenimiento">Mantenimiento preventivo</option> -->
                  </select>
                </div>
              </div>
            </div>

            <div>
              <input type="submit" class="btn btn-warning" value="Crear incidencia">
            </div>
          </form>
        </div>
    </div>

</template>