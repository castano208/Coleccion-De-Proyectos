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
        swal.fire({ title: "¡El tipo de documento ya se encuentra registrado!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/tipo_documento.php";
        }
        });
    }
    function agregarT(){
        swal.fire({ title: "¡Tipo de documento registrado exitosamente!",
         icon: "success",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../views/dashboard/production/tipo_documento.php";
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
         window.location.href = "../views/dashboard/production/tipo_documento.php";
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
         window.location.href = "../views/dashboard/production/tipo_documento.php";
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
         window.location.href = "../views/dashboard/production/tipo_documento.php?idTD=listTD";
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
         window.location.href = "../views/dashboard/production/tipo_documento.php?idTD=listTD";
        }
        });
    }
</script>
</head>
<body>
<?php
if(isset($_GET['idTD'])){
    $idV = $_GET['idTD'];
    //var_dump($idV);
    switch ($idV) {
        case 'listTD':
            $listaTD = listarTD() ;
            break;
        case 'addTD':
            agregarTD() ;
            break;
        case 'editTD':
            editarTD() ;
            break;
        case 'deleteTD':
            eliminarTD() ;
            break;
        default:
            echo "Sin acciones";
            break;
    }
}

//Listar usuarios
function listarTD()
{
    include("../../../../model/conexion.php");
    $consulta = $conexion->query("select * from tipo_documento");
    $listaTD = $consulta->fetch_all(MYSQLI_ASSOC);
    return $listaTD;
}

function agregarTD()
{
    include("../model/conexion.php");
    $tipo_documento = $_POST['tipo_documento'];

    //Consultamos en la BD si el identificador ya está registrado
    $consulta = $conexion->query("select * from tipo_documento where tipo_documento = '$tipo_documento'");
    // var_dump($consulta);


    //Si la consulta arroja un resultado mayor a cero, es que el producto ya existe, entonces no se puede registrar
    if ($consulta->num_rows > 0) {
        echo "<script>
                agregarF();
            </script>";
    } else {
        //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
        $conexion->query("insert into tipo_documento(tipo_documento) values('$tipo_documento')");
        echo "<script>
                agregarT();
            </script>";
    }
}
function editarTD(){
    include("../model/conexion.php");
    $id = $_POST['ID'];
    $tipo_documento = $_POST['tipo_documento'];

    $conexion->query("update tipo_documento set tipo_documento = '$tipo_documento' where ID = '$id'");
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
function eliminarTD()
{
    include("../model/conexion.php");
    $id = $_GET['deleteTD'];
    $conexion->query("delete from tipo_documento where ID = '$id'");
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