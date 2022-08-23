<?php

include_once 'RepositorioUsuario.inc.php';
class SelectsClientes{

public static function ContarRepTot($conexion,$usuario)
        {
          $sql =
          "SELECT count(tipo_solicitud)
          from reporte inner join (select * from tecnico_asignado join solicitudes 
          on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
          on asignado.reg_asignacion=reporte.trabajador_reporte  and id_cliente=$usuario";
         echo Repositorio_usuario::consultasvalor($conexion,$sql );
        }

public static function ContarRepIntLento($conexion,$usuario)
        {
          $sql =
          "SELECT count(tipo_solicitud)
          from reporte inner join (select * from tecnico_asignado join solicitudes 
          on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
          on asignado.reg_asignacion=reporte.trabajador_reporte  where tipo_solicitud='5' and id_cliente=$usuario";
          echo Repositorio_usuario::consultasvalor($conexion,$sql );
        }
public static function ContarRepSinInt($conexion,$usuario)
        {
          $sql =
          "SELECT count(tipo_solicitud)
          from reporte inner join (select * from tecnico_asignado join solicitudes 
          on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
          on asignado.reg_asignacion=reporte.trabajador_reporte  where tipo_solicitud='6' and id_cliente=$usuario";
          echo Repositorio_usuario::consultasvalor($conexion,$sql );
        }
public static function ContarRepCambioVelo($conexion,$usuario)
        {
            
          $sql =
          "SELECT count(tipo_solicitud)
          from reporte inner join (select * from tecnico_asignado join solicitudes 
          on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
          on asignado.reg_asignacion=reporte.trabajador_reporte  where tipo_solicitud='4' and id_cliente=$usuario";
          echo Repositorio_usuario::consultasvalor($conexion,$sql );
            
        }
        /////////// Info reportes ////////////////
        public static function RepInterLen($conexion,$usuario)
        {
            $sql =
            "SELECT fecha_solucion, detalles_solucion, F_Solicitud, tipo_solicitud, id_cliente
            from reporte inner join (select * from tecnico_asignado join solicitudes 
            on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
            on asignado.reg_asignacion=reporte.trabajador_reporte  where tipo_solicitud='5' and id_cliente=$usuario";
            $desc= Repositorio_usuario::consultas($conexion,$sql );
            if ($desc==null) {
              ?>
              <tr>
                  <td colspan="7">Sin reportes</td>
              </tr> 
              <?php
              }
            foreach($desc as $desc){
              ?>
              <tr>  
                  <td><b>Fecha de solicitud:</b></td>
                  <td>
                    <?php
                    echo $desc->F_Solicitud;
                    ?>
                  </td>
                </tr>
                <tr>  
                  <td><b>Detalles de solucion:</b></td>
                  <td>
                    <?php
                    echo $desc->detalles_solucion;
                    ?>
                  </td>
                </tr>
                <tr>  
                  <td><b>Fecha de solucion:</b></td>
                  <td>
                    <?php
                    echo $desc->fecha_solucion;
                    ?>
                  </td>
                </tr>
    
                <tr>
                  
                <td><br></td>
                </tr>
                    
               
              <?php
            }

        }
public static function RepSinInt($conexion,$usuario)
        {
          $sql =
          "SELECT fecha_solucion, detalles_solucion, F_Solicitud, tipo_solicitud, id_cliente
          from reporte inner join (select * from tecnico_asignado join solicitudes 
          on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
          on asignado.reg_asignacion=reporte.trabajador_reporte  where tipo_solicitud='6' and id_cliente=$usuario";
          $desc= Repositorio_usuario::consultas($conexion,$sql );
          if ($desc==null) {
            ?>
            <tr>
                <td colspan="7">Sin reportes</td>
            </tr> 
            <?php
            }
          foreach($desc as $desc){
            ?>
            <tr>  
                <td><b>Fecha de solicitud:</b></td>
                <td>
                  <?php
                  echo $desc->F_Solicitud;
                  ?>
                </td>
              </tr>
              <tr>  
                <td><b>Detalles de solucion:</b></td>
                <td>
                  <?php
                  echo $desc->detalles_solucion;
                  ?>
                </td>
              </tr>
              <tr>  
                <td><b>Fecha de solucion:</b></td>
                <td>
                  <?php
                  echo $desc->fecha_solucion;
                  ?>
                </td>
              </tr>
              <tr>
              <td><br></td>
                </tr>
              
            <?php
        }
      }
public static function RepCambioVelo($conexion,$usuario)
        {
          $sql =
          "SELECT fecha_solucion, detalles_solucion, F_Solicitud, tipo_solicitud, id_cliente
          from reporte inner join (select * from tecnico_asignado join solicitudes 
          on solicitudes.Reg_Solicitud=tecnico_asignado.solicitud join clientes on solicitudes.usuario=clientes.id_cliente)as asignado 
          on asignado.reg_asignacion=reporte.trabajador_reporte  where tipo_solicitud='4' and id_cliente=$usuario";
          $desc= Repositorio_usuario::consultas($conexion,$sql );
          if ($desc==null) {
            ?>
            <tr>
                <td colspan="7">Sin reportes</td>
            </tr> 
            <?php
            }
          foreach($desc as $desc){
            ?>
            <tr>  
                <td><b>Fecha de solicitud:</b></td>
                <td>
                  <?php
                  echo $desc->F_Solicitud;
                  ?>
                </td>
              </tr>
              <tr>  
                <td><b>Detalles de solucion:</b></td>
                <td>
                  <?php
                  echo $desc->detalles_solucion;
                  ?>
                </td>
              </tr>
              <tr>  
                <td><b>Fecha de solucion:</b></td>
                <td>
                  <?php
                  echo $desc->fecha_solucion;
                  ?>
                </td>
              </tr>
              <tr>
              <td><br></td>
                  
                </tr>
            <?php
           
          }
        }
        //////////////////////////////////////////////////////////////// 
        public static function fechasInstala($conexion,$usuario)
        {

          $sql="SELECT instalacion.reg, instalacion.fecha_instalacion,asignado.usuario_cliente from instalacion 
          inner join (SELECT * FROM tecnico_asignado
          inner join solicitudes on reg_solicitud=solicitud
          inner join clientes on id_cliente=usuario
          inner join usuarios on id_usuario=usuario_cliente)as asignado 
          on asignado.reg_asignacion=instalacion.trabajador_instalacion inner join paquetes on instalacion.paquete=paquetes.n_paquete where id_cliente=$usuario ORDER BY fecha_instalacion DESC ";
          
          $fech = Repositorio_usuario::consultas($conexion,$sql);
          if ($fech==null) {
            ?>
              <option selected disabled> --Sin Instalacion--</option>     
            <?php
            }
        foreach ($fech as $fech){
          ?>
            <option value="<?php  echo $fech->reg ?>"><?php echo $fech->fecha_instalacion;  ?></option>      
          <?php
        }
        }

public static function mostrarPaquete($conexion,$usuario)
        {

          $sql="SELECT instalacion.reg, instalacion.fecha_instalacion,routerInfo.routerInst,direccion_ip_router,asignado.usuario_cliente,asignado.estado_cliente,
          concat('Bajada: ', paquetes.Velocidad_down, ' Mbps - Subida: ', paquetes.Velocidad_up, ' Mbps' ) as paquete ,
          radioInfo.radioInst
          , direccion_ip_radio from instalacion 
          inner join (select id_router, serie_router, routerInst from router inner join 
          (select Id_modelo_rou,concat(marcas_router.nombre_m_rou,' ',modelos_router.nombre_m_rou) as routerInst  
          from modelos_router inner join marcas_router on marca_router=Id_marca_rou
          )as routerInstalado on router.modelo_router=routerInstalado.Id_modelo_rou)as routerInfo 
          on routerInfo.id_router=instalacion.router 
          inner join (select id_radio,serie_radio, radioInst from radios inner join 
          (select Id_modelo_rad, concat(marcas_radios.nombre_m_rad, ' ', modelos_radios.nombre_m_rad)as radioInst
          from modelos_radios inner join marcas_radios on marca_radio=Id_marca_Rad
          )as radioInstalado on radios.modelo_radio=radioInstalado.Id_modelo_rad)as radioInfo
          on radioInfo.id_radio=instalacion.radio
          inner join (SELECT * FROM tecnico_asignado
          inner join solicitudes on reg_solicitud=solicitud
          inner join clientes on id_cliente=usuario
          inner join usuarios on id_usuario=usuario_cliente)as asignado 
          on asignado.reg_asignacion=instalacion.trabajador_instalacion inner join paquetes on instalacion.paquete=paquetes.n_paquete where id_cliente=$usuario";



/*SELECT * FROM tabla where Campo_Fecha > NOW() ORDER BY Campo_Fecha ASC*/

            $info = Repositorio_usuario::consultas($conexion,$sql);
            $num=0;

        if ($info==null) {
            ?>
            <tr>
                <td colspan="7">Sin instalacion</td>
            </tr> 
            <?php
            }
        foreach ($info as $info){
          
            ?>
                <tr>
                  <td><b>Instalacion</b></td>
                  <td>
                    <?php
                    
                    
                    ?>
                  </td>
                </tr>
                <tr>
                  <td><b>Router:</b></td>
                  <td>
                    <?php
                    echo $info->routerInst;
                    ?>
                  </td>
                </tr>

                <tr>
                  <td><b>IP Router:</b></td>
                  <td>
                    <?php
                    echo $info->direccion_ip_router;
                    ?>
                  </td>
                  
                </tr>
                <tr>
                  <td><b>Radio:</b></td>
                  <td>
                    <?php
                    echo $info->radioInst;
                    ?>
                  </td>
                </tr>

                <tr>
                  <td><b>IP Radio:</b></td>
                  <td>
                    <?php
                    echo $info->direccion_ip_radio;
                    ?>
                  </td>
                  
                </tr>

                <tr>
                  <td><b>Paquete:</b></td>
                  <td>
                    <?php
                    echo $info->paquete;
                    ?>
                  </td>
                  
                </tr>
                <tr>
                  <td><b>Fecha de instalacion:</b></td>
                  <td>
                    <?php
                    echo $info->fecha_instalacion;
                    ?>
                  </td> 
                </tr>
                <tr>
              <td><br></td>
                  
                </tr>
        <?php
        }
        }

        public static function escibir_localidades($conexion)
    {
        $sql = "call escribir_localidades()"; // MUESTRA LAS LOCALIDADES ACTUALES EN UN SELECT
        $localidades = Repositorio_usuario::consultas($conexion,$sql);
        foreach ($localidades as $localidad) {
            ?>
            <option value="<?php echo $localidad->Id_localidad ?>"><?php echo $localidad->nombre ?></option>
            <?php
        }
    }
    }
    
    ?>
    

            
       