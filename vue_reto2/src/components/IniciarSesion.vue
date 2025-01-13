<script setup>
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    function iniciarSesion(){
        router.push('/operario');
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
                    <input type="text" id="username" name="username">
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password">
                </div>
                
                <div class="button-container">
                    <button @click="iniciarSesion" type="button">Acceder</button>
                </div>
            </form>
        </div>
    </div>

  </body>

</template>