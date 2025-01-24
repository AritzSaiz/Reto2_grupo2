<script setup>
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    const username = ref("");
    const password = ref("");
    const usernameInput = ref(null);
    const passwordInput = ref(null);

    async function iniciarSesion(){
        try{

          // Validar que los campos no estén vacíos
          if (username.value === "" && password.value === "") {
            alert("Las casillas no pueden estar vacías.");
            usernameInput.value.focus();
            return;
          }
          else if (username.value === "") {
            alert("El usuario no puede estar vacío.");
            usernameInput.value.focus();
            return;
          }
          else if (password.value === "") {
            alert("La contraseña no puede estar vacía.");
            passwordInput.value.focus();
            return;
          }

          // TODO : Poner sin validaciones a la BD, y luego ya descomentar y corregir.
          router.push('/operario');

          /*
          // Enviar solicitud para verificar usuario y contraseña.
          const response = await api.post('/login', {
            username: username.value,
            password: password.value,
          });

          // Verificar si los datos están registrados y se puede hacer login.
          if (response.data && response.data.usuario_id) {
            // Guardar usuario_id en LocalStorage
            localStorage.setItem('usuario_id', response.data.usuario_id);

            // Redirigir al usuario a la pantalla de operario.
            router.push('/operario');
          }
          else {
            alert("Usuario o contraseña incorrectos.");
          }
           */

        }
        catch (error) {
            console.error('Error al iniciar sesión:', error);
            alert('Hubo un problema al iniciar sesión. Inténtalo más tarde.');
        }
    }

</script>

<template>

<body id="login">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-form p-4 border rounded shadow-sm" style="max-width: 400px;">

          <h1 class="text-center text-white mb-4">Iniciar Sesión</h1>

          <!-- "@submit.prevent": Evitar que se recargue la página al enviar el formulario. -->
          <form @submit.prevent="iniciarSesion">
            <div class="mb-3">
              <label for="username" class="form-label">Usuario</label>
              <input type="text" id="username" v-model="username" ref="usernameInput" autofocus class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" id="password" v-model="password" ref="passwordInput" class="form-control" required>
            </div>

            <div class="d-grid">
              <button @click="iniciarSesion" type="button" class="btn fw-bold">Acceder</button>
            </div>
          </form>

        </div>
    </div>
</body>
</template>
