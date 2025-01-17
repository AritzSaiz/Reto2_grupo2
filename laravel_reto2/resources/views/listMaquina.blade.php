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

        .footer {
            background-color: #0A3D62;
            height: 20px;
            margin-left: 250px; /* Adjust for sidebar width */
        }

    </style>

    <h2 class="frame-title">Listado de incidencias</h2>

    <div class="sidebar" id="sidebar">
        <a href="#">Lista de operarios</a>
        <a href="#">Lista de tecnicos</a>
        <a href="#">Lista de maquinas</a>
        <a href="#">Lista de secciones</a>
        <a href="#">Lista de mantenimientos preventivos</a>
    </div>


    @foreach ($maquinas as $maquina)

        <div class="incidents-list">
            <div class="incident">
                <span>{{$maquina->nombre}}</span>
                <button class="detail-btn">Borrar</button>
            </div>
        </div>

    @endforeach






@endsection
