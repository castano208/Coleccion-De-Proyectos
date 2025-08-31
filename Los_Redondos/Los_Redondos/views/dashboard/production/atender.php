<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    require_once ("../template/head.php");
  ?>
  </head>
              <!-- menu profile quick info --> <!-- /menu profile quick info -->

              <br />

<!-- sidebar menu -->

<!-- /sidebar menu -->

<!-- /menu footer buttons -->            <!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->

<!-- /top navigation -->


            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->

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
                    <h2>Atender</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <div class="col-sm-6" style="padding-right: 10px;">	
                      </div>
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empleado</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("SELECT empleados.nombre_completo, empleados.ID, clientes.identificador, clientes.nombre, atender.id_atender, atender.fecha_atencion
                        FROM ((atender
                        INNER JOIN empleados ON empleados.ID = atender.identificador_empleados) 
                        INNER JOIN clientes ON clientes.identificador = atender.identificador_clientes);");
                        $listaAtender = $consulta->fetch_all(MYSQLI_ASSOC);

                        foreach ($listaAtender as $registro) { ?>
                        <tr>
                            <td><?php echo $registro["id_atender"] ?></td>
                            <td><?php echo $registro["nombre_completo"] ?></td>
                            <td><?php echo $registro["nombre"] ?></td>
                            <td><?php echo $registro["fecha_atencion"] ?></td>
                        </tr>
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