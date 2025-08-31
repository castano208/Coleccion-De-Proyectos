<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>

    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> -->


    <link rel="stylesheet" href="../assets/css/estiloss.css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="../assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="../controller/isController.php" class="formulario__login" method="post">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" name="email" placeholder="Correo Electronico" required>
                    <input type="password" name="clave" placeholder="Contraseña" required>
                    <button type="submit">Entrar</button>
                </form><br><br><br>

                <!--Register-->
                <form action="../controller/registroController.php" class="formulario__register" method="post">
                    <h2>Regístrarse</h2>
                    <input type="text" name="nombres" placeholder="Nombre completo" required>
                    <input type="text" name="email" placeholder="Correo electrónico" required>
                    <input type="text" name="celular" placeholder="Celular" required>
                    <input type="text" name="direccion" placeholder="Dirección" required>
                    <input type="text" name="documento" placeholder="Número de documento" required><br><br>
                    <?php
                    include('../model/conexion.php');
                    $consulta = $conexion->query("select * from tipo_documento");
                    $listaTD = $consulta->fetch_all(MYSQLI_ASSOC); ?>

                    <select  class="custom-select" name="tipo_documento" required>
                    <option style="text-align:center;" class="content-box border-box" class="form-control">Tipo de documento</option><br>
                        <?php foreach ($listaTD as $TD) { ?>
                            <option style="text-align:center;" class="content-box border-box" value="<?php echo $TD['ID']; ?>" class="form-control"><?php echo $TD['tipo_documento']; ?></option><br>
                        <?php } ?>
                    </select>
                    
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit">Regístrarse</button>
                        </div>
                    </div>
                </form>
            </div>

    </main>

    <script src="../assets/js/script.js"></script>
</body>

</html>