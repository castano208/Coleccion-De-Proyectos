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
                title: "¡El producto seleccionado ya se encuentra registrado!",
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
                    window.location.href = "../views/dashboard/production/carrito_clientes.php";
                }
            });
        }

        function agregarT() {
            swal.fire({
                title: "¡registro de carrito agregado exitosamente!",
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
                    window.location.href = "../views/dashboard/production/carrito_clientes.php";
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
                    window.location.href = "../views/dashboard/production/carrito_clientes.php";
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
                    window.location.href = "../views/dashboard/production/carrito_clientes.php";
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
                    window.location.href = "../views/dashboard/production/carrito_clientes.php?idE=listE";
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
                    window.location.href = "../views/dashboard/production/carrito_clientes.php?idE=listE";
                }
            });
        }
    </script>
</head>

<body>
    <?php
    if (isset($_GET['requestE'])) {   //verifica que no está vacia la variable, que llega con informacion
        $requestE = $_GET['requestE']; //almacena el dato
        //var_dump($request);
        //analizamos el dato
        switch ($requestE) {
            case 'listE':
                $listaCarrito = listarCarrito();
                break;
            case 'addE':
                agregarCarrito();
                break;
            case 'editE':
                editarCarrito();
                break;
            case 'deleteE':
                eliminarCarrito();
                break;
            default:
                echo "Sin acciones";
                break;
        }
    }

    //Listar usuarios
    function listarCarrito()
    {
        include("../../../../model/conexion.php");
        $consulta = $conexion->query("select * from carrito_usuarios");
        $listaCarritos = $consulta->fetch_all(MYSQLI_ASSOC);
        return $listaCarritos;
    }

    //function listarUsuario($emailU){
    //  include("../../../../model/conexion.php");
    //  $consulta = $conexion->query("select * from usuarios where email = '$emailU'");
    //  $usuario = $consulta->fetch_assoc();
    //  return $usuario;
    //}

    function agregarCarrito()
    {
        include("../model/conexion.php");
        $id_sessio = $_POST['id_sessio'];
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $id_empleados = $_POST['id_empleados'];

        //Consultamos en la BD si el email ya está registrado
        $consulta = $conexion->query("select * from carrito_usuarios where id_producto = '$id_producto'");

        //Si la consulta arroja un resultado mayor a cero, es que el usuario ya existe, entonces no se puede registrar
        if ($consulta->num_rows > 0) {
            echo "<script>
                    agregarF();
                </script>";
        } else {
            //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
            $conexion->query("insert into carrito_usuarios(id_session, id_producto, cantidad, id_empleado) values('$id_sessio','$id_producto','$cantidad','$id_empleados')");
            echo "<script>
                    agregarT();
                </script>";
        }
    }
    function editarCarrito()
    {
        include("../model/conexion.php");
        $id_sessio = $_POST['id_sessio'];
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $id_empleados = $_POST['id_empleados'];

        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
        $conexion->query("update carrito_usuarios set id_session = '$id_sessio', id_producto = '$id_producto', cantidad = '$cantidad', id_empleado = '$id_empleados' where id_producto = '$id_producto'");

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
    function eliminarCarrito()
    {
        include("../model/conexion.php");
        $id_producto = $_GET['deleteE'];
        $conexion->query("delete from carrito_usuarios where id_producto = '$id_producto'");
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