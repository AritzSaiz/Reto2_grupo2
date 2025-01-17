@extends('layouts.plublic')
@section('content')
    <style>
        .btn-create {
            background-color: #FFC300;
            color: black;
        }

        .frame-title {
            color: #0A3D62;
            margin-bottom: 20px;
            font-size: 3em;
        }

        .form-section {
            display: none;
        }

        .form-label {
            display: flex;
            align-items: center;
        }

        .form-select,
        .form-control {
            height: calc(2.5rem + 2px);
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center my-4 frame-title">Crear</h1>

            <div class="col mb-3">
                <div class="row align-items-center">
                    <label for="combo" class="col-sm-3 form-label">Selecciona una opción:</label>
                    <div class="col-sm-3">
                        <select id="combo" class="form-select" name="opcion">
                            <option value="">Seleccione una opción</option>
                            <option value="operario">Operario</option>
                            <option value="tecnico">Tecnico</option>
                            <option value="maquina">Máquina</option>
                            <option value="seccion">Sección</option>
                            <option value="mantenimiento">Mantenimiento Preventivo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mostrar mensajes de éxito o error -->
        @if (session('success'))
            <div class="mensajeNuevo">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mensajeNuevo">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario de Usuario -->
        <div class="form-section" id="form-operario">
            <form action="{{ route('operario.save') }}" method="post">
                @csrf

                <!-- Nombre -->
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="mb-3 row">
                    <label for="apellidos" class="col-sm-3 col-form-label">Apellidos:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <!-- Usuario -->
                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-3 col-form-label">Usuario:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="mb-3 row">
                    <label for="contrasena" class="col-sm-3 col-form-label">Contraseña:</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                </div>

                <!-- Botón enviar -->
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-create">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Formulario de Tecnico -->
        <div class="form-section" id="form-tecnico">
            <form action="" method="post">
                @csrf
                <div class="mb-3 row" id="div-especialidad">
                    <label for="especialidad" class="col-sm-3 col-form-label">Especialidad:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="especialidad" name="especialidad">
                    </div>
                </div>

                <div class="mb-3 row" id="div-admin">
                    <label class="col-sm-3 col-form-label">Admin:</label>
                    <div class="col-sm-6">
                        <input type="radio" name="admin" value="si"> Sí
                        <input type="radio" name="admin" value="no" class="ms-5" checked> No
                    </div>
                </div>

                <!-- Combobox de Operadores -->
                <div class="mb-3 row">
                    <label for="usuario_id" class="col-sm-3 col-form-label">Seleccionar Operador:</label>
                    <div class="col-sm-6">
                        <select id="usuario_id" class="form-select" name="usuario_id" required>
                            <option value="">Seleccione un operador</option>

                        </select>
                    </div>
                </div>


                <!-- Botón enviar -->
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-create">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Formulario de Máquina -->
        <div class="form-section" id="form-maquina">
            <form action="{{route('maquina.save')}}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-3 col-form-label">Código:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="modelo" class="col-sm-3 col-form-label">Modelo:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="modelo" name="modelo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="prioridad" class="col-sm-3 col-form-label">Prioridad (1-3):</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="prioridad" name="prioridad" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="combobox" class="col-sm-3 col-form-label">Selecciona una sección:</label>
                    <div class="col-sm-6">
                        <select id="combobox" class="form-select" name="opcion">
                            <option value="seccion1">Sección 1</option>
                            <option value="seccion2">Sección 2</option>
                            <option value="seccion3">Sección 3</option>
                            <option value="seccion4">Sección 4</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-create">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Formulario de Sección -->
        <div class="form-section" id="form-seccion">
            <form action="{{route('seccion.save')}}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-3 col-form-label">Código:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="campus" class="col-sm-3 col-form-label">Campus:</label>
                    <div class="col-sm-6">
                        <select id="campus" class="form-select" name="campus">
                            <option value="Arriaga">Arriaga</option>
                            <option value="Jesús Obrero">Jesús Obrero</option>
                            <option value="Molinuevo">Molinuevo</option>
                            <option value="Nieves Cano">Nieves Cano</option>
                            <option value="Mendizorroza">Mendizorroza</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-create">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to show the selected form
            document.getElementById('combo').addEventListener('change', function () {
                // Hide all forms
                const forms = document.querySelectorAll('.form-section');
                forms.forEach(form => {
                    form.style.display = 'none';
                });

                // Show the selected form
                const selectedValue = this.value;
                if (selectedValue) {
                    const formToShow = document.getElementById(`form-${selectedValue}`);
                    if (formToShow) {
                        formToShow.style.display = 'block';
                    }
                }
            });
        });
    </script>

@endsection
