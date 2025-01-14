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

    <div class="container">
        <div class="login-form">

            <h1>Iniciar Sesión</h1>
            
            <form>
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" v-model="username" ref="usernameInput" autofocus>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" v-model="password" ref="passwordInput">
                </div>
                
                <div class="button-container">
                    <button @click="iniciarSesion" type="button">Acceder</button>
                </div>
            </form>
        </div>
    </div>

  </body>

</template>