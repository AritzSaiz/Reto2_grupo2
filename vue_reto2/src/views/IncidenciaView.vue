<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {isVNode, ref, onMounted} from 'vue';
    import { useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

    import api from '@/plugins/axios';

    const descripcion = ref('')
    const categoria = ref('');
    const gravedad = ref('');
    const maquina = ref('');

    const router = useRouter();

    function volver(){
        router.push('/operario');
    }

    async function fetchDatosIncidencia() {
      try {
        const responseIncidencia = await api.get('/incidencias');
        const responseCategoria = await api.get('/categorias');
        const responseMaquina = await api.get('/maquinas');
        const incidencia = responseIncidencia.data.find(incidencia => incidencia.id === 1);

        if (incidencia) {
            descripcion.value = incidencia.descripcion;
            gravedad.value = incidencia.gravedad;

            const categoriaData = responseCategoria.data.find(categoria => categoria.id === incidencia.categoria_id);
            categoria.value = categoriaData ? categoriaData.nombre : 'Categoría no encontrada';

            const maquinaData = responseMaquina.data.find(maquina => maquina.id === incidencia.maquina_id);
            maquina.value = maquinaData ? maquinaData.nombre : 'Máquina no encontrada';

        } else {
            console.error('No se encontró una incidencia con id 1');
            alert('No se encontró una incidencia con el ID especificado.');
        }
      } catch (error) {
        console.error('Error al cargar las incidencias:', error);
        alert('Hubo un problema al cargar las incidencias. Inténtalo más tarde.');
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