<!------------------------------------------MODALS AÑADIR MODELOS------------------------->
<div class="modal fade" id="Addmodelos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR MODELOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="modelos.php" method="post">
                    <div class="row mt-3">
                        <label for="sel_tipo_dispo">Seleccione tipo dispositivo</label>
                        <select class="form-select" name="sel_tipo_dispo" id="sel_tipo_dispo">
                            <option selected disabled>-- SELECCIONE --</option>
                            <option value="router">ROUTER</option>
                            <option value="radio">RADIO</option>
                        </select>
                    </div>
            </div>
            <div class="row mt-3 mb-4">
                <label for="sel_marca_router">Seleccione marca</label>
                <select class="form-select" name="sel_marca_router" id="sel_marca_router">
                    <option selected disabled>-- SELECCIONE --</option>
                </select>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#sel_tipo_dispo").change(function() {
                        $.get("tipos_dispositivos.php", "sel_tipo_dispo=" + $("#sel_tipo_dispo").val(), function(data) {
                            $("#sel_marca_router").html(data);
                            console.log(data);
                        });
                    });
                });
            </script>

        </div>
        <div class="modal-footer">
            <button type="submit" name="guardar_modelo" class="btn btn-primary">Guardar modelo</button>
            </form>
        </div>
    </div>
</div>



<!----------------------------------------------------------------------------------->
<!---------------------------------AÑADIR MARCAS---------------------->
<div class="modal fade" id="AddMarca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!---------------------------------------------------------------------------->
<!---------------------------------AÑADIR TECNICO---------------------->
<div class="modal fade" id="Addtecnico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR EMPLEADO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tecnicos.php" method="post">
                    <!--Nombre input-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="rnombretecnico">Nombre:</label>
                        <input type="text" id="rnombretecnico" class="form-control">
                    </div>
                    <!--Apellido Paterno input-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="rapaternotecnico">Apellido Paterno:</label>
                        <input type="text" id="rapaternotecnico" class="form-control">
                    </div>
                    <!--Apellido Paterno input-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="ramaternotecnico">Apellido Materno:</label>
                        <input type="text" id="ramaternotecnico" class="form-control">
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">Correo:</label>
                        <input type="email" id="emailtecnico" class="form-control" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginPassword">Contraseña:</label>
                        <input type="password" id="contratecnico" class="form-control" />
                    </div>
                    <!--Telefono Input-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="rtelefonotecnico">Telefono:</label>
                        <input type="text" id="rtelefonotecnico" class="form-control" />
                    </div>
                    <!--Tipo Trabajador Input-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="rtelefonotecnico">Tipo de trabajador:</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">1-Trabajador-Central</option>
                            <option value="2">2-Técnico</option>
                            <option value="3">3-Ingeniero</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                <button type="submit" class="btn btn-primary" name="agregar_tecnico">Registrar</button>

            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------->
<!----------------------AÑADIR MUNICIPIO------------------------->
<div class="modal fade" id="addlocalidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR MUNICIPIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="localidades.php" method="post">
                    Nombre del nuevo municipio <input type="text" name="nombre_localidad">
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary" name="agregar_localidad">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------->
<!---------------------------------AÑADIR ROUTERS------------------------------------->
<div class="modal fade" id="AddRou" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR ROUTERS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="localidades.php" method="post">
                    ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------->
<!---------------------------------Radios---------------------->
<div class="modal fade" id="AddRad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR RADIOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="radios.php" method="post">
                    .........
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                <button type="button" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------->

<!---------------------------------AÑADIR LOCALIDAD---------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR LOCALIDAD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="combo" name="combo" action="municipios.php" method="POST">
                    <label for="cbx_localidad" class="form-label">Seleccionar municipio</label>
                    <select class="form-select" aria-label="Default select example" id="cbx_localidad" name="cbx_localidad">
                        <?php
                        Conexion::abrir_conexion();
                        Selects::escibir_localidades(Conexion::obtener_conexion());
                        Conexion::cerrar_conexion();
                        ?>
                    </select>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nombre de la nueva localidad</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="offset-md-3 mb-4">
                    </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------->
<!--------------------------MODAL CLIENTES----------------------->
<div class="modal fade" id="regUsuario" aria-hidden="true" aria-labelledby="regUsuarioLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--CuerpoModal-->
            <div class="modal-body">
                <!----------------INICIA-->
                <form id="formulario" class="row formulario">
                    <div class="col-md-12 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="firstName">Nombre(s)</label>
                            <input type="text" name="nombres" id="nombres" class="form-control inputss" required>
                            <div class="invalid-feedback">
                                El nombre debe tener entre 3 y 20 letras.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="lastName">Apellido paterno</label>
                                <input type="text" name="a_paterno" id="a_paterno" class="form-control" required>
                                <div class="invalid-feedback">
                                    tu apellido paterno debe tener entre 3 y 20 letras.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1n1">Apelldo materno</label>
                                <input type="text" name="a_materno" id="a_materno" class="form-control " required>
                                <div class="invalid-feedback">
                                    tu apellido materno debe tener entre 3 y 20 letras.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="emailAddress">Correo Electronico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Por favor escribe un correo valido.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="phoneNumber">Número de teléfono movil</label>
                                <input type="tel" class="form-control" required id="phone" name="phone">
                                <div class="invalid-feedback">
                                    Por favor escribe un numero de telefono celular valido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="validationCustom04" class="form-label">Municipio</label>
                            <select class="form-select" name="sel_localidad" id="sel_localidad" require>
                                <option selected disabled>-- SELECCIONE --</option>
                                <?php
                                conexion::abrir_conexion();
                                selects::escibir_localidades(conexion::obtener_conexion());
                                conexion::cerrar_conexion();
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione su municipio.
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationCustom04" class="form-label">Comunidad</label>
                            <select class="form-select" name="sel_rancho" id="sel_rancho" require>
                                <option selected disabled>-- SELECCIONE --</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione su comunidad.
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#sel_localidad").change(function() {
                                $.get("ranchos_selec.php", "sel_localidad=" + $("#sel_localidad").val(), function(data) {
                                    $("#sel_rancho").html(data);
                                    console.log(data);
                                });
                            });
                        });
                    </script>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example99">Calle 1</label>
                            <input type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                Campo vacio.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example99">Calle 2</label>
                            <input type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                Campo vacio.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="firstName">Numero Exterior</label>
                            <input type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                Por favor introduzca su numero de casa.
                            </div>
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example7">Referencias</label>
                        <textarea class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="invalid-feedback">
                        Por favor escriba referencias de la casa.
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example9">Constraseña</label>
                                <input type="password" class="form-control form-control-lg" required>
                                <div class="invalid-feedback">
                                    Campo vacio.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example90">Confirmar contraseña</label>
                                <input type="password" class="form-control form-control-lg" required>
                                <div class="invalid-feedback">
                                    Campo vacio.
                                </div>
                            </div>
                        </div>
                        <!--Termina Cuerpo Modal-->
                    </div>
                    <div class="modal-footer">
                        <div class="mt-4">
                            <input class="btn btn-primary btn-lg" type="submit" value="Registrarme" />
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!------------------------------------------------->
<!---------MODALS ELIMINAR----------->


<!-- Modal -->
<div class="modal fade" id="addmodelos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!---->


