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
 
 <br>
 <br>
    <!-- termino barra lateral(adios) -->
    <div id="layoutSidenav_content">
                <main>

                <div class="container-fluid">
                        <?php 
                            include 'navs_tecnicos.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioTecnico.inc.php';
                            include '../Clases/SelectsTecnicos.inc.php';
                        ?>

                        <div class="row">
                        <div class="col-12 mt-2 ">
                    <table class="table text-center " >
                        <h1 class="text-center">Instalaciones realizadas</h1>
                        <form action="instalacionesrealizadas.php" method="post">
                          <select name="fechas" id="fechas">
                            <?php
                          Conexion::abrir_conexion();
                          SelectsTecnicos::bimestresActivos(Conexion::obtener_conexion(),$_SESSION['id_trabajador'] );
                          Conexion::cerrar_conexion(); 
                          ?>
                          </select>
                          <select name="fechas2" id="fechas2">
                            <?php
                          Conexion::abrir_conexion();
                          SelectsTecnicos::bimestresActivos(Conexion::obtener_conexion(),$_SESSION['id_trabajador'] );
                          Conexion::cerrar_conexion(); 
                          ?>
                          </select>
                        <button type="submit" class="btn btn-primary" name="bimes">Revisar meses</button>
                        </form>
                        <?php
                        if (isset($_POST['bimes'])){
                          extract($_POST);
                          if($fechas>$fechas2){
                            $f=$fechas2;
                            $f2=$fechas;
                            
                          }
                          else{
                            $f=$fechas;
                            $f2=$fechas2;
                          }
                          $boton=1;
                        } 
                        else{
                          $boton=0;
                          $f=1;
                          $f2=6;
                        }
                        

                        ?>
                        <thead class="table-info">
                        <tr>
                            <td>Fecha de solicitud <?php 
                            
                            echo ' entre meses ',$f,'-',$f2?> </td>
                            <td>Cliente</td>
                            <td>Telefono</td>
                            <td>Calle 1</td>
                            <td>Calle 2</td>
                            <td>Tipo de solicitud</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($boton==1){
                          
                          Conexion::abrir_conexion();
                        SelectsTecnicos::escribir_instalaciones_realizadas(conexion::obtener_conexion(),$_SESSION['id_trabajador'],$f,$f2);
                        Conexion::cerrar_conexion();
                      }
                        
                        else{
                   
                       
                          Conexion::abrir_conexion();
                        SelectsTecnicos::escribir_instalaciones_realizadas(conexion::obtener_conexion(),$_SESSION['id_trabajador'],1,6);
                        Conexion::cerrar_conexion();
                        }
                        
                        ?>
                        </tbody>
                       </table>
                        </div>
                        <br>
                </main>
            </div>
        </div>
                
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  </body>
</html>
