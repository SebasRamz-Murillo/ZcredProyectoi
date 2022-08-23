<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/stylecentral.css"/>
    <title>Zacred</title>
  </head>
  <body>
  
    <!-- termino barra lateral(adios) -->
    <br>
    <br>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4">Estadisticas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                        <?php 
                            include 'navs_central.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioCentral.inc.php';
                            include '../Clases/Selects.inc.php';              
                            require 'logica.php';
                        ?>  
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                <div class="card-header">SOLICITUDES <br> PENDIENTES</div>
                                    <div class="card-body text-center fs-2">
                                        <?php 
                                        Conexion::abrir_conexion();
                                        $sql="SELECT count(*) as numsolpen FROM SOLICITUDES LEFT JOIN TECNICO_ASIGNADO  ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD where reg_asignacion is null
                                        ";
                                        $resp = RepositorioCentral::consul_num(conexion::obtener_conexion(),$sql);
                                        echo $resp ['numsolpen']; 
                                        Conexion::cerrar_conexion();
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                <div class="card-header">REPORTES <br>  PENDIENTES</div>
                                    <div class="card-body text-center fs-2">

                                    <?php
                                    Conexion::abrir_conexion();
                                    $query="SELECT COUNT(*) AS NUMREPOR FROM  (SELECT * FROM SOLICITUDES JOIN  tipo_solicitudes ON tipo_solicitudes.id_tipo_solicitud=solicitudes.TIPO_SOLICITUD LEFT JOIN TECNICO_ASIGNADO ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD WHERE REG_ASIGNACION IS NULL) AS SOLI_SIN_ASIGNAR WHERE SOLI_SIN_ASIGNAR.tipo_solicitud =4 OR SOLI_SIN_ASIGNAR.tipo_solicitud =5 OR SOLI_SIN_ASIGNAR.tipo_solicitud = 6 ;";
                                    $resnum = RepositorioCentral::consul_num(conexion::obtener_conexion(),$query);
                                    echo $resnum['NUMREPOR'];
                                    Conexion::cerrar_conexion();
                                    ?>

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                <div class="card-header">INSTALACIONES<br>PENDIENTES</div>
                                    <div class="card-body text-center fs-2">
                                        <?php 
                                            Conexion::abrir_conexion();
                                         $sqls="SELECT COUNT(SOLI_SIN_ASIGNAR.tipo_solicitud)AS NUM_INST_PEN FROM (SELECT * FROM SOLICITUDES JOIN  tipo_solicitudes ON tipo_solicitudes.id_tipo_solicitud=solicitudes.TIPO_SOLICITUD LEFT JOIN TECNICO_ASIGNADO ON TECNICO_ASIGNADO.SOLICITUD=SOLICITUDES.REG_SOLICITUD WHERE REG_ASIGNACION IS NULL) AS SOLI_SIN_ASIGNAR WHERE SOLI_SIN_ASIGNAR.tipo_solicitud =1 OR SOLI_SIN_ASIGNAR.tipo_solicitud =2 OR SOLI_SIN_ASIGNAR.tipo_solicitud = 3 ;";
                                         $resnumINS = RepositorioCentral::consul_num(conexion::obtener_conexion(),$sqls);
                                        echo $resnumINS['NUM_INST_PEN'];
                                         Conexion::cerrar_conexion();
                                        ?>
                                       
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                            <table class="table">            
                <legend>Reportes pendientes</legend>
                <thead>
                    <tr>
                        <td>FECHA</td><td>TIPO DE SOLICITUD</td><td>CLIENTE</td><td>DIRECCION</td><td>DETALLES</td><td>#</td>
                    </tr>
                </thead>
                <tbody>
                     <?php
                      Conexion::abrir_conexion();
                     selects::repo_pendientes(conexion::obtener_conexion());
                     conexion::cerrar_conexion();
                      ?>
                </tbody>
            </table>
                            </div> 
            
                  <br>
                  <br>
                  <div class="row mt-5">
                  <table class="table">
                  <legend>Instalaciones pendientes</legend>
                  <thead>
                          <tr>
                              <td>FECHA</td><td>TIPO DE SOLICITUD</td><td>CLIENTE</td><td>DIRECCION</td><td class="text-center">#</td>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          Conexion::abrir_conexion();
                          selects::ins_pendientes(conexion::obtener_conexion());
                          conexion::cerrar_conexion();
                          ?>
                      </tbody>
                  </table>
                  </div>
           


                    </div>              
                    </div>
                    </main>
                </div>
            </div>
                
   <?php 
   include 'modals_central.php';
   ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  </body>
</html>

                         