
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
                    <h1 class="mt-4">Tecnicos</h1>
                        
                        <?php 
                            include 'navs_central.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioCentral.inc.php';
                            include '../Clases/Selects.inc.php';
                            require 'logica.php';
                        ?>
                    <div class="row">
                        <div class="col-12 mt-2 ">
                    <table class="table text-center " >
                        <legend>Tecnicos</legend>
                        <thead class="table">
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido Paterno</td>
                            <td>Apellido Materno</td>
                            <td>Correo</td>
                            <td>Telefono</td>
                            <td>Tipo de trabajador</td>
                            <td>Estado trabajador</td>
                            <td>#</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                          Conexion::abrir_conexion();
                          Selects::escribir_tecnicos(Conexion::obtener_conexion());
                          Conexion::cerrar_conexion();
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
