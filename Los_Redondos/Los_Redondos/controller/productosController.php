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
                title: "¡El producto ya se encuentra registrado!",
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
                    window.location.href = "../views/dashboard/production/productos.php";
                }
            });
        }

        function agregarT() {
            swal.fire({
                title: "¡Producto registrado exitosamente!",
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
                    window.location.href = "../views/dashboard/production/productos.php";
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
                    window.location.href = "../views/dashboard/production/productos.php";
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
                    window.location.href = "../views/dashboard/production/productos.php";
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
                    window.location.href = "../views/dashboard/production/productos.php?idP=listP";
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
                    window.location.href = "../views/dashboard/production/productos.php?idP=listP";
                }
            });
        }
    </script>
</head>

<body>
    <?php
    if (isset($_GET['idP'])) {
        $idP = $_GET['idP'];
        //var_dump($idP);
        switch ($idP) {
            case 'listP':
                $listaProductos = listarProductos();
                break;
            case 'addP':
                agregarProductos();
                break;
            case 'editP':
                editarProductos();
                break;
            case 'deleteP':
                eliminarProductos();
                break;
            default:
                echo "Sin acciones";
                break;
        }
    }

    //Listar usuarios
    function listarProductos()
    {
        include("../../../../model/conexion.php");
        $consulta = $conexion->query("select * from platos");
        $listaProductos = $consulta->fetch_all(MYSQLI_ASSOC);
        return $listaProductos;
    }

    //function listarUsuario($emailU){
    //  include("../../../../model/conexion.php");
    //  $consulta = $conexion->query("select * from usuarios where email = '$emailU'");
    //  $usuario = $consulta->fetch_assoc();
    //  return $usuario;
    //}

    function agregarProductos()
    {
        include("../model/conexion.php");
        // $id = $_POST['identificador'];
        $nombre = $_POST['nombre'];
        $ingredientes = $_POST['ingredientes'];
        $precio = $_POST['precio'];
        $disponible = $_POST['disponible'];
        $check = getimagesize($_FILES["image"]["tmp_name"]);

        //Consultamos en la BD si el identificador ya está registrado
        $consulta = $conexion->query("select * from platos where nombre = '$nombre'");
        // var_dump($consulta);


        //Si la consulta arroja un resultado mayor a cero, es que el producto ya existe, entonces no se puede registrar
        if ($consulta->num_rows > 0) {
            echo "<script>
                    agregarF();
                </script>";
        } else {
            //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $conexion->query("insert into platos(nombre, ingredientes, precio, disponible, imagen) values('$nombre','$ingredientes', '$precio','$disponible', '$imgContent')");
            echo "<script>
                    agregarT();
                </script>";
        }
    }
    function editarProductos()
    {
        include("../model/conexion.php");
        $id = $_POST['identificador'];
        $nombre = $_POST['nombre'];
        $ingredientes = $_POST['ingredientes'];
        $precio = $_POST['precio'];
        $disponible = $_POST['disponible'];
        $image = $_FILES['image']['tmp_name'];

        if ( $image == null or $image == 0) {
            $conexion->query("update platos set nombre = '$nombre', ingredientes = '$ingredientes', precio = '$precio', disponible = '$disponible' where identificador = '$id'");
            if ($conexion) {
                echo "<script>
                        editarT();;
                    </script>";
            }
            exit() ;
        } else {
            $imgContent = addslashes(file_get_contents($image));
            $conexion->query("update platos set nombre = '$nombre', ingredientes = '$ingredientes', precio = '$precio', disponible = '$disponible', imagen = '$imgContent' where identificador = '$id'");
            if ($conexion) {
                echo "<script>
                        editarT();;
                    </script>";
            } else {
                echo "<script>
                        editarF();
                    </script>";
            }
        }
              
    }
    function eliminarProductos()
    {
        include("../model/conexion.php");
        $id = $_GET['deleteP'];
        $conexion->query("delete from platos where identificador = '$id'");
        if ($conexion) {
            echo "<script>
                eliminarT();
            </script>";
        } else {
            echo "<script>
                eliminarF()';
            </script>";
        }
    }
    ?>
</body>

</html>