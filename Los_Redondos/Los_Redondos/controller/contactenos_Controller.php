<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/sweetalert.js"></script>
    <style>
        .sweet-warning{
            background-color: #f5365c;
        }
        .sweet-warning:not([disabled]):hover{
            background-color: #a71c1c;
        }
    </style>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script>
    function agregarF(){
        swal.fire({ title: "¡La petición ya se encuentra registrada!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/contactenos.php";
        }
        });
    }
    function agregarT(){
        swal.fire({ title: "¡Petición registrada exitosamente!",
         icon: "success",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/contactenos.php";
        }
        });
    }
    function agregarFpagina(){
        swal.fire({ title: "¡La petición ya se encuentra registrada!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/contact.php";
        }
        });
    }
    function agregarTpagina(){
        swal.fire({ title: "¡Petición registrada exitosamente!",
         icon: "success",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/contact.php";
        }
        });
    }
    function editarF(){
        swal.fire({ title: "¡Error al modificar los datos, verifique e intente nuevamenta!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/contactenos.php";
        }
        });
    }
    function editarT(){
        swal.fire({ title: "¡Datos modificados exitosamente!",
         icon: "success",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/contactenos.php";
        }
        });
    }
    function eliminarF(){
        swal.fire({ title: "¡Error al eliminar los datos, verifique e intente nuevamente!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/contactenos.php";
        }
        });
    }
    function eliminarT(){
        swal.fire({ title: "¡Datos eliminados exitosamente!",
         icon: "success",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/contactenos.php";
        }
        });
    }
</script>
</head>
<body>
<?php
if(isset($_GET['requestCo'])){   //verifica que no está vacia la variable, que llega con informacion
    $requestCo = $_GET['requestCo']; //almacena el dato
    //var_dump($request);
    //analizamos el dato
    switch ($requestCo) {
        case 'listCo':
            $listaContactenos = listarContactenos() ;
            break;
        case 'addCo':
            agregarContactenos() ;
            break;
        case 'addCoP':
            agregarContactenosPagina() ;
            break;
        case 'editCo':
            editarContactenos() ;
            break;
        case 'deleteCo':
            eliminarContactenos() ;
            break;
        default:
            echo "Sin acciones";
            break;
    }
}

//Listar usuarios
function listarContactenos()
{
    include("../../../model/conexion.php");
    $consulta = $conexion->query("select * from contactenos");
    $listaContactenos = $consulta->fetch_all(MYSQLI_ASSOC);
    return $listaContactenos;
}

function agregarContactenos()
{
    include("../model/conexion.php");
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    //Consultamos en la BD si el email ya está registrado
    $consulta = $conexion->query("select * from contactenos where email = '$email'");

    if ($consulta->num_rows > 0) {
        echo "<script>
                agregarF();
            </script>";
    } else {
        $conexion->query("insert into contactenos(nombre, email, asunto, mensaje) values('$nombre','$email','$asunto','$mensaje')");
        echo "<script>
                agregarT();
            </script>";
    }
}
function agregarContactenosPagina()
{
    include("../model/conexion.php");
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    //Consultamos en la BD si el email ya está registrado
    $consulta = $conexion->query("select * from contactenos where email = '$email'");

    if ($consulta->num_rows > 0) {
        echo "<script>
                agregarFpagina();
            </script>";
    } else {
        $conexion->query("insert into contactenos(nombre, email, asunto, mensaje) values('$nombre','$email','$asunto','$mensaje')");
        echo "<script>
                agregarTpagina();
            </script>";
    }
}
function editarContactenos(){
    include("../model/conexion.php");
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $conexion->query("update contactenos set nombre = '$nombre', asunto = '$asunto', mensaje = '$mensaje' where email = '$email'");
    // var_dump($conexion);

    if ($conexion) {
        echo "<script>
                editarT();
            </script>";
    }else {
        echo "<script>
                editarF();
            </script>";
    }
}
function eliminarContactenos()
{
    include("../model/conexion.php");
    $email = $_GET['deleteCo'];
    $conexion->query("delete from contactenos where email = '$email'");
    if ($conexion) {
        echo "<script>
                eliminarT();
            </script>";
    }else {
        echo "<script>
                eliminarF();
            </script>";
    }
}
?>
</body>
</html>