<?php

    ob_start();

    session_name('back');
    session_start();

    include 'conexion.php';

    if(!isset($_SESSION['is_logged'])) {
        $_SESSION['is_logged'] = 'PHPSESSID';
        $_SESSION['is_logged'] == 0;
    } 

    if  ($_SESSION['is_logged']==0) {
        header('location: login.php?mensaje=Se ha desconectado del sistema');
    }

?>



<!DOCTYPE html>

<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios - ABM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3" id="titulo">Listado de usuarios</h3>

            <a href="nuevo.php" class="btn btn-success">Alta</a>
            <a href="logout.php" class="btn btn-danger">Salir</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Localidad</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
              <?php
              $sql="select * from db_listado where activo='1'";
              $result=mysqli_query($conexion,$sql);
            
              while ($row = mysqli_fetch_array($result)){
              
              ?>
    
                <tr>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["apellido"] ?></td>
                        <td><?php echo $row["edad"] ?></td>
                        <td><?php echo $row["dni"] ?></td>
                        <td><?php echo $row["direccion"] ?></td>
                        <td><?php echo $row["localidad"] ?></td>
                        <td>
                        <a href="modificacion.php?id=<?php echo $row["id_usuario"]?>" class="btn btn-warning btn-sm me-2">Modificar</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?php echo $row["id_usuario"] ?>">Eliminar</button>
                        </td>
                    </tr>
              <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> Pablo Mamani - Curso PHP y SQL - Tecno3F</span>
        </div>
    </footer>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>

        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id')

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina')
                form.setAttribute('action', 'baja.php?id=' + id)
            })
        }
    </script>

</body>

</html>