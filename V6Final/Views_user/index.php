<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link href="assets/css/style.css" rel="stylesheet">
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
    header('location: ../views_centra/index.php');
  }
  if($_SESSION['tipo']=='TECNICO'){
    header('location: ../views_tecnicos/index.php');
  }
  if ($_SESSION['estado_cliente']=='ACTIVO') {
    header('location: estado.php');
  }
}
else{
  header('location: ../index.php');
}
  include '../Clases/conexion.inc.php';
  include '../Clases/RepositorioUsuario.inc.php';
  include '../Clases/SelectsClientes.inc.php';
 
  ?>
        <!--Barra de navegación-->
        <div>
          <!--Barra de navegación-->
          <nav class="navbar naved">
              <div class="container-fluid " style="margin-top: -3px;">
                <a class="navbar-brand fs-4" href="#" >
                  <i class="bi bi-wifi"></i>
                  <span class="color-log">Zacred</span>
                </a>
                <!--Botones navegador-->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                  <div>
                    <a class="nav-link dropdown-toggle" style="color: #fff;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <?php  echo $_SESSION['usuario'] ; ?>
                      <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="Conf.php">Configuracion</a></li>
                      <li>
                        <a class="dropdown-item" href="../Clases/cerrar_sesion.php">Salir</a></li>
                    </ul>
                  </div> 
                  </div>     
              </div>
          </nav>
          <?php


?>
      </div>
  

        <!--Termina modal y botones-->
        <!--Termina barra navegación-->
        <!--Aqui queda el recuerdo de que Julie intentó hacer unas cards pero el Jared las hizo mejor y chingo a su madre lo de JUlie:))))))-->
        <!--Tablas de precios...-->
        <br>
        <div class="container">
        <?php 
$dia=date('Y-m-d');
if(isset($_POST['basico'])){
  Conexion::abrir_conexion();
   $paqueteuno="INSERT INTO solicitudes(F_Solicitud,usuario,tipo_solicitud,detalles_solicitud)values('$dia', $_SESSION[id_cliente],1,'INSTALAR INTERNET')";
   $conexion = Conexion::obtener_conexion();
   $conexion->query($paqueteuno);
   $cadena="UPDATE clientes SET estado_cliente = 'ACTIVO' WHERE ( id_cliente =  $_SESSION[id_cliente])";
   $conexion->query($cadena);
   $_SESSION['estado_cliente']='ACTIVO';
   conexion::cerrar_conexion();
   header('location: estado.php');
  ?>
  <div class="alert alert-danger" role="alert">BASICO</div>
  <?php
}
if(isset($_POST['estandar'])){
  Conexion::abrir_conexion();
   $paquetedos="INSERT INTO solicitudes(F_Solicitud,usuario,tipo_solicitud,detalles_solicitud)values('$dia', $_SESSION[id_cliente],2,'INSTALAR INTERNET')";
   $conexion = Conexion::obtener_conexion();
   $conexion->query($paquetedos);
   $cadena="UPDATE clientes SET estado_cliente = 'ACTIVO' WHERE ( id_cliente =  $_SESSION[id_cliente])";
   $conexion->query($cadena);
   $_SESSION['estado_cliente']='ACTIVO';
   conexion::cerrar_conexion();
   header('location: estado.php');
  ?>
  <div class="alert alert-danger" role="alert">ESTANDAR</div>
  <?php
}
if(isset($_POST['avanzado'])){
  Conexion::abrir_conexion();
  $paquetetres="INSERT INTO solicitudes(F_Solicitud,usuario,tipo_solicitud,detalles_solicitud)values('$dia', $_SESSION[id_cliente],3,'INSTALAR INTERNET')";
  $conexion = Conexion::obtener_conexion();
  $conexion->query($paquetetres);
  $cadena="UPDATE clientes SET estado_cliente = 'ACTIVO' WHERE ( id_cliente =  $_SESSION[id_cliente])";
  $conexion->query($cadena);
  $_SESSION['estado_cliente']='ACTIVO';
  conexion::cerrar_conexion();
  header('location: estado.php');
  ?>
  <div class="alert alert-danger" role="alert">AVANZADO</div>
  <?php
}

?>
            <div class="row">
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
                  <a href="#" class="textdeco" data-bs-toggle="modal" data-bs-target="#paquetebasico" >
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
                 <a href="#" class="textdeco" data-bs-toggle="modal" data-bs-target="#vientemegas" >
                    <div class="precio-col-comprar Letracontratar">Contratar</div>
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
                  <a href="#" class="textdeco" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                      <div class="precio-col-comprar Letracontratar">Contratar</div>
                  </a>        
                          
                  </div>
             </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 95%; margin-left: 2.5%; border: 2px solid #1e366a; ">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../img/eaf7b42d-1a81-4bbd-91c7-c475bf6f0368.jfif" class="img-fluid rounded-start" alt="NoLoad" style="width: 400px; height: 400px;">
          </div>
          <div class="col-md-8">
            <div class="card-body text-center">
              <h1 class="card-title Letra letra_sepa">Zacred</h1>
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
    
    <div>
    <iframe
    src="https://maps.google.com/maps?q=Ju%C3%A1rez%2035,%20Zona%20Centro,%2098300%20Juan%20Aldama,%20Zac.&t=k&z=19&ie=UTF8&iwloc=&output=embed"
    frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" aria-hidden="false"
    tabindex="0">
    </iframe>
</div>
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
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paquete 50 mbps</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Al presionar el botón está accediendo a que se realice una llamada a su número registrado para agendar la instalación de su paquete de internet Zacred, el tiempo de espera es de máximo 3-4 días hábiles para poder agendarle. 
        <br> <br>
        Para poder continuar, por favor, acepte los terminos y condiciones.
        <br>
        <br>
        <br>  
        <form action="#" method="post" onsubmit="return checkSubmit();">
          <div class="form-group form-check">
          <input type="checkbox" id="conditions" name="conditions" value="1" required> 
          <label class="form-check-label" for="conditions">Aceptar condiciones de uso</label>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="avanzado" class="btn btn-primary">Contratar</button>
       
      </form>
      </div>
    </div>
  </div> 
</div>
  <!-- Modal -->
  <div class="modal fade" id="vientemegas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paquete 20 mbps</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Al presionar el botón está accediendo a que se realice una llamada a su número registrado para agendar la instalación de su paquete de internet Zacred, el tiempo de espera es de máximo 3-4 días hábiles para poder agendarle. 
        <br> <br>
        Para poder continuar, por favor, acepte los terminos y condiciones.
        <br>
        <br>
        <br>  
        <form action="#" method="post" onsubmit="return checkSubmit();">
          <div class="form-group form-check">
          <input type="checkbox" id="conditions" name="conditions" value="1" required>
         
          <label class="form-check-label" for="conditions">Aceptar condiciones de uso</label>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="estandar" class="btn btn-primary">Contratar</button>
        
      </form>
      </div>
    </div>
  </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="paquetebasico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paquete 10 mbps</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Al presionar el botón está accediendo a que se realice una llamada a su número registrado para agendar la instalación de su paquete de internet Zacred, el tiempo de espera es de máximo 3-4 días hábiles para poder agendarle. 
        <br> <br>
        Para poder continuar, por favor, acepte los terminos y condiciones.
        <br>
        <br>
        <br>  
        <form action="#" method="post" onsubmit="return checkSubmit();">
          <div class="form-group form-check">
          <input type="checkbox" id="conditions" name="conditions" value="1" required> 
          
          <label class="form-check-label" for="conditions">Aceptar condiciones de uso</label>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="basico" class="btn btn-primary">Contratar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    enviando = false; //Obligaremos a entrar el if en el primer submit
    
    function checkSubmit() {
        if (!enviando) {
    		enviando= true;
    		return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("Por favor espere que se registre su solicitud");
            return false;
        }
    }
</script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inicio.js"></script>
</body>
</html>