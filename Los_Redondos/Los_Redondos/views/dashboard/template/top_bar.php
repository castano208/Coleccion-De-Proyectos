<?php
if (!isset($_SESSION['email'])) {
    echo "<script>
        alert('¡Para acceder a esta información debes iniciar sesión!')
        window.location='../../login.php';                
        </script>";
} else {
    if ((time() - $_SESSION['tiempo']) > 300) {
        session_destroy();
        echo "<script>
        alert('¡Se ha cerrado su sesión por inactividad. Vuelva a iniciar de nuevo!')
        window.location='../../login.php';                
        </script>";
    }
}
?>
<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="images/img.jpg" alt=""><?php #$nombre = $_SESSION['nombre']; echo "$nombre";?> -->
                    <?php
                include('../../../model/conexion.php');
                $query = "SELECT * FROM imagen";
                $resultado = $conexion->query($query);
                while($row = $resultado->fetch_assoc()){
                ?> 
              
                <img height="50px" class="rounded-circle p-1" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>"><?php $nombre = $_SESSION['nombre']; echo "$nombre"; ?>
                <?php
                }
                ?>
                  </a>

                  <?php include('../../../model/conexion.php');
        $consulta = $conexion->query("select * from clientes");
        $listaClientes = $consulta->fetch_all(MYSQLI_ASSOC);
        #$correo= $_SESSION['email'];

        foreach ($listaClientes as $registro) { ?>
        <!-- Validamos el usuario que está en sesión para evitar ponerlo en la lista. -->
        <?php #if ($registro['email'] == $_SESSION['email']) { ?>

        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <div class="dropdown-divider"></div>
        <?php #if ($registro["email"]==$correo) { ?>
        <a class="dropdown-item" href="../production/perfil.php">
        <!-- <a class="dropdown-item" href="../dashboard/perfilUsuario.php?emailU=<?php #echo $registro['email']; ?>"> -->
            <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>Perfil
        </a><?php #} ?>    
        <a class="dropdown-item" href="../../index.php">
            <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Página principal
        </a>
        <a class="dropdown-item" href="../../../controller/clientesController.php?idC=logOut">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar sesión
        </a>
        <?php include('modalesClientes2.php'); ?>
        <?php }#} ?>
                </li>

              </ul>
            </nav>
          </div>
        </div>