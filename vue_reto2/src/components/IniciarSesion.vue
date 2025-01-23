<script setup>
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    import api from '@/plugins/axios';

    const router = useRouter();

    const username = ref("");
    const password = ref("");
    const usernameInput = ref(null);
    const passwordInput = ref(null);

    const datos = ref([]);

    async function iniciarSesion(){
        try{
            if (username.value === "" && password.value === ""){
              alert("Las casillas no pueden estar vacías.");
              usernameInput.value.focus();
            }
            else {
              if (username.value !== "" && password.value !== ""){
                // TODO : Verificar que existe con esos 2 datos.
                //  Habrá que mandar el user y la contra para mirar que están registrados juntos, y luego guardar el 'usuario_id' en LocalStorage (por ejemplo) para luego poder acceder a él y ver sus incidencias y demás.
                /*
                const response = await api.get('/operario/${usernameInput.value}/${passwordInput.value}');
                datos.value = response.data.data;
                 */
                // Si existe habrá que ir a esta ventana:
                router.push('/operario');
              }
              else if (username.value === ""){
                alert("El usuario no puede estar vacío.");
                usernameInput.value.focus();
              }
              else {
                alert("La contraseña no puede estar vacía.");
                passwordInput.value.focus();
              }
            }
        } catch (error) {
            console.error('Error al iniciar sesión:', error);
            alert('Usuario o contraseña incorrectos.');
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
