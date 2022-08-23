<?php
require '../Clases/conexion.inc.php';
conexion::abrir_conexion();
$conn = conexion::obtener_conexion();
$query=$conn->query("select modelos_router.Id_modelo_rou,modelos_router.nombre_m_rou,modelos_router.marca_router from  modelos_router where modelos_router.marca_router=$_GET[select_radio_selc] ");
$marcas  = $query -> fetchAll(PDO::FETCH_OBJ);
if ($marcas==null) {
?>
<option>-- NO HAY DATOS --</option>
<?php  
}
foreach($marcas as $marca ) 
{?>
<option value="<?php echo $marca->Id_modelo_rou  ?>"><?php echo $marca->nombre_m_rou  ?></option>
<?php     
Conexion::cerrar_conexion();
}

