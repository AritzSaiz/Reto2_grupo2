<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    .btn-create {
        background-color: #FFC300;
        color: black;
    }

    .frame-title {
        color: #0A3D62;
        margin-bottom: 20px;
        font-size: 3em;
    }
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <h1 class="text-center my-4 frame-title">Crear</h1>

        <div class="mb-3 row ">
            <form>
                <label for="combo">Selecciona una opción:</label>
                <select id="combo" name="opcion">
                    <option value="opcion1">Usuario</option>
                    <option value="opcion2">Maquina</option>
                    <option value="opcion3">Seccion</option>
                    <option value="opcion4">Mantenimiento</option>
                </select>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">

        <!--Usuario-->
        <div class="col-md-8 col-lg-6">

            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="apellidos" class="col-sm-3 col-form-label">Apellidos:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-3 col-form-label">Usuario:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="contrasena" class="col-sm-3 col-form-label">Contraseña:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Tipo:</label>
                    <div class="col-sm-9">

                        <input type="radio" name="tipo" value="Operario"> Operario

                        <input type="radio" name="tipo" value="Tecnico" class="ms-5"> Tecnico
                    </div>
                </div>


                <div>

                    <div class="mb-3 row">
                        <label for="especialidad" class="col-sm-3 col-form-label">Especialidad:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Admin:</label>
                        <div class="col-sm-9">

                            <input type="radio" name="admin" value="si"> Si

                            <input type="radio" name="admin" value="no" class="ms-5"> No
                        </div>
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

    <!--Maquina-->
    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-3 col-form-label">Codigo:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="modelo" class="col-sm-3 col-form-label">Modelo:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="modelo" name="modelo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="prioridad" class="col-sm-3 col-form-label">Prioridad (numero del 1 al 3):</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="prioridad" name="prioridad" required>
                    </div>
                </div>

                <div class="mb-3 row ">
                    <form >
                        <label for="combobox">Selecciona una seccion:</label>
                        <select id="combobox" name="opcion">
                            <option value="seccion1">seccion1</option>
                            <option value="seccion2">seccion2</option>
                            <option value="seccion3">seccion3</option>
                            <option value="seccion4">seccion4</option>
                        </select>
                    </form>
                </div>



                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-create">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Seccion -->
    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-3 col-form-label">Codigo:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Campus:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row ">
                    <form >
                        <label for="combobox">Selecciona un campus:</label>
                        <select id="combobox" name="opcion">
                            <option value="campus1">Arriga</option>
                            <option value="campus2">Jesus Obrero</option>
                            <option value="campus3">Molinuevo</option>
                            <option value="campus4">Nieves Cano</option>
                            <option value="campus5">Mendizorroza</option>
                        </select>
                    </form>
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
</body>
</html>
