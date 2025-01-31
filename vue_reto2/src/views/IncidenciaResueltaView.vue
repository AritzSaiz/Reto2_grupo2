<script setup>

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

    const descripcion = ref('');
    const categoria = ref('');
    const gravedad = ref('');
    const maquina = ref('');
    const fechaEntrada = ref('');
    const fechaSalida = ref('');
    const listaTecnicos = ref('');

    function volver(){
        const operarioId = localStorage.getItem('operarioId');
        if (operarioId) {
            router.push('/incidenciasResueltas');
        } else {
            console.error("No se encontró el ID del operario.");
        }
    }

    async function fetchDatosIncidencia() {
        try {
            const responseIncidencia = await api.get(`/incidencias/${props.id}`);
            console.log("responseIncidencia:", responseIncidencia);
            const responseCategoria = await api.get('/categorias');
            const responseMaquina = await api.get('/maquinas');

            let responseHistorial;

            try{
                responseHistorial = await api.get(`/historiales/${props.id}`);
            } catch (error) {
                console.warn("No se encontró historial para la incidencia.");
                responseHistorial = null;
            }
    
            const responseTecnicos = await api.get(`/incidencias/${props.id}`);
            const dataIncidencia = responseIncidencia.data.data;
            const dataHistorial = responseHistorial && responseHistorial.data.data ? responseHistorial.data.data : null;

            console.log("dataIncidencia:", dataIncidencia);

            if (dataIncidencia) {

                descripcion.value = dataIncidencia.descripcion;
                gravedad.value = dataIncidencia.gravedad;

                if (dataHistorial){
                    fechaEntrada.value = dataHistorial.entrada;
                    fechaSalida.value = dataHistorial.salida;
                } else {
                    fechaEntrada.value = 'No hay un historial disponible';
                    fechaSalida.value = 'No hay un historial disponible';
                }
                
                const categoriaData = responseCategoria.data.find(categoria => categoria.id === dataIncidencia.categoria_id);
                categoria.value = categoriaData ? categoriaData.nombre : 'Código no encontrado';

                const maquinaData = responseMaquina.data.find(maquina => maquina.id === dataIncidencia.maquina_id);
                maquina.value = maquinaData ? maquinaData.codigo : 'Máquina no encontrada';

                const tecnicosData = responseTecnicos.data.find(tecnico => tecnico.id === dataIncidencia.tecnico_id);
                listaTecnicos.value = tecnicosData ? tecnicosData.codigo : 'Tecnicos no encontrados';
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
                </div>
            </form>
        </div>
    </div>
</template>