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
                    <h2>Clientes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <div class="col-sm-6" style="padding-right: 10px;">
                        <a href="#agregarCli" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Cliente</span></a>	
                      </div>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>TD</th>
                          <th>Documento</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Dirección</th>
                          <th>Celular</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("select * from clientes");
                        $listaContactenos = $consulta->fetch_all(MYSQLI_ASSOC);

                        foreach ($listaContactenos as $registro) { ?>
                            <tr>
                              <td><?php echo $registro["identificador"] ?></td>
                              <td><?php echo $registro["id_documento"] ?></td>
                              <td><?php echo $registro["documento"] ?></td>
                              <td><?php echo $registro["nombre"] ?></td>
                              <td><?php echo $registro["email"] ?></td>
                              <td><?php echo $registro["direccion_casa"] ?></td>
                              <td><?php echo $registro["celular"] ;?></td>  
                              <td>
                              <a href="#editarCli<?php echo $registro['identificador']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                              <a href="#eliminarCli<?php echo $registro['identificador']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                              </td>
                            </tr>
                        <?php
                        include('../template/modalesClientes.php'); ?>
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