@extends('layouts.plublic')
@section('content')

    <link rel="stylesheet" href="{{ asset('style/style.css') }}">

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

            <!-- Formulario de Sección -->
            <div class="form-section" id="form-seccion">
                <div class="row mb-3">
                    <h1>Añadir seccion </h1>


                    <!-- Mostrar mensajes de éxito o error -->
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
                <form action="{{route('seccion.save')}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label @error('codigo') is-invalid @enderror">Código:</label>
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
                        <label for="campus" class="col-sm-3 col-form-label">Campus:</label>
                        <div class="col-sm-6">
                        <label for="campus" class="col-sm-3 col-form-label">Campus:</label>
                        <div class="col-sm-6">
                            <select id="campus_id" class="form-select" name="campus_id" required>
                                <option value="campus_id">Seleccione un campus</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">{{ $campus->nombre }}</option>
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
@endsection






