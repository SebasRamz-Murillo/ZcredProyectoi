<?php
class Repositorio_usuario{
    public static function consultas($conexion,$sql){
        if (isset($conexion)) {
            $sentencia = $conexion->query($sql);
            $resultado  = $sentencia -> fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }
    }
  
    public static function consultasValor($conexion,$cadena){
        if (isset($conexion)){
            $sentencia = $conexion->query($cadena);
            $fila =$sentencia->fetchColumn();
            return $fila;
        }
    }
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

    public static function inserts($conexion,$sql){
        $sentencia = $conexion->query($sql);
        $sentencia->execute();
    }
    public static function nombraMeses($mes){
        foreach ($mes as $mes) {
            switch($mes->mes){
                case '1':
                    $nomMes='Enero';
                    $numMes=1;
                    break;
                case '2':
                    $nomMes='Febrero';
                    $numMes=2;

                    break; 
                case '3':
                    $nomMes='Marzo';
                    $numMes=3;

                    break;
                case '4':
                    $nomMes='Abril';
                    $numMes=4;

                    break;
                case '5':
                    $nomMes='Mayo';
                    $numMes=5;

                    break;
                case '6':
                    $nomMes='Junio';
                    $numMes=6;

                    break; 
                case '7':
                    $nomMes='Julio';
                    $numMes=7;

                    break;
                case '8':
                    $nomMes='Agosto';
                    $numMes=8;

                    break;  
                case '9':
                    $nomMes='Septiembre';
                    $numMes=9;

                    break;
                case '10':
                    $nomMes='Octubre';
                    $numMes=10;

                    break; 
                case '11':
                    $nomMes='Noviembre';
                    $numMes=11;

                    break;
                case '12':
                    $nomMes='Diciembre';
                    $numMes=12;

                    break;          
            }
            return $nomMes;
            return $numMes;
        }
    }
}