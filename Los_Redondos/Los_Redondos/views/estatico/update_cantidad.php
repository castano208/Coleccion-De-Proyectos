<?php
    session_start() ;
    $idSesion = $_SESSION['sesion'] ;
    include "../../model/conexion.php";
    include "./script2.php" ;
    echo ".";

    $id_producto = $_POST['id_producto'];

    $val = $conexion->query(" SELECT disponible FROM platos WHERE identificador = '$id_producto' ");
    $restu = mysqli_fetch_array($val) ;
    $totil = intval($restu['disponible']) ;
    if ($totil != 0) {
        if ($restu != null or $restu != 0) {
            $conexion->query("UPDATE carrito_usuarios set cantidad = '$totil' WHERE id_producto = '$id_producto' and id_session ='$idSesion'");
            echo "<script> 
                    NuevaCant(); 
                </script>";
            exit();
        }
    }else {
        $conexion->query("DELETE From carrito_usuarios WHERE id_producto = '$id_producto' and id_session ='$idSesion'");
        echo "<script> 
                UpdateEliCant(); 
            </script>";
        exit();
    }
    
?>