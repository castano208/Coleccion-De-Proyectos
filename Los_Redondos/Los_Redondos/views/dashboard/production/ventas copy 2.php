<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    require_once ("../template/head.php");
  ?>
  </head>
              <br />
</div>
</div>
            <br />

            <!-- sidebar menu -->
            <?php
require_once ("../template/side_bar.php");
?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <?php
require_once ("../template/top_bar.php")
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


                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table  style="width:100%">
                      <thead>
                        <tr>
                          <th></th>

                        </tr>
                      </thead>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>



              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Empleado</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <div class="col-sm-6" style="padding-right: 10px;">
                        <a href="#agregarVenta" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Empleado</span></a>	
                      </div>
                      <thead>
                        <tr>
                          <th>TD</th>
                          <th>Documento</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("SELECT tipo_documento.ID, tipo_documento.tipo_documento, empleados.ID, empleados.email, empleados.nombre_completo, empleados.documento, empleados.clave, empleados.password
                        FROM empleados
                        INNER JOIN tipo_documento ON empleados.id_documento = tipo_documento.ID;");
                        $listaVentas = $consulta->fetch_all(MYSQLI_ASSOC);

                        foreach ($listaVentas as $registro) { ?>
                        <tr>
                          <td><?php echo $registro["tipo_documento"] ?></td>
                          <td><?php echo $registro["documento"] ?></td>
                          <td><?php echo $registro["nombre_completo"] ?></td>
                          <td><?php echo $registro["email"] ?></td>
                          <td>
                            <a href="#editarVentas<?php echo $registro['ID']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                            <a href="#eliminarVenta<?php echo $registro['ID']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                          </td>
                        </tr>
                        <?php include('../template/modalesVentas.php'); ?>
                          <?php } ?>
                      </tbody>
                    </table>
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
    require_once ("../template/footer.php")
  ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- scripts -->
    <?php
    require_once ("../template/scripts.php")
  ?>

  </body>
</html>