<?php
class login{
public static function abrirsesion($conexion,$correo,$pass){
    $query=$conexion->prepare("SELECT usuarios.id_usuario,usuarios.correo,usuarios.contraseña as pass from usuarios where usuarios.correo=:email");
    $query ->bindParam("email",$correo,PDO::PARAM_STR);
    $query->execute();
    $resultPAS = $query->fetch(PDO::FETCH_ASSOC);
    if (!$resultPAS) {
        ?>
        <div class="alert alert-danger" role="alert">
      CONTRASEÑA O USUARIO INCORRECTO!
    </div>
        <?php
     header("Refresh:1; url=index.php");
    }
    else{
        if (password_verify($pass,$resultPAS['pass'])) {
        session_start();
        $query=$conexion->query("SELECT tipo_trabajador.tipo,id_trabajador as id_trabajador from trabajadores join tipo_trabajador on tipo_trabajador.id_tipo_trabajador=trabajadores.tipo_trabajador where usuario_trabajador=$resultPAS[id_usuario]");  
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result==null) {
        $queryDOS=$conexion->query("SELECT id_cliente as id_cliente,estado_cliente from clientes where usuario_cliente=$resultPAS[id_usuario]"); 
        $resultDOS = $queryDOS->fetch(PDO::FETCH_ASSOC);
        if ( $resultDOS ==null) {
            header("Refresh:1; url=www.com.com");
        }
        $_SESSION['tipo']='CLIENTE';
        $_SESSION['usuario']=$correo;
        $_SESSION['id_usuario'] =$resultPAS['id_usuario'];
        $_SESSION['id_cliente']=$resultDOS['id_cliente'];
        $_SESSION['estado_cliente']=$resultDOS['estado_cliente'];
        header("Refresh:1; url=views_user/index.php");
        }
        else{
            $_SESSION['tipo']=$result['tipo'];
            $_SESSION['usuario']=$correo;  
            $_SESSION['id_trabajador']=$result['id_trabajador'];  
            $_SESSION['id_usuario']=$resultPAS['id_usuario'];
            if ($_SESSION['tipo']=="CENTRAL") {
               
              
                header("Refresh:1; url=Views_Centra/index.php"); 
                }
                if ($_SESSION['tipo']=="TECNICO") {
                    header("Refresh:1; url=views_tecnicos/index.php");
                } 
        }   
        }
        else{
            ?>
            <div class="alert alert-danger" role="alert">
          CONTRASEÑA O USUARIO INCORRECTO!
        </div>
            <?php
         header("Refresh:1; url=index.php");
        }
        
    }
}

}

   