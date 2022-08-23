<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Zacred</title>
</head>
<body>
    <!-- Nav barr superiror -->
    <body><?php 
session_start();
if(isset($_SESSION['tipo']))
{
  if($_SESSION['tipo']=='CENTRAL'){
    header('location: ../views_centra/index.php');
  }
  if($_SESSION['tipo']=='TECNICO'){
    header('location: ../views_tecnicos/index.php');
  }
}
else{
  header('location: ../index.php');
}
?>
  <?php 
    include 'navs_user.php';
    include '../Clases/conexion.inc.php';
    include '../Clases/RepositorioUsuario.inc.php';
    include '../Clases/SelectsClientes.inc.php';
    include 'modalsClientes.php';
    ?>
   <br><br><br>
    <div class="content" id="layoutSidenav_content">
      <main>
          <div class="container-fluid">
              <div class="row">
                <h1>Estado</h1>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item active">Descripciones</li>
                </ol>
            </div>
                <div class="row">
            <?php 
          if (isset($_POST['generarReporte'])) { 
              extract($_POST);
              $generar="INSERT into solicitudes(F_Solicitud, usuario, tipo_solicitud,detalles_solicitud) values ('$dia', '$_SESSION[id_cliente]','$tipo_reporte','$detalle_solicitud')";
              Conexion::abrir_conexion();
               $ccm = Conexion::obtener_conexion();
               $ccm->query($generar);
              Conexion::cerrar_conexion();
            }
            ?>
                    <div class="col text-end fs-2"><h1>Estado:</h1></div>
                   <?php
                   if($_SESSION['estado_cliente']=='DESCONECTADO'){
                    ?> <div class="col fs-2"><P style="color: rgb(255, 37, 37 );"> DESCONECTADO</P></div> <?php
                   }else if($_SESSION['estado_cliente']=='ACTIVO') {
                    ?> <div class="col fs-2"><P style="color: rgb(0, 112, 0);"> ACTIVO</P></div> <?php
                   }
                   else{
                    ?> <div class="col fs-2"><P style="color: rgb(255, 196, 51);"> PENDIENTE</P></div> <?php
                   } ?>
                </div>
              <div class="row">
                  <div class="col-xl-3 col-md-6">
                      <div class="card  mb-4">
                        <div class="card-header">Reportes totales</div>
                          <div class="card-body text-center">
                            <h1>
                            <?php 
                                  Conexion::abrir_conexion();
                                  SelectsClientes::ContarRepTot(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                  Conexion::cerrar_conexion();
                            ?> 
                            </h1>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                              <a class="small stretched-link" href="reportes.php">Ver detalles</a>
                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                      <div class="card mb-4">
                        <div class="card-header">Reportes de internet lento</div>
                          <div class="card-body text-center">
                            <h1>
                            <?php 
                                  Conexion::abrir_conexion();
                                  SelectsClientes::ContarRepIntLento(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                  Conexion::cerrar_conexion();
                            ?>
                            </h1>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                              <a class="small stretched-link" href="reportes.php">Ver detalles</a>
                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                      <div class="card mb-4">
                        <div class="card-header">Reportes sin internet</div>
                          <div class="card-body text-center">
                            <h1>
                            <?php 
                                  Conexion::abrir_conexion();
                                  SelectsClientes::ContarRepSinInt(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                  Conexion::cerrar_conexion();
                                  ?>
                            </h1>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                              <a class="small stretched-link" href="reportes.php">Ver detalles</a>
                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                      <div class="card mb-4">
                        <div class="card-header">Cambios de velocidad</div>
                          <div class="card-body text-center">
                          <h1>
                          <?php 

                                  Conexion::abrir_conexion();
                                  SelectsClientes::ContarRepCambioVelo(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                  Conexion::cerrar_conexion(); 
                                  ?>
                          </h1>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                              <a class="small  stretched-link" href="reportes.php">Ver detalles</a>
                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
                        <h1 class="text-center">Historial de instalacion</h1>
                        
                        <table class="table text-center" >
                        <tbody>
                        <?php 
                        
                          extract($_POST);
                          Conexion::abrir_conexion();
                          SelectsClientes::mostrarPaquete(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                          Conexion::cerrar_conexion();
                        
                        
                        ?>
                        </tbody>
                       </table>





        
      
    </div>
  </div>
<!--------------------------------------------->


      </main> 
  </div>
</div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/inicio.js"></script>
</body>
</html>