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
        function registroF() {
            swal.fire({
                title: "¡El usuario ya se encuentra registrado! Intente con otro email.",
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

        function registroT() {
            swal.fire({
                title: "¡Usuario registrado exitosamente! Por favor inicie sesión.",
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
                    window.location.href = "../views/login.php";
                }
            });
        }

        function registroTell() {
            swal.fire({
                title: "¡El usuario ya se encuentra registrado con el número indicado!",
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
    include("../model/conexion.php");

    //Validamos que hayan enviado datos desde el formulario
    if (isset($_POST['email'])) {

        //Recolectamos los datos
        $nombre = $_POST["nombres"];
        $celular = $_POST["celular"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];
        $tipo_documento = $_POST['tipo_documento'];
        $documento = $_POST['documento'];
        $clave = $_POST["password"];

        //Consultamos en la BD si el email ya está registrado
        $consulta = $conexion->query("select * from clientes where email = '$email' and id_documento = '$tipo_documento'");

        $cel = $conexion->query("select * from clientes");

        foreach ($cel as $cels) {
            if ($celular == $cels['celular']) {
                echo "<script>
                    registroTell(); 
                </script>";
                exit;
            }
        }
        //Si la consulta arroja un resultado mayor a cero, es que el usuario ya existe, entonces no se puede registrar.
        if ($consulta->num_rows > 0){
            echo "<script>
                registroF(); 
            </script>";

        }else {
            //Pero si no hay resultados, entonces procedemos a registrarlo en la BD
            //$clave_encriptada = md5($clave); -- Forma antigua
            $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
            $conexion->query("insert into clientes (nombre, celular, direccion_casa, email, id_documento, documento, password, clave) values ('$nombre', '$celular', '$direccion', '$email', '$tipo_documento', '$documento', '$clave_encriptada', '$clave')");
            // var_dump($conexion);
            echo "<script>
                    registroT();
                </script>";
        }
    }
    ?>
</body>

</html>