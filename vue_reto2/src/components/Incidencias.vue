<script setup>
  import {isVNode, ref} from 'vue';
</script>

<template>

  <body id="incidencias">

  <header class="header">
    <div class="logo">Egibide</div>
    <div class="user-icon">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2">
        <circle cx="12" cy="8" r="4"/>
        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
      </svg>
    </div>
  </header>

  <main class="main-content">
    <h2 class="frame-title">Listado de incidencias</h2>

    <div class="actions">
      <button class="btn btn-create">Crear</button>
      <button class="btn btn-view">Ver</button>
      <button class="btn btn-filter">Filtros ▼</button>
    </div>

    <div class="status-filters">
      <button class="status-btn status-pending">Pendiente (28)</button>
      <button class="status-btn status-in-progress">En proceso (32)</button>
      <button class="status-btn status-critical">Grave (7)</button>
      <button class="status-btn status-low">Leve (12)</button>
      <button class="status-btn status-medium">Media (52)</button>
    </div>

    <div class="incidents-list">
      <div class="incident">
        <span>Incidencia 1</span>
        <button class="detail-btn">Detalle</button>
      </div>
      <div class="incident">
        <span>Incidencia 2</span>
        <button class="detail-btn">Detalle</button>
      </div>
      <div class="incident">
        <span>Incidencia 3</span>
        <button class="detail-btn">Detalle</button>
      </div>
      <div class="incident">
        <span>Incidencia 4</span>
        <button class="detail-btn">Detalle</button>
      </div>
    </div>
  </main>

  <footer class="footer"></footer>

  </body>

</template>