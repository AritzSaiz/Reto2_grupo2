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
            <h1>Lista de Campus </h1>
            <div class="btn-toolbar align-items-right mb-2 mb-md-0">
                <a type="button" href="{{ route('campus.create') }}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus-circle"></span>
                    Añadir
                </a>
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

    @foreach ($campus as $camp)
        <div class="incidents-list">
            <div class="incident border-bottom border-dark rounded p-3 shadow-sm">
                <span>{{ $camp->codigo }}</span>
                <span>{{ $camp->nombre }}</span>
                <span>{{ $camp->telefono }}</span>

                <form action="{{ route('campus.delete', $camp->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="detail-btn">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach






@endsection
