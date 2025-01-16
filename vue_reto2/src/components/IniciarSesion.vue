<script setup>
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    const username = ref("");
    const password = ref("");
    const usernameInput = ref(null);
    const passwordInput = ref(null);

    function iniciarSesion(){
        if (username.value != "" && password.value != ""){
            router.push('/operario');
        }
        else if (username.value == ""){
            alert("El usuario no puede estar vacío");
            usernameInput.value.focus();   
        }
        else if (password.value == ""){
            alert("La contraseña no puede estar vacía");
            passwordInput.value.focus();  
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
