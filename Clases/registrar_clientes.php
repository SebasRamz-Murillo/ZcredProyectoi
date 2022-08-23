<?php 

class registrar_clientes{
    public static function obtener_id_correo($conexion,$sql){
        if (isset($conexion)) {
            $sentencia = $conexion->query($sql);
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
    public static function add_cliente($conexion,$cadena){  
        try {
            $conexion->query($cadena);
        } catch (PDOException $ex) {
            echo "ERROR ".$ex->getMessage() ; 
        }      
       
    }
}