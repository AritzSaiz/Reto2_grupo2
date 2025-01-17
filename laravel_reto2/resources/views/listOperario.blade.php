@extends('layouts.plublic')
@section('content')
    <style>
        a:active {
            color: white;
        }

        a:hover {
            color: white;
            font-weight: bold;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 56px; /* Altura del header */
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

        .content {
            margin-left: 250px;
            padding: 20px;
        }


    </style>

    <div class="sidebar" id="sidebar">
        <a href="#">Lista de operarios</a>
        <a href="#">Lista de tecnicos</a>
        <a href="#">Lista de maquinas</a>
        <a href="#">Lista de secciones</a>
        <a href="#">Lista de mantenimientos preventivos</a>

    </div>

    @foreach ($operarios as $operario)


        <div class="content" id="mainContent">
        <div class="container mt-4">
            <span>{{$operario->nombre}}</span>
            <button class="detail-btn">Borrar</button>
        </div>
    </div>

    @endforeach

@endsection
