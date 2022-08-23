<!--------------------------------MODAL PARA TERMINACION DE REPORTE -------------------------------->
<div class="modal fade" id="terminarreporte" tabindex="-1" aria-labelledby="terminarreporte" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR MARCA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Marcas.php" method="post">
                    <div class="row">
                        <div class="col mt-5">
                            <label for="tipo_dis" class="form-label">Seleccione tipo dispositivo</label>
                            <select class="form-select" name="tipo_dis">
                                <option selected disabled>-- SELECCIONE UN DISPOSITIVO --</option>
                                <option value="router">Router</option>
                                <option value="radio">Radio</option>
                            </select>
                        </div>
                    </div>
                    <div class="col mt-5">
                        <label for="nombre_marca" class="form-label">Marca</label>
                        <input class="form-control" type="text" name="nombre_marca">
                    </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="guardar_marca">Guardar</button>
            </form>
        </div>
    </div>
</div>
</div>

<!------------------Editar-------------------->
<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php  ?>

<!--MODAL TERMINACION DE REPORTE EN SOLICITUDES-->
<div class="modal fade" id="reportefin<?php echo $solipendientes -> reg_asignacion ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Finalizar reporte</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                        <!--Select tipo_reporte-->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="tipo_reporte">Tipo de reporte:</label>
                            <select name="tipo_report" id="tipo_report" class="form-select" aria-label="Default select example">
                                <option value="1">Intenet lento</option>
                                <option value="2">Sin internet</option>
                                <option value="3">Cambio de velocidad</option>
                            </select>
                        </div>
                        <!--Nombre input-->
                            <div class="form-outline mb-4">
                             <label class="form-label" for="detalles_solu_repo">Detalles de la solución:</label>
                             <input type="textarea" id="detalles_solu" name="detalles_solu" class="form-control">
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" name="finreporte">Finalizar</button>
                        </div>
                   </div>
                </div>
            </div>




