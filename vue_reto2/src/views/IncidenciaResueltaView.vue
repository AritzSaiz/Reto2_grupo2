<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {onMounted, ref} from 'vue';
    import { useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

    import api from '@/plugins/axios';

    const router = useRouter();
    
    const props = defineProps({
        id: {
            type: [String, Number],
            required: true
        }
    });

    const descripcion = ref('')
    const categoria = ref('')
    const gravedad = ref('')
    const maquina = ref('');
    const fechaEntrada = ref('');
    const fechaSalida = ref('');
    const listaTecnicos = ref('');

    function volver(){
        const operarioId = localStorage.getItem('operarioId');
        if (operarioId) {
            router.push(`/operario/${operarioId}`);
        } else {
            console.error("No se encontró el ID del operario.");
        }
    }

    async function fetchDatosIncidencia() {
        try {
            const responseIncidencia = await api.get(`/incidencias/${props.id}`);
            console.log("responseIncidencia:", responseIncidencia);
            const responseMaquina = await api.get('/maquinas');
            const responseTecnicos = await api.get(`/incidencias/${props.id}`);
            const dataIncidencia = responseIncidencia.data.data;

            console.log("dataIncidencia:", dataIncidencia);

            if (dataIncidencia) {

                descripcion.value = dataIncidencia.descripcion;
                gravedad.value = dataIncidencia.gravedad;
                fechaEntrada.value = dataIncidencia.fechaEntrada;
                fechaSalida.value = dataIncidencia.fechaSalida;

                const maquinaData = responseMaquina.data.find(maquina => maquina.id === dataIncidencia.maquina_id);
                maquina.value = maquinaData ? maquinaData.codigo : 'Máquina no encontrada';

                const tecnicosData = responseTecnicos.data.find(tecnico => tecnico.id === dataIncidencia.tecnico_id);
                tecnico.value = tecnicosData ? tecnicosData.codigo : 'Tecnicos no encontrados';
            }
            else {
                alert('No se encontró una incidencia con el ID especificado.');
            }
        }
        catch (error){
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

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning mb-4">Volver</button>
            </div>
            
            <form>
                <div class="form-group-resuelta mb-4">
                    <div class="descripcion">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" readonly v-model="descripcion"></textarea>
                    </div>

                    <div class="datos d-flex">
                        <div class="categoria">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input id="categoria" name="categoria" readonly v-model="categoria">
                        </div>

                        <div class="gravedad">
                            <label for="gravedad" class="form-label">Gravedad</label>
                            <input id="gravedad" name="gravedad" readonly v-model="gravedad">
                        </div>

                        <div class="maquina">
                            <label for="máquina" class="form-label">Máquina</label>
                            <input id="máquina" name="máquina" readonly v-model="maquina">
                        </div>

                        <div class="fechaEntrada">
                            <label for="fechaEntrada" class="form-label">Fecha de Entrada</label>
                            <input id="fechaEntrada" name="fechaEntrada" readonly v-model="fechaEntrada">
                        </div>

                        <div class="fechaSalida">
                            <label for="fechaSalida" class="form-label">Fecha de Salida</label>
                            <input id="fechaSalida" name="fechaSalida" readonly v-model="fechaSalida">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="tecnicos" class="form-label">Lista de técnicos que han participado en esta incidencia</label>
                        <textarea id="tecnicos" name="tecnicos" class="form-control" readonly v-model="listaTecnicos"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>