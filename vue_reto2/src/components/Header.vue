<script setup>
    import { useRoute, useRouter } from 'vue-router';

    const route = useRoute();
    const router = useRouter();

    const props = defineProps({
        id: {
            type: [String, Number],
            required: false
        }
    });

    const operarioId = localStorage.getItem('operarioId');

    function volver(){
        if (operarioId) {
            router.push(`/operario/${operarioId}`);
        } else {
            console.error("No se encontró el ID del operario.");
        }
    }

    function cerrarSesion(){
        localStorage.removeItem('operarioId');

        router.push('/');
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

        <a @click="incidenciasResueltas" class="text-white text-decoration-none" style="cursor: pointer;">Incidencias Resueltas</a>
        <a @click="incidenciasParticipa" class="text-white text-decoration-none" style="cursor: pointer;">Incidencias NO Resueltas</a>
            
        <img class="cerrarSesion" src="../assets/cerrarSesion2.png" alt="Icono de cerrar sesión" @click="cerrarSesion" style="cursor: pointer;">
            
    </header>
</template>

<style>
/*
        <div>
            <a href="#" id="botonPerfil" @click="toggleMenu">
                <img class="perfil" src="../assets/perfil.png">
            </a>

            <div id="menuPerfil" class="menuDesplegable" v-show="isMenuVisible" ref="menuPerfil">
                <a href="/">Cerrar sesión</a>
            </div>
        </div>
*/
</style>