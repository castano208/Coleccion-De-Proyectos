<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require ("../views/estatico/head.php");
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Navbar & Hero Start -->
        <?php
        require_once "../views/estatico/navbar.php";
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
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Productos</h5>
                    <h1 class="mb-5">Artículos más populares</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <!-- <i class="fa fa-coffee fa-2x text-primary"></i> -->
                                <img src="../assets/img/muslo-de-pollo.png" alt="" width="40" height="40">
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Pollos</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <!-- <i class="fa fa-hamburger fa-2x text-primary"></i> -->
                                <img src="../assets/img/pierna-de-pollo (1).png" alt="" width="40" height="40">
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Combos</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <!-- <i class="fa fa-utensils fa-2x text-primary"></i> -->
                                <img src="../assets/img/arroz-frito.png" alt="" width="40" height="40">
                                <div class="ps-3"> 
                                    <h6 class="mt-n1 mb-0">Arroz chino</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-4">
                                <!-- <i class="fa fa-utensils fa-2x text-primary"></i> -->
                                <img src="../assets/img/bandeja.png" alt="" width="40" height="40">
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Almuerzos</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-5">
                                <!-- <i class="fa fa-utensils fa-2x text-primary"></i> -->
                                <img src="../assets/img/sopa-caliente.png" alt="" width="40" height="40">
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Porciones</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <?php
                                        include "../model/conexion.php" ;
                                        $platos = $conexion->query("SELECT *FROM platos");
                                        $idSesion = $_SESSION['sesion'] ;
                                        ?> 
                                        <?php
                                            foreach ($platos as $plato) {
                                                $dat =  $plato['identificador'] ;
                                                $va = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$dat' ");
                                                $res = mysqli_fetch_array($va) ;
                                                $tot = intval($res['cantidad']) ;

                                                if ($plato['identificador'] == 19 or $plato['identificador'] == 15 or $plato['identificador'] == 17 or $plato['identificador'] == 18 or $plato['identificador'] == 14) {  
                                                   if ($plato['disponible'] > 0) { 
                                                    if ($tot < $plato['disponible']) { ?>  
                                                        <div class="col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <img style="max-width: 100px;" src="data:image/jpeg;base64, <?php echo  base64_encode($plato['imagen']) ;?>"> 
                                                                <div class="w-100 d-flex flex-column text-start ps-3">
                                                                <form action="./modalcarrito.php" method="post">   
                                                                    <input type="hidden" name="id_producto" value="<?php echo $plato['identificador']?>">
                                                                
                                                                    <h5 class="d-flex justify-content-between border-bottom ">
                                                                    <span><?php echo $plato['nombre']; ?></span>
                                                                    
                                                                    <button class="btn btn-primary py-1 px-2"> Agregar</button>
                                                                    </h5>
                                                                </form>
                                                                
                                                                <small class="fst-italic " > <?php echo $plato['ingredientes']; ?></small><br>
                                                                <h6 class="border-bottom"><span style="color: #EAA03D">Precio: $<?php echo number_format($plato['precio'] , 2) ; ?></span></h6>

                                                                <?php if ($plato['disponible'] > 0) { ?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Disponibilidad: <?php echo number_format($plato['disponible']) ; ?> Productos</span></h6>
                                                                <?php }else {?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Producto no disponible</span></h6>
                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php } 
                                                } 
                                            }
                                        }?>
                                    </div><br><br>
                                <?php
                                include("./estatico/carrito.php");
                                ?> 
                            </div>
                        
                        <div id="tab-2" class="tab-pane fade show p-0 false">
                             <div class="row g-4">
                                    <?php   
                                        foreach ($platos as $plato) {
                                            $dat =  $plato['identificador'] ;
                                            $va = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$dat' ");
                                            $res = mysqli_fetch_array($va) ;
                                            $tot = intval($res['cantidad']) ;

                                            if ($plato['identificador'] == 12 or $plato['identificador'] == 13 or $plato['identificador'] == 11 or $plato['identificador'] == 9 or $plato['identificador'] == 10 or $plato['identificador'] == 8) {
                                                if ($plato['disponible'] > 0) {  
                                                    if ($tot < $plato['disponible']) { ?>  
                                                    <div class="col-lg-6">
                                                        <div class="d-flex align-items-center">
                                                            <img style="max-width: 100px;" src="data:image/jpeg;base64, <?php echo  base64_encode($plato['imagen']) ;?>"> 
                                                            <div class="w-100 d-flex flex-column text-start ps-3">
                                                                <form action="./modalcarrito.php" method="post">   
                                                                    <input type="hidden" name="id_producto" value="<?php echo $plato['identificador']?>">
                                                                
                                                                    <h5 class="d-flex justify-content-between border-bottom ">
                                                                    <span><?php echo $plato['nombre']; ?></span>
                                                                    
                                                                    <button class="btn btn-primary py-1 px-2"> Agregar</button>
                                                                    </h5>
                                                                </form>
                                                            <small class="fst-italic " > <?php echo $plato['ingredientes']; ?></small><br>

                                                            <h6 class="border-bottom"><span style="color: #EAA03D">Precio: $<?php echo number_format($plato['precio'] , 2) ; ?></span></h6>
                                                            <?php if ($plato['disponible'] > 0) { ?>
                                                                <h6 class="border-bottom"><span style="color: Dark">Disponibilidad: <?php echo number_format($plato['disponible']) ; ?> Productos</span></h6>
                                                            <?php }else {?>
                                                                <h6 class="border-bottom"><span style="color: Dark">Producto no disponible</span></h6>
                                                            <?php } ?>  
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } 
                                            }
                                        } 
                                    }?>
                            </div><br><br>
                        <?php
                        include("./estatico/carrito.php");
                        ?> 
                    </div>
                        <div id="tab-3" class="tab-pane fade show p-0 false">
                             <div class="row g-4">
                                    <?php   
                                        foreach ($platos as $plato) {
                                            $dat =  $plato['identificador'] ;
                                            $va = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$dat' ");
                                            $res = mysqli_fetch_array($va) ;
                                            $tot = intval($res['cantidad']) ;

                                            if ($plato['identificador'] == 7 or $plato['identificador'] == 6 or $plato['identificador'] == 5 or $plato['identificador'] == 4) {
                                                if ($plato['disponible'] > 0) { 
                                                    if ($tot < $plato['disponible']) { ?>     
                                                        <div class="col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <img style="max-width: 100px;" src="data:image/jpeg;base64, <?php echo  base64_encode($plato['imagen']) ;?>"> 
                                                                <div class="w-100 d-flex flex-column text-start ps-3">
                                                                    <form action="./modalcarrito.php" method="post">   
                                                                        <input type="hidden" name="id_producto" value="<?php echo $plato['identificador']?>">
                                                                    
                                                                        <h5 class="d-flex justify-content-between border-bottom ">
                                                                        <span><?php echo $plato['nombre']; ?></span>
                                                                        
                                                                        <button class="btn btn-primary py-1 px-2"> Agregar</button>
                                                                        </h5>
                                                                    </form>
                                                                <small class="fst-italic " > <?php echo $plato['ingredientes']; ?></small><br>
                                                                <h6 class="border-bottom"><span style="color: #EAA03D">Precio: $<?php echo number_format($plato['precio'] , 2) ; ?></span></h6>

                                                                <?php if ($plato['disponible'] > 0) { ?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Disponibilidad: <?php echo number_format($plato['disponible']) ; ?> Productos</span></h6>
                                                                <?php }else {?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Producto no disponible</span></h6>
                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                                }
                                        } 
                                    } ?>
                            </div><br><br>
                        <?php
                        include("./estatico/carrito.php");
                        ?> 
                    </div>
                        <div id="tab-4" class="tab-pane fade show p-0 false">
                             <div class="row g-4">
                                    <?php   
                                        foreach ($platos as $plato) {
                                            $dat =  $plato['identificador'] ;
                                            $va = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$dat' ");
                                            $res = mysqli_fetch_array($va) ;
                                            $tot = intval($res['cantidad']) ;

                                            if ($plato['identificador'] == 12 or $plato['identificador'] == 3 or $plato['identificador'] == 1 ) {
                                                if ($plato['disponible'] > 0) { 
                                                    if ($tot < $plato['disponible']) { ?>  
                                                        <div class="col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <img style="max-width: 100px;" src="data:image/jpeg;base64, <?php echo  base64_encode($plato['imagen']) ;?>"> 
                                                                <div class="w-100 d-flex flex-column text-start ps-3">
                                                                    <form action="./modalcarrito.php" method="post">   
                                                                        <input type="hidden" name="id_producto" value="<?php echo $plato['identificador']?>">
                                                                    
                                                                        <h5 class="d-flex justify-content-between border-bottom ">
                                                                        <span><?php echo $plato['nombre']; ?></span>
                                                                        
                                                                        <button class="btn btn-primary py-1 px-2"> Agregar</button>
                                                                        </h5>
                                                                    </form>
                                                                <small class="fst-italic " > <?php echo $plato['ingredientes']; ?></small><br>
                                                                <h6 class="border-bottom"><span style="color: #EAA03D">Precio: $<?php echo number_format($plato['precio'] , 2) ; ?></span></h6>

                                                                <?php if ($plato['disponible'] > 0) { ?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Disponibilidad: <?php echo number_format($plato['disponible']) ; ?> Productos</span></h6>
                                                                <?php }else {?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Producto no disponible</span></h6>
                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php }
                                            }
                                        } 
                                    } ?>
                            </div><br><br>
                        <?php
                        include("./estatico/carrito.php");
                        ?> 
                    </div>
                        <div id="tab-5" class="tab-pane fade show p-0 false">
                             <div class="row g-4">
                                    <?php   
                                        foreach ($platos as $plato) {
                                            $dat =  $plato['identificador'] ;
                                            $va = $conexion->query("SELECT cantidad FROM carrito_usuarios WHERE id_session ='$idSesion' and id_producto = '$dat' ");
                                            $res = mysqli_fetch_array($va) ;
                                            $tot = intval($res['cantidad']) ;
                                            
                                            if ($plato['identificador'] == 21 or $plato['identificador'] == 22 or $plato['identificador'] == 20 or $plato['identificador'] == 7) {
                                                if ($plato['disponible'] > 0) { 
                                                    if ($tot < $plato['disponible']) { ?>
                                                        <div class="col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <img style="max-width: 100px;" src="data:image/jpeg;base64, <?php echo  base64_encode($plato['imagen']) ;?>"> 
                                                                <div class="w-100 d-flex flex-column text-start ps-3">
                                                                    <form action="./modalcarrito.php" method="post">   
                                                                        <input type="hidden" name="id_producto" value="<?php echo $plato['identificador']?>">
                                                                    
                                                                        <h5 class="d-flex justify-content-between border-bottom ">
                                                                        <span><?php echo $plato['nombre']; ?></span>
                                                                        
                                                                        <button class="btn btn-primary py-1 px-2"> Agregar</button>
                                                                        </h5>
                                                                    </form>
                                                                <small class="fst-italic " > <?php echo $plato['ingredientes']; ?></small><br>
                                                                <h6 class="border-bottom"><span style="color: #EAA03D">Precio: $<?php echo number_format($plato['precio'] , 2) ; ?></span></h6>

                                                                <?php if ($plato['disponible'] > 0) { ?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Disponibilidad: <?php echo number_format($plato['disponible']) ; ?> Productos</span></h6>
                                                                <?php }else {?>
                                                                    <h6 class="border-bottom"><span style="color: Dark">Producto no disponible</span></h6>
                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php }
                                            }
                                        } 
                                    } ?>
                            </div><br><br>
                        <?php
                        include("./estatico/carrito.php");
                        ?> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->


        <!-- Footer Start -->
<footer>
    <?php
        require_once "../views/estatico/footer.php";
    ?>
</footer>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

        <!-- JavaScript Libraries -->
        <!-- Inicio Script -->
        <?php
            require_once "../views/estatico/script.php";
        ?>
        <!-- Fin Script -->
</body>

</html>