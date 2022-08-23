1<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Configuración</title>
</head>
<body>
<?php 
 include 'navs_tecnicos.php';
 include '../Clases/conexion.inc.php';
 include '../Clases/RepositorioTecnico.inc.php';
 include '../Clases/SelectsTecnicos.inc.php';

  ?>
      <!--Contenido de la pagina-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">   
                  <div class="conttabla">
                
                  <?php 
                      if (isset($_POST['actualizarNom'])) { 
                        extract($_POST);
                        
                        Conexion::abrir_conexion();
                        $cadena="UPDATE USUARIOS SET nombre = '$nombre', A_Paterno = '$A_Paterno', A_Materno = '$A_Materno' WHERE (id_usuario =  $_SESSION[id_usuario])";
                        Repositorio_tecnico::consultas(conexion::obtener_conexion(),$cadena);
                        conexion::cerrar_conexion();
                  
                      }      
                      if (isset($_POST['actualizaTel'])){
                        extract($_POST);

                        Conexion::abrir_conexion();
                        $cadena="UPDATE USUARIOS SET telefono = '$telefono' WHERE (id_usuario =  $_SESSION[id_usuario])";
                        Repositorio_tecnico::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();
                       
                        

                      }
                      if (isset($_POST['actualizaCorreo'])){
                        extract($_POST);
                        $_SESSION['usuario']=$correo;
                        Conexion::abrir_conexion();
                        $cadena="UPDATE USUARIOS SET correo = '$correo' WHERE (id_usuario =  $_SESSION[id_usuario])";
                        Repositorio_tecnico::consultas(conexion::obtener_conexion(),$cadena);
                        Conexion::cerrar_conexion();
                        echo "<script>
                        window.location='config_tecnicos.php'
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
                            Repositorio_tecnico::consultas(conexion::obtener_conexion(),$sql);
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




                  <?php 
                        
                        Conexion:: abrir_conexion();
                        $sql="SELECT CONCAT(nombre,' ', A_Paterno,' ',A_Materno)as Nom,nombre,A_Paterno,A_Materno, correo, telefono from trabajadores inner join
                        usuarios on id_usuario=usuario_trabajador where id_trabajador= $_SESSION[id_trabajador]";
                        $info=Repositorio_tecnico::consultas(conexion::obtener_conexion(),$sql);
                        Conexion::cerrar_conexion();
                       
                        foreach($info as $info){
                        ?>
                   
                    <table class="table table-borderless">
                     
                      <thead>
                        <legend><h3>Datos de usuario</h3></legend>
                        <hr>
                      </thead>

                      <tbody>
                      
 
                      <!------------------------->
                      
                      <tr>

                <td><b> Nombre:</b></td>
                <td><?php echo $info-> Nom ?></td>
                <td> 
                <a data-bs-toggle="collapse" href="#ChangeName" role="button" aria-expanded="false" aria-controls="collapseExample">
                Editar
                </a>
                </td>
            </tr>
            <tr>
                        <td colspan="3">
                          <div class="collapse" id="ChangeName">
                            <div class="card card-body">
                                <div class="col offset-1 offset-sm-1 offset-xm-1">
                                    <form action="config_tecnicos.php" method="POST">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>
                                                   Nombres:
                                                </th>
                                                <td>
                                                    <div>
                                                    <input type="text" class="form-control" name="nombre" value="<?php echo $info-> nombre ?>">
                                                    </div>
                                                </td>                
                                            </tr>
                                            <tr>
                                              <th>
                                                  Apellido paterno:
                                              </th>
                                              <td>
                                                  <div>
                                                  <input type="text" class="form-control" name="A_Paterno" value="<?php echo $info-> A_Paterno ?>" >
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
                                                <input type="text" class="form-control" name="A_Materno" value="<?php echo $info-> A_Materno ?>" >
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
                      

            <tr>
                <td><b>Telefono:</b></td>
                <td><?php echo $info-> telefono ?></td>
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
                                <form action="config_tecnicos.php" method="POST">
                                  <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            Telefono:
                                        </th>
                                        
                                        <td>
                                            <div>
                                            <input type="text" class="form-control" name="telefono" id="Telefono" value="<?php echo $info-> telefono ?>" required>
                                           </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row offset-2 offset-md-4">
                                  <div class="px-3">
                                    <button type="submit" class="btn btn-success btn-sm" name="actualizaTel">Actualizar</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="collapse" href="#ChangePhone">Cancelar</button>
                                </div>
                                </div>
                              </form>
                            </div>
                            </div>
                          </div>
                        </td>
                      </tr>

            
            <tr >
                <td><b> Correo:</b></td>
                <td><?php echo $info-> correo ?></td>
                <td>
                <a data-bs-toggle="collapse" href="#ChangeEmail" role="button" aria-expanded="false" aria-controls="collapseExample">
                Editar </a>
                </td>
            </tr>

            <tr> 
                        <td colspan="3">
                          <div class="collapse" id="ChangeEmail">
                            <div class="card card-body">
                              <div class="row">
                              <div class="col offset-1">
                                <form action="config_tecnicos.php" method="POST">
                                  <table class="table table-borderless">
                                    <tr>
                                        <th>
                                           Correo:
                                        </th>
                                        <td>
                                            <div>
                                            <input type="text" name="correo" class="form-control" 
                                            value="<?php echo $info-> correo ?>" required>
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
                          <form action="config_tecnicos.php" method="POST">
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
                      
                      <!---------------------------------------------------->
                      </tbody>
                    </table> 
                    <?php  } ?>
                  </div>
                </div>


      <!--Temina contenido de la pgina-->

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/combos.js"></script>
</body>
</html>


