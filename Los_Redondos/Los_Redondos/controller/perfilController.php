<!DOCTYPE html>
<html lang="en">

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
        function imagemT() {
            swal.fire({
                title: "¡Se insertó exitosamente la imagen!",
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
            });
        }

        function imagenF() {
            swal.fire({
                title: "¡Error: No se insertó la imagen!",
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
                    window.location.href = "../views/dashboard/production/perfil.php";
                }
            });
        }
    </script>
</head>

<body>
    <?php

    include("../model/conexion.php");

    $id = $_REQUEST['id'];

    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $query = "UPDATE imagen SET imagen='$imagen' WHERE id = '$id'";
    $resultado = $conexion->query($query);

    if ($resultado) {
        echo "<script>
          imagenT();
      </script>";
    } else {
        echo "<script>
          imagenF();
      </script>";
    }
    ?>
</body>

</html>