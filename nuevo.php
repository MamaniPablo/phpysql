
<?php
ob_start();

include 'conexion.php';

if  ( ( isset($_POST['Alta'])) ) {
    extract($_POST);
    $sql="INSERT INTO db_listado VALUES (NULL, '$new_nombre', '$new_apellido', '$new_edad', '$new_dni', '$new_direccion', '$new_localidad', 1)";
    $result=mysqli_query($conexion, $sql);
    }

?>


<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Final - Nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Nuevo empleado</h3>

            <form action="nuevo.php" method="post" enctype="multipart/form-data" name="contact-form">

                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="new_nombre" name="new_nombre" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="new_apellido" name="new_apellido" required>
                </div>

                <div class="col-md-6">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" class="form-control" id="edad" name="new_edad" required>
                </div>

                <div class="col-md-6">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="number" class="form-control" id="dni" name="new_dni" required>
                </div>

                <div class="col-md-6">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="new_direccion">
                </div>
                
                <div class="col-md-6">
                    <label for="localidad" class="form-label">Localidad</label>
                    <input type="text" class="form-control" id="localidad" name="new_localidad">
                </div>
                <br><br>
                <div class="col-12">
                    <a href="index.php" class="btn btn-success btn-lg btn-form">Regresar</a>
                    <button type="submit" name="Alta" class="btn btn-success btn-lg btn-form">Guardar</button>
                </div>

            </form>

        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> Pablo Mamani - Curso PHP y SQL - Tecno3F</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>