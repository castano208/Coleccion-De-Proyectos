<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once "./head2.php";
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Navbar & Hero Start -->
        <?php
        require_once "./navbar2.php";
        ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Productos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Productos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Menu Start -->
        <!-- Menu End -->
        <?php
            include_once "../estatico/funcionescarrito.php";
            $platos = obtenerProductosEnCarrito();
            if (count($platos) <= 0) {
            ?>
                    <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Carrito de compras</h5>
                            <h1 class="mb-5">Artículos seleccionados</h1>
                        </div>
                    </div>
                </div>
                <section class="hero is-info">
                    <div class="hero-body" style="text-align: center;">
                        <div class="container">
                            <h1 class="title">
                                Todavía no hay productos
                            </h1>
                            <h2 class="subtitle">
                                Visita la tienda para agregar productos a tu carrito
                            </h2><br>
                            <a href="../menu.php" class="button is-warning">Ver tienda</a>
                        </div>
                    </div>
                </section>
            <?php } else { ?>
                <div class="columns">
                    <div class="column">
                        <h2 style="text-align: center;">Mi carrito de compras</h2><br>
                        <table class="table">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Agregar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                $total = 0;

                                foreach ($platos as $platos) {
                                    $total += $platos['precio'] * $platos['cantidad'] ;
                                    $producto = $platos['identificador'] ;

                                    $cal = $conexion->query("SELECT disponible FROM platos WHERE identificador ='$producto'");
                                    $carl = mysqli_fetch_array($cal) ;
                                    $cantin =intval($carl['disponible'])  ;

                                    ?>
                                        <tr style="text-align: center;">
                                            <td><img style="max-width: 140px;" src="data:image/jpeg;base64, <?php echo  base64_encode($platos['imagen']) ;?>"></td>
                                            <td><?php echo $platos['nombre'] ?></td>
                                            <td><?php echo $platos['ingredientes'] ?></td>
                                            <td>$<?php echo number_format($platos['precio'] * $platos['cantidad'], 2) ?></td>
                                            <td><?php if ($platos['cantidad'] <= $cantin) {?>
                                            <?php  echo $platos['cantidad'] ;}  ?>
                                            </td>
                                            <td style="text-align: center;">
                                            <?php 
                                            $producto2 = $platos['identificador'];

                                            $can = $conexion->query("SELECT disponible FROM platos WHERE identificador ='$producto2'");
                                            $cant = mysqli_fetch_array($can) ;
                                            $canti = intval($cant['disponible']);
                                            
                                            if ($platos['cantidad'] < $canti) { 
                                                if ($platos['cantidad'] <= $cantin) {
                                                ?> 
                                                <form action="./cambios_cantidad_producto.php" method="post">
                                                    <input type="hidden" name="id_producto" value="<?php echo $platos['identificador']?>">
                                                    <input type="hidden" name="redireccionar_carrito">
                                                    <button class="btn-success"  id="Enviar" style="text-align: center;  width: 32px; height: 32xpx; border-radius: 50%; border-color: #FFFFFF ">
                                                        <i class="bi bi-bag-check"></i>
                                                    </button>
                                                </form>    
                                            <?php }else { ?>
                                                <h6>
                                                    <div>Click para</div>
                                                    <div>mas informacion</div>
                                                </h6>
                                                <form action="./update_cantidad.php" method="post">
                                                    <input type="hidden" name="id_producto" value="<?php echo $platos['identificador']?>">
                                                    <button class="btn-secondary" style="text-align: center;  width: 39px; border-radius: 50%; border-color: #FFFFFF ">
                                                        <i class="bi bi-info-circle-fill" style="margin-top: 10px;"></i> 
                                                    </button>
                                                </form>
                                                <?php
                                                }
                                            }elseif ($platos['cantidad'] > $cantin) { ?>
                                                <h6>
                                                    <div>Click para</div>
                                                    <div>mas informacion</div>
                                                </h6>
                                                <form action="./update_cantidad.php" method="post">
                                                    <input type="hidden" name="id_producto" value="<?php echo $platos['identificador']?>">
                                                    <button class="btn-secondary" style="text-align: center;  width: 34px; height: 33px; border-radius: 50% ">
                                                        <i class="bi bi-info-circle-fill" style="margin-left: 1px ;"></i> 
                                                    </button>
                                                </form>
                                                <?php } else { ?>
                                                <h6>
                                                <div>Sin</div> 
                                                <div>existencias</div></h6>
                                                <?php
                                            }
                                            ?>
                                            </td> 
                                            <td>
                                                <?php
                                                if ($platos['cantidad'] <= $cantin) { ?>
                                                    <form action="./cambios_cantidad_producto2.php" method="post">
                                                        <input type="hidden" name="id_producto" value="<?php echo $platos['identificador']?>">
                                                        <input type="hidden" name="redireccionar_carrito">
                                                        <button class="btn-danger" style="text-align: center;  width: 32px; height: 32xpx; border-radius: 50%; border-color: #FFFFFF ">
                                                            <i class="bi bi-bag-x"></i>
                                                        </button>
                                                    </form>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                        </tr>
                            </tbody>
                            <tfoot>
                                    <td colspan="2" class="has-text-right"><h4>Total:</h4></td>
                                    <td colspan="2" class="has-text-right">
                                        <div style="margin-left:-185px ; margin-top: 5px;"><h6 class="card-title" >$<?php echo number_format($total, 2) ?></h6></div>
                                    </td>
                            </tfoot>    
                        </table>  
                        <div style=" margin-left:1195px ; margin-top: -60px;" ><a href="terminar_compra.php" class="btn btn- px-2 py-2 btn-sm"  style="background-color: #E78618 ; color: #FFFFFF ; border-color: #FFFFFF ; "><i class="bi bi-bag-check-fill"></i>&nbsp;Terminar compra</a></div>                 
                    </div>
                </div>
                <?php 
                include('../../model/conexion.php');
                $idSesion = $_SESSION['sesion'] ;
                $carg = $conexion->query("SELECT id_empleado FROM carrito_usuarios WHERE id_session ='$idSesion'");
                $cargos = mysqli_fetch_array($carg) ;
                $cargo = intval($cargos['id_empleado']) ;
                $nombre = $conexion->query("SELECT nombre_completo FROM empleados WHERE ID ='$cargo'");
                $completo = mysqli_fetch_array($nombre) ;
                
                ?>
                <br><br><h4 style="text-align: center;">Atendido por</h4>
                <div style="text-align: center;" ><?php echo $completo['nombre_completo'];?></div>
            <?php } ?>

        <!-- Footer Start -->
<footer>
    <?php
        require_once "./footer2.php";
    ?>
</footer>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

        <!-- JavaScript Libraries -->
        <!-- Inicio Script -->
        <?php
        require_once "./script2.php";
        ?>
        <!-- Fin Script -->
</body>

</html>