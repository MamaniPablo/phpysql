<?php
$servidor = "localhost";
$usuario = "id22355559_pmamani";
$contrasena = "Passw0rd+";
$basededatos = "id22355559_tpfinal2024q1";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos) or die ("No se conecto al servidor");

$db = mysqli_select_db($conexion, $basededatos) or die ("No se conecto a la base");
?>