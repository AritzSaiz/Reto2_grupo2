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
            <div class="login-form card p-4 shadow-lg">
                <div class="text-center mb-4">
                    <h1>Iniciar Sesión</h1>
                </div>

                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="username" class="form-label">Usuario</label>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-12">
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-12">
                            <label for="password" class="form-label">Contraseña</label>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <div class="row button-container text-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Acceder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </body>
</template>

<style>
    .login-form {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #login {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        justify-content: center; /* Centra horizontalmente */
        align-items: center; /* Centra verticalmente */
    }

    .container {
        min-height: 100vh;
        min-width: unset;
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;

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

    input, #descripcion {
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

    button:hover, select:hover{
        background-color: #FFC300;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
</style>