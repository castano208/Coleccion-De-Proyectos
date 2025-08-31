<?php
include('../../model/conexion.php');
$idSesion = $_SESSION['sesion'] ;
$prod = $conexion->query("SELECT id_producto FROM carrito_usuarios WHERE id_session ='$idSesion'");
$produ = mysqli_fetch_array($prod) ;
$consu = 0 ;
if ($produ != null) {
    $consu = intval($produ['id_producto']) ;
}

if ($consu != null) {?> <br>
    <a href="./estatico/ver_carrito.php"> 
        <div class="container" style="text-align: center ;">
            <div class="row g-4">
                <div class="pa" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-dark mb-4"></i>
                            <h5>Dirigirse al carrito de compras</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <?php
}
elseif ($consu == 0) {?> 
    <a href="./menu.php"> 
        <div class="container" style="text-align: center ;">
            <div class="row g-4">
                <div class="pa" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-secondary mb-4"></i>
                            <h5>Dirigirse al menu</h5>
                            <p>Agrega productos a tu carrito</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <?php }
?> 