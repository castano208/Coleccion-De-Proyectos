<?php 
    include('../../model/conexion.php');
    include_once "../estatico/funcionescarrito.php";

    session_start() ;

    $producto=$_POST['pro'];
    $cantidad = $_POST['can'];

    error_reporting(0) ;
    $idSesion = $_SESSION['sesion'] ;
    $can = $conexion->query("SELECT disponible FROM platos WHERE identificador ='$producto'");
    $resultado = mysqli_fetch_array($can) ;

    if ($idSesion != null or $idSesion != 0) {

        if ($producto == 0 or $producto == null) {
            exit;
        }elseif ($cantidad == $resultado['disponible']) {
            exit("Usted desea comprar totalmente la cantidad disponible de este producto");
        }elseif ($cantidad < $resultado['disponible']) {
            ?><br><?php echo "Cantidad disponible del producto: ", $resultado['disponible'] ;
        }
    }
?> 