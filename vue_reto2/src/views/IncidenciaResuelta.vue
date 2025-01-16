<script setup>
    import Header from '@/components/Header.vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    function volver(){
        router.push('/operario');
    }

    function detalle(){
        router.push('/incidenciaResueltaView');
    }
</script>

<template>
    <Header />
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="crear-form p-4">
            <h1 class="titulo text-center mb-4">Incidencias resueltas</h1>

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning">Volver</button>
            </div>

            <div class="mb-4">
                <select :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" name="filtroFecha" v-show="!mostrarCrear" class="form-select d-inline-block w-auto">
                    <option value="1">Elegir orden</option>
                    <option value="2">Más antiguas</option>
                    <option value="3">Más recientes</option>
                </select>
            </div>

            <form class="ver">
                <p class="cantIncidencias mb-4">Se han encontrado 32 incidencias resueltas</p>

                <div class="listaIncidencias">
                    <div class="incidenciaResuelta mb-3">
                        <p class="mb-0">Incidencia 1</p>
                        <button @click="detalle" type="button" class="btn btn-detalle btn-sm">Detalle</button>
                    </div>
                    <div class="incidenciaResuelta mb-3">
                        <p class="mb-0">Incidencia 2</p>
                        <button @click="detalle" type="button" class="btn btn-detalle btn-sm">Detalle</button>
                    </div>
                    <div class="incidenciaResuelta mb-3">
                        <p class="mb-0">Incidencia 3</p>
                        <button @click="detalle" type="button" class="btn btn-detalle btn-sm">Detalle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>