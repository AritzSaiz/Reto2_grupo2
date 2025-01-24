<script setup>
    import {ref, onMounted} from 'vue';
    import { useRouter, useRoute } from 'vue-router';
    import Header from '../components/Header.vue';

    import api from '@/plugins/axios';

    const props = defineProps({
        id: {
            type: [String, Number],
            required: true
        }
    });

    const descripcion = ref('')
    const categoria = ref('');
    const gravedad = ref('');
    const maquina = ref('');

    const router = useRouter();
    const route = useRoute();

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
        const responseCategoria = await api.get('/categorias');
        const responseMaquina = await api.get('/maquinas');
        const data = responseIncidencia.data.data;
        
        if (data) {
            descripcion.value = data.descripcion;
            gravedad.value = data.gravedad;

            const categoriaData = responseCategoria.data.find(categoria => categoria.id === data.categoria_id);
            categoria.value = categoriaData ? categoriaData.nombre : 'Categoría no encontrada';

            const maquinaData = responseMaquina.data.find(maquina => maquina.id === data.maquina_id);
            maquina.value = maquinaData ? maquinaData.nombre : 'Máquina no encontrada';
        } else {
            alert('No se encontró una incidencia con el ID especificado.');
        }
      } catch (error) {
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
                <div class="form-group mb-4">
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

                        <div class="col">
                            <label for="máquina" class="form-label">Máquina</label>
                            <input id="máquina" name="máquina" readonly v-model="maquina">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>