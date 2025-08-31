<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "./head2.php";
    session_start();
    require "./funcionescarrito.php";
    include('../../model/conexion.php');
    $id_producto = $_POST['id_producto'];
    $producto = $id_producto;
    $nombre= $conexion->query("SELECT nombre, ingredientes, imagen  FROM platos  WHERE identificador ='$id_producto'");
    $completo = mysqli_fetch_array($nombre) ;
    $seleccionadoN = $completo['nombre'] ;
    $seleccionadoI = $completo['ingredientes'] ;

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
                <h1 class="mb-5">Cambios del pedido</h1>
            </div>
                <div class="card-group">
                    <div class="card">
                        <div id=""></div>
                    <form action="./agregar_cantidad_al_producto.php" method="post">
                        <div class="card-body">
                            <h5 class="card-title">Agregar</h5><br>
                            <p class="card-text">Indique la cantidad que desea agregar o eliminar del producto seleccionado.</p><br>
                            <div class="form-group">
                                <input type="number" name="cantidad" id="cantidad" class="form-control"><br>
                            </div>
                            <div>
                                <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $id_producto ;?>">
                                <input type="hidden" id="total" value="<?php echo $total ;?>"><br>
                                <h5 class="card-title">El total de su pedido es:</h5>
                                <h6 class="card-title" id="respuesta">Indique los cambios deseados</h6>
                            </div>           
                              
                        </div>
                        
                        <div id="respuesta2"></div>
                    </div>
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Producto seleccionado</h5>
                        <div>
                            <h6><?php echo $seleccionadoN ; ?></h6><br>
                            <img style="max-width: 220px;" src="data:image/jpeg;base64, <?php echo  base64_encode($completo['imagen']) ;?>"><br>
                            <br><h6><?php echo  $seleccionadoI ; ?></h6>
                        </div>
                        <br>    <button type="button"class="btn-dark btn-sm px-2 py-0" id="Enviar">Ver precio</button><br><br>    
                        <input type="hidden" name="id_producto"  value="<?php echo $id_producto;?>">
                        <button class="btn- px-1 py-1 btn-sm" style="background-color: #E78618 ; color: #FFFFFF ; border-color: #FFFFFF ; ">Agregar cantidad</button><br><br> 
                    
                    </div>
                </div>
            </div>
        </div>


    <!-- Menu End -->


    <!-- Footer Start -->
    <footer>
        <?php
        require_once "./footer2.php";
        ?>
    </footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- JavaScript Libraries -->
    <!-- Inicio Script -->
    <?php
    include "./script2.php";
    include "./sad.php";
    ?>
    <!-- Fin Script -->

</body>

</html>