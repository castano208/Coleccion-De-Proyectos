<?php 
include('../../model/conexion.php');

    session_start() ;
    $producto = 0 ;

    error_reporting(0) ;
    $idSesion = $_SESSION['sesion'] ;
    if ($idSesion != null or $idSesion != 0) {
        if ($_POST['pro'] != null or $_POST['pro'] != 0) {
            $producto  = $_POST['pro']; 
        }
        $platos = $conexion->query("SELECT imagen FROM platos WHERE identificador = '$producto'");
        $listaP = mysqli_fetch_array($platos);
    
        if ($producto == 0 ) {
            exit ;
        }if ($listaP !=  0 or $listaP !=  null) {?>
            <img style="max-width: 200px;" src="data:image/jpeg;base64, <?php echo  base64_encode($listaP['imagen']) ;?>"> <?php 
        }
        else {
            
            }

    }elseif ($idSesion == null or $idSesion == 0) { ?>
        <a href="./login.php" class=" px-2 py-8 btn-sm" style="background-color: #E78618 ; color: #FFFFFF ;">Iniciar sesión</a><br><br>
    <?php    exit("No hay una sesión activa."); }
    ?>  <br> <?php
    ?> 