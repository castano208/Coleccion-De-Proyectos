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
                <span class="sr-only"> Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <?php
        require_once "../views/estatico/navbar.php";
        ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Ficha técnica</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../views/index.php">Inicio</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Ficha técnica</li>
                        </ol>
                    </nav>
                </div>
            </div>
    </div>
    <!-- Navbar & Hero End -->

    <section>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="../assets/img/pierna-de-pollo (1).png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">Restaurante Los Redondos</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Barrio San Antonio - Guarne</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Martes a Domingo - 9:00a.m. - 6:00p.m.</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Descripción Del Proyecto</h4>
                            <p>El restaurante Los Redondos, ubicado en el Barrio San Antonio - Guarne, ofrece sus servicios en todo el sector de Guarne. Están disponibles de martes a domingo, en horario de 9 de la mañana a 6 de la tarde. Es un negocio caracterizado por la buena atención, la calidad de los alimentos y los precios accesibles.</p>
                            <h4 class="mb-3">Tecnologías Utilizadas</h4>
                            <p>Para llevar a cabo nuestro proyecto del restaurante Los Redondos utilizamos los siguientes lenguajes, herramientas y estructuras:</p>    
                            <ul class="list-unstyled">
                            <h6 class="mb-3">Lenguajes:</h6>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>HTML 5</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>PHP</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>JavaScript</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>CSS3</li>
                                <br>
                            <h6 class="mb-3">Herramientas</h6>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>PHP MySQL</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Visual Studio Code</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Bootstrap</li>
                                <br>
                            <h6 class="mb-3">Estructuras y Arquitecturas</h6>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Estructura MVC</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Programación Estructurada</li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Modelo Relacional</h4>
                            <a target="_blank" href="../assets/img/base_de_datos.PNG"><img class="flex-shrink-0 img-fluid border rounded" src="../assets/img/icons/pdf.svg.png" alt="" style="width: 80px; height: 80px;"></a>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Requisitos</h4>
                            <a class="text-dark" target="_blank" href="../assets/documentos/Formato de Requerimientos Los Redondos.docx.pdf"><img class="flex-shrink-0 img-fluid border rounded" src="../assets/img/pdf.png" alt="" style="width: 80px; height: 80px;"><br>Formato de requerimientos</a><br><br>
                            <a class="text-dark" target="_blank" href="../assets/documentos/Los_Redondos.pdf"><img class="flex-shrink-0 img-fluid border rounded" src="../assets/img/pdf.png" alt="" style="width: 80px; height: 80px;"><br>Identificación de requisitos</a>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Presentación</h4>
                            <a class="text-dark" target="_blank" href="../assets/documentos/Presentacion_Proyecto_Los_Redondos.pdf"><img class="flex-shrink-0 img-fluid border rounded" src="../assets/img/pdf.png" alt="" style="width: 80px; height: 80px;"><br>Presentación</a><br><br>
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

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
                        