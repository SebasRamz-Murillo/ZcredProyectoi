<?php
class Repositorio_tecnico{
    public static function consultas($conexion,$sql){
        if (isset($conexion)) {
            $sentencia = $conexion->query($sql);
            $resultado  = $sentencia -> fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }
    }
    public static function inserts($conexion,$sql){
        $sentencia = $conexion->query($sql);
    }

    public static function escibir_routers_sin_usar($conexion)
    {
        $sql = "call escribir_routers_sin_usar()"; // MUESTA LOS ROUTERS SIN USAR EN EL SEELCT
        $routers = Repositorio_tecnico::consultas($conexion,$sql);
        foreach ($routers as $router) {
            ?>
            <option value="<?php echo $router->id_router ?>"><?php echo $router->modelo_router; ?>-- SERIE -- <?php echo $router->serie_router; ?></option>
            <?php
        }
    }

    public static function escibir_radios_sin_usar($conexion)
    {
        $sql = "call escribir_radios_sin_usar()"; // MUESTA LOS RADIOS SIN USAR EN EL SEELCT
        $radios = Repositorio_tecnico::consultas($conexion,$sql);
        foreach ($radios as $radios) {
            ?>
            <option value="<?php echo $radios->id_radio ?>"><?php echo $radios->modelo_radio; ?>-- SERIE -- <?php echo $radios->serie_radio; ?></option>
            <?php
        }
    }

    
    public static function nombraMeses($mes){
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
            echo $nomMes;
            
        }

}