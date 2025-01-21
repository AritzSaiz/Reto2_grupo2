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


            <!-- Formulario de Campus -->
            <div class="form-section" id="form-maquina">
                <div class="row mb-3">
                    <h1>Añadir Campus </h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <form action="{{route('campus.save')}}" method="post">
                    @csrf

                    <!-- Código -->
                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label @error('codigo_postal') is-invalid @enderror">Código:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3 row">
                        <label for="direccion" class="col-sm-3 col-form-label">Dirección:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                    </div>

                    <!-- Código postal -->
                    <div class="mb-3 row">
                        <label for="codigo_postal" class="col-sm-3 col-form-label @error('codigo_postal') is-invalid @enderror">Código postal:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                        </div>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-3 col-form-label">Teléfono:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" required>
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
    </div>
@endsection
