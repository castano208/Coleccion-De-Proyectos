<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="../assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>
    <div>
        <button>
            <div>
                <div>
                    <a href="../views/index.php"><img src="../assets/img/casa.png" width="32" alt=""></a>
                </div>
            </div>
        </button>
    </div>
<form class="formulario" action="../controller/registroController.php" method="post">
    <h1>Regístrate</h1>
    <div class="contenedor">

        <div class="input-contenedor">
            <i class="fas fa-user icon"></i>
            <input type="text" name="nombres" placeholder="Nombre Completo"> 
        </div>

        <div class="input-contenedor">
            <i class="fas fa-phone icon"></i>
            <input type="text" name="celular" placeholder="Celular">
        </div>

        <div class="input-contenedor">
            <i class="fas fa-home icon"></i>
            <input type="text" name="direccion" placeholder="Dirección">
        </div>

        <div class="input-contenedor">
            <i class="fas fa-envelope icon"></i>
            <input type="text" name="email" placeholder="Correo electrónico">
        </div>

        <div class="input-contenedor">
            <?php 
            include('../model/conexion.php');
            $consulta = $conexion->query("select * from tipo_documento");
            $listaTD = $consulta->fetch_all(MYSQLI_ASSOC); ?>
            
            <select class="form-select" name="tipo_documento" required>
            <option selected>Seleccione tipo de documento</option>

            <?php foreach ($listaTD as $TD) { ?>
                <option value="<?php echo $TD['ID']; ?>" class="form-control"><?php echo $TD['tipo_documento']; ?></option>
            <?php } ?>
            </select>
        </div>

        <div class="input-contenedor">
            <i class="fas fa-id-card icon"></i>
            <input type="text" name="documento" placeholder="Número de documento">
        </div>


        <button type="submit" value="Registrarse" class="button">Registrarse</button>
        <p>Al registrarse, aceptas nuestras Condiciones de uso y Política de privacidad</p>
        <p>¿Ya tienes una cuenta? <a class="link" href="../views/login.php">Iniciar Sesión</a></p>

    </div>       
</form>
</body>
</html>