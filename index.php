<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&family=Roboto:wght@400;700&family=Sora:wght@800&display=swap" rel="stylesheet">
    <title>Zacred-Inicio</title>
</head>
<body>
<?php 
session_start();
if(isset($_SESSION['tipo']))
{
  if($_SESSION['tipo']=='CENTRAL'){
    header('location: views_centra/index.php');
  }
  if($_SESSION['tipo']=='TECNICO'){
    header('location: views_tecnicos/index.php');
  }
  if($_SESSION['tipo']=='CLIENTE'){
    header('location: views_user/index.php');
  }
}
  require 'clases/registrar_clientes.php';
  require 'clases/selects.inc.php';
  require 'clases/conexion.inc.php';
  require 'clases/login.inc.php';
  include 'Clases/RepositorioUsuario.inc.php';
  ?>
     <div>
        <!--Barra de navegación-->
        <nav class="navbar naved colornav">
            <div class="container-fluid">
                <a class="navbar-brand fs-4" href="#" >
                    <i class="bi bi-wifi"></i>
                    <span class="color-log">Zacred</span>
                  </a>
              <!--Botones navegador-->
              <div class="d-grid gap-2 d-md-flex justify-content-md-end justify-content-lg-end">
                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#inicioSesion">Iniciar sesion</button>
                </div>     
            </div>
        </nav>

     </div>

    <!-- Modal Inicio Sesion --> 
    <?php 
  ?>
         
          <div class="modal fade" id="inicioSesion" aria-hidden="true" aria-labelledby="inicioSesionLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Iniciar sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                         <!--Logo de Zacred en modal-->
                    <div class="modal-logo">
                        <img src="https://cdn.onlinewebfonts.com/svg/img_140985.png" alt="" class="img-modal"> 
                        <br>
                        <div class="modal-titulo ">   
                        <h2>Zacred</h2>
                        </div>
                    </div>
                        <!--CuerpoModal-->
                    <div class="modal-body">
                        <form action="verificar_login.php" method="post"> <!---ñññññññññññññññ-->
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="loginName" name="correo" class="form-control" />
                                <label class="form-label" for="loginName">Correo</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="loginPassword" name="contraseña" class="form-control" />
                                <label class="form-label" for="loginPassword">Contraseña</label>
                            </div>
                            <!-- 2 column grid layout -->
                            <div class="row mb-4">
                              <!--
                                <div class="col-md-6 d-flex justify-content-center">
                                   
                                    <div class="form-check mb-3 mb-md-0">
                                        <input class="form-check-input" name="recordarme" type="checkbox" value="" id="loginCheck" checked />
                                        <label class="form-check-label" for="loginCheck"> aa </label>
                                    </div>
                                </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                
                                <button type="button" class="btn btn-link" data-bs-target="#contraOlvi" data-bs-toggle="modal">Contraseña olvidada</button>
                            </div>
-->
                        </div>
                            <!-- Submit button -->
                            <button type="submit" name="inciar_session" class="btn btn-primary btn-block dm-4 modal-button">Iniciar sesión</button>
                            </form>
                            <!-- Register buttons -->
                            <div class="text-center">

                               <button type="button" class="btn btn-link" name="login" value="Login" data-bs-target="#Registrate" data-bs-toggle="modal">Registrate</button>

                              <!--  <p>No estás registrado <a href="registro.html">Registrate</a></p>-->
                            </div>
</form>
                        <!--Termina Cuerpo Modal-->
                    </div>
                </div>
            </div>
        </div>
<br>
        <div class="container">



        
          <div class="row">
          <?php  
                    if(isset($_POST['add_cliente'])){
                      extract($_POST);
                      Conexion::abrir_conexion();
                      $conexion=Conexion::obtener_conexion();
                      try {
                        $passen= password_hash($pass, PASSWORD_DEFAULT);
                        $ins_usuario="INSERT INTO usuarios(nombre, contraseña, A_Paterno, A_Materno, correo, telefono) VALUES ('$nombres','$passen','$a_paterno','$a_materno','$email','$phone')";
                        $conexion->query($ins_usuario);
                        $query=$conexion->query(" SELECT id_usuario FROM USUARIOS WHERE correo='$email'");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $ins_cliente= "INSERT INTO clientes(usuario_cliente, estado_cliente, no_casa, referencias, rancho_cliente, calle_uno, calle_dos) VALUES ($result[id_usuario],2,'$no_casa','$refer','$sel_ranchoss','$calleuno','$calledos')";
                        $conexion->query($ins_cliente);
                      ?>
                      <div class="alert alert-success" role="alert">
                      Bienvenido! por favor, inicie sesion!
                      </div>
                      <?php
                      Conexion::cerrar_conexion();
                      } catch (PDOException $ex) {
                        echo 'ERROR   '.$ex->getMessage(); 
                      }
                    }
                    ?>
              <div class="text-center">      
                  <h1>Paquetes Zacred Internet</h1>
                  <h3>Navega a la Mejor Velocidad con los planes de Zacred</h3>
                  <br> 

           <div id="tabla-precios col-md-4">
               <div class="precio-col">
                    <div class="precio-col-header animacion">
                       <span class="signo">$</span>
                       <span class="LetraPrecio">350</span>
                       <span class="Mes">/Mes</span>
                        <h5><p class="fs-5">Basico</p></h5>
                    </div>
                    <div class="precio-col-features">
                      <h6 style="font-size: 20px;"> <p><i class="bi bi-cloud-download"></i>  10 mbps</p></h6>
                      <h6 style="font-size: 20px;"> <p><i class="bi bi-cloud-upload"></i> 2 mbps</p></h6>
                      <h4 style="font-size: 20px;"> <p><i class="bi bi-person"></i> 2 Personas</p></h4> 
                    </div>
                      <a href="#" class="textdeco" data-bs-toggle="modal" data-bs-target="#inicioSesion" >
                          <div class="precio-col-comprar Letracontratar" >Contratar</div>
                      </a>
               </div>
                   <div class="precio-col">
                       <div class="precio-col-header">
                           <span class="signo">$</span>
                           <span class="LetraPrecio">450</span>
                           <span class="Mes">/Mes</span>
                           <h5><p class="fs-5">Estandar</p></h5>
                       </div>
                   <div class="precio-col-features">
                    <h6 style="font-size: 20px;"><p><i class="bi bi-cloud-download"></i> 20 mbps</p></h6>
                    <h6 style="font-size: 20px;"> <p><i class="bi bi-cloud-upload"></i> 4 mbps</p></h6>
                    <h4 style="font-size: 20px;"> <p><i class="bi bi-people"></i> 5 Personas</p></h4> 
               </div>
                      <a href="#" class="textdeco" data-bs-toggle="modal" data-bs-target="#inicioSesion" >
                          <div class="precio-col-comprar Letracontratar" >Contratar</div>
                      </a>
                </div>
               <div class="precio-col">
                       <div class="precio-col-header">
                           <span class="signo">$</span>
                           <span class="LetraPrecio">600</span>
                           <span class="Mes">/Mes</span>
                           <h5><p class="fs-5">Avanzado</p></h5>
                       </div> 
               <div class="precio-col-features">
                   <h6 style="font-size: 20px;"><p><i class="bi bi-cloud-download"></i> 50 mbps </p></h6>
                   <h6 style="font-size: 20px;"> <p><i class="bi bi-cloud-upload"></i> 10 mbps</p></h6>  
                   <h4 style="font-size: 20px;"> <p><i class="bi bi-people"></i> 10 Personas</p></h4>               
                </div>
                        <a href="#" class="textdeco" data-bs-toggle="modal" data-bs-target="#inicioSesion" >
                          <div class="precio-col-comprar Letracontratar" >Contratar</div>
                        </a>        
                </div>
           </div>
          </div>
      </div>
  </div>
  <div class="row col-md-6 offset-md-3 mt-4">
    <div class="mx-auto text-center ">
        <form method="GET" action="index.php">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">
                <h1 class="fs-1">Cobertura Zacred</h1>
            </label>
              <input type="text" class="form-control text-center fs-4 input-group-lg" id="cobertura" name="cobertura" aria-describedby="cobertura" placeholder="Escribe tu codigo postal">
            </div>          
            <?php
          if (isset($_GET['codigo_postal'])) { 
                        extract($_GET);
                        Conexion::abrir_conexion();
                        $cadena="SELECT ranchos.Codigo_Postal from ranchos where Codigo_Postal = $cobertura";
                        if (Repositorio_usuario::consultas(conexion::obtener_conexion(),$cadena))
                        { 
                          ?>
                        <div class="alert alert-success" role="alert">
                        Si hay cobertura
                        </div>
                          <?php
                        }
                        else{
                          ?>
                          <div class="alert alert-danger" role="alert">
                          Lo sentimos no tenemos cobertura en su zona
                          </div>
                          <?php
                        }
                        conexion::cerrar_conexion(); 
                      }    
                      ?> 
            <button type="submit" name="codigo_postal" class="btn btn-primary btn-lg">Buscar cobertura</button>
          </form>
      
    </div>
</div>
  <div class="card mb-3 mt-5" style="max-width: 95%; margin-left: 2.5%; border: 2px solid #1e366a; ">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/eaf7b42d-1a81-4bbd-91c7-c475bf6f0368.jfif" class="img-fluid rounded-start" alt="NoLoad" style="width: 400px; height: 500px;">
        </div>
        
        <div class="col-md-8">
          <div class="card-body text-center">
            <h1 class="card-title Letra letra_sepa">Nuestra historia</h1>
            <p class="card-text Letra "> 
        Somos una empresa dedicada a proveer servicios de internet a localidades principalmente de Zacatecas. 
        Tenemos como principales municipios de Juan Aldama y Miguel Auza.
       </p>
       <p class="card-text Letra ">
        Nuestros inicios se remontan a la llegada del Covid por la debida alza de necesidades del mundo de conectarse a internet, nos dedicamos principalmente a municipios de rancheria, en zonas donde el acceso a internet era escaso o nulo, siendo una complicacion hacia las familias de estas zonas.
       </p>
       <p class="card-text Letra ">
        Nuestra mision es ayudar a que las personas de zonas rurales sigan con sus estudios, ademas de que hoy en dia, el internet facilita muchisimas cosas.
       </p>
          </div>
        </div>
      </div>
    </div>
<div>
  <iframe
  src="https://maps.google.com/maps?q=Ju%C3%A1rez%2035,%20Zona%20Centro,%2098300%20Juan%20Aldama,%20Zac.&t=k&z=19&ie=UTF8&iwloc=&output=embed"
  frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" aria-hidden="false"
  tabindex="0">
  </iframe><br><br>
</div>
<!-------------Información de contacto---------------->
<nav class="navbar navbar-dark bg-dark">
  <div class="contenido-contacto">
      <div class="text-left">
        <h5>Contacto</h5>
          <span><i class="bi bi-geo-alt"></i></span>
        <span>Dirección: </span>
          <span>Juárez 35, Zona Centro, 98300 Juan Aldama, Zac.</span>
           <br>
        <span>
          <i class="bi bi-telephone"></i> 
        </span>
         <span>Telefono:</span>
            <span>(871) 2736050</span>
       </div>
     </div>
  </nav>
  
 


 <!-- Modal Registro-->
 <div class="modal fade" id="Registrate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form id="formulario" action="index.php" class="row formulario" method="POST">
            <div class="col-md-12 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="firstName">Nombre(s)</label>
                  <input type="text" name="nombres" id="nombres" class="form-control inputss" required> 
                  <div class="invalid-feedback">
                    El nombre debe tener entre 3 y 20 letras.
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="lastName">Apellido paterno</label>
                    <input type="text" name="a_paterno" id="a_paterno" class="form-control" required> 
                    <div class="invalid-feedback">
                     tu apellido paterno debe tener entre 3 y 20 letras.
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                        <label class="form-label" for="form3Example1n1">Apelldo materno</label>
                        <input type="text" name="a_materno" id="a_materno" class="form-control " required>
                        <div class="invalid-feedback">
                          tu apellido materno debe tener entre 3 y 20 letras.
                        </div>
                      </div>
                    </div>
              </div> 
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="emailAddress">Correo Electronico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                      Por favor escribe un correo valido.
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="phoneNumber">Número de teléfono movil</label>
                    <input type="tel" class="form-control" required id="phone" name="phone">
                    <div class="invalid-feedback">
                      Por favor escribe un numero de telefono celular valido.
                    </div>
                  </div>
                </div>
              </div>
                    
              <div class="row">
                <div class="col-md-6 mb-4">
                  <label for="validationCustom04" class="form-label">Municipio</label>
                  <select class="form-select" name="sel_localidad" id="sel_localidad" require>
                    <option selected disabled>-- SELECCIONE --</option>
                    <?php
                    
                      conexion::abrir_conexion();
                      selects::escibir_localidades(conexion::obtener_conexion());
                      conexion::cerrar_conexion();
                    
                    ?>
                  </select>
                <div class="invalid-feedback">
                  Por favor seleccione su municipio.
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <label for="validationCustom04" class="form-label">Comunidad</label>
                <select class="form-select" name="sel_ranchoss" id="sel_ranchoss" require>
                  <option selected disabled>-- SELECCIONE --</option>
                </select>
                <div class="invalid-feedback">
                  Por favor seleccione su comunidad.
                </div>
              </div>  
            </div> 
            <script type="text/javascript">
                $(document).ready(function(){
                $("#sel_localidad").change(function(){
                 
                  $.get("ranchos_selects.php","sel_localidad="+$("#sel_localidad").val(), function(data){
                    $("#sel_ranchoss").html(data);
                    console.log(data);
                  });
                });
              });
            </script>  
           
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form3Example99">Calle 1</label>
                      <input type="text" name="calleuno" class="form-control" required>
                      <div class="invalid-feedback">
                        Campo vacio.
                      </div>
                    </div>
                  </div>
                      <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example99">Calle 2</label>
                        <input type="text" name="calledos" class="form-control" required>
                        <div class="invalid-feedback">
                          Campo vacio.
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="firstName">Numero Exterior</label>
                        <input type="text" name="no_casa" class="form-control" required>
                        <div class="invalid-feedback">
                          Por favor introduzca su numero de casa.
                        </div>
                      </div>
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form6Example7">Referencias</label>
                      <textarea class="form-control" name="refer" rows="4" required></textarea>
                    </div>
                    <div class="invalid-feedback">
                      Por favor escriba referencias de la casa.
                    </div>
                  <div class="row">
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example90">contraseña</label>
                      <input type="password" name="pass" class="form-control form-control-lg" required>
                      <div class="invalid-feedback">
                        Campo vacio.
                      </div>
                    </div>
                  </div>
                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" name="add_cliente">Registrar</button>
    </form>
      </div>
    </div>
  </div>
</div>
   
      
 <!--Termina Registro   -->

 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="js/zacred_javascript.js"></script>
</body>
</html>
 

