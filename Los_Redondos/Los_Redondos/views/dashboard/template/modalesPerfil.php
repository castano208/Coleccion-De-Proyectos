<div id="editAjustes<?php echo $perfil['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/clientesController.php?idC=editSettings" method="POST">
                <div class="bg-light rounded p-4p-sm-5 my-4     mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-black">Editar</h3>
                    </div>
                    <?php
                    include("../../../model/conexion.php");
                    $email = $perfil['email'];
                    // $consulta = $conexion->query("select * from usuarios where email = '$email'");
                    $consulta = $conexion->query("SELECT tipo_documento.ID, tipo_documento.tipo_documento, clientes.identificador, clientes.nombre, clientes.celular, clientes.password, clientes.clave, clientes.direccion_casa, clientes.email
                    FROM clientes
                    INNER JOIN tipo_documento ON clientes.id_documento = tipo_documento.ID
                    WHERE clientes.email = '$email';");
                    $usuario = $consulta->fetch_assoc();
                    ?>

                    <div class="form-floating mb-3">
                        <label>Nombre Completo</label>
                        <input require type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label>Dirección</label>
                        <input require type="text" name="direccion_casa" class="form-control" value="<?php echo $usuario['direccion_casa']; ?>" required>
                    </div>

                    <div class="form-floating mb-3">
                        <?php
                        $session = $_SESSION['sesion'];

                        $consultaB = $conexion->query("select id_documento from clientes where identificador = '$session';");
                        $resultadoB = mysqli_fetch_array($consultaB);
                        $totalB = $resultadoB['id_documento'];

                        $consultaNom = $conexion->query("select tipo_documento from tipo_documento where ID = '$totalB';");
                        $consultaNomb = mysqli_fetch_array($consultaNom);
                        $nombreBA = $consultaNomb['tipo_documento']
                        ?>

                        <label>Tipo documento</label>
                        <select class="form-control" name="tipo_documento">
                            <?php
                            $consultaDoc = $conexion->query("select * from tipo_documento;");
                            $listaDoc = $consultaDoc->fetch_all(MYSQLI_ASSOC);
                            $valor = 0;
                            foreach ($listaDoc as $Doc) {
                                $valor += 1;
                                if ($nombreBA != $Doc["tipo_documento"]) {
                                    if ($valor == 1) { ?>
                                        <option value="<?php echo $totalB ?>"><?php echo $nombreBA; ?></option>
                                    <?php }
                                    ?>
                                    <option value="<?php echo $Doc["ID"] ?>"><?php echo $Doc["tipo_documento"]; ?></option>
                                <?php }
                                ?>
                            <?php }

                            ?>


                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <label>Celular</label>
                        <input require type="text" name="celular" class="form-control" value="<?php echo $usuario['celular']; ?>" required>
                    </div>
                    <br>
                    <h6 class="alert alert-primary"><strong>El siguiente campo no es editable.</strong></h6>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email</label>
                        <input type="email" name="correo" class="form-control" id="floatingInput" value="<?php echo $usuario['email']; ?>" disabled>
                        <input type="hidden" name="email" value="<?php echo $usuario['email']; ?>">
                    </div>
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Editar">
                </div>

            </form>
        </div>
    </div>
</div>
<div id="editPass<?php echo $perfil['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/clientesController.php?idC=editPass" method="POST">
                <div class="bg-light rounded p-4p-sm-5 my-4     mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-black">Editar contraseña</h3>
                    </div>
                    <?php
                    include("../../../model/conexion.php");
                    $email = $perfil['email'];
                    $consulta = $conexion->query("select * from clientes where email = '$email'");
                    $usuario = $consulta->fetch_assoc();
                    ?>
                    <div class="form-floating mb-3">
                        <input type="hidden" name="email" value="<?php echo $usuario['email']; ?>">
                    </div>
                    <div class="form-floating mb-3">
                        <label>Ingrese su contraseña actual</label>
                        <input require type="text" name="clave" class="form-control" required>
                    </div>
                    <h6 class="alert alert-primary"><strong>Cuando termine de llenar la información solicitada en el anterior campo, por favor continue con el otro campo</strong></h6>
                    <div class="form-floating mb-3">
                        <label>Ingrese su nueva contraseña</label>
                        <input require type="text" name="new_password" class="form-control" required>
                    </div>
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Editar">
                </div>

            </form>
        </div>
    </div>
</div>