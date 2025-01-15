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
                <div class="form-group-resuelta">
                    <div class="descripcion">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" readonly></textarea>
                    </div>

                    <div class="datos">
                        <div class="categoria">
                            <label for="categoria">Categoría</label>
                            <input id="categoria" name="categoria" readonly>
                        </div>

                        <div class="gravedad">
                            <label for="gravedad">Gravedad</label>
                            <input id="gravedad" name="gravedad" readonly>
                        </div>

                        <div class="maquina">
                            <label for="máquina">Máquina</label>
                            <input id="máquina" name="máquina" readonly>
                        </div>

                        <div class="fechaEntrada">
                            <label for="fechaEntrada">Fecha de Entrada</label>
                            <input id="fechaEntrada" name="fechaEntrada" readonly>
                        </div>

                        <div class="fechaSalida">
                            <label for="fechaSalida">Fecha de Salida</label>
                            <input id="fechaSalida" name="fechaSalida" readonly>
                        </div>
                    </div>

                    <div class="tecnicos">
                        <label for="tecnicos">Lista de técnicos que han participado en esta incidencia</label>
                        <textarea id="tecnicos" name="tecnicos" readonly></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>