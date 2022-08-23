
<!-- Nav barr superior -->
<div>
<?php
   session_start();
   if (isset($_SESSION['tipo'])) {
    if($_SESSION['tipo']=='CENTRAL'){
      header('location: ../views_centra/index.php');
    }
    if($_SESSION['tipo']=='CLIENTE'){
      header('location: ../views_user/index.php');
    } 
   }else
   {
    header('location: ../index.php');
   }
   ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
              <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">Zacred</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
              <form class="d-flex ms-auto my-1 my-lg-0">
                <div class="input-group">
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <?php 
                   echo $_SESSION['usuario'];
                   ?>
                    <i class="bi bi-person-fill"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Configuracion</a></li>
                    <li>
                      <a class="dropdown-item" href="../Clases/cerrar_sesion.php">Salir</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- barra lateral (canvas) -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
          <nav class="navbar-dark">
            <ul class="navbar-nav">
            <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  INICIO
                </div>
              </li>
              <li>
            <li>
                <a href="index.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-house"></i></span>
                  <span>Estadisticas</span>
                </a>
              </li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  SOLICITUDES PENDIENTES
                </div>
              </li>
              <li>
                <a href="instalacionespendientes.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-person"></i></span>
                  <span>Instalaciones pendientes</span>
                </a>
              </li>
              <li>
                <a href="reportespendientes.php" class="nav-link px-3 active">
                    <span class="me-2"><i class="bi bi-pin-map"></i></span>
                    <span>Reportes pendientes</span>
                  </a>
              </li>
              <li>
              <li>
                <a href="solicitudespendientes.php" class="nav-link px-3 active">
                    <span class="me-2"><i class="bi bi-pin-map"></i></span>
                    <span>Mostrar solicitudes pendientes</span>
                  </a>
              </li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  SOLICITUDES REALIZADOS
                </div>
              </li>
              <li>
                <a href="instalacionesrealizadas.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-person"></i></span>
                  <span>Instalaciones realizadas</span>
                </a>
              </li>
              <li>
                <a href="reportesrealizados.php" class="nav-link px-3 active">
                    <span class="me-2"><i class="bi bi-pin-map"></i></span>
                    <span>Reportes realizados</span>
                  </a>
              </li>
              <li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  CONFIGURACIÓN DE CUENTA
                </div>
              </li>
              <li>
                <a href="config_tecnicos.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-person"></i></span>
                  <span>Datos de usuario</span>
                </a>
              </li>
            </ul>
        </nav>
      </div>
    </div>
    <br>
    <br>
    <br>
        <!--Termina Barra lateral-->
  