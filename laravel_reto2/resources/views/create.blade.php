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
                        <option value="usuario">Usuario</option>
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

    <!-- Usuarios -->
    <div class="form-section" id="form-usuario">
        <form action="{{route('admin.save')}}" method="post">
            @csrf

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="usuario" class="col-sm-3 col-form-label">Usuario:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="contrasena" class="col-sm-3 col-form-label">Contraseña:</label>
                <div class="col-sm-6">
                    <!--<input type="password" class="form-control" id="contrasena" name="contrasena" required>-->
                    <input type="text" class="form-control" id="contrasena" name="contrasena" required>

                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Tipo:</label>
                <div class="col-sm-6">
                    <input type="radio" name="tipo" value="Operario" id="tipoOperario" checked> Operario
                    <input type="radio" name="tipo" value="Tecnico" id="tipoTecnico" class="ms-5"> Técnico
                </div>
            </div>

            <!-- Tecnico -->
            <div class="mb-3 row" id="especialidad" >
                <label for="especialidad" class="col-sm-3 col-form-label">Especialidad:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                </div>
            </div>


            <div class="mb-3 row" id="admin" >
                <label class="col-sm-3 col-form-label">Admin:</label>
                <div class="col-sm-6">
                    <input type="radio" name="admin" value="si"> Sí
                    <input type="radio" name="admin" value="no" class="ms-5" checked> No
                </div>
            </div>

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
                <!--
                 <div class="col-sm-6">
                    <select id="campus" class="form-select" name="campus">
                        <option value="campus1">Arriga</option>
                        <option value="campus2">Jesús Obrero</option>
                        <option value="campus3">Molinuevo</option>
                        <option value="campus4">Nieves Cano</option>
                        <option value="campus5">Mendizorroza</option>
                    </select>
                </div>
                -->

                <div class="col-sm-6">
                    <input type="text" class="form-control" id="campus" name="campus" required>
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
      // Función para mostrar el formulario correspondiente
      document.getElementById('combo').addEventListener('change', function () {
          // Ocultar todos los formularios
          const forms = document.querySelectorAll('.form-section');
          forms.forEach(form => form.style.display = 'none');
          // Mostrar el formulario seleccionado
          const selectedValue = this.value;
          if (selectedValue) {
              document.getElementById(`form-${selectedValue}`).style.display = 'block';
          }
      });

</script>

@endsection


