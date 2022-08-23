-<?php
include_once 'RepositorioTecnico.inc.php';
include '../Views_tecnicos/Modalprueba.php';
class SelectsTecnicos{

    //ESTA EN USO EN EL INDEX CUENTA EL TOTAL DE REPORTES REALIZADOS POR EL TRABAJADOR
    public static function contarRealizados($conexion, $trabajador){
        $sql= "SELECT F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=2 and (tipo_solicitud=1 or tipo_solicitud=2 or tipo_solicitud=3);
        ";
        $query = Repositorio_tecnico::consultas($conexion,$sql);
        $contador= count($query);
        $sql = "SELECT F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=2 and (tipo_solicitud=4 or tipo_solicitud=5 or tipo_solicitud=6);";
        $query = Repositorio_tecnico::consultas($conexion,$sql);
        $contador=$contador + (count($query));
        echo $contador;
    }

    // ESTA EN USO EN EL INDEX CUENTA LOS REPORTES REALIZADOS
    public static function contarRepoReal($conexion, $est, $trabajador){
        $sql = "SELECT F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=2 and (tipo_solicitud=4 or tipo_solicitud=5 or tipo_solicitud=6);
        ";
        $query =  Repositorio_tecnico::consultas($conexion,$sql);
        $contador= count($query);
        echo $contador;
    }
    
    //ESTA EN USO EN INDEX, CUENTA LAS INSTALACIONES REALIZADAS
    public static function contarInstReal($conexion, $est, $trabajador){
        $sql="SELECT F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        inner join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        inner join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=2 and (tipo_solicitud=1 or tipo_solicitud=2 or tipo_solicitud=3);
        ";
        $query =  Repositorio_tecnico::consultas($conexion,$sql);
        $contador= count($query);
        echo $contador;
    }
    
    
    // ESTA EN USO EN REPORTESREALIZADOS.PHP MANDA LOS DETALLES DE REPORTES REALIZADOS
    public static function escribir_reportes_realizados ($conexion,$trabajador){
        $sql="SELECT F_solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre, telefono, 
        calle_uno, calle_dos,fecha_solucion ,detalles_solucion from reporte 
        inner join tipo_reporte on id_reporte=reporte
        inner join tecnico_asignado on trabajador_reporte=reg_asignacion
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=2 and (tipo_solicitud=4 or tipo_solicitud=5 or tipo_solicitud=6) ORDER BY 
        F_Solicitud;";
        $reportes =  Repositorio_tecnico::consultas($conexion,$sql);
        if ($reportes==null) {
            ?>
            <tr>
                <td colspan="7">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($reportes as $reportes){
            ?>
        <tr>
            <td><?php echo $reportes -> F_solicitud ?></td>
            <td><?php echo $reportes -> nombre?></td>
            <td><?php echo $reportes -> telefono ?></td>
            <td><?php echo $reportes -> calle_uno ?></td>
            <td><?php echo $reportes -> calle_dos ?></td>
            <td><?php echo $reportes -> fecha_solucion ?></td>
            <td><?php echo $reportes -> detalles_solucion ?></td>
        </tr>

        <?php
        }

    }









     // ESTA EN USO EN INSTALACIONESREALIZADOS.PHP MANDA LOS DETALLES DE LAS INSTALACIONES REALIZADAS
    public static function escribir_instalaciones_realizadas($conexion,$trabajador,$m1,$m2){
        $sql="call instaRealizaBimes('$trabajador','$m1','$m2')";
        $instalaciones =  Repositorio_tecnico::consultas($conexion,$sql);
        
        

        if ($instalaciones==null) {
            ?>
            <tr>
                <td colspan="6">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($instalaciones as $instalaciones){
            ?>
        <tr>
            <td><?php echo $instalaciones -> F_Solicitud ?></td>
            <td><?php echo $instalaciones -> nombre ?></td>
            <td><?php echo $instalaciones -> telefono ?></td>
            <td><?php echo $instalaciones -> calle_uno ?></td>
            <td><?php echo $instalaciones -> calle_dos ?></td>
            <td><?php echo $instalaciones -> Nombre_solicitud ?></td>

        </tr>
        

        <?php
        
        }
    }

        public static function instalaciones_realizadas_soli($conexion,$est,$trabajador){
        $sql="SELECT F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre, telefono, calle_uno, calle_dos, Nombre_solicitud from reporte 
        inner join tipo_reporte on id_reporte=reporte
        inner join tecnico_asignado on trabajador_reporte=reg_asignacion
        inner join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        inner join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=2 and (tipo_solicitud=4 or tipo_solicitud=5 or tipo_solicitud=6);";
        $instalaciones =  Repositorio_tecnico::consultas($conexion,$sql);
        if ($instalaciones==null) {
            ?>
            <tr>
                <td colspan="6">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($instalaciones as $instalaciones){
            ?>
        <tr>
            <td><?php echo $instalaciones -> F_Solicitud ?></td>
            <td><?php echo $instalaciones -> nombre ?></td>
            <td><?php echo $instalaciones -> telefono ?></td>
            <td><?php echo $instalaciones -> calle_uno ?></td>
            <td><?php echo $instalaciones -> calle_dos ?></td>
            <td><?php echo $instalaciones -> Nombre_solicitud ?></td>
        </tr>

        <?php
        }
    }

    //CONTAR LOS PENDIENTES
    public static function contarpendientes($conexion, $trabajador){
        $sql= "SELECT reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=1 and (tipo_solicitud=1 or tipo_solicitud=2 or tipo_solicitud=3);";
        $query = Repositorio_tecnico::consultas($conexion,$sql);
        $contador= count($query);
        $sql = "SELECT reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from estado_solicitudes
        inner join tecnico_asignado on id_estado=estado_asignado
        inner join solicitudes on solicitud=Reg_Solicitud
        inner join tipo_solicitudes on id_tipo_solicitud=tipo_solicitud
        inner join clientes on usuario=id_cliente
        inner join usuarios on usuario_cliente=id_usuario
        where tecnico='$trabajador' and estado_asignado=1 and (tipo_solicitud='4' or tipo_solicitud='5' or tipo_solicitud='6');";
        $query = Repositorio_tecnico::consultas($conexion,$sql);
        $contador=$contador + (count($query));
        echo $contador;
    }


    //contar las instalaciones pendientes
    public static function contarinstapend($conexion,$est, $trabajador){
        $sql = "SELECT reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=1 and (tipo_solicitud=1 or tipo_solicitud=2 or tipo_solicitud=3);";
        $query =  Repositorio_tecnico::consultas($conexion,$sql);
        $contador= count($query);
        echo $contador;
    }


    public static function contarrepopend($conexion, $est, $trabajador){
        $sql = "SELECT reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from estado_solicitudes
        inner join tecnico_asignado on id_estado=estado_asignado
        inner join solicitudes on solicitud=Reg_Solicitud
        inner join tipo_solicitudes on id_tipo_solicitud=tipo_solicitud
        inner join clientes on usuario=id_cliente
        inner join usuarios on usuario_cliente=id_usuario
        where tecnico='$trabajador' and estado_asignado=1 and (tipo_solicitud='4' or tipo_solicitud='5' or tipo_solicitud='6');";
        $query =  Repositorio_tecnico::consultas($conexion,$sql);
        $contador= count($query);
        echo $contador;
    }
    

    //SE UTILIZA EN INSTALACIONESPENDIENTES.PHP
    public static function escribir_instalaciones_pendientes($conexion,$est,$trabajador){
        $sql="SELECT reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=1 and (tipo_solicitud=1 or tipo_solicitud=2 or tipo_solicitud=3);";
        $instalaciones =  Repositorio_tecnico::consultas($conexion,$sql);
        if ($instalaciones==null) {
            ?>
            <tr>
                <td colspan="7">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($instalaciones as $instalaciones){
            ?>
        <tr>
            <td><?php echo $instalaciones -> F_Solicitud ?></td>
            <td><?php echo $instalaciones -> nombre ?></td>
            <td><?php echo $instalaciones -> telefono ?></td>
            <td><?php echo $instalaciones -> calle_uno ?></td>
            <td><?php echo $instalaciones -> calle_dos ?></td>
            <td><?php echo $instalaciones -> Nombre_solicitud ?></td>
            <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#instalafin<?php echo $instalaciones -> reg_asignacion ?>"> Terminar </button></td>

            <div class="modal fade" id="instalafin<?php echo $instalaciones -> reg_asignacion ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Finalizar reporte</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="instalacionespendientes.php" method="post" >


                        <!--Para poder agarrar el reg_asignacion--->
                        <div class="form-outline mb-4">
                             <label class="form-label" for="reg">N. Solicitud</label>
                             <input type="textarea"  name="reg" class="form-control" value="<?php echo $instalaciones -> reg_asignacion ?>" placeholder="<?php echo $instalaciones -> reg_asignacion ?>" readonly>
                        </div>

                        <!--ROW RADIOS-->
                        <div class="row">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="radio_insta">Radio:</label>
                                <select name="radio_insta" id="radio_insta" class="form-select" aria-label="Default select example">
                                <?php
                                Conexion::abrir_conexion();
                                Repositorio_tecnico::escibir_radios_sin_usar(Conexion::obtener_conexion());
                                Conexion::cerrar_conexion();
                                ?>
                                </select>
                            </div>

                            <div class="form-outline mb-4">
                             <label class="form-label" for="direip_rad">Direccion ip radios:</label>
                             <input type="textarea" id="direip_rad" name="direip_rad" class="form-control">
                            </div>

                        </div>

                        <!--ROW ROUTERS-->
                        <div class="row">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="router_insta">Router:</label>
                                <select name="router_insta" id="router_insta" class="form-select" aria-label="Default select example">
                                <?php
                                Conexion::abrir_conexion();
                                Repositorio_tecnico::escibir_routers_sin_usar(Conexion::obtener_conexion());
                                Conexion::cerrar_conexion();
                                ?>
                                </select>
                            </div>

                            <div class="form-outline mb-4">
                             <label class="form-label" for="direip_rou">Direccion ip router:</label>
                             <input type="textarea" id="direip_rou" name="direip_rou" class="form-control">
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="veloci">Velocidad de paquete:</label>
                            <select name="veloci" id="veloci" class="form-select" aria-label="Default select example">
                                <option value="1">10 mbps</option>
                                <option value="2">20 mbps</option>
                                <option value="3">50 mbps</option>
                            </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="fininstala">Finalizar</button>
                        </div>
                        </form>
                   </div>
                </div>
            </div>
            </tr>
        
            <?php
            }

            // Hace insert en la tabla reportes y cambia el estado de la solicitud a terminada
            if (isset($_POST['fininstala'])) { 
            extract($_POST);
            Conexion::abrir_conexion();
            $dia=date('Y-m-d');

            $cadena="INSERT INTO instalacion (fecha_instalacion, radio, router, paquete, direccion_ip_radio, direccion_ip_router, trabajador_instalacion)
            VALUES ('$dia','$radio_insta','$router_insta','$veloci' ,'$direip_rad', '$direip_rou','$reg');";
            $sentencia = $conexion -> prepare($cadena);
            $sentencia->execute();

            $actualizacion="UPDATE radios SET estado_radio = 'ASIGNADO' WHERE id_radio = $radio_insta";
            $sentencia2 = $conexion -> prepare($actualizacion);
            $sentencia2->execute();

            $actualizacion2="UPDATE router SET estado_router = 'ASIGNADO' WHERE id_router = $router_insta";
            $sentencia3 = $conexion -> prepare($actualizacion2);
            $sentencia3->execute();
            
            $actualizacion3="UPDATE tecnico_asignado SET estado_asignado = '2' WHERE reg_asignacion = $reg";
            $sentencia4 = $conexion -> prepare($actualizacion3);
            $sentencia4->execute();
            ?>
            <div class="alert alert-success" role="alert">
                Se ha finalizado el reporte.
            </div>
            <?php
            
            conexion::cerrar_conexion(); 
            echo "<script>
                        window.location='instalacionespendientes.php'
                      </script>"; 
        }
    }
    
    

    public static function escribir_reportes_pendientes($conexion,$trabajador){
        $sql="SELECT reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud from estado_solicitudes
        inner join tecnico_asignado on id_estado=estado_asignado
        inner join solicitudes on solicitud=Reg_Solicitud
        inner join tipo_solicitudes on id_tipo_solicitud=tipo_solicitud
        inner join clientes on usuario=id_cliente
        inner join usuarios on usuario_cliente=id_usuario
        where tecnico='$trabajador' and estado_asignado=1 and (tipo_solicitud='4' or tipo_solicitud='5' or tipo_solicitud='6') ORDER BY F_Solicitud;";
        $reportes =  Repositorio_tecnico::consultas($conexion,$sql);
        if ($reportes==null) {
            ?>
            <tr>
                <td colspan="7">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($reportes as $reportes){
            ?>
        <tr>
            <td><?php echo $reportes -> F_Solicitud ?></td>
            <td><?php echo $reportes -> nombre ?></td>
            <td><?php echo $reportes -> telefono ?></td>
            <td><?php echo $reportes -> calle_uno ?></td>
            <td><?php echo $reportes -> calle_dos ?></td>
            <td><?php echo $reportes -> Nombre_solicitud ?></td>
            <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reportefin<?php echo $reportes -> reg_asignacion ?>"> Terminar </button></td>

            <div class="modal fade" id="reportefin<?php echo $reportes -> reg_asignacion ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Finalizar reporte</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="reportespendientes.php" method="post" >
                        <!--Para poder agarrar el reg_asignacion--->
                        <div class="form-outline mb-4">
                             <label class="form-label" for="detalles_solu_repo">N. Solicitud</label>
                             <input type="textarea" " name="reg" class="form-control" value="<?php echo $reportes -> reg_asignacion ?>" placeholder="<?php echo $reportes -> reg_asignacion ?>" readonly>
                        </div>
                        
                        <!--Select tipo_reporte de el imput que no we , es que así lo requiero,-->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="tipo_reporte">Tipo de reporte:</label>
                            <select name="tipo_report" id="tipo_report" class="form-select" aria-label="Default select example">
                                <option value="1">Intenet lento</option>
                                <option value="2">Sin internet</option>
                                <option value="3">Cambio de velocidad</option>
                            </select>
                        </div>
                        <!--Nombre input-->
                            <div class="form-outline mb-4">
                             <label class="form-label" for="detalles_solu_repo">Detalles de la solución:</label>
                             <input type="textarea" id="detalles_solu" name="detalles_solu" class="form-control">
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="finrepo">Finalizar</button>
                        </div>
                        </form>
                   </div>
                </div>
            </div>
            </tr><?php
            }

            // Hace insert en la tabla reportes y cambia el estado de la solicitud a terminada
            if (isset($_POST['finrepo'])) { 
            extract($_POST);
            echo $reg;
            Conexion::abrir_conexion();
            $dia=date('Y-m-d');
            $cadena="INSERT INTO reporte (reporte, fecha_solucion, detalles_solucion, trabajador_reporte)
            VALUES ('$tipo_report' ,'$dia', '$detalles_solu', '$reg');";
            $sentencia = $conexion -> prepare($cadena);
            $sentencia->execute();
            $actualizacion="UPDATE tecnico_asignado SET estado_asignado = 2 WHERE reg_asignacion = $reg";// YA JALO YA NO LE MUEVAAAAAAAN
            $sentencia2 = $conexion -> prepare($actualizacion);
            $sentencia2->execute();
            ?> 
            <div class="alert alert-success" role="alert">
                Se ha finalizado la instalacion.
            </div>

            <?php
            conexion::cerrar_conexion();
            echo "<script>
            window.location='reportespendientes.php'
          </script>"; 
         }
            
        }



    public static function escribir_solicitudes_pendientes($conexion,$trabajador){
        $sql="SELECT id_tipo_solicitud, reg_asignacion, F_Solicitud, CONCAT(nombre,' ',A_Paterno,' ',A_Materno) as nombre,
        telefono, calle_uno, calle_dos, Nombre_solicitud 
        from tecnico_asignado 
        cross join estado_solicitudes on estado_asignado=id_estado
        inner join solicitudes	on solicitud=Reg_Solicitud
        cross join tipo_solicitudes on tipo_solicitud=id_tipo_solicitud 
        inner join clientes on id_cliente=usuario
        inner join usuarios on usuario_cliente=id_usuario where tecnico='$trabajador' and 
        estado_asignado=1;";
        $solipendientes =  Repositorio_tecnico::consultas($conexion,$sql);
        if ($solipendientes==null) {
            ?>
            <tr>
                <td colspan="7">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($solipendientes as $solipendientes){
            ?>
        <tr style="padding-top: 1px;">
            <td><?php echo $solipendientes -> F_Solicitud ?></td>
            <td><?php echo $solipendientes -> nombre ?></td>
            <td><?php echo $solipendientes -> telefono ?></td>
            <td><?php echo $solipendientes -> calle_uno ?></td>
            <td><?php echo $solipendientes -> calle_dos ?></td>
            <td><?php echo $solipendientes -> Nombre_solicitud?></td>
            </tr><?php


            // Hace insert en la tabla reportes y cambia el estado de la solicitud a terminada
            if (isset($_POST['finreporte'])) { 
            extract($_POST);
            echo $reg;
            Conexion::abrir_conexion();
            $dia=date('Y-m-d');
            $cadena="INSERT INTO reporte (reporte, fecha_solucion, detalles_solucion, trabajador_reporte)
            VALUES ('$tipo_report' ,'$dia', '$detalles_solu', '$reg');";
            $sentencia = $conexion -> prepare($cadena);
            $sentencia->execute();
            $actualizacion="UPDATE tecnico_asignado SET estado_asignado = 2 WHERE reg_asignacion = $reg";
            $sentencia2 = $conexion -> prepare($actualizacion);
            $sentencia2->execute();
            ?> 
            <div class="alert alert-success" role="alert">
                Se ha finalizado el reporte.
            </div>
            <?php
            conexion::cerrar_conexion(); }

            
        }
        //termina el foreach de reportes

    }

    public static function bimestresActivos($conexion,$usuario){
        $sql = "call mesesActivos($usuario)"; 
        $mes = Repositorio_tecnico::consultas($conexion,$sql);
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
                ?>
            
            <option value="<?php echo $numMes?>"><?php echo $nomMes ?></option>
            <?php
                
            }
            
            
        
    }

    public static function bimestresActivosrepo($conexion,$usuario){
        $sql = "call mesesactivosrepo($usuario)"; 
        $mes = Repositorio_tecnico::consultas($conexion,$sql);
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
                ?>
            
            <option value="<?php echo $numMes?>"><?php echo $nomMes ?></option>
            <?php
                
            }
            
            
        
    }
   
    }

    
 
     
 
?> 