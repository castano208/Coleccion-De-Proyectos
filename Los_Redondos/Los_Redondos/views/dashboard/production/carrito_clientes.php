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
                    <h2>Carrito de compras cliente</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <div class="col-sm-6" style="padding-right: 10px;">
                        <a href="#agregarCarrito" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>	
                      </div>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Sesión</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Empleado</th>
                          <th>Acciones</th> 
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include('../../../model/conexion.php');
                        $consulta = $conexion->query("select * from carrito_usuarios");
                        $listaCarrito = $consulta->fetch_all(MYSQLI_ASSOC);
                        $session = $_SESSION['sesion'] ;

                        foreach ($listaCarrito as $registro) { 
                          if ($registro["id_session"] != $session) {
                            $id_nom = $registro["id_producto"] ;

                            $consultaNomPla = $conexion->query("select nombre from platos where identificador = '$id_nom';");
                            $consultaNombPla = mysqli_fetch_array($consultaNomPla);
                            $nombrePl = $consultaNombPla['nombre'] ;

                            $id_emp = $registro["id_empleado"] ;

                            $consultaNomEm = $conexion->query("select nombre_completo from empleados where ID = '$id_emp';");
                            $consultaNombEm = mysqli_fetch_array($consultaNomEm);
                            $nombreEm = $consultaNombEm['nombre_completo'] ;
                            
                            ?>
                            <tr>
                            <td><?php echo $registro["identificador"] ;?></td> 
                            <td><?php echo $registro["id_session"] ;?></td>
                            <td><?php echo $nombrePl ;?></td>
                            <td><?php echo $registro["cantidad"] ;?></td>
                            <td><?php echo $nombreEm ;?></td>
                            <td>
                              <a href="#editarCarrito<?php echo $registro['identificador']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                              <a href="#eliminarCarrito<?php echo $registro['identificador']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                          </tr>
                          <?php 
                          include('../template/modalesCarritoUsuarios.php'); ?>
                          <?php } 
                            }
                          ?>

                        
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