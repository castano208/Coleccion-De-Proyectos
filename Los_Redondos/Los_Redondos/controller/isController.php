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
        function inicioT() {
            swal.fire({
                title: "¡Inicio de sesión correcto, bienvenido(a)!",
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

        function inicioF() {
            swal.fire({
                title: "¡Error: Usuario no encontrado! Por favor verifique sus datos.",
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
                    window.location.href = "../views/login.php";
                }
            });
        }
    </script>
</head>

<body>
    <?php
    //Incluimos la conexión a la BD
    include('../model/conexion.php');

    //Validamos que hayan datos enviados desde el formulario
    if (isset($_POST['email']) && isset($_POST['clave'])) {

        //Recolectar los datos del usuario
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        // $clave = md5($_POST['clave']); -- La forma antigua

        //Consultamos que los datos enviados se encuentren en la BD
        $respuestaBD = $conexion->query("select * from clientes where email = '$email'");
        $registroDB = $respuestaBD->fetch_assoc();
        // var_dump($registroDB);

        if($registroDB['email'] == $email && password_verify($clave, $registroDB['password'])) {
            
            if ($respuestaBD->num_rows > 0) {
                //Se inicia las variables de sesión
                //Podemos declarar las variables del usuario
                session_start();
                $_SESSION['nombre'] = $registroDB['nombre'];
                $_SESSION['email'] = $registroDB['email'];
                $_SESSION['tiempo'] = time();
                $_SESSION['sesion'] = $registroDB['identificador'];
                echo "<script>
                        inicioT();
                    </script>";
            }
            else{
                echo "<script>
                    inicioF();
                </script>";
            }
        } else {
            echo "<script>
                    inicioF();
                </script>";
        }
    } else {
        echo "<script>
                    inicioF();
                </script>";
    }
    ?>
</body>

</html>