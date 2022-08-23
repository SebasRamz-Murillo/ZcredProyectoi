<?php
require '../Clases/conexion.inc.php';
conexion::abrir_conexion();
$conn = conexion::obtener_conexion();
$query=$conn->query("SELECT * from modelos_radios where marca_radio=$_GET[Marca_add_Radio]");
$radios  = $query -> fetchAll(PDO::FETCH_OBJ);
Conexion::cerrar_conexion();
if ($radios==null) {
?>
<option disabled>-- NO HAY DATOS --</option>
<?php  
}
foreach($radios as $radio) 
{?>
<option value="<?php echo $radio->Id_modelo_rad  ?>"><?php echo $radio->nombre_m_rad  ?></option>
<?php     
}