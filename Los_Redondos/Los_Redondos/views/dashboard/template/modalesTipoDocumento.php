<!-- Agregar Venta -->
<div id="agregarTD" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/tipoDocumentoController.php?idTD=addTD" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <input type="text" name="tipo_documento" class="form-control">
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
<div id="editarTD<?php echo $registro['ID']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
                <div class="modal-body">
                <form action="../../../controller/tipoDocumentoController.php?idTD=editTD" method="POST">
                    <div>
                        <input type="hidden" name="ID" class="form-control" value="<?php echo $registro["ID"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Tipo de documento</label>
                        <input type="text" name="tipo_documento" class="form-control" value="<?php echo $registro["tipo_documento"] ?>" required>
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
<div id="eliminarTD<?php echo $registro['ID']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/tipoDocumentoController.php?idTD=deleteTD&deleteTD=<?php echo $registro['ID'];?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Tipo de Documento</h4>
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
