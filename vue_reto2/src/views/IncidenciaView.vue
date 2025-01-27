<script setup>

import {onMounted, ref} from 'vue';
import {useRouter} from 'vue-router';
import Header from '../components/Header.vue';

import api from '@/plugins/axios';

const router = useRouter();
//const route = useRoute();

const tiene_tecnico = JSON.parse(localStorage.getItem('tiene_tecnico'));
const operarioId = Number(localStorage.getItem('operarioId'));
const tecnicoId = Number(localStorage.getItem('tecnicoId'));

const props = defineProps({
  id: {
    type: [String, Number],
    required: true
  }
});

const operario = ref('')
const fecha = ref('')
const titulo = ref('')
const descripcion = ref('')
const categoria = ref('');
const gravedad = ref('');
const maquina = ref('');
const seccion = ref('');
const campus = ref('');

// Variable que permite saber si la incidencia está abierta o no, para poder mostrar el botón para participar en ella.
const incidenciaAbierta = ref('');

function volver(){
  const operarioId = localStorage.getItem('operarioId');
  if (operarioId) {
    router.push(`/operario/${operarioId}`);
  }
  else {
    console.error("La sesión se ha cerrado inesperadamente. Inténtalo más tarde.");
  }
}

const participando = ref(false);

async function participar(){
  console.log("Participar fue llamado");

  if (confirm("¿Quieres participar en esta incidencia?")) {
    try {
      const data = {
        incidencia_id: props.id, // ID de la incidencia actual
        tecnico_id: tecnicoId,  // ID del técnico (del localStorage; asignado en el login)
        entrada: new Date().toISOString(), // Fecha/hora actual
        detalles_trabajo: '',  // Si no hay detalles, que esté vacío
        justificacion_salida: null,  // Puede ser null si no es necesario
        salida: null, // Si no se ha dado salida, también puede ser null
      };

      console.log(data);

      const response = await api.post('/historial/entrada', {
        headers: { 'datos': data }
      });

      console.log(response.data);

      if (response.status === 201) {
        alert("Has sido registrado como participante en la incidencia.");
        participando.value = true;
        // Aquí podrías actualizar la UI para reflejar la participación
      }
    } catch (error) {
      console.error("Error al registrar la participación:", error);
      alert("No se pudo registrar la participación. Inténtalo más tarde.");
    }
    // TODO : Asignar (crear fila en historial)
    /*
    Se quedará en esta ventana (semi-bloqueada) con solo accesible el botón de
    "Dejar de participar en esta incidencia" (que se habrá hecho visible).

    Al clicarlo saldrá una confirmación y al darle que sí saldrá un pop-up con datos
    a rellenar ("detalles_trabajo" {lo que ha hecho en ese tiempo} y
    "justificacion_salida" {si se ha salido por haber solucionado completamente la
    incidencia {para cerrarla o no}, por falta de material/herramientas, por acabar turno,
    por cambiar de incidencia… u otro (a especificar en input)}) y al aceptar ahí se
    recargará la página (para q deje de mostrarse el botón de "Participar") + crear fila en
    historial, quizás cerrar incidencia...
     */
  }
}

function dejarDeParticipar() {
  if (confirm("¿Quieres dejar de participar en esta incidencia?")) {
    participando.value = false;
  }
}

async function fetchDatosIncidencia() {
  try {
    const responseIncidencia = await api.get(`/incidencias/${props.id}`);
    console.log("responseIncidencia:", responseIncidencia);  // Agrega este console log
    const responseOperarios = await api.get('/operarios');
    const responseCategoria = await api.get('/categorias');
    const responseMaquina = await api.get('/maquinas');
    const responseSeccion = await api.get('/secciones');
    const responseCampus = await api.get('/campus');
    const dataIncidencia = responseIncidencia.data.data;

    console.log("dataIncidencia:", dataIncidencia);  // Agrega este console log para ver la data

    if (dataIncidencia) {
      console.log("dataIncidencia.abierta:", dataIncidencia.abierta);
      let timestampCreacion = dataIncidencia.created_at;
      let dateCreacion = new Date(timestampCreacion);
      // Formatear la fecha y la hora
      fecha.value = `${dateCreacion.toISOString().split('T')[0]} · ${dateCreacion.toTimeString().split(' ')[0]}`;

      titulo.value = dataIncidencia.titulo;
      descripcion.value = dataIncidencia.descripcion;
      gravedad.value = dataIncidencia.gravedad;
      incidenciaAbierta.value = dataIncidencia.abierta;

      console.log("incidenciaAbierta.value después de asignar:", incidenciaAbierta.value); // Verifica si se asigna correctamente

      const operarioData = responseOperarios.data.find(operario => operario.id === dataIncidencia.operario_id);
      operario.value = operarioData ? operarioData.email : 'Operario no encontrado';

      const categoriaData = responseCategoria.data.find(categoria => categoria.id === dataIncidencia.categoria_id);
      categoria.value = categoriaData ? categoriaData.nombre : 'Categoría no encontrada';

      const maquinaData = responseMaquina.data.find(maquina => maquina.id === dataIncidencia.maquina_id);
      maquina.value = maquinaData ? maquinaData.codigo : 'Máquina no encontrada';

      // Obtener la sección de la máquina
      if (maquinaData && maquinaData.seccion_id) {
        const seccionData = responseSeccion.data.find(seccion => seccion.id === maquinaData.seccion_id);
        seccion.value = seccionData ? seccionData.codigo : 'Sección no encontrada';

        // Obtener el campus de la sección
        if (seccionData.campus_id) {
          const campusData = responseCampus.data.find(campus => campus.id === seccionData.campus_id);
          campus.value = campusData ? campusData.nombre : 'Campus no encontrado';
        }
      }

    }
    else {
      alert('No se encontró una incidencia con el ID especificado.');
    }
  }
  catch (error) {
    console.error('Error al cargar la incidencia:', error);
    alert('Hubo un problema al cargar la incidencia. Inténtalo más tarde.');
  }
}

onMounted(() => {
  fetchDatosIncidencia();

});

</script>

<template>
    <Header />

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="incidencia-form">

            <h1 class="fw-bold fs-1 mb-4">Detalles de la incidencia</h1>

            <div class="mb-4 d-flex justify-content-between">
              <!-- TODO : Poner el de Volver con un color más claro y el de Participar más destacado. -->
              <button @click="volver" type="button" class="btn btn-warning mb-4">Volver</button>
              <button v-if="tiene_tecnico && incidenciaAbierta && !participando" @click="participar" type="button" class="btn btn-warning mb-4">Participar</button>
              <button v-if="tiene_tecnico && participando" @click="dejarDeParticipar" type="button" class="btn btn-warning mb-4">Dejar de participar</button>
            </div>
            
            <form>
                <div class="form-group mb-4">
                  <div class="datos d-flex mb-4">
                    <div class="col me-2">
                      <label for="operario" class="form-label">Operario que reportó</label>
                      <input id="operario" name="operario" readonly v-model="operario">
                    </div>

                    <div class="col me-2">
                      <label for="fecha" class="form-label">Fecha de reporte</label>
                      <input id="fecha" name="fecha" readonly v-model="fecha">
                    </div>
                  </div>
                    <div class="descripcion mb-4">
                        <label for="titulo" class="form-label">Título</label>
                        <textarea id="titulo" name="titulo" class="form-control" readonly v-model="titulo"></textarea>
                    </div>

                    <div class="descripcion">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" readonly v-model="descripcion"></textarea>
                    </div>

                    <div class="datos d-flex">
                        <div class="col me-2">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input id="categoria" name="categoria" readonly v-model="categoria">
                        </div>

                        <div class="col me-2">
                            <label for="gravedad" class="form-label">Gravedad</label>
                            <input id="gravedad" name="gravedad" readonly v-model="gravedad">
                        </div>
                    </div>

                    <div class="datos d-flex">
                      <div class="col me-2">
                        <label for="maquina" class="form-label">Máquina</label>
                        <input id="maquina" name="maquina" readonly v-model="maquina">
                      </div>

                      <div class="col me-2">
                        <label for="seccion" class="form-label">Sección</label>
                        <input id="seccion" name="seccion" readonly v-model="seccion">
                      </div>

                      <div class="col me-2">
                        <label for="campus" class="form-label">Campus</label>
                        <input id="Campus" name="Campus" readonly v-model="campus">
                      </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>