<?php
    session_start() ;
    $idSesion = $_SESSION['sesion'] ;
    include "./script2.php" ;
    echo ".";
    include "../../model/conexion.php" ;

    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    
    $va = $conexion->query("SELECT disponible FROM platos WHERE  identificador = '$id_producto' ");
    $res = mysqli_fetch_array($va) ;
    $tot = intval($res['disponible']) ;

    $re = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE  id_producto= '$id_producto' and id_session ='$idSesion'");
    $rree = mysqli_fetch_array($re) ;
    $tasda = intval($rree ['cantidad']) ;
    $tsaads = $tasda + $cantidad;
    require "./funcionescarrito.php";
    if ($cantidad <= 0 or $cantidad = null) {
            echo "<script> 
                FaltaD(); 
            </script>";
        exit();
    }if ($tot >= $tsaads) {
        agregarCantidadAlCarrito();
        echo "<script> 
            ExitosoC(); 
        </script>";
    }else {
       echo "<script> 
            EliminareRR(); 
        </script>";
        exit();
    }
?>