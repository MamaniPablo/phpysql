<?php
ob_start();

include 'conexion.php';

 $id=$_REQUEST["id"];
 //$sql="delete from oradores where id='$id'";
 $sql = "update db_listado set activo='0' where id_usuario='$id'";
 $result=mysqli_query($conexion, $sql);
 
 echo "Usuario eliminado= ".$id;
 ?>
 

 <!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Final - Baja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="css/estilo.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col text-center my-3">
                    <h2>Registro eliminado</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <a href="index.php" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> Pablo Mamani - Curso PHP y SQL - Tecno3F</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>