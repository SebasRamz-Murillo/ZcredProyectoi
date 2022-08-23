<?php
class sesion {
public static function iniciar_sesion(){
include_once 'conexion.inc.php';
if(session_id()==''){
header('cache-control: no_cache');
session_cache_limiter('private, must-revalidate');
session_start();
}
$_SESSION['id_usuario'] = $id_usuario;
$_SESSION['nombre'] = $nombre;
Conexion::abrir_conexion();
}
}