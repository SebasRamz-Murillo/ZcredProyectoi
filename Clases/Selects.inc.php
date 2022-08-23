<?php
include_once 'RepositorioCentral.inc.php';
class Selects{
    ///AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII




    ///////////////////////////////////////////////////
    public static function solici_pendientes($conexion){
        $sql="SELECT * FROM  (SELECT * FROM SOLICITUDES JOIN  tipo_solicitudes ON tipo_solicitudes.id_tipo_solicitud=solicitudes.TIPO_SOLICITUD LEFT JOIN TECNICO_ASIGNADO ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD WHERE REG_ASIGNACION IS NULL) AS SOLI_SIN_ASIGNAR WHERE SOLI_SIN_ASIGNAR.tipo_solicitud =4 OR SOLI_SIN_ASIGNAR.tipo_solicitud =5 OR SOLI_SIN_ASIGNAR.tipo_solicitud = 6 ;";
        $solic_pen = RepositorioCentral::consultas($conexion,$sql);
        if($solic_pen== null){
            ?>
            <tr>
                <td colspan="4">SIN REGISTROS</td>
            </tr>
            <?php
        }
       
        foreach ($solic_pen as $value) {
            ?>
             <tr>
                <td><?php echo $value->F_Solicitud ?></td><td><?php echo $value->Nombre_solicitud ?></td><td><?php echo $value->detalles_solicitud ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#as_tec<?php echo $value->Reg_Solicitud ?>" >
ASIGNAR TECNICO
</button></td>
<!-- Modal -->
<div class="modal fade" id="as_tec<?php echo $value->Reg_Solicitud ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"> <form action="" method="post">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNAR TECNICO </h5> <input type="text" name="id_solicitud" style="width: 100px; margin-left:450px;" class="form-control text-center" data-bs-dismiss="modal" readonly value="<?php echo $value->Reg_Solicitud?>" >
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <div class="col mb-3">
        <label for="select_tecnico">SELECCIONAR TECNICO</label>
        <select name="select_tecnico" id="select_tecnico" class="form-select">
        <option selected disabled>-- SELECCIONE AL TECNICO --</option>
    <?php 
    $tecnicos="SELECT id_trabajador, concat(nombre,' ',A_Paterno) as nombre from trabajadores join tipo_trabajador on trabajadores.tipo_trabajador=tipo_trabajador.id_tipo_trabajador join usuarios on usuarios.id_usuario= trabajadores.usuario_trabajador where tipo='TECNICO'";
    $tecnicos_listos = RepositorioCentral::consultas($conexion,$tecnicos);
    if($tecnicos_listos== null){
        ?>
        <option value="">SIN REGISTROS</option>
        <?php
    }
    foreach ($tecnicos_listos as $tecnicos_listo) {
     ?> 
     <option value="<?php echo $tecnicos_listo->id_trabajador?>"><?php echo $tecnicos_listo->nombre;?></option>
     <?php
    }
    ?>
        </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="asignar_tecnico" class="btn btn-primary">ASIGNAR</button>
        </form>
      </div>
    </div>
  </div>
</div>
            </tr>
             <!-- Modal -->
            <?php
           }
    }

    //le agregue aaa después del id para que no interviniera con el otro
    public static function insta_pendientes($conexion){
        $sql="SELECT * FROM  (SELECT * FROM SOLICITUDES JOIN  tipo_solicitudes ON tipo_solicitudes.id_tipo_solicitud=solicitudes.TIPO_SOLICITUD LEFT JOIN TECNICO_ASIGNADO ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD WHERE REG_ASIGNACION IS NULL) AS SOLI_SIN_ASIGNAR WHERE SOLI_SIN_ASIGNAR.tipo_solicitud =1 OR SOLI_SIN_ASIGNAR.tipo_solicitud =2 OR SOLI_SIN_ASIGNAR.tipo_solicitud = 3;";
        $solic_pen = RepositorioCentral::consultas($conexion,$sql);
        if($solic_pen== null){
            ?>
            <tr>
                <td col="4">SIN REGISTROS</td>
            </tr>
            <?php
        }
       
        foreach ($solic_pen as $value) {
            ?>
             <tr>
                <td><?php echo $value->F_Solicitud ?></td><td><?php echo $value->Nombre_solicitud ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#as_tecaaa<?php echo $value->Reg_Solicitud ?>" >
                ASIGNAR TECNICO
                </button></td>
                <!-- Modal -->
                <div class="modal fade" id="as_tecaaa<?php echo $value->Reg_Solicitud ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header"> <form action="" method="post">
                <h5 class="modal-title" id="exampleModalLabel">ASIGNAR TECNICO </h5> <input type="text" name="id_solicitudins" style="width: 100px; margin-left:450px;" class="form-control text-center" data-bs-dismiss="modal" readonly value="<?php echo $value->Reg_Solicitud?>" >
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
       
                <div class="col mb-3">
                <label for="select_tecnicoins">SELECCIONAR TECNICO</label>
                <select name="select_tecnicoins" id="select_tecnicoins" class="form-select">
                <option selected disabled>-- SELECCIONE AL TECNICO --</option>
                <?php 
                $tecnicos="SELECT id_trabajador, concat(nombre,' ',A_Paterno) as nombre from trabajadores join tipo_trabajador on trabajadores.tipo_trabajador=tipo_trabajador.id_tipo_trabajador join usuarios on usuarios.id_usuario= trabajadores.usuario_trabajador where tipo='TECNICO'";
                $tecnicos_listos = RepositorioCentral::consultas($conexion,$tecnicos);
                if($tecnicos_listos== null){
                ?>
                <option value="">SIN REGISTROS</option>
                <?php
                }
                foreach ($tecnicos_listos as $tecnicos_listo) {
                ?> 
                <option value="<?php echo $tecnicos_listo->id_trabajador?>"><?php echo $tecnicos_listo->nombre;?></option>
                <?php
                }
                ?>
                </select>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" name="asignar_tec_insta" class="btn btn-primary">ASIGNAR</button>
                </form>
                </div>
                </div>
                </div>
                </div>
            </tr>
             <!-- Modal -->



            <?php
           }
    }





    public static function escibir_localidades($conexion)
    {
        $sql = "call escribir_localidades()"; // MUESTRA LAS LOCALIDADES ACTUALES EN UN SELECT
        $localidades = RepositorioCentral::consultas($conexion,$sql);
        foreach ($localidades as $localidad) {
            ?>
            <option value="<?php echo $localidad->Id_localidad ?>"><?php echo $localidad->nombre ?></option>
            <?php
        }
    }

    public static function escribir_localidades_tabla($conexion){
        $sql = "call escribir_localidades()"; //ESCRIBE LAS LOCALIDADES ACTUALES EN UNA TABLA
        $Localidades = RepositorioCentral::consultas($conexion,$sql);
        foreach ($Localidades as $Localidad) {
            ?>
        <tr>
                 <td><?php echo $Localidad->nombre?></td>
                 <!-- Button trigger modal -->
                 <td>  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $Localidad->Id_localidad?>">
                   Editar
                   </button>
              </td>

          <div class="modal fade" id="exampleModal<?php echo $Localidad->Id_localidad?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title<?php echo $Localidad->Id_localidad?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <form method="POST" action="localidades.php">
                  </div>
                  <div class="modal-body">
          
                        <div class="col">
                        <label for="id_localidad" class="form-label">ID Municipio</label>
                        <Input class="form-control" name="id_municipio_cambiar" value="<?php echo $Localidad->Id_localidad ?>" readonly></Input>
                        </div>
                        <div class="col mb-4">
                            <label for="nom_localidad">Nombre de municipio</label>
                        <input type="text" name="Actualizar_municipio" class="form-control" required value="<?php echo $Localidad->nombre?>">
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" name="Guarda_Municipio" class="btn btn-primary">Guardar cambios</button>
                     </div>
                     </form>
                   </div>
                 </div>
               </div>
             </tr>
            <?php
        }
     } 

     
    public static function escribir_marcas_rad($conexion){
        $sql="call marcas_radio()";
        $marcas_rad = RepositorioCentral::consultas($conexion,$sql);
        if ($marcas_rad==null) {
            ?>
            <tr>
                <td colspan="2">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($marcas_rad as $marca_rad) {
            ?>
            <tr>
                <td><?php echo $marca_rad-> nombre_m_rad ?></td>
                <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $marca_rad->Id_marca_rad?>">
                    Editar
                </button>
               
                <div class="modal fade" id="exampleModalmares<?php echo $marca_rad->Id_marca_rad?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MODIFICAR NOMBRE DE MARCA RADIO <?php echo $marca_rad->Id_marca_rad?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="marcas.php">
                    </div>
                    <div class="modal-body">
                        
                        <div class="col">
                            <label for="id_rad" class="form-label">ID DE LA MARCA</label>
                            <input class="form-control" name="id_marca_cambiar"  value="<?php echo $marca_rad->Id_marca_rad?>" readonly>
                        </div>
                        <div class="col mb-4">
                            <label for="nom_marca_up">Nombre de la marca</label>
                        <input type="text" name="actualizarMRad" class="form-control" required value="<?php echo $marca_rad->nombre_m_rad ?>">
                        </div>
                       
                    </div>
                    <div class="modal-footer"> 
        
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="actualizar_mar_rad">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
            <?php
        }
    }
  
    

    public static function escribir_marcas_rou($conexion){
        $sql="call marcas_router()";
        $marcas_rou = RepositorioCentral::consultas($conexion,$sql);
        if ($marcas_rou==null) {
        ?>
        <tr>
            <td colspan="2">Sin registros</td>
        </tr> 
        <?php
        }
        foreach ($marcas_rou as $marca_rou) {
            ?>
            <tr>
                <td><?php echo $marca_rou->nombre_m_rou ?></td> 
                <td>
                <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares2<?php echo $marca_rou->Id_marca_rou?>">
                    Editar
                </button>
                </td>        
                <!-- Modal YORDI-->
                <div class="modal fade" id="exampleModalmares2<?php echo $marca_rou->Id_marca_rou?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MODIFICAR NOMBRE DE MARCA <?php echo $marca_rou->Id_marca_rou?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="Marcas.php">
                    </div>
                    <div class="modal-body">
                        <!--AQUI INICIA CUERPO MODAL-->

                        <div class="col">
                            <label for="id_rou" class="form-label">ID DE LA MARCA ROUTER</label>
                            <Input class="form-control" name="id_mar_rou_edit" value="<?php echo $marca_rou->Id_marca_rou ?>" readonly></Input>
                        </div>
                        <div class="col mb-4">
                            <label for="nom_marca_up">Nombre de la marca</label>
                        <input type="text" name="actualizarNomMarca" class="form-control" required value="<?php echo $marca_rou->nombre_m_rou ?>">
                        </div>
                        <!--AQUI TERMINA CUERPO MODAL-->
                        <!--NO COPIAR Y PEGAR POR ERRORES POFA JULIE SE QUE VAS A VENIR A SI QUE MIRA ESTO LEEEEEE RECUERDEN BORRAR ESTAS COSAS XDDDDDDDDDDDDDDDDD-->
                    </div>
                    <div class="modal-footer"> <!--MUEVELE TE FALTAN MUCHOS UPDATE CUANTO A QUE NO HACES NADA-->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_mar_rou">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>
        
         <?php
        
        }
      
            
    }
    
    public static function escribir_modelos_rad($conexion){
        $sql="call modelos_radios()";
        $modelos_rad = RepositorioCentral::consultas($conexion,$sql);
        if ($modelos_rad==null) {
            ?>
            <tr>
                <td colspan="2">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($modelos_rad as $modelos_rad){
            ?>
            <tr>
                <td><?php echo $modelos_rad -> nombre_marca ?></td>
                <td><?php echo $modelos_rad -> nombre_m_rad  ?></td>
                
                <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $modelos_rad ->nombre_marca?>">
                    Editar
                </button>
                <!-- Modal YORDI-->
                <div class="modal fade" id="exampleModalmares<?php echo $modelos_rad ->nombre_marca?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MODELOS RADIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="modelos.php">
                    </div>
                    <div class="modal-body">
                       
                        <div class="col">
                            <label for="id_radio" class="form-label">ID MODELOS RADIO</label>
                            <Input class="form-control" name="id_mod_rad_cambiar" value="<?php echo $modelos_rad->Id_modelo_rad?>"  readonly></Input>
                        </div>
                        <div class="col mb-4">
                            <label for="nom_marca">Nombre de la marca</label>
                        <input type="text" name="nom_marca" class="form-control" disabled required value="<?php echo $modelos_rad->nombre_marca ?>">
                        </div>
                        <div class="col mb-4">
                            <label for="nom_m_rad">Nombre modelo de radio</label>
                        <input type="text" name="actualizar_nom_modelo" class="form-control" required value="<?php echo $modelos_rad->nombre_m_rad ?>">
                        </div>
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_mod_rad">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>
            <?php
        }//what?
    }

    public static function escribir_modelos_rou($conexion){
        $sql="call escribir_modelos_router()";
        $modelos_rou = RepositorioCentral::consultas($conexion,$sql);
        if ($modelos_rou==null) {
            ?>
            <tr>
                <td colspan="2">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($modelos_rou as $modelos_rou){
            ?>
            <tr>
                <td><?php echo $modelos_rou -> nombre_marca_router  ?></td>
                <td><?php echo $modelos_rou -> nombre_m_rou  ?></td>
                <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $modelos_rou ->Id_modelo_rou?>">
                    Editar
                </button>
            
                <div class="modal fade" id="exampleModalmares<?php echo $modelos_rou ->Id_modelo_rou?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MODELOS ROUTER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="modelos.php">
                    </div>
                    <div class="modal-body">
                       
                        <div class="col">
                            <label for="id_radio" class="form-label">ID MODELOS ROUTER</label>
                            <Input class="form-control" name="id_mod_rou_cambiar" value="<?php echo $modelos_rou->Id_modelo_rou?>" readonly></Input>
                        </div>
                        <div class="col mb-4">
                            <label for="nom_mar_rou">Nombre de la marca</label>
                        <input type="text" name="nom_marca" class="form-control" disabled required value="<?php echo $modelos_rou->nombre_marca_router ?>">
                        </div>
                        <div class="col mb-4">
                            <label for="nom_mod_rou">Nombre modelo de router</label>
                        <input type="text" name="actualizar_nom_m_rou" class="form-control" required value="<?php echo $modelos_rou->nombre_m_rou ?>">
                        </div>
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_modelos_rou">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>
        

            <?php
        }
    }

    public static function escribir_tecnicos($conexion){
        $sql="call escribir_tecnicos()";
        $tecnicos= RepositorioCentral::consultas($conexion,$sql);
        if ($tecnicos==null) {
            ?>
            <tr>
                <td colspan="2">Sin registros</td>
            </tr> 
            <?php
            }
        foreach ($tecnicos as $tecnicos){
            ?>
        <tr>
            <td><?php echo $tecnicos -> nombre ?></td>
            <td><?php echo $tecnicos -> A_Paterno ?></td>
            <td><?php echo $tecnicos -> A_Materno ?></td>
            <td><?php echo $tecnicos -> correo ?></td>
            <td><?php echo $tecnicos -> telefono ?></td>
            <td><?php echo $tecnicos -> tipo ?></td>
            <td><?php echo $tecnicos -> estado_trabajador?></td>
            <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $tecnicos->id_trabajador?>">
                    Editar
                </button>
         </td>
                <div class="modal fade" id="exampleModalmares<?php echo $tecnicos->id_trabajador?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ROUTER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="tecnicos.php">
                    </div>
                    <div class="modal-body">
                      
                       <div class="col mb-4">
                            <label for="id_trabajador" class="form-label">Id Trabajador</label>
                            <Input class="form-control" name="id_trabajador_cambiar" value="<?php echo $tecnicos->id_trabajador?>" readonly></Input>
                        </div>
                        
                        <div class="col mb-4">
                            <label for="mod_radio">Nombre de Técnico</label>
                        <input type="text" name="nom_traba" class="form-control" disabled required value="<?php echo $tecnicos->nombre?>">
                        </div>
                        
                        <div class="col mb-4">
                            <label for="serie_rad">Apellido Paterno</label>
                        <input type="text" name="A_pat_traba" class="form-control" disabled required value="<?php echo $tecnicos->A_Paterno?>">
                        </div>
                        <div class="col mb-4">
                            <label for="estado_Rad">Apellido Materno </label>
                        <input type="text" name="A_mat_traba" class="form-control" disabled required value="<?php echo $tecnicos->A_Materno?>">
                        </div>
                        <div class="col mb-4">
                            <label for="estado_Rad">Correo </label>
                        <input type="text" name="correo_traba" class="form-control" disabled required value="<?php echo $tecnicos->correo?>">
                        </div>
                        <div class="col mb-4">
                            <label for="estado_Rad">Telefono </label>
                        <input type="text" name="tel_traba" class="form-control" disabled required value="<?php echo $tecnicos->telefono?>">
                        </div>
                        <div class="col mb-4">
                            <label for="estado_Rad">Tipo de trabajador </label>
                        <input type="text" name="tipo_traba" class="form-control" disabled required value="<?php echo $tecnicos->tipo?>">
                        </div>
                        <div class="col mb-4">
                        <select class="form-select" name="actualiza_estado_trabajadores">
                        <option value="desconectado">DESCONECTADO</option>
                        <option value="activo">ACTIVO</option>
                        </select>
                        </div>
                       
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_trabajador">Guardar cambio</button>
                  </div>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>

        <?php
        }
    }

    public static function escribir_clientes($conexion,$sql){
        
        $clientes= RepositorioCentral::consultas($conexion,$sql);
        if ($clientes==null) {
            ?>
            <tr>
                <b><td colspan="7">Sin registros</td></b>
            </tr> 
            <?php
            }
        foreach ($clientes as $clientes){
            ?>
        <tr>
            <td><?php echo $clientes -> nombre ?></td>
            <td><?php echo $clientes -> A_Paterno ?></td>
            <td><?php echo $clientes -> A_Materno ?></td>
            <td><?php echo $clientes -> correo ?></td>
            <td><?php echo $clientes -> telefono ?></td>
            <td><?php echo $clientes -> estado_cliente?></td>
            <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $clientes->id_cliente?>">
                    Editar
                </button>
           </td>
                <div class="modal fade" id="exampleModalmares<?php echo $clientes->id_cliente?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="clientes.php">
                    </div>
                    <div class="modal-body">
                        <div class="col">
                    <div class="col-mb-4">
                            <label for="id_cliente" class="form-label">Id cliente</label>
                            <Input class="form-control" name="id_cliente_cambiar" value="<?php echo $clientes->id_cliente?>" readonly></Input>
                        </div>
                        
                        
                        <div class="col-mb-4">
                            <label for="nom_cliente">Nombre de Cliente</label>
                        <input type="text" name="nom_cliente" class="form-control" disabled required value="<?php echo $clientes->nombre?>">
                        </div>
                        
                        <div class="col-mb-4">
                            <label for="A_pat_cliente">Apellido Paterno</label>
                        <input type="text" name="A_pat_cliente" class="form-control" disabled required value="<?php echo $clientes->A_Paterno?>">
                        </div>
                        <div class="col-mb-4">
                            <label for="A_mat_cliente">Apellido Materno </label>
                        <input type="text" name="A_mat_cliente" class="form-control" disabled required value="<?php echo $clientes->A_Materno?>">
                        </div>
                        <div class="col-mb-4">
                            <label for="correo_cliente">Correo </label>
                        <input type="text" name="correo_cliente" class="form-control" disabled required value="<?php echo $clientes->correo?>">
                        </div>
                        <div class="col-mb-4">
                            <label for="tel_cliente">Telefono </label>
                        <input type="text" name="tel_cliente" class="form-control" disabled required value="<?php echo $clientes->telefono?>"><br>
                        </div>
                       
                        
                        <div class="col-mb-4">
                        <select class="form-select" name="actualiza_estado_clientes">
                        <label for="estado cliente">Estado</label>
                        <option value="activo">ACTIVO</option>
                        <option value="desconectado" selected>DESCONECTADO</option>
                        </select>
                        </div>
                        <br>
                        </div>
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_cliente">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>

        <?php
        }
    }

    public static function clientes($conexion,$sql){
        $clientes= RepositorioCentral::consultas($conexion,$sql);
        if ($clientes==null) {
            ?>
            <tr>
                <b><td colspan="7">Sin registros</td></b>
            </tr> 
            <?php
            }
        foreach ($clientes as $clientes){
            ?>
        <tr>
            <td><?php echo $clientes -> nombre ?></td>
            <td><?php echo $clientes -> A_Paterno?></td>
            <td><?php echo $clientes -> A_Materno?></td>
            <td><?php echo $clientes -> correo ?></td>
            <td><?php echo $clientes -> telefono ?></td>
            <td><?php echo $clientes -> estado_cliente?></td>
            <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $clientes->id_cliente?>">
                    Editar
                </button>
           </td>
                <div class="modal fade" id="exampleModalmares<?php echo $clientes->id_cliente?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="clientes.php">
                    </div>
                    <div class="modal-body">
                        <div class="col">
                    <div class="col-mb-4">
                            <label for="id_cliente" class="form-label">Id cliente</label>
                            <Input class="form-control" name="id_cliente_cambiar" value="<?php echo $clientes->id_cliente?>" readonly></Input>
                        </div>
                        <div class="col-mb-4">
                            <label for="nom_cliente">Nombre de Cliente</label>
                        <input type="text" name="nom_cliente" class="form-control" disabled required value="<?php echo $clientes->nombre?>">
                        </div>
                        <div class="col-mb-4">
                            <label for="A_pat_cliente">Apellido Paterno</label>
                        <input type="text" name="A_pat_cliente" class="form-control" disabled required value="<?php echo $clientes->A_Paterno?>">
                        </div>
                        <div class="col-mb-4">
                            <label for="A_mat_cliente">Apellido Materno </label>
                        <input type="text" name="A_mat_cliente" class="form-control" disabled required value="<?php echo $clientes->A_Materno?>">
                        </div>

                        <div class="col-mb-4">
                            <label for="correo_cliente">Correo </label>
                        <input type="text" name="correo_cliente" class="form-control" disabled required value="<?php echo $clientes->correo?>">
                        </div>
                        <div class="col-mb-4">
                            <label for="tel_cliente">Telefono </label>
                        <input type="text" name="tel_cliente" class="form-control" disabled required value="<?php echo $clientes->telefono?>"><br>
                        </div>
                       
                        
                        <div class="col-mb-4">
                        <select class="form-select" name="actualiza_estado_clientes">
                        <label for="estado cliente">Estado</label>
                        <option value="activo">ACTIVO</option>
                        <option value="desconectado" selected>DESCONECTADO</option>
                        </select>
                        </div>
                        <br>
                        </div>
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_cliente">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>

        <?php
        }
    }
    

    public static function escribir_routers($conexion,$esta){
        $sql="call filtrarRouPEsta('$esta');";
        $routers= RepositorioCentral::consultas($conexion,$sql);
        if ($routers==null) {
            ?>
            <tr>
                <b><td colspan="5">Sin registros</td></b>
            </tr> 
            <?php
            } 
        foreach ($routers as $routers){
            ?>
        <tr></tr>
            <td><?php echo $routers -> Marca ?></td>
            <td><?php echo $routers -> Modelo ?></td>
            <td><?php echo $routers -> N_serie ?></td>
            <td><?php echo $routers -> estado_router ?></td>
            <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $routers->id_router?>">
                    Editar
                </button>
         </td>
                <div class="modal fade" id="exampleModalmares<?php echo $routers->id_router?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ROUTER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="routers.php">
                    </div>
                    <div class="modal-body">
                        
                    <div class="col mb-4">
                            <label for="id_router" class="form-label">ID Router</label>
                            <Input class="form-control" name="id_router_cambiar" value="<?php echo $routers->id_router?>" readonly></Input>
                        </div>
                        
                        <div class="col mb-4">
                            <label for="mod_radio">Modelo router</label>
                        <input type="text" name="modelo_Rou" class="form-control" disabled required value="<?php echo $routers->modelo_router?>">
                        </div>
                        
                        <div class="col mb-4">
                            <label for="serie_rad">Serie router</label>
                        <input type="text" name="actualiza_serie_rou" class="form-control" required value="<?php echo $routers->serie_router?>">
                        </div>

                        <div class="col mb-4">
                        <select class="form-select" name="actualiza_estado_router">
                        <option value="1">ASIGNADO</option>
                        <option value="2" selected>SIN USAR</option>
                        </select>
                        </div>
        
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guarda_router">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>

        <?php
        }
    }

    public static function escribir_radios($conexion,$esta){
        $sql="call filtrarRadPEsta('$esta')"; //TRAE LOS DATOS DE LA TABLA RADIOS Y LOS NOMBRES DE LA MARCA Y MODELO
        $radios= RepositorioCentral::consultas($conexion,$sql);
        if ($radios==null) {
            ?>
            <tr>
                <b><td colspan="5">Sin registros</td></b>
            </tr> 
            <?php
            } 
        foreach ($radios as $radio){
            ?>
        <tr>
            <td><?php echo $radio -> Marca ?></td>
            <td><?php echo $radio -> Modelo ?></td>
            <td><?php echo $radio -> N_serie ?></td>
            <td><?php echo $radio -> estado_radio ?></td>
            <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $radio->id_radio?>">
                    Editar
                </button>
         </td>
                <div class="modal fade" id="exampleModalmares<?php echo $radio->id_radio?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">RADIOS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="radios.php">
                    </div>
                    <div class="modal-body">
                        
                    <div class="col mb-4">
                            <label for="id_radio" class="form-label">ID Radio</label>
                            <Input class="form-control" name="id_radios_cambiar" value="<?php echo $radio->id_radio?>" readonly></Input>
                        </div>
                        
                        <div class="col mb-4">
                            <label for="mod_radio">Modelo radio</label>
                        <input type="text" name="modelo_Radio" class="form-control" disabled required value="<?php echo $radio->modelo_radio?>">
                        </div>
                        
                        <div class="col mb-4">
                            <label for="serie_rad">Serie radio</label>
                        <input type="text" name="actualiza_serie_radio" class="form-control" required value="<?php echo $radio->serie_radio?>">
                        </div>

                        <div class="col mb-4">
                        <select class="form-select" name="actualiza_estado_radio">
                        <option value="1">ASIGNADO</option>
                        <option value="2" selected>SIN USAR</option>
                        </select>
                        </div>
                       
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary" name="guarda_radios">Guardar cambio</button>
                  </div>
                 </form>
                </div>
             </div>
         </div>
        </tr>

        <?php
        }
    }

    public static function select_router($conexion){
        $sql="call escribir_marcas_router()";
        $routers = RepositorioCentral::consultas($conexion,$sql);
        foreach ($routers as $rou){
            ?>
            <option value="<?php  echo $rou->Id_marca_rou ?>"><?php echo $rou->nombre_m_rou;  ?></option>      
            <?php
        }
        
    } 
    
    public static function select_radio($conexion){
        $sql="call marcas_radio()";
        $radios = RepositorioCentral::consultas($conexion,$sql);
        foreach ($radios as $radio){
            ?>
            <option value="<?php  echo $radio->Id_marca_rad ?>"><?php echo $radio->nombre_m_rad;  ?></option>      
            <?php
        }
        
    } 
    public static function ver_ranchos($conexion,$sql){
        
        $ranchos = RepositorioCentral::consultas($conexion,$sql);
        if ($ranchos==null) {
         ?>
         <tr>
            <td colspan="4">Sin registros</td>
         </tr>
         <?php
        }
        foreach ($ranchos as $rancho) {
            ?>
            <tr>
                <td> <?php echo $rancho->nombre?> </td>
                <td> <?php echo $rancho->Codigo_Postal?></td>
                <td> <?php echo $rancho->nombre_localidad?></td>
                <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModalmares<?php echo $rancho->id_rancho?>">
                    Editar
                </button>
            
                <div class="modal fade" id="exampleModalmares<?php echo $rancho->id_rancho?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOCALIDADES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form method="POST" action="ranchos.php">
                    </div>
                    <div class="modal-body">
                    
                    <div class="col mb-4">
                            <label for="id_localidad" class="form-label">ID Localidad</label>
                            <Input class="form-control" name="id_localidad_cambiar" value="<?php echo $rancho->id_rancho?>" readonly></Input>
                        </div>
                        
                        <div class="col mb-4">
                            <label for="nom_mun">Nombre Municipio</label>
                        <input type="text" name="nom_municipio" class="form-control" disabled required value="<?php echo $rancho->nombre_localidad?>">
                        </div>
                      
                        <div class="col mb-4">
                            <label for="nom_localidad">Nombre localidad</label>
                        <input type="text" name="actualizar_nom_localidad" class="form-control" required value="<?php echo $rancho->nombre?>">
                        </div>
                        <div class="col mb-4">
                         <label for="cp">Codigo postal</label>
                        <input type="text" name="actualizar_cp_localidad" class="form-control" required value="<?php echo $rancho->Codigo_Postal?>">
                        </div>
                    </div>
                    <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="Guarda_Localidad">Guardar cambio</button>
                  </div>
                  </div>
                  
                 </form>
                </div>
             </div>
         </div>
        </tr>
            <?php
        }
        
    }

    public static function ins_pendientes($conexion){
        $sql="SELECT Reg_Solicitud, F_Solicitud, Nombre_solicitud, CONCAT(SOLI_SIN_ASIGNAR.nombre,' ',SOLI_SIN_ASIGNAR.A_Paterno,' ',SOLI_SIN_ASIGNAR.A_Materno) as nombre, CONCAT(SOLI_SIN_ASIGNAR.calle_uno,' ',SOLI_SIN_ASIGNAR.calle_dos,' ',SOLI_SIN_ASIGNAR.no_casa) as direccion, detalles_solicitud FROM  (SELECT * FROM USUARIOS JOIN CLIENTES ON ID_USUARIO=USUARIO_CLIENTE
        JOIN SOLICITUDES ON ID_CLIENTE=USUARIO
        JOIN  tipo_solicitudes ON tipo_solicitudes.id_tipo_solicitud=solicitudes.TIPO_SOLICITUD 
        LEFT JOIN TECNICO_ASIGNADO ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD 
        WHERE REG_ASIGNACION IS NULL) AS SOLI_SIN_ASIGNAR 
        WHERE SOLI_SIN_ASIGNAR.tipo_solicitud =1 OR SOLI_SIN_ASIGNAR.tipo_solicitud =2 OR SOLI_SIN_ASIGNAR.tipo_solicitud = 3;";
        $solic_pen = RepositorioCentral::consultas($conexion,$sql);
        if($solic_pen== null){
            ?>
            <tr>
                <td col="4">SIN REGISTROS</td>
            </tr>
            <?php
        }
       
        foreach ($solic_pen as $value) {
            ?>
             <tr>
                <td><?php echo $value->F_Solicitud ?></td>
                <td><?php echo $value->Nombre_solicitud ?></td>
                <td><?php echo $value->nombre ?></td>
                <td><?php echo $value->direccion?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#as_tecaaa<?php echo $value->Reg_Solicitud ?>" >
                ASIGNAR TECNICO
                </button></td>
                <!-- Modal -->
                <div class="modal fade" id="as_tecaaa<?php echo $value->Reg_Solicitud ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header"> <form action="" method="post">
                <h5 class="modal-title" id="exampleModalLabel">ASIGNAR TECNICO </h5> <input type="text" name="id_solicitudins" style="width: 100px; margin-left:450px;" class="form-control text-center" data-bs-dismiss="modal" readonly value="<?php echo $value->Reg_Solicitud?>" >
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
       
                <div class="col mb-3">
                <label for="select_tecnicoins">SELECCIONAR TECNICO</label>
                <select name="select_tecnicoins" id="select_tecnicoins" class="form-select">
                <option selected disabled>-- SELECCIONE AL TECNICO --</option>
                <?php 
                $tecnicos="SELECT id_trabajador, concat(nombre,' ',A_Paterno) as nombre from trabajadores join tipo_trabajador on trabajadores.tipo_trabajador=tipo_trabajador.id_tipo_trabajador join usuarios on usuarios.id_usuario= trabajadores.usuario_trabajador where tipo='TECNICO'";
                $tecnicos_listos = RepositorioCentral::consultas($conexion,$tecnicos);
                if($tecnicos_listos== null){
                ?>
                <option value="">SIN REGISTROS</option>
                <?php
                }
                foreach ($tecnicos_listos as $tecnicos_listo) {
                ?> 
                <option value="<?php echo $tecnicos_listo->id_trabajador?>"><?php echo $tecnicos_listo->nombre;?></option>
                <?php
                }
                ?>
                </select>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" name="asignar_tec_insta" class="btn btn-primary">ASIGNAR</button>
                </form>
                </div>
                </div>
                </div>
                </div>
            </tr>
             <!-- Modal -->



            <?php
           }
    }

    public static function repo_pendientes($conexion){
        $sql="SELECT Reg_Solicitud, F_Solicitud, Nombre_solicitud, CONCAT(SOLI_SIN_ASIGNAR.nombre,' ',SOLI_SIN_ASIGNAR.A_Paterno,' ',SOLI_SIN_ASIGNAR.A_Materno) as nombre, CONCAT(SOLI_SIN_ASIGNAR.calle_uno,' ',SOLI_SIN_ASIGNAR.calle_dos,' ',SOLI_SIN_ASIGNAR.no_casa) as direccion, detalles_solicitud FROM  (SELECT * FROM USUARIOS JOIN CLIENTES ON ID_USUARIO=USUARIO_CLIENTE
        JOIN SOLICITUDES ON ID_CLIENTE=USUARIO
        JOIN  tipo_solicitudes ON tipo_solicitudes.id_tipo_solicitud=solicitudes.TIPO_SOLICITUD 
        LEFT JOIN TECNICO_ASIGNADO ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD 
        WHERE REG_ASIGNACION IS NULL) AS SOLI_SIN_ASIGNAR 
        WHERE SOLI_SIN_ASIGNAR.tipo_solicitud =4 OR SOLI_SIN_ASIGNAR.tipo_solicitud =5 OR SOLI_SIN_ASIGNAR.tipo_solicitud = 6;";
        $solic_pen = RepositorioCentral::consultas($conexion,$sql);
        if($solic_pen== null){
            ?>
            <tr>
                <td colspan="4">SIN REGISTROS</td>
            </tr>
            <?php
        }
       
        foreach ($solic_pen as $value) {
            ?>
             <tr>
                <td><?php echo $value->F_Solicitud ?></td>
                <td><?php echo $value->Nombre_solicitud ?></td>
                <td><?php echo $value->nombre ?></td>
                <td><?php echo $value->direccion ?></td>
                </td><td><?php echo $value->detalles_solicitud ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#as_tec<?php echo $value->Reg_Solicitud ?>" >
ASIGNAR TECNICO
</button></td>
<!-- Modal -->
<div class="modal fade" id="as_tec<?php echo $value->Reg_Solicitud ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"> <form action="" method="post">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNAR TECNICO </h5> <input type="text" name="id_solicitud" style="width: 100px; margin-left:450px;" class="form-control text-center" data-bs-dismiss="modal" readonly value="<?php echo $value->Reg_Solicitud?>" >
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <div class="col mb-3">
        <label for="select_tecnico">SELECCIONAR TECNICO</label>
        <select name="select_tecnico" id="select_tecnico" class="form-select">
        <option selected disabled>-- SELECCIONE AL TECNICO --</option>
    <?php 
    $tecnicos="SELECT id_trabajador, concat(nombre,' ',A_Paterno) as nombre from trabajadores join tipo_trabajador on trabajadores.tipo_trabajador=tipo_trabajador.id_tipo_trabajador join usuarios on usuarios.id_usuario= trabajadores.usuario_trabajador where tipo='TECNICO'";
    $tecnicos_listos = RepositorioCentral::consultas($conexion,$tecnicos);
    if($tecnicos_listos== null){
        ?>
        <option value="">SIN REGISTROS</option>
        <?php
    }
    foreach ($tecnicos_listos as $tecnicos_listo) {
     ?> 
     <option value="<?php echo $tecnicos_listo->id_trabajador?>"><?php echo $tecnicos_listo->nombre;?></option>
     <?php
    }
    ?>
        </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="asignar_tecnico" class="btn btn-primary">ASIGNAR</button>
        </form>
      </div>
    </div>
  </div>
</div>
            </tr>
             <!-- Modal -->
            <?php
           }
    }
} 