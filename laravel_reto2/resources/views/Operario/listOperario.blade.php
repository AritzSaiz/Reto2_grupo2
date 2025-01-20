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
                <a href="{{route("operario.show")}}">Operarios</a>
                <a href="{{route("tecnico.show")}}">Tecnicos</a>
                <a href="{{route("maquina.show")}}">Maquinas</a>
                <a href="{{route("seccion.show")}}">Secciones</a>
                <a href="{{route("mantenimiento.show")}}">Mantenimientos preventivos</a>
                <a href="{{route("campus.show")}}">Campus</a>
            </div>
        </div>

        <div class="col-8 d-flex justify-content-around flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Lista de Operarios </h1>
            <div class="btn-toolbar align-items-right mb-2 mb-md-0">
                <a type="button" href="{{ route('operario.create') }}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus-circle"></span>
                    Añadir
                </a>
            </div>
        </div>


    </div>

    <!-- Mostrar mensajes de éxito o error -->
   <div>
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
   </div>

    @foreach ($operarios as $operario)
        <div class="incidents-list">
            <div class="incident border-bottom border-dark rounded p-3 shadow-sm">
                <span>{{ $operario->nombre }}</span>
                <form action="{{ route('operario.delete', $operario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="detail-btn">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach



@endsection




