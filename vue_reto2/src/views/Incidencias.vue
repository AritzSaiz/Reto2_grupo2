<script setup>

</script>

<template>

</template>

<style scoped>

</style>













<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Egilbide - Incidencias</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: #FFFFFF;
    }

    .header {
      background-color: #0A3D62;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      color: #FFFFFF;
      font-size: 1.5em;
      font-weight: bold;
    }

    .user-icon {
      background-color: #AAB0B6;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .main-content {
      flex: 1;
      padding: 20px;
      background-color: #EAEDED;
    }

    .frame-title {
      color: #0A3D62;
      margin-bottom: 20px;
      font-size: 1.2em;
    }

    .actions {
      display: flex;
      gap: 10px;
      margin-bottom: 30px;
    }

    .btn {
      padding: 8px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn-create {
      background-color: #FFC300;
      color: black;
    }

    .btn-view {
      background-color: #AAB0B6;
      color: #0A3D62;
    }

    .btn-filter {
      background-color: #ffe48c;
      color: #0A3D62;
    }

    .incidents-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .incident {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #FFFFFF;
      padding: 15px;
      border-radius: 4px;
      border-left: 4px solid #0A3D62;
    }

    .detail-btn {
      background-color: #0A3D62;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .detail-btn:hover {
      background-color: #FF5733;
    }

    .footer {
      background-color: #0A3D62;
      height: 20px;
    }

    /* Add new styles for status filters */
    .status-filters {
      display: flex;
      gap: 10px;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }

    .status-btn {
      padding: 6px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      color: white;
      transition: opacity 0.2s;
    }

    .status-btn:hover {
      opacity: 0.9;
    }

    .status-pending {
      background-color: #FFC300;
      color: #0A3D62;
    }

    .status-in-progress {
      background-color: #FF5733;
    }

    .status-critical {
      background-color: #C0392B;
    }

    .status-low {
      background-color: #28A745;
    }

    .status-medium {
      background-color: #AAB0B6;
      color: #0A3D62;
    }
  </style>
</head>
<body>
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

  <!-- New status filter buttons -->
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
</html>