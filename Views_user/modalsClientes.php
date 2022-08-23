<!-- Modal -->
<div class="modal fade" id="modalReportar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reportar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
       Conexion::abrir_conexion();
       $errr=0;
       $dia=date('Y-m-d');
       $sql = "SELECT * FROM solicitudes where F_Solicitud='$dia' and usuario= $_SESSION[id_cliente]";  
       if (!Repositorio_usuario::comprobar(conexion::obtener_conexion(),$sql)) {
         conexion::cerrar_conexion();
         ?>
          <form action="estado.php" method="POST" onsubmit="return checkSubmit();">
         <div class="row mt-3 mb-4">
              <label for="validationCustom04" class="form-label">Tipo de problema</label>
              <select class="form-select" name="tipo_reporte" id="tipo_reporte">
                <option selected disabled >-- SELECCIONE --</option>
                <option value="4">Internet Lento</option>
                <option value="5">Sin internet</option>
                <option value="6">Cambio de paquete</option>
              </select>
              <div class="row mt-3 mb-4">
              <label for="validationCustom04" class="form-label">Detalle su problema</label>
              <textarea class="form-control" name="detalle_solicitud" id="detalle_solicitud" rows="4"></textarea>
              </div>
        </div>
         <?php
       } 
       else{
       ?>
       <div class="alert alert-danger" role="alert">
        Solo se puede generar un reporte por dia
        </div>
        <?php
       $errr=1;
       }
        ?>
      </div>
      <div class="modal-footer">
        <?php
        if($errr==1){
        ?>
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <?php
        }else{
        ?>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="generarReporte">Aceptar</button>
        </form>
        <?php  
        } 
        ?>
      </div>
    </div>
  </div>
</div>




