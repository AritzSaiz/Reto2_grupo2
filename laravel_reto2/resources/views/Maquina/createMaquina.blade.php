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
                <a href="{{route("operario.create")}}">Añadir operarios</a>
                <a href="{{route("tecnico.create")}}">Añadir tecnicos</a>
                <a href="{{route("maquina.create")}}">Añadir maquinas</a>
                <a href="{{route("seccion.create")}}">Añadir secciones</a>
                <a href="">Añadir mantenimientos preventivos</a>
                <a href="{{route("campus.create")}}">Añadir campus</a>
            </div>
        </div>


        <div class="col-6 mt-4">


            <!-- Formulario de Máquina -->
            <div class="form-section" id="form-maquina">
                <div class="row mb-3">
                    <h1>Añadir Maquina </h1>
                </div>
                <form action="{{route('maquina.save')}}" method="post">
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
                        <label for="modelo" class="col-sm-3 col-form-label">Modelo:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="prioridad" class="col-sm-3 col-form-label">Prioridad (1-3):</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="prioridad" name="prioridad" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="combobox" class="col-sm-3 col-form-label">Selecciona una sección:</label>
                        <div class="col-sm-6">
                            <select id="combobox" class="form-select" name="opcion">
                                <option value="seccion1">Sección 1</option>
                                <option value="seccion2">Sección 2</option>
                                <option value="seccion3">Sección 3</option>
                                <option value="seccion4">Sección 4</option>
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
