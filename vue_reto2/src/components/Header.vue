<script setup>
    import { onMounted, ref } from 'vue';
    import { useRouter } from 'vue-router';
    import api from '@/plugins/axios';

    const router = useRouter();

    const inciMias = ref('');
    const inciResueltas = ref('');
    const inciNoResueltas = ref('');
    const tecnicoExitoso = ref(false);

    const props = defineProps({
        id: {
            type: [String, Number],
            required: false
        }
    });

    const operarioId = localStorage.getItem('operarioId');

    // TODO : Repasar esto (cambiar nombres...)
    async function verificarTecnico() {
        try {
            const response = await api.get(`/tecnico/${operarioId}`);

            if (response.data) {
                tecnicoExitoso.value = true;
                inciMias.value = 'Mis incidencias';
                inciResueltas.value = 'Incidencias Resueltas';
                inciNoResueltas.value = 'Incidencias NO Resueltas';
            } else {
                tecnicoExitoso.value = false;
                inciMias.value = '';
                inciResueltas.value = '';
                inciNoResueltas.value = '';
            }
        } catch (error) {
            console.error('Error al verificar el técnico:', error);
            tecnicoExitoso.value = false;
            inciMias.value = '';
            inciResueltas.value = '';
            inciNoResueltas.value = '';
        }
    }

    onMounted(() => {
        if(operarioId){
            verificarTecnico();
        } else {
            console.error("No se encontró el ID del operario en localStorage.");
        }
    });

    function volver(){
        if (operarioId) {
            router.push(`/operario/${operarioId}`);
        } else {
            console.error("No se encontró el ID del operario.");
        }
    }

    function cerrarSesion(){
        localStorage.removeItem('operarioId');
        localStorage.removeItem('tiene_tecnico');
        localStorage.removeItem('tecnicoId');
        router.push('/');
    }

    function incidenciasMias(){
        router.push(`/incidenciasMias/${operarioId}`);
    }

    function incidenciasResueltas(){
        router.push(`/incidenciasResueltas/${operarioId}`);
    }

    function incidenciasParticipa(){
        router.push(`/incidenciasParticipa/${operarioId}`);
    }
</script>

<template>
    <header class="header">

      <img class="logo" src="../assets/logoEgibide.png" alt="Logo de Egibide" @click="volver" style="cursor: pointer;">

      <a v-if="tecnicoExitoso" @click="incidenciasMias" class="text-white text-decoration-none" style="cursor: pointer;">{{ inciMias }}</a>
      <a v-if="tecnicoExitoso" @click="incidenciasResueltas" class="text-white text-decoration-none" style="cursor: pointer;">{{ inciResueltas }}</a>
      <a v-if="tecnicoExitoso" @click="incidenciasParticipa" class="text-white text-decoration-none" style="cursor: pointer;">{{ inciNoResueltas }}</a>

      <img class="cerrarSesion" src="../assets/cerrarSesion.png" alt="Icono de cerrar sesión" @click="cerrarSesion" style="cursor: pointer;">
            
    </header>
</template>