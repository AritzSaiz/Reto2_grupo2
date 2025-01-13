<script setup>
  import IniciarSesion from '../components/IniciarSesion.vue'
</script>

<template>
  <main>
    <IniciarSesion />
  </main>
  <nav>
    <RouterLink to="/">Home </RouterLink>
    <RouterLink to="/operario">VentanaOperarios</RouterLink>
  </nav>
</template>
