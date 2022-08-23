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
                    <h1 class="mt-4">Clientes</h1>
                        
                        <?php 
                            include 'navs_central.php';
                            include '../Clases/conexion.inc.php';
                            include '../Clases/RepositorioCentral.inc.php';
                            include '../Clases/Selects.inc.php';
                            require 'logica.php';
                        ?>
                    <div class="row">
                        <form action="clientes.php" method="POST">
                        <div class="col-12 mt-2 ">
                        <div class="row col-6 offset-3">
                          <label for="inputsfiltro">Filtrar por campo</label>
                          <input type="text" class="form-control" name="inputsfiltro" placeholder="Por favor escriba el Rancho, Correo o Nombre del cliente" require>
                   <!-- <div class="col-md-6 mb-4">
                    <label for="validationCustom04" class="form-label">Municipio</label>
                    <select class="form-select" name="sel_localidad" id="sel_localidad" require>
                    <option selected disabled>-- SELECCIONE --</option>
                    <?php
                    
  /*                    conexion::abrir_conexion();
                      selects::escibir_localidades(conexion::obtener_conexion());
                      conexion::cerrar_conexion();*/
                    
                    ?>
                  </select>
                
                  </div>
                  <div class="col-md-6 mb-4">
                  <label for="validationCustom04" class="form-label">Comunidad</label>
                  <select class="form-select" name="sel_ranchoss" id="sel_ranchoss" require>
                  <option selected disabled>-- SELECCIONE --</option>
                  </select>--> 
             
                  
                  </div>  
                  <div class="mt-3 col-5 offset-3">
                <button type="submit" class="btn btn-primary" name="filt_rancho">Filtrar</button> 
                </div>
                  </div> 
               
                  </form>

            <script type="text/javascript">
                $(document).ready(function(){
                $("#sel_localidad").change(function(){
                 
                  $.get("../ranchos_selects.php","sel_localidad="+$("#sel_localidad").val(), function(data){
                    $("#sel_ranchoss").html(data);
                    console.log(data);
                  });
                });
              });
            </script>  
                        
                    <table class="table text-center " >
                        <legend>Clientes</legend>
                        <thead class="table">
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido Paterno</td>
                            <td>Apellido Materno</td>
                            <td>Correo</td>
                            <td>Telefono</td>
                            <td>Estado</td>
                            <td>#</td>
                        </tr>
                        </thead>
                        <tbody>
                          
                        <?php
                        if (isset($_POST['filt_rancho'])) {
                          extract($_POST);
                          $sql="SELECT id_cliente, usuarios.nombre, A_Paterno, A_Materno, correo, telefono, estado_cliente, ranchos.nombre as nom_ranch FROM usuarios INNER JOIN clientes ON id_usuario=usuario_cliente join ranchos on ranchos.id_rancho = clientes.rancho_cliente where ranchos.nombre like '%$inputsfiltro%' or usuarios.nombre like '%$inputsfiltro%' or usuarios.correo like '%$inputsfiltro%';";
                          Conexion::abrir_conexion();
                          Selects::escribir_clientes(Conexion::obtener_conexion(),$sql);
                          Conexion::cerrar_conexion();
                        } 
                        else{
                          $sql="SELECT id_cliente, nombre, A_Paterno, A_Materno, correo, telefono, estado_cliente,clientes.rancho_cliente
                          FROM usuarios INNER JOIN clientes ON id_usuario=usuario_cliente where rancho_cliente=3";
                          Conexion::abrir_conexion();
                          Selects::escribir_clientes(Conexion::obtener_conexion(),$sql);
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
