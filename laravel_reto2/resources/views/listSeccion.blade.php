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

        .frame-title {
            color: #0A3D62;
            margin-bottom: 20px;
            font-size: 1.2em;
            padding: 20px; /* Add some padding to space from the top */
        }

        .incidents-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Adjust margins to account for the sidebar on the left */
            margin-left: 250px; /* Sidebar width */
            margin-right: 0; /* No need for right margin now */
            padding: 20px; /* Add padding to space from the top */
        }

        .incident {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #FFFFFF;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #0A3D62;
        }

        .detail-btn {
            background-color: #0A3D62;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .detail-btn:hover {
            background-color: #FF5733;
        }

        .sidebar {
            width: 250px;
            background-color: #000; /* Black background */
            color: white;
            position: fixed;
            top: 56px; /* Assuming your header height is 56px, adjust if different */
            left: 0; /* Position on the left */
            height: calc(100% - 56px); /* Full height minus header height */
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



    </style>


    <div class="row">

        <div class="col-4">
            <div class="sidebar" id="sidebar">
                <a href="{{route("operario.show")}}">Lista de operarios</a>
                <a href="{{route("tecnico.show")}}">Lista de tecnicos</a>
                <a href="{{route("maquina.show")}}">Lista de maquinas</a>
                <a href="{{route("seccion.show")}}">Lista de secciones</a>
                <a href="">Lista de mantenimientos preventivos</a>
            </div>

        </div>

        <div class="col-4 mt-4">
            <h1>Lista de Secciones </h1>

        </div>

    </div>


    @foreach ($secciones as $seccion)


        <div class="incidents-list">
            <div class="incident border border-dark rounded p-3 shadow-sm">
                <span>{{$seccion->codigo}}</span>
                <span>{{$seccion->campus}}</span>

                <button class="detail-btn">Borrar</button>
            </div>
        </div>

    @endforeach


@endsection




