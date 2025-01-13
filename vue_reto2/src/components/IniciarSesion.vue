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

<!-- Con "scoped" se especifica que solo se utilicen los estilos en esta ventana. -->
<style>

/*
Los estilos estarán en el archivo "/src/assets/main.css".
*/

* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        justify-content: center; /* Centra horizontalmente */
        align-items: center; /* Centra verticalmente */
        background-color: #E6D7E6; /* Ajusta el fondo */
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #E6D7E6;
    }

    .container {
        min-height: 100vh;
        min-width: unset;
        width: 100vh;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        
    }

    .login-form {
        background-color: #D8C5D8;
        border-radius: 24px;
        padding: 32px;
        width: 100%;
        max-width: 320px;
        margin: 0 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        text-align: center;
        margin-bottom: 32px;
        font-size: 24px;
        font-weight: normal;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: white;
        font-size: 14px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 24px;
    }

    button {
        padding: 8px 24px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    button:hover {
        background-color: #f5f5f5;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
</style>