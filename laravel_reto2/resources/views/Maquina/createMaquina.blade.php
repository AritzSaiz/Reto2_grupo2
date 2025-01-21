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
            background-color: #000;
            color: white;
            position: fixed;
            top: 56px;
            left: 0;
            height: calc(100% - 56px);
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

        .alert {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    </style>

    <div class="row">

        <div class="col-4">
            <div class="sidebar" id="sidebar">
                <a href="{{ route('operario.show') }}">Operarios</a>
                <a href="{{ route('tecnico.show') }}">Tecnicos</a>
                <a href="{{ route('maquina.show') }}">Maquinas</a>
                <a href="{{ route('seccion.show') }}">Secciones</a>
                <a href="">Mantenimientos preventivos</a>
                <a href="{{ route('campus.show') }}">Campus</a>
            </div>
        </div>

        <div class="col-6 mt-4">

            <!-- Mensajes de éxito y error -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario de Máquina -->
            <div class="form-section" id="form-maquina">
                <div class="row mb-3">
                    <h1>Añadir Maquina</h1>
                </div>
                <form action="{{ route('maquina.save') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label">Código:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="modelo" class="col-sm-3 col-form-label">Modelo:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="prioridad" class="col-sm-3 col-form-label">Prioridad (1-3):</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="prioridad" name="prioridad" value="{{ old('prioridad') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="seccion_id" class="col-sm-3 col-form-label">Sección:</label>
                        <div class="col-sm-6">
                            <select id="seccion_id" class="form-select" name="seccion_id" required>
                                <option value="">Seleccione una sección</option>
                                @foreach ($secciones as $seccion)
                                    <option value="{{ $seccion->id }}" {{ old('seccion_id') == $seccion->id ? 'selected' : '' }}>
                                        {{ $seccion->nombre }}
                                    </option>
                                @endforeach
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
    </div>
@endsection
