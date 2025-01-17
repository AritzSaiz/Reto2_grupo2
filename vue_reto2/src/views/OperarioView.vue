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
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="crear-form p-4">
            <h1 class="titulo text-center mb-4" v-show="!mostrarCrear">Creación de incidencias</h1>
            <h1 class="titulo text-center mb-4" v-show="mostrarCrear">Lista de incidencias</h1>

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning">Volver</button>
            </div>

            <div class="button-group mb-4 text-center">
                <button :class="{ active: mostrarCrear }" @click="mostrarCrear = true" class="btn btn-warning me-2">Ver</button>
                <button :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" class="btn btn-warning">Crear</button>
            </div>

            <form class="ver" v-show="mostrarCrear">
                <h2 class="mt-3">Filtros</h2>
                <div class="row">
                    <div class="col">
                        <select name="filtroEstado" class="form-select">
                            <option value="1">Todas</option>
                            <option value="2">Pendientes</option>
                            <option value="3">Solucionadas</option>
                        </select>
                    </div>
                    <div class="col">
                        <select name="filtroFecha" class="form-select">
                            <option value="1">Elegir orden</option>
                            <option value="2">Más antiguas</option>
                            <option value="3">Más recientes</option>
                        </select>
                    </div>
                </div>

                <p class="cantIncidencias mb-0">Se han encontrado 32 incidencias</p>

                <div class="listaIncidencias">
                    <div class="incidencia mb-3">
                        <p class="mb-0">Incidencia 1</p>
                        <button @click="detalle" type="button" class="btn btn-detalle">Detalle</button>
                        <button class="btn btn-resolver">Resolver</button>
                    </div>
                    <div class="incidencia mb-3">
                        <p class="mb-0">Incidencia 2</p>
                        <button @click="detalle" type="button" class="btn btn-detalle">Detalle</button>
                        <button class="btn btn-resolver">Resolver</button>
                    </div>
                    <div class="incidencia mb-3">
                        <p class="mb-0">Incidencia 3</p>
                        <button @click="detalle" type="button" class="btn btn-detalle">Detalle</button>
                        <button class="btn btn-resolver">Resolver</button>
                    </div>
                </div>
            </form>

            <form class="crear" v-show="!mostrarCrear">
                <div class="form-group mb-3">
                    <div class="descripcion">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="datos d-flex mt-3">
                        <div class="col mb-3 me-1">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select name="categoria" class="form-select">
                                <option value="0">-- Selecciona una categoría --</option>
                                <option value="mecanica">Mecánica</option>
                                <option value="electrica">Eléctrica</option>
                                <option value="neumatica">Neumática</option>
                                <option value="hidraulica">Hidráulica</option>
                                <option value="informatica">Informática</option>
                                <option value="instalaciones generales">Instalaciones generales</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>

                        <div class="col mb-3 me-1">
                            <label for="gravedad" class="form-label">Gravedad</label>
                            <select name="gravedad" class="form-select">
                                <option value="0">-- Selecciona la gravedad --</option>
                                <option value="no">No funciona</option>
                                <option value="si">Sí funciona</option>
                                <option value="aviso">Aviso</option>
                                <option value="mantenimiento">Mantenimiento preventivo</option>
                            </select>
                        </div>

                        <div class="col mb-3">
                            <label for="máquina" class="form-label">Máquina</label>
                            <select name="máquina" class="form-select">
                                <option value="0">-- Selecciona la máquina --</option>
                                <option value="id1">Máquina 1</option>
                                <option value="id2">Máquina 2</option>
                                <option value="id3">Máquina 3</option>
                                <option value="id4">Máquina 4</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <button id="crearIncidencia" class="btn btn-warning">Crear incidencia</button>
                </div>
            </form>
        </div>
    </div>
</template>