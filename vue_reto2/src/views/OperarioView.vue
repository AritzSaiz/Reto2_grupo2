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


    /* TODO
    "En lugar de usar alert para errores y validaciones, considera
    integrar una biblioteca de notificaciones como SweetAlert2 o Toastr."
     */


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

    // TODO : Repasar
    function crearIncidencia(){
        if (descripcion.value != "" && categoria.value != "" && gravedad.value != "" && maquina.value != ""){
            router.push('/operario')
        }
        else if (descripcion.value == ""){
            alert('La descripción está vacía');
        }
        else if (categoria.value == ""){
            alert('La categoría no está seleccionada');
        }
        else if (gravedad.value == ""){
            alert('La gravedad no está seleccionada');
        }
        else if (maquina.value == ""){
            alert('La máquina no está seleccionada');
        }

    }

    function detalle(){
      router.push('/incidencia');
    }

    // Ciclo de vida: Al montar el componente, se ejecutan las funciones para cargar los datos desde el backend.
    onMounted(() => {
      const rutasApi = [
        { ruta: '/campus', variable: campus },
        { ruta: '/secciones', variable: secciones },
        { ruta: '/categorias', variable: categorias },
        { ruta: '/incidencias', variable: incidencias },
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
                <div class="row g-1">
                  <div class="col">
                    Filtrar por estado de incidencia.
                    <select name="filtroEstado" class="form-select">
                      <option value="1">Todas</option>
                      <option value="2" selected>Pendientes</option>
                      <option value="3">Solucionadas</option>
                    </select>
                  </div>
                  <div class="col">
                    Filtrar por gravedad de incidencia.
                    <select name="filtroGravedad" class="form-select">
                      <option value="1">No funciona</option>
                      <option value="2">Sí funciona</option>
                      <option value="3">Aviso</option>
                      <option value="4">Mantenimiento preventivo</option>
                    </select>
                  </div>
                  <div class="col">
                    Filtrar por prioridad de máquina.
                    <select name="filtroPrioridad" class="form-select">
                      <option value="1">1 - Crítica</option>
                      <option value="2">2 - Moderada</option>
                      <option value="3">3 - Baja</option>
                    </select>
                  </div>
                    <div class="col">
                      Filtrar por fecha de incidencia.
                        <select name="filtroFecha" class="form-select">
                            <option value="1">Más antiguas</option>
                            <option value="2">Más recientes</option>
                        </select>
                    </div>
                    <div class="col">
                      Filtrar por campus.
                        <select name="filtroCampus" class="form-select">
                          <option v-for="(camp, index) in campus" :key="index" :value="camp.id">
                            {{ camp.nombre }}
                          </option>
                        </select>
                    </div>
                    <div class="col">
                      Filtrar por sección.
                        <select name="filtroSeccion" class="form-select">
                          <option v-for="(secci, index) in secciones" :key="index" :value="secci.id">
                            {{ secci.codigo }}
                          </option>
                        </select>
                    </div>
                    <div class="col">
                      Filtrar por categoría.
                        <select name="filtroCategoria" class="form-select">
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

                    <div class="datos d-flex mt-3">
                        <div class="col mb-3 me-1">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" v-model="categoria">
                                <option value="mecanica">Mecánica</option>
                                <option value="electrica">Eléctrica</option>
                                <option value="neumatica">Neumática</option>
                                <option value="hidraulica">Hidráulica</option>
                                <option value="informatica">Informática</option>
                                <option value="instalaciones generales">Instalaciones generales</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>

                        <div class="col mb-3 me-1">
                            <label for="gravedad" class="form-label">Gravedad</label>
                            <select name="gravedad" class="form-select" v-model="gravedad">
                                <option value="no">No funciona</option>
                                <option value="si">Sí funciona</option>
                                <option value="aviso">Aviso</option>
                                <option value="mantenimiento">Mantenimiento preventivo</option>
                            </select>
                        </div>

                        <div class="col mb-3">
                            <label for="máquina" class="form-label">Máquina</label>
                            <select name="máquina" class="form-select" v-model="maquina">
                                <option value="id1">Máquina 1</option>
                                <option value="id2">Máquina 2</option>
                                <option value="id3">Máquina 3</option>
                                <option value="id4">Máquina 4</option>
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