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

    <!-- Mostrar mensajes de éxito o error -->
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

    <div class="row">

        <div class="col-4">
            <div class="sidebar" id="sidebar">
                <a href="{{route("operario.show")}}">Operarios</a>
                <a href="{{route("tecnico.show")}}">Tecnicos</a>
                <a href="{{route("maquina.show")}}">Maquinas</a>
                <a href="{{route("seccion.show")}}">Secciones</a>
                <a href="">Mantenimientos preventivos</a>
                <a href="{{route("campus.show")}}">Campus</a>
            </div>
        </div>

        <div class="col-6 mt-4">

            <!-- Formulario de Sección -->
            <div class="form-section" id="form-seccion">
                <div class="row mb-3">
                    <h1>Añadir seccion </h1>


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
                <form action="{{route('seccion.save')}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label">Código:</label>
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
                        <label for="campus" class="col-sm-3 col-form-label">Campus:</label>
                        <div class="col-sm-6">
                            <select id="campus_id" class="form-select" name="campus_id" required>
                                <option value="campus_id">Seleccione un campus</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">{{ $campus->nombre }}</option>
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
@endsection






