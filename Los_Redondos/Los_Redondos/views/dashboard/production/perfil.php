<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require_once("../template/head.php");
  ?>
</head>
<!-- menu profile quick info -->
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->

<!-- /sidebar menu -->  

<!-- /menu footer buttons -->
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->

<!-- /top navigation -->


<!-- menu profile quick info -->

<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<?php
require_once("../template/side_bar.php");
?>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->

<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<?php
require_once("../template/top_bar.php")
?>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">


  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Perfil</h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">


            <?php $emailperfil = $_SESSION['email'];
              include('../../../model/conexion.php');
              //  include('../template/modalesPerfil.php');

              $consulta = ("SELECT tipo_documento.ID, tipo_documento.tipo_documento, clientes.identificador, clientes.nombre, clientes.celular, clientes.password, clientes.clave, clientes.direccion_casa, clientes.email
              FROM clientes
              INNER JOIN tipo_documento ON clientes.id_documento = tipo_documento.ID
              WHERE clientes.email = '$emailperfil';");
                                        
              $ejecutar = mysqli_query($conexion, $consulta);
              while ($perfil = mysqli_fetch_array($ejecutar)) {

                $clave = $perfil['clave']; ?>
                <?php
                $query = "SELECT * FROM imagen";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()) {
                ?>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <center>
                          <h4>Usuario</h4>
                        </center>
                        <br>
                        <div class="d-flex flex-column align-items-center text-center">
                          <form action="../../../controller/clientesController.php?idC=procesoGuardar&id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110"> -->
                            <img height="150px" width="150px" class="img-circle p-1" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>">
                            <div class="mt-3">
                              <h4><?php echo $perfil['nombre']; ?></h4>
                            </div>
                          </form>
                            <form action="../../../controller/clientesController.php?idC=procesoGuardar&id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                              <input type="file" REQUIRED name="imagen" /> <br /><br />
                              <input type="submit" class="btn btn-secondary" value="Aceptar">
                            </form>
                          
                        <?php
                      }
                        ?>
                        </div>
                        <hr class="my-4">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="card">
                      <div class="card-body">
                        <center>
                          <h4>Información del usuario</h4>
                        </center>
                        <br>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Nombre</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="<?php echo $perfil['nombre']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Dirección</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="<?php echo $perfil['direccion_casa']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Celular</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="<?php echo $perfil['celular']; ?>" disabled>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Correo electrónico</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="<?php echo $perfil['email']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Tipo de documento</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="<?php echo $perfil['tipo_documento']; ?>" disabled>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-9 text-secondary">
                            <a href="#editAjustes<?php echo $perfil['identificador']; ?>" data-toggle="modal" class="btn btn-secondary px-4" type="button">Editar información de usuario</a>
                            <br>
                            <br>
                            <a href="#editPass<?php echo $perfil['identificador']; ?>" data-toggle="modal" class="btn btn-secondary px-4" type="button">Editar contraseña</a>
                          </div>
                        </div>
                        <?php include('../template/modalesPerfil.php'); ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php
require_once("../template/footer.php")
?>
<!-- /footer content -->
</div>
</div>

<!-- scripts -->
<?php
require_once("../template/scripts.php")
?>

</body>

</html>