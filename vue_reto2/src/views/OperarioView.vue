<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

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
    <Header />
    <div class="container">
        
        <div class="crear-form">

            <h1 class="titulo" v-show="mostrarCrear">Creación de incidencias</h1>
            <h1 class="titulo" v-show="!mostrarCrear">Lista de incidencias</h1>

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
                    <label for="máquina">Máquina</label>
                    <select name="máquina">
                        <option value="1">Máquina 1</option>
                        <option value="2">Máquina 2</option>
                        <option value="3">Máquina 3</option>
                        <option value="4">Máquina 4</option>
                    </select>
                </div>

                <div>
                    <button id="crearIncidencia">Crear incidencia</button>
                </div>
            </form>

            <form class="ver" v-show="!mostrarCrear">
                <p class="cantIncidencias">Se han encontrado 32 incidencias</p>

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