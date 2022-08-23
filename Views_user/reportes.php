<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Zacred</title>
</head>
<body>
    <!-- Nav barr superiror -->
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
<br><br><br>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <h1>Reportes</h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item active">Descripciones</li>
                    </ol>
                </div>
                <div class="mt-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#v123" aria-expanded="false" aria-controls="collapseTwo">
                              Nombre Reporte: Internet lento
                            </button>
                          </h2>
                          <div id="v123" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <!--CONTENIDO DE REPORTE-->
                              <table>
                                <?php 
                               Conexion::abrir_conexion();
                                SelectsClientes::RepInterLen(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                Conexion::cerrar_conexion();
                                
                                ?>
                              </table>
                              <!--CONTENIDO DE REPORTE-->
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="mt-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#v12345" aria-expanded="false" aria-controls="collapseTwo">
                                Nombre Reporte: Sin internet
                            </button>
                          </h2>
                          <div id="v12345" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!--CONTENIDO DE REPORTE-->
                                <table>
                                <?php 
                                Conexion::abrir_conexion();
                                SelectsClientes::RepSinInt(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                Conexion::cerrar_conexion();
                                ?>
                              </table>
                                <!--CONTENIDO DE REPORTE-->
                            </div>
                          </div>
                        </div>
                      </div> 
                </div>
                    <div class="mt-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#v1234" aria-expanded="false" aria-controls="collapseTwo">
                                    Nombre Reporte: Cambio de velocidad
                                </button>
                              </h2>
                              <div id="v1234" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!--CONTENIDO DE REPORTE-->
                                    <table>
                                    <?php 
                                    Conexion::abrir_conexion();
                                    SelectsClientes::RepCambioVelo(conexion::obtener_conexion(),$_SESSION['id_cliente']);
                                    Conexion::cerrar_conexion();
                                    ?>
                                    </table>
                                    <!--CONTENIDO DE REPORTE-->
                                </div>
                              </div>
                            </div>
                          </div> 
                    </div>         
                </div>
            </div>
        </main>
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
    <!--SCRIPTS-->>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!--SCRIPTS-->>
</body>
</html>