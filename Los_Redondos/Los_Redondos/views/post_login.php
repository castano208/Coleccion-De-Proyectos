<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
    <link rel="stylesheet" href="../assets/css/estilos.css"> 
</head>
<body>
    <div>
        <button>
            <div>
                <div>
                    <a href="../views/login.php"><img src="../assets/img/regresar.png" width="32" alt=""></a>
                </div>
            </div>
        </button>
    </div>
    <form class="formulario">
        <h1>Iniciar Sesión</h1>
        <div>
            <!-- <a href="../views/contact.php"><input type="submit" value="Administrador" class="button"></a> -->
                    <div style="text-align: center;">
                        <a href="./Dashboard/views Admi/dashboard/panel.php" type="submit" class="button">Administrador</a>
                    </div>
        </div>
        <br><br>
        <div>
            <!-- <a href="../views/contact.php"><input type="submit" value="Administrador" class="button"></a> -->
                    <div style="text-align: center;">
                        <a href="./Dashboard/views Usuario/panel_cliente/panel.php" type="submit" class="button">Cliente</a>
                    </div>
        </div>
        <br><br>
    </div>
    </form>
</body>
</html>