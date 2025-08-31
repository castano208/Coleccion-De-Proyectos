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
                    <h2>Ventas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("Select * from ventas");
                        $listaVentas = $consulta->fetch_all(MYSQLI_ASSOC);
                        foreach ($listaVentas as $registro) { ?>
                        <tr>
                          <td><?php echo $registro["identificador"] ?></td>
                          <td><?php echo $registro["producto"] ?></td>
                          <td><?php echo $registro["cantidad"] ?></td>
                          <td><?php echo $registro["fecha"] ?></td>
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