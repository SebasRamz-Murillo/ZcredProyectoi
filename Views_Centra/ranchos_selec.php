<?php
require '../Clases/conexion.inc.php';
conexion::abrir_conexion();
$conn = conexion::obtener_conexion();
$query=$conn->query("SELECT * from ranchos where localidad=$_GET[sel_localidad]");
$Localidades  = $query -> fetchAll(PDO::FETCH_OBJ);
Conexion::cerrar_conexion();
if ($Localidades==null) {
?>
<option value=''>-- NO HAY DATOS --</option>
<?php  
}
foreach($Localidades as $localidad ) 
{?>
<option value="<?php echo $localidad->id_rancho  ?>"><?php echo $localidad->nombre  ?></option>
<?php     
}