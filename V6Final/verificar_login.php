<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carga.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
    require 'clases/conexion.inc.php';
    require 'clases/login.inc.php';
        Conexion::abrir_conexion();
        extract($_POST);
        login::abrirsesion(conexion::obtener_conexion(),$correo,$contraseña);
        Conexion::cerrar_conexion();               
?>

<div class="loader"></div>
</body>
</html>



<?php
/*
    require 'clases/conexion.inc.php';
    require 'clases/login.inc.php';
        Conexion::abrir_conexion();
        extract($_POST);
        login::abrirsesion(conexion::obtener_conexion(),$correo,$contraseña);
        Conexion::cerrar_conexion();      
*/         
?>



