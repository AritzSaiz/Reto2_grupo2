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


            <!-- Formulario de Máquina -->
            <div class="form-section" id="form-maquina">
                <div class="row mb-3">
                    <h1 class="mt-5">Añadir Maquina </h1>
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
                <form action="{{route('maquina.save')}}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label @error('codigo') is-invalid @enderror" id="codigo" name="codigo">Código:</label>
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
                        <label for="prioridad" class="col-sm-3 col-form-label  @error('prioridad') is-invalid @enderror">Prioridad (1-3):</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="prioridad" name="prioridad" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="seccion_id" class="col-sm-3 col-form-label">Seccion:</label>
                        <div class="col-sm-6">
                            <select id="seccion_id" class="form-select" name="seccion_id" required>
                                <option value="">Seleccione una seccion</option>
                                @foreach ($secciones as $seccion)
                                    <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>
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
