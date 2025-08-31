<?php
    include("../../model/conexion.php") ;
    session_start() ;

    $idSesion = $_SESSION['sesion'] ;

    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    include "./script2.php" ;
    echo ".";

    $valor = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $resultado = mysqli_fetch_array($valor) ;
    $cantidad3 = intval($resultado['cantidad']) ;
    
    require "./funcionescarrito.php";

    if ($cantidad <= 0 or $cantidad = null or $cantidad3 < $cantidad ) {
        var_dump($cantidad) ;
            echo "<script> 
                FaltaD(); 
            </script>";
        exit();
    }
    eliminarCantidadAlCarrito();
        echo "<script> 
             ExitosCE(); 
        </script>";
        exit();
?>