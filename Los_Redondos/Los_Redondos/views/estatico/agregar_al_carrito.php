<?php
    session_start() ;

    include "./script.php" ;
    include('../../model/conexion.php');

    $id_producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $empleado = $_POST['empleado'];
    
    error_reporting(0) ;
    $idSesion = $_SESSION['sesion'] ;

    $ca = $conexion->query("SELECT disponible FROM platos WHERE identificador ='$id_producto'");
    $car = mysqli_fetch_array($ca) ;
    $canti =intval($car['disponible'])  ;

    $val = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$id_producto' ");
    $restu = mysqli_fetch_array($val) ;
    $totil = intval($restu['cantidad']) ;

    if ($idSesion != null or $idSesion != 0) {
        if ($cantidad <= $canti) {
            if ($totil <= $canti ) {
                $emp = $conexion->query("SELECT id_empleado FROM carrito_usuarios WHERE id_session ='$idSesion'");
                $emple = mysqli_fetch_array($emp) ;
                $empleado2 = $empleado ;
                echo "." ;
                if ($emple != null) {
                    $empleado2 =intval($emple['id_empleado']) ;
                }
                
                if ($id_producto == 0 or $id_producto == null or ($cantidad == 0 or  $cantidad == null) or ($empleado == 0 or $empleado == null)) {
                    echo "<script> 
                            FaltaA(); 
                        </script>";
                    exit();
                }
                if ($empleado != $empleado2) {
                    echo "<script> 
                            ErrorE();
                        </script>";
                    exit();
                }
                require "./funcionescarrito.php";
                agregarProductoAlCarrito($_POST["id_producto"]);
                echo "<script> 
                        ExitosoA(); 
                    </script>";
            }else {
                echo "<script> 
                        ErrorRN();
                    </script>";
                exit();
            }
        }elseif ($cantidad >= $canti) {
            echo "<script> 
            ErrorRN();
            </script>";
            exit();
        }
    }elseif ($idSesion == null or $idSesion == 0) {
        echo "." ;
        echo "<script> 
            InicioR(); 
        </script>";
        exit();
    }
    
?>