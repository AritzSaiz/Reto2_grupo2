<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    function volver(){
        router.push('/operario');
    }
</script>

<template>
    <div class="container">
        <div class="incidencia-form">

            <h1 class="titulo">Detalles de la incidencia</h1>

            <div class="volver">
                <button @click="volver" type="button">Volver</button>
            </div>
            
            <form class="verIncidencia">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" readonly></textarea>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select name="categoria" disabled>
                        <option value="1">Valor 1</option>
                        <option value="2">Valor 2</option>
                        <option value="3">Valor 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gravedad">Gravedad</label>
                    <select name="gravedad" disabled>
                        <option value="1">No funciona</option>
                        <option value="2">Si funciona</option>
                        <option value="3">Avería</option>
                        <option value="4">Mantenimiento preventivo</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="otrodato">Otros Datos</label>
                    <input type="text" id="otrodato" name="otrodato" readonly>
                </div>
            </form>
        </div>
    </div>
</template>

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .volver{
        margin-bottom: 1.5em;
    }

    button.active {
        background-color: #FF5733;
        border-color: #AAB0B6;
    }

    .incidencia-form{
        width: 90vh;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 24px;
    }

    button, select {
        padding: 8px 24px;
        background-color: white;
        border: 1px solid #AAB0B6;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    button:hover, select:hover {
        background-color: #FFC300;
    }

    .button-group {
        display: flex;
        gap: 1.5em;
        margin-bottom: 4em;
    }

    select {
        width: 15vh;
        text-align: center;
        text-align-last: center;
        padding: 1px;
    }

    select option{
        text-align: center;
    }

    #descripcion{
        height: 10vh;
    }

    .incidencia{
        display: flex;
        justify-content: space-between;
        background-color: white;
        padding: 0.3em;
        border-radius: 0.5em;
        margin-top: 1em;
    }

    .incidencia p{
        display: flex;
        align-self: center;
    }

    .titulo{
        font-size: 3rem;
        font-weight: bold;
    }

    .verIncidencia .form-group label, .incidencia-form h1, .cantIncidencias{
        color: #AAB0B6;
    }

</style>