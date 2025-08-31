  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="panel.php" class="site_title"><i class="fa fa-home"></i> <span>Los Redondos!</span></a>
            </div>

            <!-- <div class="clearfix"></div> -->
            <div class="row">
              <div class="col-sm-4 profile_pic">
                <!-- <img src="images/img.jpg" alt="..." class="img-circle profile_img"> -->
                <?php
                include('../../../model/conexion.php');

                $sesion = $_SESSION['sesion'];

                $Cliente = $conexion->query("SELECT email FROM clientes WHERE identificador = '$sesion' ");
                $CorreoC  = mysqli_fetch_array($Cliente) ;
                $CorreoCliente = $CorreoC ['email'] ;
                $Empleado = $conexion->query("SELECT email FROM empleados WHERE email = '$CorreoCliente' ");
                $CorreoM = mysqli_fetch_array($Empleado);
                if ($CorreoM != null) {
                  $CorreoEmpleado = $CorreoM ['email'] ;

                  $rest = $conexion->query("SELECT id_cargo FROM empleados WHERE email  ='$CorreoEmpleado' ");
                  $car = mysqli_fetch_array($rest) ;
                  $cargo =intval($car['id_cargo']) ;

                }
                
                $query = "SELECT * FROM imagen";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()) {
                ?>
                  <img height="50px" width="50px" class="ml-2 mt-4 rounded-circle p-1" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>">
                <?php 
                }
                ?>
              </div>
              <div class="col-sm-8 profile_info">
                <span>Bienvenid@,</span>
                <h2> <?php $nombre = $_SESSION['nombre'];
                      echo "$nombre"; ?> </h2>
              </div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>

            <!-- Nav Item - Dashboard -->
            <?php if ($CorreoM != null) { ?>
            
            <!-- Divider -->

            
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Servicios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="clientes.php">Clientes</a></li>
                      <li><a href="empleados.php">Empleados</a></li>
                      <li><a href="productos.php">Productos</a></li>
                      <li><a href="ventas.php">Ventas</a></li>
                      <?php if ($cargo == 1) {?>
                          <li><a href="contactenos.php">Contáctenos</a></li>
                          <li><a href="tipo_documento.php">Tipo de documento</a></li>
                          
                      <?php }
                        ?>
                      <li><a href="carrito_clientes.php">Carrito Usuarios</a></li>
                      <li><a href="atender.php">Atender</a></li>
                      <li><a href="registrar.php">Registrar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <?php } ?>


            <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
  <a href="../production/perfil.php" data-toggle="tooltip" data-placement="top" title="Configuración">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a href="../../menu.php" data-toggle="tooltip" data-placement="top" title="Menú">
    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
  </a>
  <a href="../../contact.php" data-toggle="tooltip" data-placement="top" title="Contáctenos">
    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
  </a>
  <a href= "../../login.php" data-toggle="tooltip" data-placement="top" title="Salir">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
