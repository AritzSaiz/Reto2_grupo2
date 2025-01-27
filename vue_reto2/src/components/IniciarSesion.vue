<script setup>
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    import api from '@/plugins/axios';

    const router = useRouter();

    const username = ref('')
    const password = ref('');
    const usernameInput = ref(null);
    const passwordInput = ref(null);

    const datos = ref([]);

    async function iniciarSesion(){

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

      try{
        const response = await api.post(`/login`, {
          usuario: username.value,
          contrasena: password.value,
        });

        const { operarioId } = response.data;

        if (operarioId){
          localStorage.setItem('operarioId', operarioId);

          await verificarTecnico(operarioId, response);

          router.push(`/operario/${operarioId}`);
        }
        else {
          alert('Error al iniciar sesión. Inténtalo más tarde.');
        }
      } catch (error) {
        console.error('Error al iniciar sesión:', error);
        alert('Usuario o contraseña incorrectos.');
      }

    }

    async function verificarTecnico(operarioId, responseLogin) {
        try {
            const response = await api.get(`/tecnico/${operarioId}`);

            const { tecnicoId } = responseLogin.data;

            if (response.data) {
                localStorage.setItem('tiene_tecnico', true); // El operario es técnico
                localStorage.setItem('tecnicoId', tecnicoId);
            } else {
                localStorage.setItem('tiene_tecnico', false); // El operario no es técnico
            }
        } catch (error) {
            console.error('Error al verificar el técnico:', error);
            localStorage.setItem('tiene_tecnico', false); // En caso de error, lo consideramos un operario no técnico
        }
    }

</script>

<template>

<body id="login">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-form p-4 border rounded shadow-sm" style="max-width: 400px;">
            
            <h1 class="text-center text-white mb-4">Iniciar Sesión</h1>
            
            <form action="" method="post">
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
