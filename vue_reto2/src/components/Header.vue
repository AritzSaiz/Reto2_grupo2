<script setup>
    import { ref, onMounted } from 'vue';

    const menuPerfil = ref(null);
    const isMenuVisible = ref(false);

    const toggleMenu = (e) => {
        e.preventDefault();
        e.stopPropagation();
        isMenuVisible.value = !isMenuVisible.value;
    };

    const closeMenu = (e) => {
        if (isMenuVisible.value && !menuPerfil.value.contains(e.target)) {
            isMenuVisible.value = false;
        }
    };

    onMounted(() => {
        document.addEventListener("click", closeMenu);
    });

</script>

<template>
    <header class="header">
        <a href="/operario">
            <img class="logo" src="../assets/logoEgibide.png">
        </a>

        <a href="/incidenciasResueltas" class="text-white text-decoration-none">Incidencias Resueltas</a>
        <a href="/incidenciasParticipa" class="text-white text-decoration-none">Incidencias NO Resueltas</a>

        <div>
            <a href="#" id="botonPerfil" @click="toggleMenu">
                <img class="perfil" src="../assets/perfil.png">
            </a>

            <div id="menuPerfil" class="menuDesplegable" v-show="isMenuVisible" ref="menuPerfil">
                <a href="/">Cerrar sesión</a>
            </div>
        </div>
    </header>
</template>