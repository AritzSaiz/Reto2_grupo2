<script setup>
    import { ref } from 'vue';

</script>

<template>
    <header class="header">
        <a href="/operario">
            <img class="logo" src="../assets/logoEgibide.png" alt="Logo de Egibide">
        </a>

        <a href="/incidenciasResueltas" class="text-white text-decoration-none">Incidencias Resueltas</a>
        <a href="/incidenciasParticipa" class="text-white text-decoration-none">Incidencias NO Resueltas</a>

        <div>
            <a href="/" id="botonCerrarSesion">
                <img class="cerrarSesion" src="../assets/cerrarSesion2.png" alt="Icono de cerrar sesión">
            </a>
        </div>
        
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