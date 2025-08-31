<?php 
    include('../../model/conexion.php');
    
    session_start() ;

    $producto=$_POST['pro'];
    $cantidad=$_POST['can'];
    $empleado=$_POST['emp'];

    $valor = $conexion->query("SELECT precio FROM platos WHERE identificador ='$producto'");
    $resultado = mysqli_fetch_array($valor) ;
    $tot =intval($resultado['precio']) ;
    if ($producto > 0) {
        if ($cantidad > 0) {
            $total= number_format($tot * $cantidad , 2) ;
            echo "$".$total." Pesos" ; ?> <br> <?php  
        } 
    }
    
?>