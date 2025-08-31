<?php 
include('../../model/conexion.php');

session_start() ;

$producto = $_POST['pro'];
$cantidad = $_POST['can'];
$empleado = $_POST['emp'];

$can = $conexion->query("SELECT disponible FROM platos WHERE identificador ='$producto'");
$cant = mysqli_fetch_array($can) ;
$canti = intval($cant['disponible']);

error_reporting(0) ;
$idSesion = $_SESSION['sesion'] ;

if ($idSesion != null or $idSesion != 0) {
        
    $emp = $conexion->query("SELECT id_empleado FROM carrito_usuarios WHERE id_session ='$idSesion'");
    $emple = mysqli_fetch_array($emp) ;
    $empleado2 = $empleado ;
    if ($emple != null ) {
        $empleado2 =intval($emple['id_empleado']) ;
    }
    if($cantidad == null or $cantidad == 0) {
        if (($producto =="Productos" or $producto == 0) and ($empleado == 0 or $empleado == null))  {
            exit("No hay cantidad, ni producto y no ha seleccionado ninguna persona por la cual fue atendido.");
        }elseif ($empleado != $empleado2) {
            exit("Debes seleccionar el empleado que la atendió por primera vez y falta la cantidad.");
        }elseif (($producto =="Productos" or $producto == 0))  {
            exit("No hay cantidad ni producto.");
        }elseif (($empleado == 0 or $empleado == null)) {
            exit("No hay cantidad y no hay empleado.");
        }elseif ($producto > 0) {    
            exit("No hay cantidad.");
        }
        else {
        }
    }elseif ($cantidad < 0 ) {
        if (($producto =="Productos" or $producto == 0) and ($empleado == 0 or $empleado == null)) {
            exit("No indique valores negativos, no hay productos seleccionados y no ha seleccionado ninguna persona por la cual fue atendido.");
        }elseif ($empleado != $empleado2) {
            exit("Debe seleccionar el empleado que la atendió por primera vez y no indique valores negativos.");
        } elseif (($producto =="Productos" or $producto == 0) ) {
            exit("No indique valores negativos y no hay productos seleccionados.");
        }elseif (($cantidad < 0 and $producto > 0) and ($empleado == 0 or $empleado == null)) {
            exit("No indique valores negativos y no ha seleccionado ninguna persona por la cual fue atendido.");
        }elseif ($producto > 0) {
            exit("No indique valores negativos.");
        }else {
            # code...
        }
    }elseif ($cantidad > $canti) {
        exit("No indique un valor mayor al disponible del producto.");
    }elseif (($cantidad > 0) and ($empleado == 0 or $empleado == null) and ($producto =="Productos" or $producto == 0))  {
        exit("No ha seleccionado ninguna persona por la cual fue atendido y no hay producto seleccionado.");
    }elseif (($empleado != $empleado2 and $cantidad > 0) and ($producto =="Productos" or $producto == 0) and ($cantidad > 0) ) {
        exit("Debe seleccionar el empleado que la atendió por primera vez y no hay producto seleccionado.");
    }elseif (($cantidad > 0) and ($empleado == 0 or $empleado == null))  {
        exit("No hay empleado.");
    }elseif ($empleado != $empleado2) {
        exit("Debe seleccionar el empleado que la atendió por primera vez.");
    }elseif (($cantidad > 0) and ($producto =="Productos" or $producto == 0)) {
        exit("No hay producto.");
    }else {
    }
?>
<button class=" px-2 py-8 btn-sm" style="background-color: #E78618 ; color: #FFFFFF ; border-color: #FFFFFF ; " id="Enviar2"><i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito</button> <br> <br>
<?php 
}
?>