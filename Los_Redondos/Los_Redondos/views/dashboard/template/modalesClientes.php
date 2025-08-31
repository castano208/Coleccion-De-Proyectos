
<!-- Agregar Venta -->
<div id="agregarCli" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/clientesController.php?idC=addC" method="POST">
            <div class="modal-header">
                    <h4 class="modal-title">AGREGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label>Tipo de Documento</label><br>
                            <?php 
                            include('../../../model/conexion.php');
                            $consulta = $conexion->query("select * from tipo_documento");
                            $listaTD = $consulta->fetch_all(MYSQLI_ASSOC); ?>
                            <select class="custom-select"  name="tipo_documento" required>
                            <option selected>Seleccione una opción</option>

                            <?php foreach ($listaTD as $TD) { ?>
                                <option value="<?php echo $TD['ID']; ?>" class="form-control"><?php echo $TD['tipo_documento']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control" name="celular" required>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="direccion_casa" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" class="form-control" name="password" required>
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

<!-- Editar Venta -->
<div id="editarCli<?php echo $registro['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
                <div class="modal-body">
                <form action="../../../controller/clientesController.php?idC=editC" method="POST">
                    <div class="form-group">
                    <?php

                        $session = $registro["identificador"];
                        $consultaB = $conexion->query("select id_documento from clientes where identificador = '$session ';");
                        $resultadoB = mysqli_fetch_array($consultaB);
                        $totalB = intval($resultadoB['id_documento']);


                        $consultaNom = $conexion->query("select tipo_documento from tipo_documento where ID = '$totalB';");
                        $consultaNomb = mysqli_fetch_array($consultaNom);
                        $nombreBA = $consultaNomb['tipo_documento'] ;
                        ?>

                        <label>Tipo documento</label>
                        <input type="hidden" name="identificador" value="<?php echo $registro["identificador"] ?>">
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
                                        <?php }
                                        if ($registro["id_documento"] !=  $Doc["ID"]) { ?>
                                        <option value="<?php echo $Doc["ID"] ?>"><?php echo $Doc["tipo_documento"]; ?></option>
                                <?php } 
                                } ?>
                        </select>
                    <div class="form-group">
                    <input type="hidden" name="identificador" class="form-control" value="<?php echo $registro["identificador"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $registro["nombre"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" name="celular" class="form-control" value="<?php echo $registro["celular"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $registro["email"] ?>" disabled>
                        <input type="hidden" name="email" class="form-control" value="<?php echo $registro["email"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion_casa" class="form-control" value="<?php echo $registro["direccion_casa"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $registro["clave"] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-info" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Eliminar Venta -->
<div id="eliminarCli<?php echo $registro['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/clientesController.php?idC=deleteC&deleteC=<?php echo $registro['identificador'];?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Venta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este registro?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-danger" value="Borrar">
                </div>
            </form>
        </div>
    </div>
</div>
