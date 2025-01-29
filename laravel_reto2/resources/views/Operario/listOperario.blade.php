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

        <div class="col-8 mt-5 d-flex justify-content-around flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Lista de Operarios </h1>
            <div class=" btn btn-toolbar align-items-right mb-2  gap-3">
                <a type="button" href="{{ route('operario.create') }}" class=" bOperario btn  btn-outline-secondary text-center">
                    <span data-feather="plus-circle"></span>
                    Añadir
                </a>
                <a href="{{ url('/exportar-datos') }}" class="btn btn-primary">Descargar el Excel de prueba</a>

            </div>

        </div>


    </div>

    <div class="containerListOperario">
        <div class="row justify-content-center">
            <div class="col-auto">

                @if (session('error'))
                    <div class="mensajeNuevo alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @foreach ($operarios as $operario)
        <div class="incidents-list">
            <div class="incident border-bottom border-dark rounded p-3 shadow-sm  justify-content-evenly">
                <span>{{ $operario->nombre }}</span>
                <span class="text-center">{{ $operario->apellidos }}</span>
                <span>{{ $operario->email }}</span>
                <form action="{{ route('operario.delete', $operario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="detail-btn">Borrar</button>
                </form>

                <a href="{{ route('operario.detalle', $operario->id) }}" class="text-white detail-btn text-decoration-none">Ver/Editar</a>
            </div>
        </div>
    @endforeach

@endsection
