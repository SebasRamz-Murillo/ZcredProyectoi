
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
                    <h1 class="mt-4">Modelos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Radios/Routers</li>
                        </ol>
                        <?php 
                            include 'navs_central.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioCentral.inc.php';
                            include '../Clases/Selects.inc.php';
                            require 'logica.php';
                        ?>
                        <div class="row mt-5 col-8">
                        <table class="table text-center">
                        <legend>Modelos Radios</legend>
                        <thead>
                        <tr>
                            <td>Marca de radios</td>
                            <td>Nombre de modelo</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        Conexion::abrir_conexion();
                        Selects::escribir_modelos_rad(Conexion::obtener_conexion());
                        Conexion::cerrar_conexion();
                        ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="row mt-5 col-8">
                    <table class="table text-center">
                        <legend>Modelos Routers</legend>
                        <thead>
                            <tr>
                                <td>Marca de routers</td>
                                <td>Nombre de modelo</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          Conexion::abrir_conexion();
                          Selects::escribir_modelos_rou(Conexion::obtener_conexion());
                          Conexion::cerrar_conexion();
                        ?>
                        </tbody>
                    </table>
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