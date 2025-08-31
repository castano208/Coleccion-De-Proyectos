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

$va = $conexion->query("SELECT disponible FROM platos WHERE identificador = '$producto' ");
$res = mysqli_fetch_array($va) ;
$tota = intval($res['disponible']) ;
error_reporting(0) ;
$operacion =  $tota - $cantidad - $cantidad2;
$total = 0 ;
foreach ($platos as $platos) {
    $total += $platos['precio'] * $platos['cantidad'] ;
}

if ($cantidad == null or $cantidad == 0) { 
    ?> 
    <div><h6 class="mt-n1 mb-0">No hay cantidad.</h6></div><br><br><br><br>
    <div><h6 class="mt-n1 mb-0">Cantidad disponible del producto:</h6></div>
    <?php 
    if ($operacion >0) {    
    $to = $cantidad * $tot ;
    $totalcarrito= number_format($total + $to, 2) ;
    echo "$".$totalcarrito." Pesos" ; ?> <br><br>
        <div><h6 class="mt-n1 mb-0"><?php echo $operacion ; ?></h6></div> <?php 
    }else { ?>
        <div><h6 class="mt-n1 mb-0">0</h6></div> <?php 
    }
    exit ;
}elseif ($cantidad < 0) { ?> 
    <div><h6 class="mt-n1 mb-0">No indique valores negativos.</h6></div><br><br><br><br>
    <div><h6 class="mt-n1 mb-0">Cantidad disponible del producto:</h6></div>
    <?php 
    if ($operacion >0) { 
        $to = $cantidad * $tot ;
        $totalcarrito= number_format($total + $to, 2) ; 
        echo "$".$totalcarrito." Pesos" ; ?> <br><br>
        <div><h6 class="mt-n1 mb-0"><?php echo $operacion ; ?></h6></div> <?php 
    }else { ?>
        <div><h6 class="mt-n1 mb-0">0</h6></div> <?php 
    }
    exit ;
}elseif ($cantidad <= $tota) { 
    $to = $cantidad * $tot ;
    $totalcarrito= number_format($total + $to, 2) ;
    echo "$".$totalcarrito." Pesos" ; ?> <br><br>
    <div><h6 class="mt-n1 mb-0">No indique valores mayores a los disponibles.</h6></div><br><br><br><br>
    <div><h6 class="mt-n1 mb-0">Cantidad disponible del producto:</h6></div>
    <?php 
    if ($operacion >0) { ?>
        <div><h6 class="mt-n1 mb-0"><?php echo $operacion ; ?></h6></div> <?php 
    }else { ?>
        <div><h6 class="mt-n1 mb-0">0</h6></div> <?php 
    }
    exit ;
}

?> <br>
<br><div ><h6 class="mt-n1 mb-0">Cantidad disponible del producto:</h6></div> 
<?php 
    if ($operacion >0) { ?>
        <div><h6 class="mt-n1 mb-0"><?php echo $operacion ; ?></h6></div> <?php 
    }else { ?>
        <div><h6 class="mt-n1 mb-0">0</h6></div> <?php 
    }
    exit ;
?>