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
                      <br>
                    <?php 
                            include 'navs_central.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioCentral.inc.php';
                            include '../Clases/Selects.inc.php';
                            require 'logica.php';
                        ?>
                    <div class="row">
                        <form action="ranchos.php" method="POST">
                        <div class="col-12 mt-2 ">
                        <div class="row">
                <div class="col-md-6 mb-4">
                  <div>
                  <label for="validationCustom04" class="form-label">Municipio</label>
                  <select class="form-select" name="sel_localidad" id="sel_localidad" require>
                    <option selected disabled>-- SELECCIONE --</option>
                    <?php
                    
                      conexion::abrir_conexion();
                      selects::escibir_localidades(conexion::obtener_conexion());
                      conexion::cerrar_conexion();
                    
                    ?>
                  </select>
                  </div>
                  <div class="mt-3"> 
                  <button type="submit" class="btn btn-primary col-md-6 mb-4" name="filt_rancho">Filtrar</button>
                  </div>
                  
                  </form>
                </div>
                
                    <table class="table text-center " >
                        <legend>Localidades con servicio</legend>
                        <thead class="table">
                        <tr>
                            <td>Nombre de la localidad</td>
                            <td>Codigo Postal</td>
                            <td>Municipio</td>
                            <td colspan="2">#</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(isset($_POST['filt_rancho'])){
                          extract($_POST);
                          $sql="SELECT ranchos.localidad, ranchos.id_rancho,ranchos.nombre,ranchos.Codigo_Postal,localidad.nombre as nombre_localidad 
                          from ranchos join localidad on ranchos.localidad = localidad.Id_localidad where ranchos.localidad=$sel_localidad;";
                          Conexion::abrir_conexion();
                        Selects::ver_ranchos(Conexion::obtener_conexion(),$sql);
                        Conexion::cerrar_conexion();
                        }else{
                          $sql="SELECT ranchos.localidad, ranchos.id_rancho,ranchos.nombre,ranchos.Codigo_Postal,localidad.nombre as nombre_localidad 
                          from ranchos join localidad on ranchos.localidad = localidad.Id_localidad where ranchos.localidad=2";
                          Conexion::abrir_conexion();
                        Selects::ver_ranchos(Conexion::obtener_conexion(),$sql);
                        Conexion::cerrar_conexion();
                        }
                        
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

                         