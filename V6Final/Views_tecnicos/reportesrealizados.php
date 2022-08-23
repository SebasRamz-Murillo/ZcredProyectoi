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
    <title>Document</title>
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
    <div id="layoutSidenav_content">
                <main>

                <div class="row">
                        <div class="col-12 mt-2 ">
                        <table class="table text-center " >
                        <h1 class="text-center">Reportes realizados</h1>

                        
                        <thead class="table-info">
                        <tr>
                            <td>Fecha de solicitud</td>
                            <td>Cliente</td>
                            <td>Telefono</td>
                            <td>Calle 1</td>
                            <td>Calle 2</td>
                            <td>Fecha de solución</td>
                            <td>Detalles de reporte</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        Conexion::abrir_conexion();
                        SelectsTecnicos::escribir_reportes_realizados(conexion::obtener_conexion(),$_SESSION['id_trabajador'] /* id trabajador */);
                        Conexion::cerrar_conexion();
                        ?>
                        </tbody>
                        </table>
                        </div>


                </main>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/combos.js"></script>
</body>
</html>