
<?php

$error_localidad = null;
$error =null;
$error_R =null;   
//--------------------------------------------------------
if (isset($_POST['agregar_tecnico'])) { 
  extract($_POST);
 Conexion::abrir_conexion();
 $conexion=conexion::obtener_conexion();
 if (empty($nombre_tecnico)||empty($tec_a_paterno)||empty($tec_a_materno||empty($email)||empty($telefono)||empty($pass)||empty($select_tip))) {
  ?>
  <div class="alert alert-danger" role="alert">ALGUNO DE LOS CAMPOS ESTABA VACIO</div>
  <?php
 }else{
      $passen= password_hash($pass, PASSWORD_DEFAULT);
      $ins_usuario="INSERT INTO usuarios(nombre, contraseña, A_Paterno, A_Materno, correo, telefono) VALUES ('$nombre_tecnico','$passen','$tec_a_paterno','$tec_a_materno','$email','$telefono')";
      $conexion->query($ins_usuario);
      $query=$conexion->query(" SELECT id_usuario FROM USUARIOS WHERE correo='$email'");
      $result = $query->fetch(PDO::FETCH_ASSOC);
      $trabajador="INSERT into trabajadores(usuario_trabajador,estado_trabajador,tipo_trabajador) values($result[id_usuario],1,2);";
      $conexion->query($trabajador);
      Conexion::cerrar_conexion();
      ?>
      <div class="alert alert-success" role="alert">
      Se a Registrado al nuevo trabajador!
      </div>
      <?php
 }

}      
//------------------------------------------------------- 

if(isset($_POST['asignar_tec_insta'])){
  extract($_POST);
  if(empty($id_solicitudins||empty($select_tecnicoins))){
    ?>
    <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
    <?php
  }else{
    $insert ="INSERT INTO tecnico_asignado (tecnico,solicitud,estado_asignado)VALUES ($select_tecnicoins,$id_solicitudins,1)";
    Conexion::abrir_conexion();
    RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
    Conexion::cerrar_conexion();
    ?>
    <div class="alert alert-success" role="alert">SE HA ASIGNADO EL TECNICO</div>
    <?php
    }

  }
//------------------------------------------------------------------------------
if (isset($_POST['asignar_tecnico'])) {
  extract($_POST);

  if(empty($id_solicitud)){
    ?>
    <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
    <?php
  }else{
    if(empty($select_tecnico)){
      ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php
    }
    else{
 $insert ="INSERT INTO tecnico_asignado (tecnico,solicitud,estado_asignado)VALUES ($select_tecnico,$id_solicitud,1)";
  Conexion::abrir_conexion();
  RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
  Conexion::cerrar_conexion();
  ?>
  <div class="alert alert-success" role="alert">SE HA ASIGNADO EL TECNICO</div>
  <?php 
    }
  }
  
}    

//-----------------------------------------------------------------------------  
//--------------------------------------------------------


if (isset($_POST['guardar_routers'])) { 
  extract($_POST);
 if(empty($select_radio_selc)){
  ?>
  <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
  <?php 
 }else{
  if(empty($sel_marca_routess))
  {
    ?>
    <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
    <?php 
  }
  else{
    if (empty($serie_router)) {
      ?>
    <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
    <?php 
    }
    else{
      $cadena ="SELECT * FROM ROUTER WHERE modelo_router=$sel_marca_routess AND serie_router='$serie_router';";
      Conexion::abrir_conexion();
      if(!RepositorioCentral::comprobar(conexion::obtener_conexion(),$cadena)){
        $insert = "INSERT INTO ROUTER (modelo_router,serie_router,estado_router)values ($sel_marca_routess,'$serie_router',2)";
        RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
        ?>
        <div class="alert alert-success" role="alert">SE A AÑADIDO EL ROUTER</div>
        <?php 
      }else{
        ?>
        <div class="alert alert-danger" role="alert">EL ROUTER YA ESTABA REGISTRADO</div>
        <?php 
      }
      Conexion::cerrar_conexion();
    }
  }
 }
} 
//-----------------------------------------------------------------------------------
//----------------------------------------------------------------------------------
if (isset($_POST['agregar_municipio'])) { 
  extract($_POST);
  if (empty($nombre_municipio)) {
    ?>
    <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
    <?php 
  }
  else {
    Conexion::abrir_conexion();
    $sql = "SELECT * FROM localidad where localidad.nombre='$nombre_municipio'";  
     if (!RepositorioCentral::comprobar(conexion::obtener_conexion(),$sql)) {
      $insert="INSERT INTO localidad(nombre)values('$nombre_municipio');";
      RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);

       $error_R ="SE REGISTRO EL MUNICIPIO";
     }
     else{
       $error = 'EL MUNICIPIO '. $nombre_municipio .' YA EXISTE';
     }
     if(isset($error)){
       ?>
       <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
       <?php 
     }
     else{
       ?>
       <div class="alert alert-success" role="alert"><?php echo $error_R ?></div>
     <?php 
     }
     conexion::cerrar_conexion();
  }
} 
//-----------------------------------------------------------------------------------
if (isset($_POST['guardar_modelo'])) { 
  extract($_POST);
  if (empty($sel_tipo_dispo)) {
    ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
  }else{
    if (empty($sel_marca_router)) {
      ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
    }if(empty($nom_marca)){
      ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
    }
    else{
      Conexion::abrir_conexion();
      if($sel_tipo_dispo=='router'){
        $query="SELECT * from modelos_router where nombre_m_rou='$nom_marca' and marca_router=$sel_marca_router";
        if (!RepositorioCentral::comprobar(Conexion::obtener_conexion(),$query)) {
          $insert="INSERT into modelos_router(nombre_m_rou,marca_router) values('$nom_marca',$sel_marca_router);";
          RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
          ?>
          <div class="alert alert-success" role="alert"><?php echo 'SE AÑADIO EL MODELO DE ROUTER '. $nom_marca ?></div>
        <?php 
        }else{
          ?>
          <div class="alert alert-danger" role="alert"><?php echo 'EL MODELO DE ROUTER YA ESTA REGISTRADO  '. $nom_marca ?></div>
        <?php 
        }
        conexion::cerrar_conexion();
      }
      if($sel_tipo_dispo=='radio'){
        $query="SELECT * FROM modelos_radios where nombre_m_rad='$nom_marca' and marca_radio=$sel_marca_router";
        if (!RepositorioCentral::comprobar(Conexion::obtener_conexion(),$query)) {
          $insert= "INSERT into modelos_radios(nombre_m_rad,marca_radio) values ('$nom_marca',$sel_marca_router);";
          RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
          ?>
          <div class="alert alert-success" role="alert"><?php echo 'SE AÑADIO EL RADIO '. $nom_marca ?></div>
        <?php
        }
        else{
          ?>
          <div class="alert alert-danger" role="alert"><?php echo 'EL MODELO DE RADIO YA ESTA REGISTRADO  '. $nom_marca ?></div>
        <?php  
        }
        conexion::cerrar_conexion();
      } 
    }
  }
} 
//-----------------------------------------------------------------------------------
if (isset($_POST['agregar_radios_con_se'])) {
extract($_POST);
if (empty($sel_marca_rads)) {
  ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
} else {
  if (empty($serial)) {
    ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
  } else {
  Conexion::abrir_conexion();
  $sql="SELECT * FROM RADIOS WHERE serie_radio ='$serial' and modelo_radio=$sel_marca_rads;";
  if (!RepositorioCentral::comprobar(conexion::obtener_conexion(),$sql)){
    $insert ="INSERT INTO RADIOS (modelo_radio,serie_radio,estado_radio)values($sel_marca_rads,'$serial',2)";
    RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
    ?>
    <div class="alert alert-susses" role="alert">EL RADIO SE HA REGISTRADO</div>
    <?php
  }else{
    ?>
    <div class="alert alert-danger" role="alert">EL RADIO YA ESTA REGISTRADO</div>
    <?php
  }
  }
}

}
//-----------------------------------------------------------------------------------
    if (isset($_POST['agregar_localidad'])) { 
    extract($_POST);
    if(empty($cbx_localidad)){
      ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
    }else{
      if(empty($nom_municipio)){
        ?>
        <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
        <?php 
      }else{
        Conexion::abrir_conexion();
        $sql ="SELECT * from ranchos where ranchos.nombre='$nom_municipio' and ranchos.localidad=$cbx_localidad";
        if (!RepositorioCentral::comprobar(conexion::obtener_conexion(),$sql)) {
          $insert="insert INTO ranchos (nombre,Codigo_Postal,localidad) values('$nom_municipio','$codigo_postal',$cbx_localidad);";
          RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
         $error_R ='SE REGISTRO LA LOCALIDAD '.$nom_municipio; 
        }
        else{
         $error = 'EL MUNICIPIO '.$nom_municipio.' YA EXISTE';
        }
        if(isset($error)){
          ?>
          <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
          <?php 
        }
        else{
          ?>
          <div class="alert alert-success" role="alert"><?php echo $error_R ?></div>
        <?php 
        }
        conexion::cerrar_conexion();
      }
    }
    
  }     

  //-------------------------YA ESTA ESTE----------------------->
  // o pues ve como pasar las variables por el link para que insertes la instalaciion segun el modala que te abrio y inserta las en la solicitud
if (isset($_POST["guardar_marca"])) {
  extract($_POST);
  if (empty($tipo_dis)) {
    ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
  }else{
    if (empty($nombre_marca)) {
      ?>
      <div class="alert alert-danger" role="alert">LOS CAMPOS ESTAN VACIOS POR FAVOR VUELVA A INTENTAR</div>
      <?php 
    }else{
      if($tipo_dis=='router'){
        Conexion::abrir_conexion();
        $sql="call compMarRou('$nombre_marca')";
        if(!RepositorioCentral::comprobar(conexion::obtener_conexion(),$sql))
        {
          $insertrou="INSERT INTO marcas_router(nombre_m_rou) values ('$nombre_marca')";
          RepositorioCentral::inserts(conexion::obtener_conexion(),$insertrou);
          $error_R = "LA MARCA  $nombre_marca  DE ROUTERS SE HA REGISTRADO " ;
        }else
        {
          $error = 'LA MARCA DE ROUTER ESTA REGISTRADA '. $nombre_marca;
        } 
        if (isset($error)) {
          ?>
          <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
          <?php 
         }
         else{ ?>
          <div class="alert alert-success" role="alert"><?php echo $error_R ?></div>
         <?php 
          Conexion::cerrar_conexion(); 
        }
      }
      if($tipo_dis=='radio'){
        Conexion::abrir_conexion();
        $sql="SELECT marcas_radios.nombre_m_rad FROM marcas_radios 
        WHERE marcas_radios.nombre_m_rad = '$nombre_marca'";
        if(!RepositorioCentral::comprobar(conexion::obtener_conexion(),$sql))
        {
          $insert="INSERT into marcas_radios(nombre_m_rad)values('$nombre_marca')";
          RepositorioCentral::inserts(conexion::obtener_conexion(),$insert);
          $error_R = 'LA MARCA DEL RADIO SE HA REGISTRADO '.$nombre_marca;//en caso de no encontrar entra aqui
        }else
        {
          $error = 'LA MARCA DEL RADIO YA ESTA REGISTRADA '.$nombre_marca;
        } 
        if (isset($error)) {
          ?>
          <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
          <?php 
         }
         else{ ?>
          <div class="alert alert-success" role="alert"><?php echo $error_R ?></div>
        <?php }
         ?>
            <?php
           Conexion::cerrar_conexion();  
      }  
    }
  }
  

}
//-----------------------------------------------------------------------------------
if (isset($_POST['actualizar_mar_rad'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
 SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE marcas_Radios SET nombre_m_rad = '$actualizarMRad' WHERE Id_marca_rad = '$id_marca_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}

if (isset($_POST['guarda_mar_rou'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE marcas_router SET nombre_m_rou = '$actualizarNomMarca' WHERE Id_marca_rou = '$id_mar_rou_edit'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}

if (isset($_POST['guarda_mod_rad'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE modelos_radios SET nombre_m_rad = '$actualizar_nom_modelo' WHERE Id_modelo_rad = '$id_mod_rad_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}
if (isset($_POST['guarda_modelos_rou'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE modelos_router SET nombre_m_rou = '$actualizar_nom_m_rou' WHERE Id_modelo_rou = '$id_mod_rou_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}


if (isset($_POST['Guarda_Municipio'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE localidad SET nombre = '$Actualizar_municipio' WHERE Id_localidad = '$id_municipio_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}

if (isset($_POST['Guarda_Localidad'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE ranchos SET nombre = '$actualizar_nom_localidad', Codigo_Postal='$actualizar_cp_localidad' WHERE id_rancho = '$id_localidad_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}
if (isset($_POST['guarda_radios'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE radios SET serie_radio = '$actualiza_serie_radio', estado_radio='$actualiza_estado_radio' WHERE id_radio = '$id_radios_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}

if (isset($_POST['guarda_router'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE router SET serie_router = '$actualiza_serie_rou', estado_router='$actualiza_estado_router' WHERE id_router = '$id_router_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}

if (isset($_POST['guarda_trabajador'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE trabajadores SET estado_trabajador = '$actualiza_estado_trabajadores' WHERE id_trabajador = '$id_trabajador_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}

if (isset($_POST['guarda_cliente'])) 
{ 
  extract($_POST);
  ?> 
  <div class="alert alert-success" role="alert">
SE HA EDITADO CORRECTAMENTE
</div>
  <?php
    Conexion::abrir_conexion();
    $cadena="UPDATE clientes SET estado_cliente = '$actualiza_estado_clientes' WHERE id_cliente = '$id_cliente_cambiar'";
    RepositorioCentral::consultas(conexion::obtener_conexion(),$cadena);
    conexion::cerrar_conexion(); 
}



