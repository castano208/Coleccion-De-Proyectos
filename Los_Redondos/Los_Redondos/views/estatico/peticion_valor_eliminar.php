<?php 
include('../../model/conexion.php');
include_once "../estatico/funcionescarrito.php";
session_start() ;

$platos = obtenerProductosEnCarrito() ;

$producto = $_POST['pro'];
$cantidad = $_POST['can'];
$idSesion = $_SESSION['sesion'] ;



$valor = $conexion->query("SELECT precio FROM platos WHERE identificador ='$producto'");
$resultado = mysqli_fetch_array($valor) ;
$tot = intval($resultado['precio']) ;

$can = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$producto' ");
$canti = mysqli_fetch_array($can) ;
$cantidad2 = intval($canti['cantidad']) ;

$total = 0 ;
foreach ($platos as $platos) {
    $total += $platos['precio'] * $platos['cantidad'] ;
}
if ($cantidad == null or $cantidad == 0) {
    exit("No hay cantidad.");
}elseif ($cantidad < 0) {
    exit("No indique valores negativos.");
}elseif ($cantidad2 < $cantidad) {
    exit("No indique un valor mayor al que se encuentra en el carrito actualmente.");
}
$to = $cantidad * $tot ;

$totacarrrito= number_format($total - $to, 2) ;
echo "$".$totacarrrito." Pesos" ; ?> <br> <?php  
if ($cantidad2 == $cantidad) {
    ?>  <br> <?php exit("La cantidad indicada nos precisa que desea eliminar el producto en su totalidad del carrito.");
}
?>