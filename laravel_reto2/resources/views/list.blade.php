@extends('layouts.plublic')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>Lista</h1>
        </div>
    </div>

    <div class="col mb-3">
        <div class="row align-items-center">
            <label for="combo" class="col-sm-3 form-label">Selecciona una opción:</label>
            <div class="col-sm-3">
                <select id="combo" class="form-select" name="opcion">
                    <option value="">Seleccione una opción</option>
                    <option value="operador">Operador</option>
                    <option value="tecnico">Tecnico</option>
                    <option value="maquina">Máquina</option>
                    <option value="seccion">Sección</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Operador-->
    <div id="form-operador" class="card mb-3 eleccion" style="display: none;">
        <div class="card-body">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12 col-md-4 mb-3">
                    <p class="card-title mb-0">Nombre</p>
                </div>
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <p class="mb-0">Apellidos</p>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="btn btn-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tecnico -->
    <div id="form-tecnico" class="card mb-3 eleccion" style="display: none;">
        <div class="card-body">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12 col-md-3 mb-3">
                    <p class="card-title mb-0">Nombre</p>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <p class="mb-0">Apellidos</p>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <p class="mb-0">Especialización</p>
                </div>
                <div class="col-12 col-md-3">
                    <a href="#" class="btn btn-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Maquina -->
    <div id="form-maquina" class="card mb-3 eleccion" style="display: none;">
        <div class="card-body">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12 col-md-3 mb-3">
                    <p class="card-title mb-0">Código</p>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <p class="mb-0">Nombre</p>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <p class="mb-0">Modelo</p>
                </div>
                <div class="col-12 col-md-3">
                    <a href="#" class="btn btn-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seccion -->
    <div id="form-seccion" class="card mb-3 eleccion" style="display: none;">
        <div class="card-body">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12 col-md-4 mb-3">
                    <p class="card-title mb-0">Código</p>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <p class="mb-0">Campus</p>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="btn btn-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.getElementById('combo').addEventListener('change', function () {
        // Ocultar todas las tarjetas
        const forms = document.querySelectorAll('.eleccion');
        forms.forEach(form => form.style.display = 'none');

        // Mostrar la tarjeta seleccionada
        const selectedValue = this.value;
        if (selectedValue) {
            const selectedForm = document.getElementById(`form-${selectedValue}`);
            if (selectedForm) {
                selectedForm.style.display = 'block';
            }
        }
    });
</script>

