<?php
ob_start();

include 'conexion.php';

if  ( ( isset($_POST['Modificar'])) ) {
    extract($_POST);
    $sql="update db_listado set nombre='$new_name', apellido='$new_lastname', edad='$new_age', dni='$new_dni', direccion='$new_adress', localidad='$new_city' where id_usuario='$id'";
    $result=mysqli_query($conexion, $sql);
    }

?>


<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Final - Modificacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="css/estilo.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
<?php 
    $id=$_REQUEST["id"];
    $sql="select * from db_listado where id_usuario='$id'";
    $result=mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
?>

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Modificar usuario</h3>
             <form action="modificacion.php" class="row g-3" method="post" autocomplete="off" enctype="multipart/form-data" name="contact-form" >

             <input name="id" type="hidden"  value="<?php echo $row["id_usuario"] ?>" >
                
                <div class="col-md-8">
                    <label for="name">Nombre</label>
                    <input name="new_name" id="name" type="text" class="form-control" value="<?php echo $row["nombre"] ?>" aria-label="Nombre" required>
                </div>
                
                <div class="col-md-8">
                    <label for="last_name">Apellido</label>
                    <input name="new_lastname" id="last_name" type="text" class="form-control" value="<?php echo $row["apellido"] ?>" aria-label="Apellido" required>
                </div>

                <div class="col-md-8">
                    <label for="age">Edad</label>
                    <input name="new_age" id="age" type="number" class="form-control" value="<?php echo $row["edad"] ?>" aria-label="Edad" required>
                </div>

                <div class="col-md-8">
                    <label for="dni">DNI</label>
                    <input name="new_dni" id="dni" type="number" class="form-control" value="<?php echo $row["dni"] ?>" aria-label="DNI" required>
                </div>
                
                <div class="col-md-8">
                    <label for="adress">Direccion</label>
                    <input name="new_adress" id="adress" type="text" class="form-control" value="<?php echo $row["direccion"] ?>" aria-label="Direccion" required>
                </div>
                
                <div class="col-md-8">
                    <label for="city">Localidad</label>
                    <input name="new_city" id="city" type="text" class="form-control" value="<?php echo $row["localidad"] ?>" aria-label="Localidad" required>
                </div>
                
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-primary btn-lg">Regresar</a>
                    <button type="submit" class="btn btn-primary btn-success btn-form btn-warning btn-lg" name="Modificar">Guardar</button>
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