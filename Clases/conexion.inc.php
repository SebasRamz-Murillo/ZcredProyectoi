<?php
//Esta clase incluye métodos estáticos que sirven para establecer, recuperar y abrir la conexión con la base de datos.

class Conexion{
    private $PDOLocal;
    private static $conexion;
    public static function abrir_conexion(){
        if(!isset(self::$conexion)){
            try{
                include_once 'config.inc.php';
                self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BD.'', NOMBRE_USUARIO, PASSWORD);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec("SET CHARACTER SET utf8");
            } catch (PDOException $ex){
                print "ERROR: ". $ex ->getMessage();
                die();
            }
        }
    }
    public static function cerrar_conexion(){
        if(isset(self::$conexion)){
            unset($conexion);
        }
    }
    public static function obtener_conexion(){
        return self::$conexion;
    }
}