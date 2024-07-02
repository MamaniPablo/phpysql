<?php

ob_start();

if (isset($_POST['login']) ) {
    include 'conexion.php';

    $u=$_POST['user'];
    $p=md5($_POST['pass']);

    $strsql = "select * from sec_users where user='".$u."' and pass='".$p."' and activo='1'";
    $result = mysqli_query($conexion, $strsql);
    $rstlogin = mysqli_fetch_array($result);

    if ($rstlogin) {
        session_name('back');
		//session_start();
		$_SESSION['Usuario']   = $rstlogin['user'];	
		$_SESSION['IDUsuario'] = $rstlogin['id_user'];
		$_SESSION['Nombre'] = $rstlogin['nombre'];	//$usu->ID;

		$_SESSION['is_logged'] = 1;

        header ('location: index.php');
        ob_end_flush();
         exit();
     }else{
         header('location: login.php?mensaje=Usuario o Password Incorrectos');
         ob_end_flush();
     }  
     
}

?>

<!DOCTYPE html>
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        <title> Bienvenidos! </title>    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5, PHP, SQL y CSS">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="./css/style.css">
        <style type="text/css"></style>
        <script type="text/javascript"></script>
        
    </head>
    
    <body>
    
        <div id="contenedor">
            <div id="contenedorcentrado">
                <div id="login">
                    <form id="loginform" action="login.php" method="post" enctype="multipart/form-data" name="contact-form">

                        <label for="usuario">Usuario</label>
                        <input id="usuario" type="text" name="user" placeholder="Usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="pass" required>
                        
                        <button type="submit" name="login" class="btn btn-success btn-lg btn-form" title="Ingresar">Login...</button>
                 </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> Pablo Mamani - Curso PHP y SQL - Tecno3F</span>
        </div>
    </footer>
    </body>
</html>