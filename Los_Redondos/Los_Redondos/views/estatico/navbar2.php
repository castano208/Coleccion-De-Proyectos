<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start() ;
    ?><?php 
    // error_reporting(0) ;
    $id_session = $_SESSION['sesion'];
        if($id_session == null or $id_session == 0) {
            ?>
            <div class="container-xxl position-relative p-0">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                        <a href="" class="navbar-brand p-0">
                            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                            <!-- <img src="img/logo.png" alt="Logo"> -->
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav ms-auto py-0 pe-4">
                                <a href="../index.phpindex.php" class="nav-item nav-link">Inicio</a>
                                <a href="../mision_vision.php" class="nav-item nav-link">Misión y visión</a>
                                <a href="../equipoTrabajo.php" class="nav-item nav-link">Equipo de trabajo</a>
                                <a href="../menu.php" class="nav-item nav-link">Menú</a>
                                <a href="../contact.php" class="nav-item nav-link">Contáctenos</a>
                                <a href="../ficha_tecnica.php" class="nav-item nav-link">Ficha técnica</a>
                            </div>
                            <a href="../login.php" class="btn btn-primary py-2 px-4">Iniciar sesión</a>
                        </div>
                    </nav> <?php 
        }else {
            include('../../model/conexion.php');
            $Cliente = $conexion->query("SELECT email FROM clientes WHERE identificador ='$id_session' ");
            $CorreoC  = mysqli_fetch_array($Cliente) ;
            $CorreoCliente = $CorreoC['email'] ;
            $Empleado = $conexion->query("SELECT email FROM empleados WHERE email = '$CorreoCliente' ");
            $CorreoM = mysqli_fetch_array($Empleado);
            $CorreoEmpleado = 0 ;
            if ($CorreoM != null) {
                $CorreoEmpleado = $CorreoM['email'] ;
            }
            
            if ($CorreoEmpleado == null or $CorreoEmpleado == 0) {
                    ?>
                        <div class="container-xxl position-relative p-0">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                                <a href="../index.php" class="navbar-brand p-0">
                                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                    <span class="fa fa-bars"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <div class="navbar-nav ms-auto py-0 pe-4">
                                        <a href="../index.php" class="nav-item nav-link">Inicio</a>
                                        <a href="../mision_vision.php" class="nav-item nav-link">Misión y visión</a>
                                        <a href="../equipoTrabajo.php" class="nav-item nav-link">Equipo de trabajo</a>
                                        <a href="../menu.php" class="nav-item nav-link">Menú</a>
                                        <a href="../contact.php" class="nav-item nav-link">Contáctenos</a>
                                        <a href="../ficha_tecnica.php" class="nav-item nav-link">Ficha técnica</a>
                                    </div>
                                    <a href="../dashboard/production/perfil.php" class="btn btn-primary py-2 px-4">Perfil</a>
                                </div>
                            </nav>
                        </div>
                    <?php 
            }elseif ($CorreoEmpleado == $CorreoCliente) {?>
                    <div class="container-xxl position-relative p-0">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                            <a href="../index.php" class="navbar-brand p-0">
                                <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="fa fa-bars"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav ms-auto py-0 pe-4">
                                    <a href="../index.php" class="nav-item nav-link">Inicio</a>
                                    <a href="../mision_vision.php" class="nav-item nav-link">Misión y visión</a>
                                    <a href="../equipoTrabajo.php" class="nav-item nav-link">Equipo de trabajo</a>
                                    <a href="../menu.php" class="nav-item nav-link">Menú</a>
                                    <a href="../contact.php" class="nav-item nav-link">Contáctenos</a>
                                    <a href="../ficha_tecnica.php" class="nav-item nav-link">Ficha técnica</a>
                                </div>
                                <a href="../dashboard/production/clientes.php" class="btn btn-primary py-2 px-4">Panel de control</a>
                            </div>
                        </nav>
                    </div>
                <?php 
            }
        }
    }
elseif (session_status() === PHP_SESSION_ACTIVE) {
    ?><?php 
    // error_reporting(0) ;
    $id_session = $_SESSION['sesion'];
        if($id_session == null or $id_session == 0) {
            ?>
            <div class="container-xxl position-relative p-0">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                        <a href="" class="navbar-brand p-0">
                            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                            <!-- <img src="img/logo.png" alt="Logo"> -->
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav ms-auto py-0 pe-4">
                                <a href="../index.php" class="nav-item nav-link">Inicio</a>
                                <a href="../mision_vision.php" class="nav-item nav-link">Misión y visión</a>
                                <a href="../equipoTrabajo.php" class="nav-item nav-link">Equipo de trabajo</a>
                                <a href="../menu.php" class="nav-item nav-link">Menú</a>
                                <a href="../contact.php" class="nav-item nav-link">Contáctenos</a>
                                <a href="../ficha_tecnica.php" class="nav-item nav-link">Ficha técnica</a>
                            </div>
                            <a href="../login.php" class="btn btn-primary py-2 px-4">Iniciar sesión</a>
                        </div>
                    </nav> <?php 
        }else {
            include('../../model/conexion.php');
            $Cliente = $conexion->query("SELECT email FROM clientes WHERE identificador ='$id_session' ");
            $CorreoC  = mysqli_fetch_array($Cliente) ;
            $CorreoCliente = $CorreoC ['email'] ;
            $Empleado = $conexion->query("SELECT email FROM empleados WHERE email = '$CorreoCliente' ");
            $CorreoM = mysqli_fetch_array($Empleado);
            $CorreoEmpleado = $CorreoM ['email'] ;
            if ($CorreoEmpleado == null) {
                    ?>
                        <div class="container-xxl position-relative p-0">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                                <a href="../index.php" class="navbar-brand p-0">
                                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                    <span class="fa fa-bars"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <div class="navbar-nav ms-auto py-0 pe-4">
                                        <a href="../index.php" class="nav-item nav-link">Inicio</a>
                                        <a href="../mision_vision.php" class="nav-item nav-link">Misión y visión</a>
                                        <a href="../equipoTrabajo.php" class="nav-item nav-link">Equipo de trabajo</a>
                                        <a href="../menu.php" class="nav-item nav-link">Menú</a>
                                        <a href="../contact.php" class="nav-item nav-link">Contáctenos</a>
                                        <a href="../ficha_tecnica.php" class="nav-item nav-link">Ficha técnica</a>
                                    </div>
                                    <a href="../dashboard/production/perfil.php" class="btn btn-primary py-2 px-4">Perfil</a>
                                </div>
                            </nav>
                        </div>
                    <?php 
            }elseif ($CorreoEmpleado == $CorreoCliente) {?>
                    <div class="container-xxl position-relative p-0">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                            <a href="../index.php" class="navbar-brand p-0">
                                <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="fa fa-bars"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav ms-auto py-0 pe-4">
                                    <a href="../index.php" class="nav-item nav-link">Inicio</a>
                                    <a href="../mision_vision.php" class="nav-item nav-link">Misión y visión</a>
                                    <a href="../equipoTrabajo.php" class="nav-item nav-link">Equipo de trabajo</a>
                                    <a href="../menu.php" class="nav-item nav-link">Menú</a>
                                    <a href="../contact.php" class="nav-item nav-link">Contáctenos</a>
                                    <a href="../ficha_tecnica.php" class="nav-item nav-link">Ficha técnica</a>
                                </div>
                                <a href="../dashboard/production/clientes.php" class="btn btn-primary py-2 px-4">Panel de control</a>
                            </div>
                        </nav>
                    </div>
                <?php 
            }
        }
    }
    ?>