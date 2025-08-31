<?php 
    include('../../model/conexion.php');
    include_once "../estatico/funcionescarrito.php";

    session_start() ;

    $producto=$_POST['pro'];

    error_reporting(0) ;
    $idSesion = $_SESSION['sesion'] ;
    

    if ($idSesion != null or $idSesion != 0) {
        if ($producto == 0 or $producto == null) {
            exit("");
        }
        $nombre = $conexion->query("SELECT ingredientes FROM platos WHERE identificador ='$producto'");
        $resultado = mysqli_fetch_array($nombre) ;
        echo $resultado['ingredientes'] ;
    }
?> 