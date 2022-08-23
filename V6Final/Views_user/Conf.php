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
    <!-- Nav barr superiror -->
   
   
    <!--Termina barra lateral-->
    <!--Formulario datos de usuario--> 
    <br><br><br>
    <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid">
            <?php 
            Conexion::abrir_conexion();
             $sql="SELECT id_usuario,concat(nombre,' ',A_Paterno,' ',A_materno)as Nombre_junto,nombre,A_Paterno,correo, telefono, A_materno from usuarios where id_usuario= $_SESSION[id_usuario]";
            $result=Repositorio_usuario::consultas(conexion::obtener_conexion(),$sql);
            Conexion::cerrar_conexion();
            ?>   
            <div class="conttabla">
            <?php 
                      if (isset($_POST['actualizarNom'])) { 
                        extract($_POST);
                        
                        Conexion::abrir_conexion();
                        $cadena="UPDATE USUARIOS SET nombre = '$nombre', A_Paterno = '$A_Paterno', A_Materno = '$A_Materno' WHERE (id_usuario =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        conexion::cerrar_conexion(); 
                        echo "<script>
                        window.location='Conf.php'
                      </script>"; 
                      }      
                      if (isset($_POST['actualizatel'])){
                        extract($_POST);

                        Conexion::abrir_conexion();
                        $cadena="UPDATE USUARIOS SET telefono = '$telefono' WHERE (id_usuario =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();
                        echo "<script>
                        window.location='Conf.php'
                      </script>"; 
                      }
                      if (isset($_POST['actualizaCorreo'])){
                        extract($_POST);
                        $_SESSION['usuario']=$correo;
                        Conexion::abrir_conexion();
                        $cadena="UPDATE USUARIOS SET correo = '$correo' WHERE (id_usuario =  $_SESSION[id_usuario])";
                        Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();
                        echo "<script>
                        window.location='Conf.php'
                      </script>"; 
                      }
                      if (isset($_POST['actualizarContra'])){
                        extract($_POST);
                        Conexion::abrir_conexion();
                        $conexion=Conexion::obtener_conexion();
                        $query=$conexion->prepare("SELECT usuarios.id_usuario,usuarios.correo,usuarios.contraseña as pass from usuarios where usuarios.correo=:email");
                        $query ->bindParam("email",$_SESSION['usuario'],PDO::PARAM_STR);
                        $query->execute();
                        $resultPAS = $query->fetch(PDO::FETCH_ASSOC);
                          if (password_verify($pass,$resultPAS['pass'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                         SE HA CAMBIADO LA CONTRASEÑA
                        </div>
                            <?php
                            
                            //ñññ
                            $endpass=password_hash($newpass,PASSWORD_DEFAULT);
                            $sql="UPDATE usuarios SET contraseña = '$endpass' where (id_usuario = $_SESSION[id_usuario])";
                            Repositorio_usuario::consultas(conexion::obtener_conexion(),$sql);
                            Conexion::cerrar_conexion();
                          }
                          else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                          LA CONTRASEÑA ES INCORRECTA! 
                        </div>
                            <?php
                            Conexion::cerrar_conexion();
                          }
                        }
          
                      ?>
              <table class="table table-borderless">
                <thead>
                  <legend>Datos de usuario</legend>
                  <hr>
                </thead>
                <tbody><?php foreach ($result as $valor) {
                  # code...
                ?>
                  <tr>
                  <td><b> Nombre:</b></td>
                  <td>
                 <?php echo $valor->Nombre_junto?>
                  </td>
                  <td>
                  <a data-bs-toggle="collapse" href="#ChangeName" role="button" aria-expanded="false" aria-controls="collapseExample"> Editar
                  </a>
                </td>
                </tr>
                <!--TR PARA LINEA DE DEPLIEGUE PARA CAMBIAR-->
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="ChangeName">
                      <div class="card card-body">
                          <div class="col offset-1 offset-sm-1 offset-xm-1">
                              <form action="conf.php" method="POST">
                                  <table class="table table-borderless">
                                      <tr>
                                          <th>
                                             Nombres:
                                          </th>
                                          <td>
                                              <div>
                                              <input type="text" class="form-control" name="nombre"  value="<?php echo $valor->nombre ?>">
                                              </div>
                                          </td>                
                                      </tr>
                                      <tr>
                                        <th>
                                            Apellido paterno:
                                        </th>
                                        <td>
                                            <div>
                                            <input type="text" class="form-control" name="A_Paterno" value="<?php echo $valor->A_Paterno ?>">
                                            </div>
                                        </td>                
                                    </tr>
                                    <div>
                                    <tr>
                                      <th>
                                        <div class="mt-1">
                                         Apellido materno:
                                        </div>
                                      </th>
                                      <td>
                                          <div>
                                          <input type="text" class="form-control" name="A_Materno" value="<?php echo $valor->A_materno ?>">
                                          </div>
                                      </td>                
                                  </tr>
                                </div>
                                </table>
                          </div>
                          <div class="row offset-2 offset-md-4">
                            <div class="px-3">
                              <button type="submit" class="btn btn-success btn-sm" name="actualizarNom">Actualizar</button>
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#ChangeName">Cancelar</button>
                          </div>
                          </div>              
                      </form>
                      </div>
                    </div>
                  </div>
                  </td>
                </tr>
                <!--TR PARA LINEA DE DEPLIEGUE PARA CAMBIAR-->
                <tr >
                  <td><b> Correo:</b></td>
                  <td>
                  <?php echo $valor->correo ?>
                  </td>
                  <td>
                    <a data-bs-toggle="collapse" href="#ChangeEmail" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Editar </a>
                  </td>
                </tr>
                <tr> <!--EJEMPLO CUANDO ES SOLO UN CAMPO A CAMBIAR-->
                  <td colspan="3">
                    <div class="collapse" id="ChangeEmail">
                      <div class="card card-body">
                        <div class="row">
                        <div class="col offset-1">
                          <form action="conf.php" method="POST">
                            <table class="table table-borderless">
                              <tr>
                                  <th>
                                     Correo:
                                  </th>
                                  <td>
                                      <div>
                                      <input type="text" name="correo" class="form-control" required value="<?php echo $valor->correo ?>">
                                      </div>
                                  </td>
                              </tr>
                          </table>
                          <div class="row offset-2 offset-md-4">
                            <div class="px-3">
                              <button type="submit" class="btn btn-success btn-sm" name="actualizaCorreo">Actualizar</button>
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#ChangeEmail">Cancelar</button>
                          </div>
                          </div> 
                        </form>
                      </div>
                      </div>
                    </div>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td><b>Telefono:</b></td>
                  <td> 
                  <?php echo $valor->telefono ?>
                  </td>
                  <td>
                    <a data-bs-toggle="collapse" href="#ChangePhone" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Editar</a>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="ChangePhone">
                      <div class="card card-body">
                        <div class="col offset-1">
                          <form action="conf.php" method="POST">
                            <table class="table table-borderless">
                              <tr>
                                  <th>
                                      Telefono:
                                  </th>
                                  
                                  <td>
                                      <div>
                                      <input type="text" class="form-control" id="Telefono" required value="<?php echo $valor->telefono ?>">
                                     </div>
                                  </td>
                              </tr>
                          </table>
                          <div class="row offset-2 offset-md-4">
                            <div class="px-3">
                              <button type="submit" class="btn btn-success btn-sm" name="actualizatel">Actualizar</button>
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#ChangePhone">Cancelar</button>
                          </div>
                          </div>
                        </form>
                      </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><b> Contraseña:</b></td>
                  <td>**************</td>
                  <td>
                    <a data-bs-toggle="collapse" href="#ChangePass" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Editar</a>
                    </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <div class="collapse" id="ChangePass">
                      <div class="card card-body">
                        <div class="col offset-1" >
                          <form action="conf.php" method="POST">
                            <table class="table table-borderless">
                              <tr>
                                <th>Contraseña anterior</th>
                                <td><input type="password" name="pass" class="form-control" id="vieja" required></td>
                              </tr>
                              <tr>
                                <th>Nueva contraseña</th>
                                <td><input type="password" name="newpass" class="form-control" id="nueva"required></td>
                              </tr>
                          </table>
                          <div class="row offset-2 offset-md-4">
                            <div class="px-3">
                              <button type="submit" class="btn btn-success btn-sm" name="actualizarContra">Actualizar</button>
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#ChangePass">Cancelar</button>
                          </div> 
                        </form>
                      </div>
                      </div>
                    </div>
                  </td>
                </tr>
                </tbody>
              <?php 
              }
               ?>
              </table>  
            </div></div>
<!--aqui termina la tabla--
              solo la tienes que diplicar como el la foto que te envie de la direccion--
   ------------------------AQUI TERMINA LO QUE VA DENTRO DE LA PAGINA------------------------>
    
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/combos.js"></script>
    <!--FIN -->
</body>
</html>