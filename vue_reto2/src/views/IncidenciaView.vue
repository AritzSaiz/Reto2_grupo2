<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {isVNode, ref} from 'vue';
    import { useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

    const router = useRouter();

    function volver(){
        router.push('/operario');
    }
</script>

<template>
    <Header />
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
                    <label for="máquina">Máquina</label>
                    <input id="máquina" name="máquina" readonly>
                </div>
            </form>
        </div>
    </div>
</template>