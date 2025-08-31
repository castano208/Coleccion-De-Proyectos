<div id="agregarEmpleado" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/empleadosController2.php?requestE=addE" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <?php
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("select * from tipo_documento");
                        $listaTD = $consulta->fetch_all(MYSQLI_ASSOC); ?>
                        <select class="custom-select" name="tipo_documento" required>
                            <option selected>Seleccione una opción</option>

                            <?php foreach ($listaTD as $TD) { ?>
                                <option value="<?php echo $TD['ID']; ?>" class="form-control"><?php echo $TD['tipo_documento']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Documento</label>
                        <input type="text" name="documento" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre_completo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="editarEmpleado<?php echo $registro['ID']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../../controller/empleadosController2.php?requestE=editE" method="POST">
                    <div class="form-group">
                        <?php

                        $session = $registro["ID"];
                        $consultaB = $conexion->query("select id_documento from empleados where ID = '$session ';");
                        $resultadoB = mysqli_fetch_array($consultaB);
                        $totalB = intval($resultadoB['id_documento']);


                        $consultaNom = $conexion->query("select tipo_documento from tipo_documento where ID = '$totalB';");
                        $consultaNomb = mysqli_fetch_array($consultaNom);
                        $nombreBA = $consultaNomb['tipo_documento'] ;
                        ?>

                        <label>Tipo documento</label>
                        <input type="hidden" name="identificador" value="<?php echo $registro["ID"] ?>">
                        <select class="form-control" name="tipo_documento">
                            <?php
                            $consultaDoc = $conexion->query("select * from tipo_documento;");
                            $listaDoc = $consultaDoc->fetch_all(MYSQLI_ASSOC);
                            $valor = -1;
                            foreach ($listaDoc as $Doc) {
                                $valor += 1;
                                if ($valor == 0) {
                                    ?>
                                    <option value="<?php echo $totalB ?>"><?php echo $nombreBA; ?></option>
                                    <?php }?>
                                    <option value="<?php echo $Doc["ID"] ?>"><?php echo $Doc["tipo_documento"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Documento</label>
                        <input type="number" name="documento" class="form-control" value="<?php echo $registro["documento"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombres" class="form-control" value="<?php echo $registro["nombre_completo"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $registro["email"] ?>" disabled>
                        <input type="hidden" name="email" class="form-control" value="<?php echo $registro["email"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" name="clave" class="form-control" value="<?php echo $registro["clave"] ?>" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- eliminar -->
<div id="eliminarEmpleado<?php echo $registro['ID']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/empleadosController.php?requestE=deleteE&deleteE=<?php echo $registro['email']; ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Empleado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este empleado?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                    <input name="email" type="hidden" value="<?php echo $registro['email'] ?>">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-danger" value="Borrar">
                </div>
            </form>
        </div>
    </div>
</div>