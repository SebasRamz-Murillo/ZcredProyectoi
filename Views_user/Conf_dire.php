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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
    <title>Zacred</title>
</head>
<body>
<?php 
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
  <?php 
                      if (isset($_POST['actualizacalle_uno'])) { 
                        extract($_POST);
                        Conexion::abrir_conexion();
                        $cadena="UPDATE clientes SET calle_uno = '$calle_uno' WHERE (usuario_cliente =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        conexion::cerrar_conexion(); 
                        
                      }      
                      if (isset($_POST['actualizacalle_dos'])){
                        extract($_POST);
                        Conexion::abrir_conexion();
                        $cadena="UPDATE clientes SET calle_dos = '$calle_dos' WHERE (usuario_cliente =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();

                      }
                      if (isset($_POST['actualizaNo_casa'])){
                        extract($_POST);
                        Conexion::abrir_conexion();
                        $cadena="UPDATE clientes SET no_casa = '$no_casa' WHERE (usuario_cliente =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();

                      }
                      if (isset($_POST['actualizaReferencias'])){
                        extract($_POST);
                        $_SESSION['usuario']=$correo;
                        Conexion::abrir_conexion();
                        $cadena="UPDATE clientes SET referencias = '$referencias' WHERE (usuario_cliente =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();
                        echo "<script>
                        window.location='Conf_dire.php'
                      </script>"; 
                        
                            
                      }
                      if(isset($_POST['actualizaRanc'])){
                        extract($_POST);
                        
                        Conexion::abrir_conexion();
                        $cadena="UPDATE clientes SET rancho_cliente = '$sel_ranchoss' WHERE (usuario_cliente =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();
                        echo "<script>
                        window.location='Conf_dire.php'
                      </script>"; 
                      }

                      ?>

    <!-- Nav barr superiror -->
 
    <!--Termina barra lateral-->
    <!--Formulario datos de usuario-->
<br><br><br>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">  
          <div class="conttabla">
            <table class="table table-borderless">
              <?php
      
              ?>
                <thead>
                  <legend>Dirección</legend>
                  <hr>
                </thead>
              <tbody>
                <?php 
                    Conexion::abrir_conexion();
                    $sql="SELECT clientes.calle_uno,clientes.calle_dos,clientes.no_casa, clientes.referencias,concat(localidad.nombre,' ', ranchos.nombre)as rancho from clientes inner join usuarios
                    on usuarios.id_usuario=clientes.usuario_cliente inner join ranchos on ranchos.id_rancho=clientes.rancho_cliente
                    inner join localidad on localidad.Id_localidad=ranchos.localidad where usuarios.id_usuario=$_SESSION[id_usuario]";
                   $resulta=Repositorio_usuario::consultas(conexion::obtener_conexion(),$sql);
                   Conexion::cerrar_conexion();
                foreach ($resulta as $result) {
                  # code...
                ?>
                <tr>
                  <td><b>Calle 1:</b></td>
                  <td>
                    <?php
                    echo $result->calle_uno
                    ?>
                  </td>
                  <td> 
                    <a data-bs-toggle="collapse" href="#cambiacalle1" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Editar
                  </a>
                </td>
                </tr>
                <!--TR PARA LINEA DE DEPLIEGUE PARA CAMBIAR-->
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="cambiacalle1">
                      <div class="card card-body">
                        <div class="col offset-1">
                          <form action="conf_dire.php" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <th>
                                        <div class="text-center">Calle 1:</div>
                                    </th>
                                    
                                    <td>
                                        <div>
                                        <input type="text" name="calle_uno" class="form-control" value="<?php echo $result-> calle_uno?>" required>
                                    </div>
                                    </td>
                                 
                                </tr>
                            </table>
                        
                      </div>
                      <div class="row offset-2 offset-md-4">
                        <div class="px-3">
                          <button type="submit" class="btn btn-success btn-sm" name="actualizacalle_uno">Actualizar</button>
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#cambiacalle1">Cancelar</button>

                      </div>
                    </form>
                      </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <!--TR PARA LINEA DE DEPLIEGUE PARA CAMBIAR-->
                <tr>
                  <td><b>Calle 2:</b></td>
                  <td>
                  <?php
                    echo $result->calle_dos
                    ?>
                  </td>
                  <td>
                    <a data-bs-toggle="collapse" href="#cambiacalle2" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Editar </a>
                  </td>
                </tr>
                <tr><!--EJEMPLO CUANDO ES SOLO UN CAMPO A CAMBIAR-->
                  <td colspan="3">
                    <div class="collapse" id="cambiacalle2">
                      <div class="card card-body">
                        <div class="row">
                            <div class="col offset-1">
                                <form action="conf_dire.php" method="POST">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th >
                                                <div class="text-center">Calle 2:</div>
                                            </th>
                                            
                                            <td>
                                                <div>
                                                <input type="text" name="calle_dos" class="form-control" id="CalleDos" value="<?php echo $result-> calle_dos?>" required>
                                            </div>
                                            </td>
                                        </tr>
                                    </table>
                            </div>     
                            <div class="row offset-2 offset-md-4">
                                <div class="px-3">
                                  <button type="submit" class="btn btn-success btn-sm" name="actualizacalle_dos">Actualizar</button>
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#cambiacalle2">Cancelar</button>
                              </div>        
                        </form>
                      </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><b>N. de Casa:</b></td>
                  <td>
                  <?php
                    echo $result->no_casa
                    ?>
                  </td>
                  <td>
                    <a data-bs-toggle="collapse" href="#changeNumercasa" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Editar</a>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="changeNumercasa">
                      <div class="card card-body">
                        <div class="col offset-1">
                          <form action="conf_dire.php" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <th>
                                        <div class="text-center">N. de casa:</div>
                                    </th>
                                    
                                    <td>
                                        <div>
                                        <input type="text" name="no_casa" class="form-control" id="NCasa" value="<?php echo $result->no_casa?>" required>
                                    </div>
                                    </td>
                                   
                                </tr>
                            </table>
                        </div>
                            <div class="row offset-2 offset-md-4">
                                <div class="px-3">
                                  <button type="submit" class="btn btn-success btn-sm" name="actualizaNo_casa">Actualizar</button>
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#changeNumercasa">Cancelar</button>
                              </div>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td><b> Referencias:</b></td>
                  <td>
                  <?php
                    echo $result->referencias
                    ?>
                  </td>
                  <td>
                    <a data-bs-toggle="collapse" href="#changeRefer" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Editar</a>
                    </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="changeRefer">
                      <div class="card card-body">
                          <form action="conf_dire.php" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <th>
                                      <div class="text-center"> Ref:</div> 
                                    </th>
                                    <td>
                                        <div>
                                         <input type="text" name="referencias" class="form-control" value="<?php echo $result-> referencias?>">
                                        </div>
                                    </td>
                                </tr>

                            </table>
                            <div class="row offset-2 offset-md-4">
                                <div class="px-3">
                                  <button type="submit" class="btn btn-success btn-sm" name="actualizaReferencias">Actualizar</button>
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#changeRefer">Cancelar</button>
                              </div>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                
                
                <tr>
                  <td><b> Municipio:</b></td>
                  <td>
                  <?php
                    echo $result->rancho
                    ?>
                  </td>
                  <td>
                    <a data-bs-toggle="collapse" href="#changeRancho" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Editar</a>
                    </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="changeRancho">
                      <div class="card card-body">
                        <form action="Conf_dire.php" method="POST">
                          <div class="col-12 mt-2 ">
                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <label for="validationCustom04" class="form-label">Municipio</label>
                                <select class="form-select" name="sel_localidad" id="sel_localidad" required>
                                  <option selected disabled>-- SELECCIONE --</option>
                                  <?php
                                
                                  conexion::abrir_conexion();
                                  SelectsClientes::escibir_localidades(conexion::obtener_conexion());
                                  conexion::cerrar_conexion();
                                
                                  ?>
                                </select>
                        
                              </div>
                              <div class="col-md-6 mb-4">
                                <label for="validationCustom04" class="form-label">Comunidad</label>
                                <select class="form-select" name="sel_ranchoss" id="sel_ranchoss" required>
                                  <option selected disabled>-- SELECCIONE --</option>
                                </select>
                              </div>  
                            </div> 
                            <button type="submit" class="btn btn-success" name="actualizaRanc">Actualizar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#changeRancho">Cancelar</button>

                          </div>  
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
               

                <?php
              }
              ?>
            </table>  
              



            
           
   <!-------------------------AQUI TERMINA LO QUE VA DENTRO DE LA PAGINA------------------------>
   
 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/combos.js"></script>

    <script src="../js/bootstrap.bundle.min.js"></script>
    
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

          
    <!--FIN -->
</body>
</html>



<!--




            -->