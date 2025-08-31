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
                title: "¡El cliente ya se encuentra registrado!",
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
                    window.location.href = "../views/dashboard/production/clientes.php";
                }
            });
        }

        function agregarT() {
            swal.fire({
                title: "¡Cliente registrado exitosamente!",
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
                    window.location.href = "../views/dashboard/production/clientes.php";
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
                    window.location.href = "../views/dashboard/production/clientes.php";
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
                    window.location.href = "../views/dashboard/production/clientes.php";
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
                    window.location.href = "../views/dashboard/production/clientes.php?idC=listC";
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
                    window.location.href = "../views/dashboard/production/clientes.php?idC=listC";
                }
            });
        }


        function logOutT() {
            swal.fire({
                title: "¡Su sesión ha sido cerrada con éxito!",
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
                    window.location.href = "../views/index.php";
                }
            });
        }

        function password_newt() {
            swal.fire({
                title: "¡Su contraseña ha sido cambiada con éxito!",
                icon: "success",
                buttons: {
                    confirm: {
                        text: 'Regresar',
                        className: 'sweet-warning'
                    },
                },
                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/perfil.php";
                }
            })
        }

        function password_newf() {
            swal.fire({
                title: "Error",
                text: "¡La contraseña que ingresó en el primer campo coincide, pero se ha presentado un error al ingresar su nueva contraseña, intente de nuevo!",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: 'Regresar',
                        className: 'sweet-warning'
                    },
                },
                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/perfil.php";
                }
            })
        }

        function verificarf() {
            swal.fire({
                title: "¡La contraseña ingresada en el primer campo no coincide con su contraseña actual, intente de nuevo!",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: 'Regresar',
                        className: 'sweet-warning'
                    },
                },
                type: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../views/dashboard/production/perfil.php";
                }
            })
        }

        function procesoGuardarT() {
            swal.fire({
                title: "¡Se ha modificado exitosamente tu foto de perfil!",
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
                    window.location.href = "../views/dashboard/production/perfil.php";
                }
            })
        }
        function cambiosperfilE() {
            swal.fire({
                title: "¡Se ha modificado exitosamente tus datos de perfil!",
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
                    window.location.href = "../views/dashboard/production/perfil.php";
                }
            })
        }
    </script>
</head>

<body>
    <?php
    if (isset($_GET['idC'])) {
        $idC = $_GET['idC'];
        //var_dump($idV);
        switch ($idC) {
            case 'listC':
                $listaClientes = listarClientes();
                break;
            case 'addC':
                agregarClientes();
                break;
            case 'editC':
                editarClientes();
                break;
            case 'deleteC':
                eliminarClientes();
                break;
            case 'logOut':
                logOut();
                break;
            case 'editSettings':
                editarAjustes();
                break;
            case 'editPass':
                editarContraseña();
                break;
            case 'procesoGuardar':
                procesoGuardar();
                break;
            default:
                echo "Sin acciones";
                break;
        }
    }

    //Listar usuarios
    function listarClientes()
    {
        include("../../../model/conexion.php");
        $consulta = $conexion->query("select * from clientes");
        $listaClientes = $consulta->fetch_all(MYSQLI_ASSOC);
        return $listaClientes;
    }

    function agregarClientes()
    {
        include("../model/conexion.php");
        // $id = $_POST['identificador'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion_casa'];
        $tipo_documento = $_POST['tipo_documento'];
        $celular = $_POST['celular'];
        $clave = $_POST["password"];

        var_dump($tipo_documento) ;
        //Consultamos en la BD si el identificador ya está registrado
        $consulta = $conexion->query("select * from clientes where email = '$email'");
        // $consulta1 = $conexion->query("select * from ventas != identificador");
        // $consulta = $consulta1->fetch_all(MYSQLI_ASSOC);

        // var_dump($consulta);

        //Si la consulta arroja un resultado mayor a cero, es que el producto ya existe, entonces no se puede registrar
        if ($consulta->num_rows > 0) {
            echo "<script>
                    agregarF();
                </script>";
        } else {
            //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
            $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
            $conexion->query("insert into clientes (nombre, celular, direccion_casa, email, id_documento, password, clave) values ('$nombre', '$celular', '$direccion', '$email', '$tipo_documento', '$clave_encriptada', '$clave')");
            echo "<script>
                    agregarT();
                </script>";
        }
    }
    function editarClientes()
    {
        include("../model/conexion.php");
        $id = $_POST['identificador'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion_casa'];
        $tipo_documento = $_POST['tipo_documento'];
        $celular = $_POST['celular'];
        $clave = $_POST["password"];

        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);


        $conexion->query("update clientes set nombre = '$nombre', email = '$email', direccion_casa = '$direccion', id_documento = '$tipo_documento', celular = '$celular', password = '$clave_encriptada', clave = '$clave' where identificador = '$id'");
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
    function eliminarClientes()
    {
        include("../model/conexion.php");
        $id = $_GET['deleteC'];
        $conexion->query("delete from clientes where identificador = '$id'");
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


    function logOut()
    {
        mysqli_report(0) ;
        session_unset() ;
        session_destroy();
        echo "<script>
                logOutT();
        </script>";
    }
    function procesoGuardar()
    {
        include("../model/conexion.php");
        $id = $_REQUEST['id'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

        $query = "UPDATE imagen SET imagen='$imagen' WHERE id = '$id'";
        $resultado = $conexion->query($query);

        if ($resultado) {
            echo "<script>
        procesoGuardarT();
        </script>";
        } else {
            echo "No se inserto";
        }
    }
    function editarAjustes()
    {
        include("../model/conexion.php");
        $email = $_POST['email'];
        $nombres = $_POST['nombre'];
        $direccion = $_POST['direccion_casa'];
        $tipo_documento = $_POST['tipo_documento'];
        $celular = $_POST['celular'];

        $conexion->query("update clientes set nombre ='$nombres', id_documento = '$tipo_documento', direccion_casa = '$direccion', celular = '$celular' where email = '$email'");

        if ($conexion) {
            echo "<script>editarAjustesT()</script>";
        } else {
            echo "<script>editarAjustesF()</script>";
        }
    }

    function editarContraseña()
    {
        include("../model/conexion.php");
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $clave_nueva = $_POST['new_password'];
        $clave_encriptada = password_hash($clave_nueva, PASSWORD_DEFAULT);

        $consulta = $conexion->query("select * from clientes where email = '$email'");
        $usuario = $consulta->fetch_assoc();
        $password = $usuario['clave'];

        if ($clave == $password) {
            $conexion->query("update clientes set password = '$clave_encriptada', clave = '$clave_nueva' where email = '$email'");
            if ($conexion) {
                echo "<script>password_newt()</script>";
            } else {
                echo "<script>password_newf()</script>";
            }
        } else {
            echo "<script>verificarf()</script>";
        }
    }
    ?>
</body>

</html>