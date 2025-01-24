<script setup>
    import IniciarSesion from '@/components/IniciarSesion.vue';
    import {isVNode, ref} from 'vue';
    import { useRoute, useRouter } from 'vue-router';
    import Header from '../components/Header.vue';

    const props = defineProps({
        id: {
            type: [String, Number],
            required: true
        }
    });

    const router = useRouter();
    const route = useRoute();

    function volver(){
        const operarioId = localStorage.getItem('operarioId');
        if (operarioId) {
            router.push(`/operario/${operarioId}`);
        } else {
            console.error("No se encontró el ID del operario.");
        }
    }
</script>

<template>
    <Header />
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="incidencia-form">

            <h1 class="fw-bold fs-1 mb-4">Detalles de la incidencia</h1>

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning mb-4">Volver</button>
            </div>
            
            <form>
                <div class="form-group-resuelta mb-4">
                    <div class="descripcion">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" readonly></textarea>
                    </div>

                    <div class="datos d-flex">
                        <div class="categoria">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input id="categoria" name="categoria" readonly>
                        </div>

                        <div class="gravedad">
                            <label for="gravedad" class="form-label">Gravedad</label>
                            <input id="gravedad" name="gravedad" readonly>
                        </div>

                        <div class="maquina">
                            <label for="máquina" class="form-label">Máquina</label>
                            <input id="máquina" name="máquina" readonly>
                        </div>

                        <div class="fechaEntrada">
                            <label for="fechaEntrada" class="form-label">Fecha de Entrada</label>
                            <input id="fechaEntrada" name="fechaEntrada" readonly>
                        </div>

                        <div class="fechaSalida">
                            <label for="fechaSalida" class="form-label">Fecha de Salida</label>
                            <input id="fechaSalida" name="fechaSalida" readonly>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="tecnicos" class="form-label">Lista de técnicos que han participado en esta incidencia</label>
                        <textarea id="tecnicos" name="tecnicos" class="form-control" readonly></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>