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
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="incidencia-form">

            <h1 class="fw-bold fs-1">Detalles de la incidencia</h1>

            <div class="mb-4">
                <button @click="volver" type="button" class="btn btn-warning mb-4">Volver</button>
            </div>
            
            <form class="verIncidencia">
                <div class="form-group">
                    <div class="descripcion">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" readonly></textarea>
                    </div>

                    <div class="datos d-flex">
                        <div class="col me-2">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input id="categoria" name="categoria"  readonly>
                        </div>

                        <div class="col me-2">
                            <label for="gravedad" class="form-label">Gravedad</label>
                            <input id="gravedad" name="gravedad" readonly>
                        </div>

                        <div class="col">
                            <label for="máquina" class="form-label">Máquina</label>
                            <input id="máquina" name="máquina" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>