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

    <!--CONTENIDO DE LA PAGINA-->
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4">Radios</h1>
                        
                        <?php 
                            include 'navs_central.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioCentral.inc.php';
                            include '../Clases/Selects.inc.php';
                            require 'logica.php';
                        ?>
                        <div class="row">
                    
                        </div>
                        <div class="row">
                        <div class="col-12 mt-2 ">
                        <form action="radios.php" method="POST">
                          
                          <div class="col md 6">
                            <select name="sel_estado" id="sel_estado">
                              <option value="SIN USAR" selected>SIN USAR</option>
                              <option value="ASIGNADO">ASIGNADO</option>
                            </select>
                          </div>
                          <div class="col md 6">
                          <button type="submit" class="btn btn-primary" name="filt_rad">Filtrar</button>
                          </div>

                          
                        </form>


                    <table class="table text-center " >
                        <legend>Radios</legend>
                        <thead class="table">
                        <tr>
                            <td>Marca</td>
                            <td>Modelo</td>
                            <td>N. Serie</td>
                            <td>Estado</td>
                            <td>#</td>
                        </tr>
                        
                        
                        </thead>
                        <tbody>
                        <?php 
                          if (isset($_POST['filt_rad'])){
                            extract($_POST);
                            echo $sel_estado;
                            Conexion::abrir_conexion();
                            Selects::escribir_radios(Conexion::obtener_conexion(),$sel_estado);
                            Conexion::cerrar_conexion();
                            }
                            else{
                              $sel_estado='SIN USAR';
                              Conexion::abrir_conexion();
                              Selects::escribir_radios(Conexion::obtener_conexion(),$sel_estado);
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

        <!--TERMINA CONTENIDO DE LA PAGINA-->
        <?php 
          include 'modals_central.php';
        ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

  </body>
</html>