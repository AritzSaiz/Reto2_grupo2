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
        <div>
            <a href="#" id="botonPerfil" @click="toggleMenu">
                <img class="perfil" src="../assets/perfil.png">
            </a>

            <div id="menuPerfil" class="menuDesplegable" v-show="isMenuVisible" ref="menuPerfil">
                <ul>
                    <li class="l_botonPerfil">
                        <a href="/operario">Ver perfil</a>
                    </li>
                    <li class="l_botonResueltas">
                        <a href="/incidenciasResueltas">Incidencias Resueltas</a>
                    </li>
                    <li class="l_botonSinResolver">
                        <a href="/incidenciasParticipa">Incidencias NO Resueltas</a>
                    </li>
                    <li>
                        <a href="/">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</template>