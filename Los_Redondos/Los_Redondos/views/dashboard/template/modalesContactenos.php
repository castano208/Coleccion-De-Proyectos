<!-- Edit Modal HTML -->
<div id="agregarPeticion" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/contactenos_Controller.php?requestCo=addCo" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Asunto</label>
                        <input type="text" name="asunto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mensaje</label>
                        <input type="text" name="mensaje" class="form-control" required>
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
<div id="editarPeticion<?php echo $registro['ID']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../../controller/contactenos_Controller.php?requestCo=editCo" method="POST">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $registro["nombre"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $registro["email"] ?>" disabled>
                        <input type="hidden" name="email" class="form-control" value="<?php echo $registro["email"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Asunto</label>
                        <input type="text" name="asunto" class="form-control" value="<?php echo $registro["asunto"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mensaje</label>
                        <input type="text" name="mensaje" class="form-control" value="<?php echo $registro["mensaje"] ?>" required>
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
<!-- eliminar -->
<div id="eliminarPeticion<?php echo $registro['ID']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../../controller/contactenos_Controller.php?requestCo=deleteCo&deleteCo=<?php echo $registro['email']; ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este usuario?</p>
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