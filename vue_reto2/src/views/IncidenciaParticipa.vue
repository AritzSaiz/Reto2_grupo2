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
    <div class="container">
        
        <div class="crear-form">

            <h1 class="titulo">Incidencias en las que ha participado</h1>

            <div class="volver">
                <button @click="volver" type="button">Volver</button>
            </div>

            <div class="button-group">
                <select :class="{ active: !mostrarCrear }" @click="mostrarCrear = false" name="filtroFecha" v-show="!mostrarCrear">
                    <option value="1">Elegir orden</option>
                    <option value="2">Más antiguas</option>
                    <option value="3">Más recientes</option>
                </select>
            </div>

            <form class="ver">
                <p class="cantIncidencias">Se han encontrado 32 incidencias</p>

                <div class="listaIncidencias">
                    <div class="incidenciaResuelta">
                        <p>Incidencia 1</p>
                        <button @click="detalle" type="button">Detalle</button>
                    </div>
                    <div class="incidenciaResuelta">
                        <p>Incidencia 2</p>
                        <button @click="detalle" type="button">Detalle</button>
                    </div>
                    <div class="incidenciaResuelta">
                        <p>Incidencia 3</p>
                        <button @click="detalle" type="button">Detalle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>