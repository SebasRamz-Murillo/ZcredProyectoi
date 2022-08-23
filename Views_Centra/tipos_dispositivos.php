<?php
require '../Clases/conexion.inc.php';
conexion::abrir_conexion();
$conn = conexion::obtener_conexion();
echo $_GET['sel_tipo_dispo'];
if ($_GET["sel_tipo_dispo"]=="router") {
    $query=$conn->query("SELECT Id_marca_rou, nombre_m_rou FROM marcas_router");
    $routers  = $query -> fetchAll(PDO::FETCH_OBJ);
    if ($routers==null) {
    ?>
    <option>-- NO HAY DATOS --</option>
    <?php  
    }
    foreach($routers as $router ) 
    {?>
    <option value="<?php echo $router->Id_marca_rou  ?>"><?php echo $router->nombre_m_rou  ?></option>
    <?php     
    }    
}
if($_GET["sel_tipo_dispo"]=='radio'){
    $query=$conn->query("SELECT Id_marca_rad, nombre_m_rad FROM marcas_radios");
    $radios  = $query -> fetchAll(PDO::FETCH_OBJ);
    if ($radios==null) {
    ?>
    <option value=''>-- NO HAY DATOS --</option>
    <?php  
    }
    foreach($radios as $radio ) 
    {?>
    <option value="<?php echo $radio->Id_marca_rad  ?>"><?php echo $radio->nombre_m_rad  ?></option>
    <?php     
    }  
}
