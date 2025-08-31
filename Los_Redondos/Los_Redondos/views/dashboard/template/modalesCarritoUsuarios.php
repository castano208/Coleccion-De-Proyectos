<div id="agregarCarrito" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/carrito_ClientesController.php?requestE=addE" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Identificador de sesión</label>
                        <input type="text" name="id_sessio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Productos</label>
                        <?php
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("Select * From platos");
                        $listaPlato = $consulta->fetch_all(MYSQLI_ASSOC); ?>

                        <select class="custom-select" name="id_producto" required>
                            <option selected>Seleccione una opción</option>

                            <?php foreach ($listaPlato as $Pl) { ?>
                                <option value="<?php echo $Pl['identificador']; ?>" class="form-control"><?php echo $Pl['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Empleado</label>
                        <?php 
                            $consulta2 = $conexion->query("select * From empleados where id_cargo = '0'");
                            $listaEmpleados = $consulta2->fetch_all(MYSQLI_ASSOC); ?>
                            <select class="custom-select" name="id_empleados" required>
                            <option selected>Seleccione una opción</option> 
                                <?php foreach ($listaEmpleados as $Emp) {
                                    if ($Emp['ID'] != 0) {?>
                                        <option value="<?php echo $Emp['ID']; ?>" class="form-control"><?php echo $Emp['nombre_completo']; ?></option>
                                        <?php }
                                    ?>
                            <?php } ?>
                        </select>
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
<div id="editarCarrito<?php echo $registro['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../../controller/carrito_ClientesController.php?requestE=editE" method="POST">
                    <div class="form-group">
                        <label>identificador sesión</label>
                        <input type="text" name="id_sessio" class="form-control" value="<?php echo $registro['id_session']; ?>" required>
                    </div>
                    <div class="form-group">
                        <?php
                        $producto = $registro["id_producto"];
                        $consultaB = $conexion->query("select id_producto from carrito_usuarios where id_producto = '$producto';");
                        $resultadoB = mysqli_fetch_array($consultaB);
                        $totalB = intval($resultadoB['id_producto']);


                        $consultaNom = $conexion->query("select nombre from platos where identificador = '$totalB';");
                        $consultaNomb = mysqli_fetch_array($consultaNom);
                        $nombreBA = $consultaNomb['nombre'] ;

                        ?>

                        <label>Producto</label>
                        <select class="form-control" name="id_producto">
                            <?php
                            $consultaPla = $conexion->query("select * from platos;");
                            $listaPla = $consultaPla->fetch_all(MYSQLI_ASSOC);
                            $valor = -1;
                            foreach ($listaPla as $Pla) {
                                $valor += 1;
                                if ($valor == 0) {
                                    ?>
                                    <option value="<?php echo $totalB ?>"><?php echo $nombreBA; ?></option>
                                    <?php }?>
                                    <option value="<?php echo $Pla["identificador"] ?>"><?php echo $Pla["nombre"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" value="<?php echo $registro['cantidad']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>identificador empleado</label>
                        <?php 
                            $empleado = $registro["id_empleado"];
                            $consultaEMP = $conexion->query("select ID from empleados where ID = '$empleado';");
                            $resultadoEMP = mysqli_fetch_array($consultaEMP);
                            $totalEMP = intval($resultadoEMP['ID']);

                            $consultaNemp = $conexion->query("select nombre_completo from empleados where ID = '$totalEMP';");
                            $consultaNemp = mysqli_fetch_array($consultaNemp);
                            $nombreNemp = $consultaNemp['nombre_completo'] ;

                            $consulta2 = $conexion->query("Select * From empleados Where id_cargo = '0'");
                            $listaEmpleados = $consulta2->fetch_all(MYSQLI_ASSOC);
                            $valorE = -1;

                             ?>
                            <select class="custom-select" name="id_empleados" required>
                                <?php foreach ($listaEmpleados as $Emp) {
                                    $valorE += 1;
                                    if ($Emp['ID'] != 0) {

                                        if ($valorE == 0) { ?>

                                <option value="<?php echo $totalEMP; ?>" class="form-control"><?php echo $nombreNemp ; ?></option>

                            <?php } ?><option value="<?php echo $Emp['ID']; ?>" class="form-control"><?php echo $Emp['nombre_completo']; ?></option>
                        <?php } 
                    }?>
                        </select>  <?php ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Guardar">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- eliminar -->
<div id="eliminarCarrito<?php echo $registro['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/carrito_ClientesController.php?requestE=deleteE&deleteE=<?php echo $registro['id_producto']; ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Registro Carrito del cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este registro carrito del cliente?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                    <input name="identificador" type="hidden" value="<?php echo $registro['identificador'] ?>">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-danger" value="Borrar">
                </div>
            </form>
        </div>
    </div>
</div>