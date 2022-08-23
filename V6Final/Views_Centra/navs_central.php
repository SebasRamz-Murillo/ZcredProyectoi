   <!-- Nav barr superiror -->
   <?php
   session_start();
   if (isset($_SESSION['tipo'])) {
   
    if($_SESSION['tipo']=='TECNICO'){
      header('location: ../views_tecnicos/index.php');
    }
    if($_SESSION['tipo']=='CLIENTE'){
      header('location: ../views_user/index.php');
    }
   }else
   {
    header('location: ../index.php');
   }
   ?>
   <div>
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
             <?php echo $_SESSION["usuario"]; ?>
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
              
                <li>
                  <a class="dropdown-item" href="../Clases/cerrar_sesion.php">Salir</a>
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
              <div class="text-muted small fw-bold text-uppercase px-3">
                Inicio
              </div>
            </li>
            <li>
              <a href="index.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Estadisticas</span>
              </a>
            </li>
            <li class="my-1"><hr class="dropdown-divider bg-light"></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                INTERFACES
              </div>
            </li>
                  <!--CLIENTES-->
            <li>
            <a href="clientes.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Clientes</span>
                      </a>
              <!--<a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Clientes">
                <span class="me-2"><i class="bi bi-person-badge"></i></i></span>
                <span>Clientes</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Clientes">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#regUsuario">
                      <span class="me-2">
                        <i class="bi bi-person-badge"></i>
                      </span>
                      <span>Añadir cliente</span>
                    </a>
                  </li>
                  <li>
                      <a href="clientes.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar clientes</span>
                      </a>
                    </li>
                </ul>
              </div>-->
            </li>
             <!--FIN CLIENTES-->
               <!--Tecnicos-->
            <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Tecnicos">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                  </svg>
                  </span>
                  <span>Tecnicos</span>
                  <span class="ms-auto">
                    <span class="right-icon
                    ">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                <div class="collapse" id="Tecnicos">
                  <ul class="navbar-nav ps-3">
                    <li>
                    <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#Addtecnico">
                        <span class="me-2">
                          <i class="bi bi-speedometer2"></i>
                        </span>
                        <span>Añadir empleado</span>
                      </a>
                    </li>
                    <li>
                      <a href="tecnicos.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar empleados</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
             <!--FIN Tecnicos-->
            <li class="my-1">
              <hr class="dropdown-divider bg-light">
            </li>
            <!--DISPOSITVIOS-->            
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                dispositivos
              </div>
            </li>
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Routers">
                <span class="me-2"><i class="bi bi-router-fill"></i></i></i></span>
                <span>Routers</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Routers">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#AddRou">
                      <span class="me-2">
                      <i class="bi bi-plus-square"></i>
                      </span>
                      <span>Añadir routers</span>
                    </a>
                  </li>
                  <li>
                      <a href="routers.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar routers</span>
                      </a>
                    </li>
                </ul>
              </div>
            </li>
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Radios">
                <span class="me-2"><i class="bi bi-broadcast-pin"></i></i></i></span>
                <span>Radios</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Radios">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3"  data-bs-toggle="modal" data-bs-target="#AddRad">
                      <span class="me-2">
                      <i class="bi bi-plus-square"></i>
                      </span>
                      <span>Añadir radios</span>
                    </a>
                  </li>
                  <li>
                      <a href="radios.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar radios</span>
                      </a>
                    </li>
                </ul>
              </div>
            </li>
            <li class="my-1">
              <hr class="dropdown-divider bg-light">
            </li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                LUGARES CON SERVICIO
              </div>
            </li>
               <!--Municipios-->
               <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Municipio">
                  <span class="me-2">
                    <i class="bi bi-geo-alt"></i>
                  </svg>
                  </span>
                  <span>Localidades</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                <div class="collapse" id="Municipio">
                  <ul class="navbar-nav ps-3">
                    <li>
                      <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class="me-2">
                          <i class="bi bi-geo"></i>
                        </span>
                        <span>Añadir localidad</span>
                      </a>
                    </li>
                    <li>
                      <a href="ranchos.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar localidades</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
               <!--FIn Municipio-->
               <!--Fin Localidades-->
               <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Localidad">
                  <span class="me-2">
                    <i class="bi bi-map"></i>
                  </svg>
                  </span>
                  <span>Municipios</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                <div class="collapse" id="Localidad">
                  <ul class="navbar-nav ps-3">
                    <li>
                      <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#addlocalidad">
                        <span class="me-2">
                          <i class="bi bi-pin-map"></i>
                        </span>
                        <span>Añadir municipio</span>
                      </a>
                    </li>
                    <li>
                      <a href="localidades.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar municipios</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
<!--------------------------------------------------------------->
<!---------------------PARA MARCAS Y ESO-------------------------------->
              <li class="my-1">
                <hr class="dropdown-divider bg-light">
              </li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                 marcas y modelos de dispositivos
                </div>
              </li>
              <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Modelos">
                  <span class="me-2">
                    <i class="bi bi-map"></i>
                  </svg>
                  </span>
                  <span>Modelos</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                <div class="collapse" id="Modelos">
                  <ul class="navbar-nav ps-3">
                    <li>
                      <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#Addmodelos">
                        <span class="me-2">
                        <i class="bi bi-plus-square"></i>
                        </span>
                        <span>Añadir modelo</span>
                      </a>
                    </li>
                    <li>
                      <a href="modelos.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar Modelos</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Marcas">
                  <span class="me-2">
                    <i class="bi bi-map"></i>
                  </svg>
                  </span>
                  <span>Marcas</span>
                    <span class="ms-auto">
                      <span class="right-icon">
                          <i class="bi bi-chevron-down"></i>
                      </span>    
                    </span>
                  </span>
                </a>
                <div class="collapse" id="Marcas">
                  <ul class="navbar-nav ps-3">
                    <li>
                      <a href="#" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#AddMarca">
                        <span class="me-2">
                        <i class="bi bi-plus-square"></i>
                        </span>
                        <span>Añadir marca</span>
                      </a>
                    </li>
                    <li>
                      <a href="Marcas.php" class="nav-link px-3">
                        <span class="me-2">
                        <i class="bi bi-table"></i>
                        </span>
                        <span>Mostrar marcas</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="my-1">
                <hr class="dropdown-divider bg-light">
              </li>
              <li class="my-3"></li>
<!--------------------------------------------------------------->
          </ul>
        </nav>
      </div>
    </div>
    </div>