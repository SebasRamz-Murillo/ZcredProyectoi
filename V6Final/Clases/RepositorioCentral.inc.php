<?php
class RepositorioCentral{

public static function comprobar($conexion,$cadena){
    try {
        $sentencia=$conexion->query($cadena); 
        $resultado = $sentencia->fetchAll();
        if (count($resultado)) {
            return true;
        }
        else{
            return  false;
        }
    } catch (PDOException $ex) {
        print "ERROR: ".$ex->getMessage();
    }
    }

public static function registrar($conexion,$cadena){
    try {
        $sentencia = $conexion -> query($cadena);
    } catch (PDOException $ex) {
        print "ERROR: ".$ex->getMessage();
    }
 
}
public static function inserts($conexion,$sql){
    $sentencia = $conexion->query($sql);
}
public static function consultas($conexion,$sql){
    if (isset($conexion)) {
        $sentencia = $conexion->query($sql);
        $resultado  = $sentencia -> fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }
}
public static function consul_num($conexion,$sql){
    $query=$conexion->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
} 

}
