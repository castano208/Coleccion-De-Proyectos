<?php
include "../../model/conexion.php" ;
include "./funcionescarrito.php";
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start() ;
}
$productos = obtenerProductosEnCarrito();

$idSesion = $_SESSION['sesion'] ;
$totalcarrito = 0 ;

$emp = $conexion->query("SELECT id_empleado FROM carrito_usuarios WHERE id_session ='$idSesion'");
$emple = mysqli_fetch_array($emp) ;

$cantidadP = count($productos) ;
$empleado =intval($emple['id_empleado']) ;

include "./script2.php" ;

echo "." ;

foreach ($productos  as $productos ) {
    $totalcarrito += $productos['precio'] * $productos['cantidad'] ;


    $product = intval($productos['id_producto']) ;

    $nom = $conexion->query("SELECT identificador FROM platos WHERE identificador ='$product'");
    $nombr = mysqli_fetch_array($nom) ;
    $nombre = intval($nombr['identificador']);
    
    $cant = intval($productos['cantidad']) ;

    $val = $conexion->query(" SELECT disponible FROM platos WHERE identificador = '$product' ");
    $restu = mysqli_fetch_array($val) ;
    $totil = intval($restu['disponible']) ;

    $resta = $totil - $cant ;

    $conexion->query("UPDATE platos set disponible = '$resta' WHERE identificador = '$product'");

    $conexion->query("INSERT INTO ventas(producto, cantidad) values('$nombre','$cant')");

}


$conexion->query("INSERT INTO atender(identificador_empleados, identificador_clientes) values('$empleado','$idSesion')");

$conexion->query("DELETE FROM carrito_usuarios where id_session ='$idSesion'");

echo "<script> 
    ExitosT(); 
</script>";


?>