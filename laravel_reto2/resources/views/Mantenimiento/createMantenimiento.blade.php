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


            <!-- Formulario de Mantenimiento -->
            <div class="form-section" id="form-maquina">
                <div class="row mb-3">
                    <h1>Añadir Mantenimiento</h1>
                </div>
                <form action="{{route('mantenimiento.save')}}" method="post">
                    @csrf

                    <!-- Descripción -->
                    <div class="mb-3 row">
                        <label for="descripcion" class="col-sm-3 col-form-label">Descripción:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                    </div>

                    <!-- Dias -->
                    <div class="mb-3 row">
                        <label for="dias" class="col-sm-3 col-form-label">Dias:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="dias" name="dias" required>
                        </div>
                    </div>

                    <!-- Primera revision -->
                    <div class="mb-3 row">
                        <label for="primera_revision" class="col-sm-3 col-form-label">Primera Revisión:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="primera_revision" name="primera_revision" required>
                        </div>
                    </div>

                    <!-- Maquina id -->
                    <div class="mb-3 row">
                        <label for="maquina_id" class="col-sm-3 col-form-label">Máquina:</label>
                        <div class="col-sm-6">
                            <select id="maquina_id" class="form-select" name="maquina_id" required>
                                <option value="">Seleccione una maquina</option>
                                @foreach ($maquinas as $maquina)
                                    <option value="{{ $maquina->id }}">{{ $maquina->nombre }}</option>
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
