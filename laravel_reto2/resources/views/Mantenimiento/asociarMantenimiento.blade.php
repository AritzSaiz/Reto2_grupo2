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


            <!-- Formulario de asociar Mantenimiento -->
            <div class="form-section" id="form-maquina">
                <div class="row mb-3">
                    <h1 class="mt-5">Asociar Mantenimiento</h1>
                </div>
                <form action="{{route("maquinaMantenimiento.save")}}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="maquina_id" class="col-sm-3 col-form-label">Maquina:</label>
                        <div class="col-sm-6">
                            <select id="maquina_id" class="form-select" name="maquina_id" required>
                                <option value="">Seleccione una maqina</option>
                                @foreach ($maquinas as $maquina)
                                    <option value="{{ $maquina->id }}">{{ $maquina->codigo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="mb-3 row">
                        <label for="mantenimiento_id" class="col-sm-3 col-form-label">Mantenimiento preventivo:</label>
                        <div class="col-sm-6">
                            <select id="mantenimiento_id" class="form-select" name="mantenimiento_id" required>
                                <option value="">Seleccione una mantenimiento</option>
                                @foreach ($mantenimientos as $mantenimiento)
                                    <option value="{{ $mantenimiento->id}}">{{ $mantenimiento->descripcion}}</option>
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
