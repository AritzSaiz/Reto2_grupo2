@extends('layouts.plublic')
@section('content')

    <link rel="stylesheet" href="{{ asset('style/style.css') }}">

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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Error en la creación del operario</li>
                            </ul>
                        </div>
                    @endif


                </div>
                <form action="{{ route('operario.save') }}" method="post">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Apellidos -->
                    <div class="mb-3 row">
                        <label for="apellidos" class="col-sm-3 col-form-label">Apellidos:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                            @error('apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="mb-3 row">
                        <label for="usuario" class="col-sm-3 col-form-label">Usuario:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
                            @error('usuario')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3 row">
                        <label for="contrasena" class="col-sm-3 col-form-label">Contraseña:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena" required>
                            @error('contrasena')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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






