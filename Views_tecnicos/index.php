<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Zacred Tecnicos</title>
</head>
<body>

<?php 
 include 'navs_tecnicos.php';
 include '../Clases/conexion.inc.php';
 include '../Clases/RepositorioTecnico.inc.php';
 include '../Clases/SelectsTecnicos.inc.php';
  ?>

      <!--Contenido de la pagina-->
      <br>
    <div id="layoutSidenav_content" class="container">
                <main>
                  <h3>Solicitudes atendidas:</h3>
                  <br>
                  <div class="row align-items-start">
                    <!--TOTAL DE PENDIENTES-->
                    <div class="col-xl-3 col-md-3 offset-1">
                        <div class="row justify-content-center">
                            <div class="card bg-info text-white mb-2">
                                <div class="card-header">Total</div>
                                  <div class="card-body text-center">
                                    <h1><?php 
                                      Conexion::abrir_conexion();
                                      SelectsTecnicos::contarRealizados(conexion::obtener_conexion(),$_SESSION['id_trabajador']/*USUARIO*/);
                                      Conexion::cerrar_conexion();
                                    ?></h1>
                                  </div>
                          </div>
                        </div>
                    </div>
                    <!--TERMINA TOTAL DE PENDIENTES-->


                    <!--INSTALACIONES PENDIENTES-->
                      <div class="col-xl-3 col-md-3 offset-1">
                        <div class="row justify-content-center">
                            <div class="card bg-success text-white mb-2">
                              <div class="card-header">Instalaciones realizadas</div>
                                <div class="card-body text-center">
                                  <h1><?php 
                                    Conexion::abrir_conexion();
                                    SelectsTecnicos::contarInstReal(conexion::obtener_conexion(),'1'/*estado de sol */,$_SESSION['id_trabajador'] /* id trabajador */);
                                    Conexion::cerrar_conexion();
                                  ?></h1>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="instalacionesrealizadas.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                          </div>
                        </div>
                      </div>
                        <!--TERMINA REPORTES PENDIENTES-->
                        

                        <!--REPORTES PENIDENTES-->
                      <div class="col-xl-3 col-md-3 offset-1">
                        <div class="row justify-content-center">
                            <div class="card bg-warning text-white mb-2">
                              <div class="card-header">Reportes realizados</div>
                                <div class="card-body text-center">
                                  <h1><?php 
                                  Conexion::abrir_conexion();
                                  SelectsTecnicos::contarRepoReal(conexion::obtener_conexion(),'1',$_SESSION['id_trabajador']/*USUARIO*/);
                                  Conexion::cerrar_conexion();
                                  ?></h1>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="reportesrealizados.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                          </div>
                        </div>
                      </div>
                          <!--TERMINA REPORTES PENDIENTES-->
                  </div>
                  
                  <h3>Reportes pendientes:</h3>
                  <br>

                  <div class="row align-items-start">
                    <!--TOTAL DE PENDIENTES-->
                    <div class="col-xl-3 col-md-3 offset-1">
                        <div class="row justify-content-center">
                            <div class="card bg-info text-white mb-2">
                                <div class="card-header">Total</div>
                                  <div class="card-body text-center">
                                    <h1><?php 
                                      Conexion::abrir_conexion();
                                      SelectsTecnicos::contarpendientes(conexion::obtener_conexion(),$_SESSION['id_trabajador']/*USUARIO*/);
                                      Conexion::cerrar_conexion();
                                    ?></h1>
                                  </div>
                          </div>
                        </div>
                    </div>
                    <!--TERMINA TOTAL DE PENDIENTES-->


                    <!--INSTALACIONES PENDIENTES-->
                      <div class="col-xl-3 col-md-3 offset-1">
                        <div class="row justify-content-center">
                            <div class="card bg-success text-white mb-2">
                              <div class="card-header">Instalaciones pendientes</div>
                                <div class="card-body text-center">
                                  <h1><?php 
                                    Conexion::abrir_conexion();
                                    SelectsTecnicos::contarinstapend(conexion::obtener_conexion(),'1'/*estado de sol */,$_SESSION['id_trabajador'] /* id trabajador */);
                                    Conexion::cerrar_conexion();
                                  ?></h1>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="instalacionesrealizadas.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                          </div>
                        </div>
                      </div>
                        <!--TERMINA REPORTES PENDIENTES-->
                        

                        <!--REPORTES PENIDENTES-->
                      <div class="col-xl-3 col-md-3 offset-1">
                        <div class="row justify-content-center">
                            <div class="card bg-warning text-white mb-2">
                              <div class="card-header">Reportes pendientes</div>
                                <div class="card-body text-center">
                                  <h1><?php 
                                  Conexion::abrir_conexion();
                                  SelectsTecnicos::contarrepopend(conexion::obtener_conexion(),'1',$_SESSION['id_trabajador']/*USUARIO*/);
                                  Conexion::cerrar_conexion();
                                  ?></h1>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="reportesrealizados.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                          </div>
                        </div>
                      </div>
                          <!--TERMINA REPORTES PENDIENTES-->
                  </div>

                    </main>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/combos.js"></script>
</body>
</html>