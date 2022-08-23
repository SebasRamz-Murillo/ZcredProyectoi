<?php ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
          </button>
          <a class="navbar-brand fs-4" href="#" >
            <i class="bi bi-wifi"></i>
            <span class="color-log">Zacred</span>
            
          </a>
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
                  <?php  echo $_SESSION['usuario']  ?>
                  <i class="bi bi-person-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <?php
                   if ($_SESSION['estado_cliente']=='ACTIVO') {
                  ?> 
                  <li><a class="dropdown-item " data-bs-toggle="modal" data-bs-target="#modalReportar">Reportar</a></li>
                  <?php  
                  }
                   ?>
                  
                  <li>
                    <a class="dropdown-item" href="../clases/cerrar_sesion.php">Salir</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- barra superior -->
      <!-- barra lateral (canvas) -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
          <nav class="navbar-dark">
            <ul class="navbar-nav">
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  Configuracion de cuenta
                </div>
              </li>
              <li>
                <a href="Conf.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-person"></i></span>
                  <span>Datos de usuario</span>
                </a>
              </li>
              <li>
                <a href="Conf_dire.php" class="nav-link px-3 active">
                    <span class="me-2"><i class="bi bi-pin-map"></i></span>
                    <span>Dirección</span>
                  </a>
              </li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  Reportes
                </div>
              </li>
              <li>
                <a href="reportes.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-person"></i></span>
                  <span>Reportes realizados</span>
                </a>
              </li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                  Estado
                </div>
              </li>
              <li>
                <a href="estado.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-person"></i></span>
                  <span>Resumen</span>
                </a>
              </li>
            </ul>
        </nav>
      </div>
    </div>
