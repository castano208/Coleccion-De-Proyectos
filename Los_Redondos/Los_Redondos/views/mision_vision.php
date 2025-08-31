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
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <?php
        require_once "../views/estatico/navbar.php";
        ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Misión y Visión</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../views/index.php">Inicio</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Misión y Visión</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Inicio contenido principal -->
        <div class="col-lg-10 container-xxl position-relative p-0">
            <div class="card-body">
              <h1 class="mb-4">Misión</h1>
              <p class="mb-4">Somos una empresa del sector alimenticio que contribuye al mejoramiento economico, social y cultural; mediante la entrega de servicios y productos determinados por los principios y valores cooperativos. Teniendo siempre presente la responsablidad social y colectiva, la solidaridad, el compromiso, la integridad, la transparencia y la calidad de cada uno de nuestros productos y servicios.</p>
            </div>
          </div>
        <div class="col-lg-10 container-xxl position-relative p-0">
          <div class="card-body">
            <h1 class="mb-4">Visión</h1>
            <p class="mb-4">Ser una empresa del sector alimenticio reconocida a nivel nacional por sus valores y variedad de platos, ofreciendo servicios y beneficios de buena calidad y con responsabilidad social, que conlleven al cumplimiento de sus expectativas personales.</p>
          </div>
        </div>
        <!-- Fin contenido principal -->

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