<?php
class usuarios {
   private $id_usuarios;
   private $nombre;
   private $A_Paterno;
   private $A_Materno;
   private $correo;
   private $telefono;
   public function __construct( $id_usuarios, $nombre, $A_Paterno, $A_Materno,$correo, $telefono)
   {
    $this->id_usuarios = $id_usuarios;
    $this-> nombre = $nombre;
    $this-> A_Paterno = $A_Paterno;
    $this-> A_Materno = $A_Materno;
    $this-> correo = $correo;
    $this-> telefono= $telefono;
   }
   public function obtener_id_usuario(){
    return $this -> id_usuarios;
   }
   public function obtener_nombre(){
    return $this -> nombre;
   }
   public function obtener_a_paterno(){
    return $this -> A_Paterno;
   }
   public function obtener_a_materno(){
    return $this -> A_Materno;
   }
   public function obtener_correo(){
    return $this -> correo;
   }
   public function obtener_telefono(){
    return $this -> telefono;
   }
}