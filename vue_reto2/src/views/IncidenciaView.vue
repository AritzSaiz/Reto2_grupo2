<script setup>

import {onMounted, ref} from 'vue';
import {useRouter} from 'vue-router';
import Header from '../components/Header.vue';

import api from '@/plugins/axios';

const router = useRouter();

const tiene_tecnico = JSON.parse(localStorage.getItem('tiene_tecnico'));
//const operarioId = Number(localStorage.getItem('operarioId'));
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

// Variable para el textarea de detalles de trabajo
const detallesTrabajo = ref('');
// Variable para la justificación de salida (radio button)
const justificacionSalida = ref('');
// Variable para el texto en caso de "Otro"
const otroJustificacion = ref('');

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

// Mostrar/ocultar el modal de salida
const mostrarSalidaModal = ref(false);

async function participar(){
  console.log("Participar fue llamado");

  if (confirm("¿Quieres participar en esta incidencia?")) {
    try {
      console.log("Datos a enviar:", {
        incidencia_id: props.id,
        tecnico_id: tecnicoId,
        entrada: new Date().toISOString(),
      });

      const response = await api.post('/historial/entrada', {
        incidencia_id: props.id,
        tecnico_id: tecnicoId,
        entrada: new Date().toISOString(),
      });

      if (response.status === 200) {
        alert("Has sido registrado/a como participante en la incidencia.");
        participando.value = true;
      }
    }
    catch (error) {
      console.error("Error al registrar la participación:", error);
      alert("No se pudo registrar la participación. Inténtalo más tarde.");
    }
  }
}

function dejarDeParticipar() {
  if (confirm("¿Quieres dejar de participar en esta incidencia?")) {
    participando.value = false;
    // Saldrá el div obligatorio con los datos a rellenar
    mostrarSalidaModal.value = true;
  }
}

async function actualizarSalida() {
  try{
    const data = {
      incidencia_id: props.id,
      tecnico_id: tecnicoId,
      // La entrada la asignará en la función del controlador (será la misma que la anterior; la de cuando aceptó participar por última vez).
      salida: new Date().toISOString(),
      detalles_trabajo: detallesTrabajo.value,
      // Si es "Otro" se guarda el texto, si no el seleccionado
      justificacion_salida: justificacionSalida.value === 'Otro' ? otroJustificacion.value : justificacionSalida.value,
    };

    console.log(data);

    const response = await api.post('/historial/salida', data);
    if (response.status === 200){
      alert("Has actualizado la salida de la incidencia.");

      // Validará el valor de 'justificacion_salida' y si es que ha solucionado la incidencia, actualizará la incidencia correspondiente de la BD para cerrarla.
      if (data.justificacion_salida === 'Solucionado') {
        try {
          const updateResponse = await api.put(`/updateIncidencia/${props.id}`, {
            abierta: false
          });

          if (updateResponse.status === 200) {
            console.log("Incidencia cerrada correctamente.");
          }
          else {
            console.error("Error al cerrar la incidencia:", updateResponse.data.message);
          }
        } catch (updateError) {
          console.error("Error al actualizar el estado de la incidencia:", updateError);
        }
      }

      participando.value = false;
      mostrarSalidaModal.value = false;
      fetchDatosIncidencia(); // Recargar la página
    }
    else {
      console.error("Error al actualizar la salida:", response.data.message);
    }

  }
  catch (error){
    console.error("Error en la actualización de salida:", error);
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
  console.log(props.id);
  fetchDatosIncidencia();
});

</script>

<template>
    <Header />

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="incidencia-form">

          <h1 class="fw-bold fs-1 mb-4">Detalles de la incidencia</h1>

          <div class="mb-4 d-flex justify-content-between">
            <button @click="volver" type="button" class="btn btn-warning mb-4">Volver</button>
            <button v-if="tiene_tecnico && incidenciaAbierta && !participando" @click="participar" type="button" class="btn btn-warning mb-4">Participar</button>
            <button v-if="tiene_tecnico && participando" @click="dejarDeParticipar" type="button" class="btn btn-warning mb-4">Dejar de participar</button>
          </div>

          <!-- Modal de salida. Se podrá especificar la razón de haber elegido "Dejar de participar".  -->
          <div class="modal" :class="{ 'd-block show': mostrarSalidaModal }"  tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detalles de salida</h5>
                  <button type="button" class="close" @click="mostrarSalidaModal = false">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="detallesTrabajo" class="form-label">Detalles del trabajo</label>
                    <textarea class="form-control" id="detallesTrabajo" v-model="detallesTrabajo" placeholder="Describe el trabajo realizado" rows="3"></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="form-label d-block">Justificación de salida</label>
                    <div class="form-check" v-for="(justificacion, index) in ['Solucionado', 'Falta de material / herramientas', 'Acabar turno', 'Cambio de incidencia', 'Otro']" :key="index">
                      <input type="radio" class="form-check-input" :id="'justificacion' + index" name="justificacion_salida" :value="justificacion" v-model="justificacionSalida">
                      <label class="form-check-label" :for="'justificacion' + index">{{ justificacion }}</label>
                      <div v-if="justificacion === 'Otro'" class="mt-2">
                        <input type="text" class="form-control" placeholder="Escribe la justificación" v-model="otroJustificacion">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" @click="mostrarSalidaModal = false">Cancelar</button>
                  <button type="button" class="btn btn-primary" @click="actualizarSalida">Guardar salida</button>
                </div>
              </div>
            </div>
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

<style scoped>
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1050;
  overflow-x: hidden;
  overflow-y: auto;
}

.modal.d-block {
  display: block;
}
.modal.show {
  opacity: 1;
}
</style>