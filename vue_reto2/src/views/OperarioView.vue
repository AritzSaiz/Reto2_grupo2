<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    const mostrarCrear = ref(true);

    function volver(){
        router.push('/');
    }

    function detalle(){
        router.push('/incidencia');
    }
</script>

<template>
    <div class="container">
        <div class="crear-form">

            <h1 class="titulo">Lista de incidencias</h1>

            <div class="volver">
                <button @click="volver" type="button">Volver</button>
            </div>

            <div class="button-group">
                <button :class="{ active: mostrarCrear }" @click="mostrarCrear = true">Crear</button>
                <button :class="{ active: !mostrarCrear }" @click="mostrarCrear = false">Ver</button>
                <select :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" name="filtroEstado" v-show="!mostrarCrear">
                    <option value="1">Todas</option>
                    <option value="2">Pendientes</option>
                    <option value="3">Solucionadas</option>
                </select>
                <select :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" name="filtroFecha" v-show="!mostrarCrear">
                    <option value="1">Elegir orden</option>
                    <option value="2">Más antiguas</option>
                    <option value="3">Más recientes</option>
                </select>
            </div>

            <form class="crear" v-show="mostrarCrear">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                  <textarea id="descripcion" name="descripcion"></textarea>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select name="categoria">
                        <option value="1">Valor 1</option>
                        <option value="2">Valor 2</option>
                        <option value="3">Valor 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gravedad">Gravedad</label>
                    <select name="gravedad">
                        <option value="1">No funciona</option>
                        <option value="2">Si funciona</option>
                        <option value="3">Avería</option>
                        <option value="4">Mantenimiento preventivo</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="otrodato">Otro Dato</label>
                    <input type="text" id="otrodato" name="otrodato">
                </div>

                <div>
                    <button id="crearIncidencia">Crear incidencia</button>
                </div>
            </form>

            <form class="ver" v-show="!mostrarCrear">
                <p>Se han encontrado 32 incidencias</p>

                <div class="listaIncidencias">
                    <div class="incidencia">
                        <p>Incidencia 1</p>
                        <button @click="detalle" type="button">Detalle</button>
                        <button>Resolver</button>
                    </div>
                    <div class="incidencia">
                        <p>Incidencia 2</p>
                        <button @click="detalle" type="button">Detalle</button>
                        <button>Resolver</button>
                    </div>
                    <div class="incidencia">
                        <p>Incidencia 3</p>
                        <button @click="detalle" type="button">Detalle</button>
                        <button>Resolver</button>
                    </div>
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
        background-color: #0E273C;
        color: white;
        border-color: #ccc;
    }

    .crear-form{
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
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    button:hover, select:hover {
        background-color: #f5f5f5;
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

</style>