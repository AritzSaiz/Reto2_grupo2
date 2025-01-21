@extends('layouts.plublic')
@section('content')

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #FFFFFF;
        }

        .sidebar {
            width: 250px;
            background-color: #000; /* Black background */
            color: white;
            position: fixed;
            top: 56px; /* Assuming your header height is 56px, adjust if different */
            left: 0; /* Position on the left */
            height: calc(100% - 56px); /* Full height minus header height */
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 4px;
        }


    </style>


    <div class="row">

        <div class="col-4">
            <div class="sidebar" id="sidebar">
                <a href="{{route("operario.show")}}">Operarios</a>
                <a href="{{route("tecnico.show")}}">Tecnicos</a>
                <a href="{{route("maquina.show")}}">Maquinas</a>
                <a href="{{route("seccion.show")}}">Secciones</a>
                <a href="{{route("mantenimiento.show")}}">Mantenimientos preventivos</a>
                <a href="{{route("campus.show")}}">Campus</a>
            </div>
        </div>

        <div class="col-6 mt-4">

            <!-- Formulario de Operario -->
            <div class="form-section" id="form-operario">
                <div class="row mb-3">
                    <h1>Añadir Operario </h1>
                </div>
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
        </div>
    </div>
@endsection






