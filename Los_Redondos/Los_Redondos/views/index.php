<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        require_once "../views/estatico/head.php";
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        
        <?php
        require_once "../views/estatico/navbar.php";
        ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Los Redondos<br>San Antonio</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Ubicados en San Antonio-Guarne del municipio de Antioquia, estamos trabajando desde hace 5 años para brindarles el mejor servicio y las más exquisitas delicias</p>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" class="rounded float-start" src="../assets/img/hero.png" height="400" width="400" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Equipo de trabajo</h5>
                                <p>Somos un equipo de trabajo en busca de retos que nos ayuden a superarnos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Productos</h5>
                                <p>Ofrecemos deliciosos platos de comida con los que puedes deleitarte.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Orden en línea</h5>
                                <p>Accede a nuestro carrito de compras y elige lo que deseas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Contáctenos</h5>
                                <p>Puede contactarnos por medio de nuestras redes sociales.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonio</h5>
                    <h1 class="mb-5">Nuestros Clientes dicen!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <?php 
                    $contactos = $conexion->query("SELECT *FROM contactenos");
                    foreach ($contactos as $contacto) {?>
                        <div class="testimonial-item bg-transparent border rounded p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p><?php echo $contacto['mensaje'] ?></p>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h5 class="mb-1"><?php echo $contacto['nombre'] ?></h5>
                                    <small><?php echo $contacto['asunto'] ?></small>
                                </div>
                            </div>
                        </div>
                    <?php } 
                    ?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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

    <!-- Inicio Script -->
    <?php
        require_once "../views/estatico/script.php";
    ?>
    <!-- Fin Script -->

</body>

</html>