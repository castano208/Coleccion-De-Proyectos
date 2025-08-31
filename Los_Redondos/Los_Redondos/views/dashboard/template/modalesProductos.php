<!-- Edit Modal HTML -->
<div id="agregarProducto" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/productosController.php?idP=addP" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Producto</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="precio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="ingredientes" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cantidad de productos disponible</label>
                        <input type="number" name="disponible" class="form-control" required>
                    </div><br>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="image"/>
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
<!-- Edit Modal HTML -->
<div id="editarProducto<?php echo $registro['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDITAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <form action="../../../controller/productosController.php?idP=editP" method="POST"  enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="identificador" class="form-control" value="<?php echo $registro["identificador"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Producto</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $registro["nombre"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="precio" class="form-control" value="<?php echo $registro["precio"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="ingredientes" class="form-control" value="<?php echo $registro["ingredientes"] ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Cantidad del producto disponible</label>
                        <input type="number" name="disponible" class="form-control" value="<?php echo $registro["disponible"] ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Imagen</label><br>
                        <input type="hidden" name="image" >
                        <input type="file" name="image">

                        <br><br><img  style="max-width: 185px; margin-left: 135px ;" src="data:image/jpeg;base64, <?php echo  base64_encode($registro["imagen"]) ;?>">
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
<!-- Delete Modal HTML -->
<div id="eliminarProducto<?php echo $registro['identificador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/productosController.php?idP=deleteP&deleteP=<?php echo $registro['identificador']; ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este producto?</p>
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