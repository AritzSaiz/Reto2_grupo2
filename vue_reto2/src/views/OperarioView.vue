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

    const mostrarCrear = ref(true);

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

    function detalle(){
      router.push('/incidencia');
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

            <h2 class="mt-3">Filtros</h2>

            <div class="row gy-3">
              <div class="col-md-4">
                <label for="filtroEstado" class="form-label text-dark">Estado de incidencia</label>
                <select id="filtroEstado" name="filtroEstado" class="form-select">
                  <option value="1">Todas</option>
                  <option value="2" selected>Pendientes</option>
                  <option value="3">Solucionadas</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="filtroGravedad" class="form-label text-dark">Gravedad de incidencia</label>
                <select id="filtroGravedad" name="filtroGravedad" class="form-select">
                  <option value="1" selected>No funciona</option>
                  <option value="2">Sí funciona</option>
                  <option value="3">Aviso</option>
                  <option value="4">Mantenimiento preventivo</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="filtroPrioridad" class="form-label text-dark">Prioridad de máquina</label>
                <select id="filtroPrioridad" name="filtroPrioridad" class="form-select">
                  <option value="1" selected>1 - Crítica</option>
                  <option value="2">2 - Moderada</option>
                  <option value="3">3 - Baja</option>
                </select>
              </div>
            </div>
            <div class="row gy-3">
              <div class="col-md-4">
                <label for="filtroFecha" class="form-label text-dark">Fecha de incidencia</label>
                <select id="filtroFecha" name="filtroFecha" class="form-select">
                  <option value="1" selected>Más antiguas</option>
                  <option value="2">Más recientes</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="filtroCampus" class="form-label text-dark">Campus</label>
                <select id="filtroCampus" name="filtroCampus" class="form-select">
                  <option v-for="(camp, index) in campus" :key="index" :value="camp.id">
                    {{ camp.nombre }}
                  </option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="filtroSeccion" class="form-label text-dark">Sección</label>
                <select id="filtroSeccion" name="filtroSeccion" class="form-select">
                  <option v-for="(secci, index) in secciones" :key="index" :value="secci.id">
                    {{ secci.codigo }}
                  </option>
                </select>
              </div>
            </div>
            <div class="row gy-3">
              <div class="col-md-4">
                <label for="filtroCategoria" class="form-label text-dark">Categoría de incidencia</label>
                <select id="filtroCategoria" name="filtroCategoria" class="form-select">
                  <option v-for="(cate, index) in categorias" :key="index" :value="cate.id">
                    {{ cate.nombre }}
                  </option>
                </select>
              </div>
            </div>

            <!-- Acceder a las incidencias obtenidas para mostrar el número total y sus datos. -->

            <p class="cantIncidencias mb-0">Se han encontrado <b>{{ incidencias.length }}</b> incidencias.</p>

            <div class="listaIncidencias">
              <div v-for="(incidencia, index) in incidencias" :key="index" class="incidencia mb-3">
                <p class="mb-0">{{ incidencia.descripcion }}</p>
                <button @click="detalle" type="button" class="btn btn-detalle">Detalle</button>
                <button class="btn btn-resolver">Resolver</button>
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