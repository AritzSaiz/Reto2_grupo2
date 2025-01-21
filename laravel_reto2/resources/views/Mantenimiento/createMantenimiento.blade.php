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

                    <!-- Dias -->
                    <div class="mb-3 row">
                        <label for="dias" class="col-sm-3 col-form-label">Dias:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="dias" name="dias" required>
                        </div>
                    </div>

                    <!-- Ultima revision -->
                    <div class="mb-3 row">
                        <label for="ultima_revision" class="col-sm-3 col-form-label">Última revisión:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="ultima_revision" name="ultima_revision" required>
                        </div>
                    </div>

                    <!-- Siguiente revision -->
                    <div class="mb-3 row">
                        <label for="siguiente_revision" class="col-sm-3 col-form-label">Siguiente revision:</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="siguiente_revision" name="siguiente_revision" required>
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
