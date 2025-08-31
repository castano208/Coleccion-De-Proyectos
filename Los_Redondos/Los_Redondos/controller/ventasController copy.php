<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/sweetalert.js"></script>
    <style>
        .sweet-warning {
            background-color: #f5365c;
        }

        .sweet-warning:not([disabled]):hover {
            background-color: #a71c1c;
        }
    </style>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script>
        function agregarF() {
            swal.fire({
                title: "¡La venta ya se encuentra registrada!",
                icon: "error",
                buttons: {
                    confirm: {
                        text: 'OK',
                        className: 'sweet-warning'
                    },
                },

                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/ventas copy 2.php";
                }
            });
        }

        function agregarT() {
            swal.fire({
                title: "¡Venta registrada exitosamente!",
                icon: "success",
                buttons: {
                    confirm: {
                        text: 'OK',
                        className: 'sweet-warning'
                    },
                },

                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/ventas copy 2.php";
                }
            });
        }

        function editarF() {
            swal.fire({
                title: "¡Error al modificar los datos, verifique e intente nuevamenta!",
                icon: "error",
                buttons: {
                    confirm: {
                        text: 'OK',
                        className: 'sweet-warning'
                    },
                },

                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/ventas copy 2.php";
                }
            });
        }

        function editarT() {
            swal.fire({
                title: "¡Datos modificados exitosamente!",
                icon: "success",
                buttons: {
                    confirm: {
                        text: 'OK',
                        className: 'sweet-warning'
                    },
                },

                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/ventas copy 2.php";
                }
            });
        }

        function eliminarF() {
            swal.fire({
                title: "¡Error al eliminar los datos, verifique e intente nuevamente!",
                icon: "error",
                buttons: {
                    confirm: {
                        text: 'OK',
                        className: 'sweet-warning'
                    },
                },

                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/ventas copy 2.php?idV=listV";
                }
            });
        }

        function eliminarT() {
            swal.fire({
                title: "¡Datos eliminados exitosamente!",
                icon: "success",
                buttons: {
                    confirm: {
                        text: 'OK',
                        className: 'sweet-warning'
                    },
                },

                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/ventas copy 2.php?idV=listV";
                }
            });
        }
    </script>
</head>

<body>
    <?php
    if (isset($_GET['idV'])) {
        $idV = $_GET['idV'];
        //var_dump($idV);
        switch ($idV) {
            case 'listV':
                $listaVentas = listarVentas();
                break;
            case 'addV':
                agregarVentas();
                break;
            case 'editV':
                editarVentas();
                break;
            case 'deleteV':
                eliminarVentas();
                break;
            default:
                echo "Sin acciones";
                break;
        }
    }

    //Listar usuarios
    function listarVentas()
    {
        include("../../../model/conexion.php");
        $consulta = $conexion->query("select * from empleados");
        $listaVentas = $consulta->fetch_all(MYSQLI_ASSOC);
        return $listaVentas;
    }

    function agregarVentas()
    {
        include("../model/conexion.php");
        $nombres = $_POST['nombre_completo'];
        $email = $_POST['email'];
        $clave = $_POST['password'];
        $documento = $_POST['documento'];
        $tipo_documento = $_POST['tipo_documento'];

        $consulta = $conexion->query("select * from empleados where email = '$email'");

        if ($consulta->num_rows > 0) {
            echo "<script>
                    agregarF();
                </script>";
        } else {
            //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
            $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
            $conexion->query("insert into empleados(nombre_completo, email, password, clave, documento, id_documento) values('$nombres','$email','$clave_encriptada','$clave','$documento', '$tipo_documento')");
            echo "<script>
                agregarT();
                </script>"; 
        }
    }
    function editarVentas()
    {
        include("../model/conexion.php");
        $nombres = $_POST['nombres'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $documento = $_POST['documento'];

        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);

        //Consultamos en la BD hay algún registro igual
        $conexion->query("update empleados set nombre_completo = '$nombres', password = '$clave_encriptada', clave = '$clave', documento = '$documento' where email = '$email'");
        // var_dump($conexion);

        if ($conexion) {
            echo "<script>
                    editarT();
                </script>";
        } else {
            echo "<script>
                    editarF();
                </script>";
        }
    }
    function eliminarVentas()
    {
        include("../model/conexion.php");
        $ID = $_GET['deleteV'];
        $conexion->query("delete from empleados where ID = '$ID'");
        if ($conexion) {
            echo "<script>
                eliminarT();
            </script>";
        } else {
            echo "<script>
                eliminarF();
            </script>";
        }
    }
    ?>
</body>

</html>