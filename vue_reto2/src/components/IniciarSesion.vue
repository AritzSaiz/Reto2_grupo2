<script setup>
  import {isVNode, ref} from 'vue';
</script>

<template>

  <body id="login">

  <div class="container">
    <div class="login-form">

      <h1>Iniciar Sesión</h1>

      <form>
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" id="usuario" name="usuario">
        </div>

        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" id="usuario" name="usuario">
        </div>

        <div class="button-container">
          <button type="submit">Acceder</button>
        </div>
      </form>
    </div>
  </div>

  </body>

</template>

<!-- Con "scoped" se especifica que solo se utilicen los estilos en esta ventana. -->
<style scoped>

/*
Los estilos estarán en el archivo "/src/assets/main.css".
*/

</style>