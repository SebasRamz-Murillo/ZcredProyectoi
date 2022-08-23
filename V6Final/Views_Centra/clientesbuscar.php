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


                        <br>
                    <div class="row justify-content-end">

                        <div class="col">
                            <form action="" method="post">
                            <input class="btn btn-primary" type="submit"  name="vertodo" value="Ver todos">
                            </form>
                        </div>

                        <div class="col offset-3">
                            <form action="" method="post">
                            <input type="text" name="busqueda">
                            <input class="btn btn-primary" type="submit" name="enviar" value="buscar">
                            </form>
                        </div>
                    </div>
                    </div>
                <br>
                <br>

                
                <div class="container-fluid">
                    <h5>Filtrar por:</h5>

                <form action="clientesbuscar.php" method="POST">
                    
                    <div class="row justify-content-center">
                            
                        <div class="col-md-4 mb-2">
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

                        
                        <div class="col-md-4 mb-2">
                            <label for="validationCustom04" class="form-label">Comunidad</label>
                            <select class="form-select" name="sel_ranchoss" id="sel_ranchoss" require>
                            <option selected disabled>-- SELECCIONE --</option>
                            </select>
                        </div>

                        <div class="col-md-3 p-2">
                            <br>
                            <button type="submit" class="btn btn-primary" name="filt_rancho">Filtrar</button>  
                        </div>
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



                <br>
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

                if(isset($_POST['enviar'])){
                    extract($_POST);
                    $sql="SELECT id_cliente,nombre, A_Paterno, A_Materno, correo, telefono, estado_cliente,clientes.rancho_cliente
                    FROM usuarios INNER JOIN clientes ON id_usuario=usuario_cliente where nombre like '$busqueda' or A_Paterno='$busqueda'
                    or A_Materno='$busqueda'";
                    Conexion::abrir_conexion();
                    Selects::clientes(Conexion::obtener_conexion(),$sql);
                    Conexion::cerrar_conexion();
                }
                else {
                    $sql="SELECT id_cliente, nombre, A_Paterno, A_Materno , correo, telefono, estado_cliente,clientes.rancho_cliente
                    FROM usuarios INNER JOIN clientes ON id_usuario=usuario_cliente";
                    Conexion::abrir_conexion();
                    Selects::clientes(Conexion::obtener_conexion(),$sql);
                    Conexion::cerrar_conexion();
                  }
                
                  
                /*
                if(isset($_POST['vertodo']))
                  {
                    Conexion::abrir_conexion();
                    $sql="SELECT id_cliente,nombre, A_Paterno, A_Materno, correo, telefono, estado_cliente,clientes.rancho_cliente
                    FROM usuarios INNER JOIN clientes ON id_usuario=usuario_cliente";
                    Selects::clientes(Conexion::obtener_conexion(),$sql);
                    Conexion::cerrar_conexion();
                  }*/
                ?>
                
                  </tbody>
                  </table>
                    
                
                
                    
                
              
                

            
                   

        <!--TERMINA CONTENIDO DE LA PAGINA-->
        <?php 
          include 'modals_central.php';
        ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  </body>
</html>
