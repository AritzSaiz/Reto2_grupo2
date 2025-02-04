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

        <div class="col-6 mt-5">

            <!-- Formulario de Tecnico -->
            <div class="form-section" id="form-seccion">
                <div class="row mb-3">
                    <h1 class="mt-5">Añadir técnico </h1>
                </div>
                    <form action="{{route('tecnico.save')}}" method="post">
                        @csrf

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
                <form action="{{route('tecnico.save')}}" method="post">
                    @csrf

                    <!-- Combobox de Operadores -->
                    <div class="mb-3 row">
                        <label for="operario_id" class="col-sm-3 col-form-label">Operario:</label>
                        <div class="col-sm-6">
                            <select id="operario_id" class="form-select" name="operario_id" required>
                                <option value="">Seleccione un operario</option>
                                @foreach ($operarios as $operario)
                                    <option value="{{ $operario->id }}">{{ $operario->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mb-3 row" id="div-especialidad">
                        <label for="especialidad" class="col-sm-3 col-form-label">Especialidad:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  @error('especialidad') is-invalid @enderror" id="especialidad" name="especialidad">
                        </div>
                    </div>


                        <div class="mb-3 row" id="div-admin">
                            <label class="col-sm-3 col-form-label">Admin:</label>

                            <div class="col-sm-6">
                                <input type="radio" name="admin" value="1" id="admin_si" {{ old('admin') == '1' ? 'checked' : '' }}> Sí
                                <input type="radio" name="admin" value="0" id="admin_no" {{ old('admin') == '0' ? 'checked' : '' }} class="ms-5" checked> No
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
@endsection
