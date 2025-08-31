<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../views/estatico/head.php";
    session_start();
    require "./estatico/funcionescarrito.php";

    ?>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <?php
        require_once "./estatico/navbar.php";
        ?>
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Productos</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="../views/index.php">Inicio</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Productos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container" style="text-align:center;">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Carrito de compras</h5>
                <h1 class="mb-5">Seleccione el producto deseado</h1>
            </div>
            <form action="./estatico/agregar_al_carrito.php" method="POST">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cantidad</h5>
                            <p class="card-text">Indique la cantidad deseada del producto seleccionado.</p>
                            <div class="form-group">
                                <?php
                                $session = $_SESSION['sesion'] ;
                                if ($session != null) {?>
                                    <input type="number" name="cantidad" id="cantidad" class="form-control" required><br>
                                    
                                <?php
                                }else { ?>
                                        <input type="number" name="cantidad" id="cantidad" class="form-control"><br>
                                    <?php 
                                }
                                ?>
                            </div>
                            <div >
                                <h5 class="card-title">Total:</h5>
                                <h6 class="card-title" id="respuesta">Seleccione la cantidad deseada del producto</h6>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Producto</h5>
                            <div>
                                <input type="hidden" name="identificador" class="form-control" value="<?php echo $registro["identificador"] ?>">
                            </div>
                            <div class="form-group">
                                <?php
                                include('../model/conexion.php');

                                $consulta = $conexion->query("select * from platos");
                                $listaCl = $consulta->fetch_all(MYSQLI_ASSOC);

                                $id_producto = $_POST['id_producto'];
                                
                                $consultaIden= $conexion->query("select nombre from platos where identificador  = '$id_producto';");
                                $consultaIdenti = mysqli_fetch_array($consultaIden);
                                $identificadorSe = $consultaIdenti['nombre'] ;

                                $valor = 0;
                                
                                $idSesion = $_SESSION['sesion'] ;
                                if ($listaCl != null or $listaCl != 0) { ?>
                                <select class="custom-select" class="custom-select" aria-label=".form-control-lb example" name="producto" id="producto" required>
                                        
                                    <?php foreach ($listaCl as $Cl) {
                                        $dat =  $Cl['identificador'] ;
                                        $valu = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$dat' ");
                                        $value = mysqli_fetch_array($valu) ;
                                        $toti = intval($value['cantidad']) ;

                                        $valor += 1;
                                        if ($Cl['disponible'] > 0) {

                                            if ($Cl['disponible'] > $toti) {

                                                if ($Cl['nombre'] != $identificadorSe) {

                                                    if ($valor == 1) { ?>

                                                    <option style="text-align:center;" class="content-box border-box" value="<?php echo $id_producto; ?>" class="form-control"><?php echo $identificadorSe; ?></option><br>
                                                
                                                <?php }
                                                ?>
                                                <option style="text-align:center;" class="content-box border-box" value="<?php echo $Cl['identificador']; ?>" class="form-control"><?php echo $Cl['nombre']; ?></option><br>
                                            <?php }
                                            }
                                        } 
                                    }
                                } else { ?>
                                    <option style="text-align:center;" class="content-box border-box" value="0" class="form-control">No hay productos para seleccionar</option><br>
                                <?php }
                                ?>
                                </select><br><br>
                            </div>
                            <div class="columns">
                                <input type="hidden" name="id_producto" value="<?php echo $Cl['nombre'] ?>">
                            <div><h6 class="card-title" id="respuesta3">Seleccione el producto deseado</h6>
                            <div><h6 class="card-title" id="respuesta6"></h6></div>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Empleados</h5>
                            <div>
                                <input type="hidden" name="identificador" class="form-control" value="<?php echo $registro["identificador"] ?>">
                            </div>
                            <div class="form-group">
                                <?php
                                $consulta = $conexion->query("select * from empleados");
                                $listaEM = $consulta->fetch_all(MYSQLI_ASSOC); 
                                $valor = -1;
                                ?>
                                <select class="custom-select" class="custom-select" aria-label=".form-control-lb example" name="empleado" id="empleado" required>
                                    <option style="text-align:center;" class="content-box border-box" value="0" class="form-control">Seleccione un empleado</option>
                                    <?php foreach ($listaEM as $EM) { 
                                        $valor += 1 ;
                                        $EMP = $conexion->query("SELECT id_cargo FROM empleados WHERE ID  ='$valor' ");
                                        $EMPLEADO= mysqli_fetch_array($EMP) ;
                                        $cargo = intval($EMPLEADO['id_cargo']) ;
                                        if ($cargo == 0) {?>
                                            <option style="text-align:center;" class="content-box border-box" value="<?php echo $EM['ID']; ?>" class="form-control"><?php echo $EM['nombre_completo']; ?></option><br>
                                        <?php }
                                        }?>
                                </select><br><br>
                                <button type="button"class=" py-1 px-2 btn-sm" style="background-color: #E78618 ; color: #FFFFFF ; border-color: #FFFFFF ; " id="Enviar">Actualizar datos</button><br>
                                <br><div id="respuesta4"><h6 class="card-title">Seleccione la persona por la que fue atendido</h6></div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <div class="columns">
            <div class="card-body">
                <h5 class="card-title">Descripción</h5>
                <div ><h6 class="card-title" id="respuesta2">Rellene todos los campos para agregar el producto a su carrito</h6></div>
            </div>
        </div>
    </div>


    <!-- Menu End -->
        <?php
        include "./estatico/carrito.php" ;
        ?>

    <!-- Footer Start -->
    <footer>
        <?php
        require_once "../views/estatico/footer.php";
        ?>
    </footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- JavaScript Libraries -->
    <!-- Inicio Script -->
    <?php
    require_once "./estatico/script.php";
    ?>
    <!-- Fin Script -->

</body>

</html>