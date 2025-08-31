<?php
function obtenerProductosEnCarrito()
{
    include('../../model/conexion.php');
    $idSesion = $_SESSION['sesion'] ;
    $sentencia = $conexion->query("SELECT platos.identificador, platos.nombre, platos.ingredientes, platos.precio, carrito_usuarios.cantidad, carrito_usuarios.id_empleado, carrito_usuarios.id_producto, platos.imagen
    FROM platos
    INNER JOIN carrito_usuarios
    ON platos.identificador = carrito_usuarios.id_producto
    WHERE carrito_usuarios.id_session = $idSesion");

    return $sentencia->fetch_all(MYSQLI_ASSOC);
}
function quitarProductoDelCarrito()
{
    include '../../model/conexion.php';
    $idSesion = $_SESSION['sesion'] ;
    $identificador =$_POST['id_producto'];
    $conexion->query("delete from carrito_usuarios  where id_producto = '$identificador' and id_session = '$idSesion'");
}
function obtenerProductos()
{
    include('../model/conexion.php');
    $sentencia = $conexion->query("SELECT identificador, nombre, ingredientes, precio FROM platos");
    return $sentencia->fetch_all(MYSQLI_ASSOC);
}
function agregarProductoAlCarrito($identificador)
{
    include('../../model/conexion.php');
    $empleado = $_POST['empleado'];
    $id_producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $idSesion = $_SESSION['sesion'] ;
    $valor = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $resultado = mysqli_fetch_array($valor) ;
    $Cantidad2 = 0 ;
    if ($resultado != null) {
        $Cantidad2 = intval($resultado['cantidad']) ;
    }
    $totalCati = $cantidad + $Cantidad2 ;
    $conexion->query("DELETE FROM carrito_usuarios where id_session ='$idSesion' and id_producto = '$id_producto'");
    $conexion->query("INSERT INTO carrito_usuarios(id_session, id_producto, cantidad, id_empleado) values('$idSesion','$id_producto','$totalCati','$empleado')");
    return ([$idSesion, $id_producto]);
}
function agregarCantidadAlCarrito()
{
    include('../../model/conexion.php');
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $idSesion = $_SESSION['sesion'] ;

    $emp = $conexion->query("SELECT id_empleado FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $emple = mysqli_fetch_array($emp) ;
    $empleado =intval($emple['id_empleado']) ;

    $valor = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $resultado = mysqli_fetch_array($valor) ;
    $totalCati =intval($cantidad) + intval($resultado['cantidad']) ;
    
    $conexion->query("DELETE FROM carrito_usuarios where id_session ='$idSesion' and id_producto = '$id_producto'");
    $conexion->query("INSERT INTO carrito_usuarios(id_session, id_producto, cantidad, id_empleado) values('$idSesion','$id_producto','$totalCati','$empleado')");
    return ([$idSesion, $id_producto]);
    
}function eliminarCantidadAlCarrito()
{
    include('../../model/conexion.php');
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $idSesion = $_SESSION['sesion'] ;
    
    $emp = $conexion->query("SELECT id_empleado FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $empleado = 0 ;
    if ($emp != null) {
        $emple = mysqli_fetch_array($emp) ;
        $empleado =intval($emple['id_empleado']) ;
    }
    

    $valor = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $resultado = mysqli_fetch_array($valor) ;
    $cantidad2 = intval($resultado['cantidad']) ;

    if ($cantidad2 > $cantidad) {
        $totalCati = $cantidad2 - $cantidad ;
        $conexion->query("DELETE FROM carrito_usuarios where id_session ='$idSesion' and id_producto = '$id_producto'");
        $conexion->query("INSERT INTO carrito_usuarios(id_session, id_producto, cantidad, id_empleado) values('$idSesion','$id_producto','$totalCati','$empleado')");
    }elseif ($cantidad == $cantidad2) {
        $conexion->query("DELETE FROM carrito_usuarios where id_session ='$idSesion' and id_producto = '$id_producto'");
    }else {
        include "./script2.php" ;
        echo "<script> 
            CantidadR(); 
        </script>";
        exit();
    }
    return ([$idSesion, $id_producto]);
}