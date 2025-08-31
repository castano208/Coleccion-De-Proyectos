<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once "../views/estatico/head.php";
    ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <?php
        require_once "../views/estatico/navbar.php";
        ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contáctenos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../views/index.php">Inicio</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contáctenos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contáctenos</h5>
                    <h1 class="mb-5">Contáctanos por alguna pregunta, comentario o sugerencia.</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.870894261609!2d-75.44447638604896!3d6.280698627682747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4427b88cca0e75%3A0x922486743cdfac48!2sLos%20Redondos!5e0!3m2!1ses!2sco!4v1651615913811!5m2!1ses!2sco"
                            width="550" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="../controller/contactenos_Controller.php?requestCo=addCoP" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Su nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                                            <label for="email">Su Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="asunto" class="form-control" id="subject" placeholder="Subject" required>
                                            <label for="subject">Asunto</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="mensaje" placeholder="Leave a message here" id="message" style="height: 150px" required></textarea>
                                            <label for="message">Mensaje</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Enviar Mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


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