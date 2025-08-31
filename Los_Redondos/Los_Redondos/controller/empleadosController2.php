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
                title: "¡El empleado ya se encuentra registrado!",
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
                    window.location.href = "../views/dashboard/production/empleados.php";
                }
            });
        }

        function agregarT() {
            swal.fire({
                title: "¡Empleado registrado exitosamente!",
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
                    window.location.href = "../views/dashboard/production/empleados.php";
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
                    window.location.href = "../views/dashboard/production/empleados.php";
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
                    window.location.href = "../views/dashboard/production/empleados.php";
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
                    window.location.href = "../views/dashboard/production/empleados.php?idE=listE";
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
                    window.location.href = "../views/dashboard/production/empleados.php?idE=listE";
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
                $listaEmpleados = listarEmpleados();
                break;
            case 'addE':
                agregarEmpleados();
                break;
            case 'editE':
                editarEmpleados();
                break;
            case 'deleteE':
                eliminarEmpleados();
                break;
            default:
                echo "Sin acciones";
                break;
        }
    }

    //Listar usuarios
    function listarEmpleados()
    {
        include("../../../../model/conexion.php");
        $consulta = $conexion->query("select * from empleados");
        $listaEmpleados = $consulta->fetch_all(MYSQLI_ASSOC);
        return $listaEmpleados;
    }

    //function listarUsuario($emailU){
    //  include("../../../../model/conexion.php");
    //  $consulta = $conexion->query("select * from usuarios where email = '$emailU'");
    //  $usuario = $consulta->fetch_assoc();
    //  return $usuario;
    //}

    function agregarEmpleados()
    {
        include("../model/conexion.php");
        $nombres = $_POST['nombre_completo'];
        $email = $_POST['email'];
        $clave = $_POST['password'];
        $documento = $_POST['documento'];
        $tipo_documento = $_POST['tipo_documento'];


        //Consultamos en la BD si el email ya está registrado
        $consulta = $conexion->query("select * from empleados where email = '$email'");

        //Si la consulta arroja un resultado mayor a cero, es que el usuario ya existe, entonces no se puede registrar
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
    function editarEmpleados()
    {
        include("../model/conexion.php");
        $nombres = $_POST['nombres'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $documento = $_POST['documento'];
        $identificador = $_POST['identificador'];

        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
        $conexion->query("update empleados set nombre_completo = '$nombres', password = '$clave_encriptada', clave = '$clave', documento = '$documento' where email = '$email' and ID = '$identificador'");
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
    function eliminarEmpleados()
    {
        include("../model/conexion.php");
        $email = $_GET['deleteE'];
        $conexion->query("delete from empleados where email = '$email'");
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