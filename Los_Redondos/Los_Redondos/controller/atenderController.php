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
                title: "¡La atención ya se encuentra registrada!",
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
                    window.location.href = "../views/dashboard/production/atender.php";
                }
            });
        }

        function agregarT() {
            swal.fire({
                title: "¡Atención registrada exitosamente!",
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
                    window.location.href = "../views/dashboard/production/atender.php";
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
                    window.location.href = "../views/dashboard/production/atender.php";
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
                    window.location.href = "../views/dashboard/production/atender.php";
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
                    window.location.href = "../views/dashboard/production/atender.php?idA=listA";
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
                    window.location.href = "../views/dashboard/production/atender.php?idA=listA";
                }
            });
        }
    </script>
</head>

<body>
    <?php
    if (isset($_GET['idA'])) {
        $idA = $_GET['idA'];
        //var_dump($idV);
        switch ($idA) {
            case 'listA':
                $listaAtender = listarAtender();
                break;
            case 'addA':
                agregarAtender();
                break;
            case 'editA':
                editarAtender();
                break;
            case 'deleteA':
                eliminarAtender();
                break;
            default:
                echo "Sin acciones";
                break;
        }
    }

    //Listar usuarios
    function listarAtender()
    {
        include("../../../../model/conexion.php");
        $consulta = $conexion->query("select * from atender");
        $listaAtender = $consulta->fetch_all(MYSQLI_ASSOC);
        return $listaAtender;
    }

    function agregarAtender()
    {
        include("../model/conexion.php");
        $id_atender = $_POST['id_atender'];
        $id_empleados = $_POST['nombre_completo'];
        $id_clientes = $_POST['nombre'];
        $fecha = $_POST['fecha_atencion'];

        //Consultamos en la BD si el identificador ya está registrado
        $consulta = $conexion->query("select * from atender where id_atender = '$id_atender'");
        // var_dump($consulta);


        //Si la consulta arroja un resultado mayor a cero, es que el producto ya existe, entonces no se puede registrar
        if ($consulta->num_rows > 0) {
            echo "<script>
                agregarF();
            </script>";
        } else {
            //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
            $conexion->query("insert into atender(id_atender, identificador_empleados, identificador_clientes, fecha_atencion) values('$id_atender','$id_empleados','$id_clientes','$fecha')");
            echo "<script>
                agregarT();
            </script>";
        }
    }
    function editarAtender()
    {
        include("../model/conexion.php");
        $id_atender = $_POST['id_atender'];
        $id_empleados = $_POST['nombre_completo'];
        $id_clientes = $_POST['nombre'];
        $fecha = $_POST['fecha_atencion'];

        $conexion->query("update atender set identificador_empleados = '$id_empleados', identificador_clientes = '$id_clientes', fecha_atencion = '$fecha' where id_atender = '$id_atender'");
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
    function eliminarAtender()
    {
        include("../model/conexion.php");
        $id_atender = $_GET['deleteA'];
        $conexion->query("delete from atender where id_atender = '$id_atender'");
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