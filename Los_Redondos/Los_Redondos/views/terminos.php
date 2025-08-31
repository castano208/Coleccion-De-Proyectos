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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Terminos y Condiciones</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../views/index.php">Inicio</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Terminos y Condiciones</li>
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
                        <div class="mb-5">
                            <h4 class="mb-3">Políticas de Terminos y Condiciones</h4>
                            <p>Esta construcción jurídica de los términos y condiciones en general se encuentra reglamentada por la ley 1480 de 2011 estatuto del consumidor, la ley 1581 de 2012 general de protección de datos personales y las normas y directrices propias de la compañía y el manual de crisis adoptado por la empresa.</p>
                            <h4 class="mb-3">1. Alcance</h4>
                            <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>1.1 Si el Usuario no acepta estos Términos, no podrá acceder a los Servicios y deberá abstenerse de continuar ingresando a los Canales.</li>
                            <br>
                            <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>1.2 Se podrán aplicar condiciones suplementarias a determinados Servicios, como políticas para un evento, una actividad o una promoción particular, dichas condiciones suplementarias se le comunicarán en relación con los Servicios aplicables. Las condiciones suplementarias se establecen además de los Términos, y se considerarán una parte de estas para los Términos aplicables. Las condiciones suplementarias prevalecerán sobre los Términos en caso de conflicto con respecto a los Servicios aplicables.</li>
                            <br>
                            <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>1.3 Al utilizar los Canales y realizar un Pedido a través de cualquiera de estos, el Usuario declara y garantiza ser mayor de 18 años de edad, y contar con plena capacidad jurídica para obligarse de acuerdo con lo previsto en estos Términos.</li>
                            <br>
                            <h4 class="mb-3">2. La Naturaleza de los Servicios</h4>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>2.1 Servicios a Domicilio: en virtud de los cuales el Usuario requerirá los Productos a través de los Canales, los que posteriormente le serán entregados por los Redondos a quien éste designe en la dirección indicada bajo los términos y condiciones indicados más adelante.</li>
                            <br>
                            <h4 class="mb-3">3. Solicitud y entrega del Pedido: El Usuario podrá solicitar su Pedido de la siguiente manera:</h4>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1. Servicio de domicilios: Para efectos de solicitar su Pedido a través de algunos de los Canales, el Usuario deberá:</li>
                            <br>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1.1 Ingresar a la Página Web.</li>
                            <br>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1.2 Diligenciar los datos solicitados.</li>
                            <br>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1.3 Elegir los Productos.</li>
                            <br>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1.4 Confirmar el Pedido.</li>
                            <br>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1.5 Realizar el pago.</li>
                            <br>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>3.1.6 Recibir los Productos en la dirección indicada por el Usuario para efectuar la entrega..</li>
                            <br>
                            <h4 class="mb-3">4. Ley aplicable y de jurisdicción</h4>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>4.1 Los presentes Términos se interpretarán y regirán de acuerdo con lo dispuesto en la legislación aplicable en la República de Colombia. En caso de que surja algún conflicto derivado de la interpretación o ejecución de los presentes Términos, o de la relación entre Los Redondos y el Usuario, éste se resolverá de conformidad con las leyes de la República de Colombia a través de su jurisdicción ordinaria.</li>
                            <br>
                            <h4 class="mb-3">5. Modificación de los Términos</h4>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>5.1 Los Redondos se reservan el derecho de modificar estos Términos en cualquier momento, y a su entera discreción, para lo cual darán a conocer las nuevas condiciones aplicables a través de los Canales.</li>
                            <br>
                            <h4 class="mb-3">6. Participantes</h4>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>6.1 Podrá participar cualquier ciudadano colombiano mayor de 18 años que se encuentre en el territorio de la República de Colombia, y que cumpla con los requisitos exigidos por la Actividad según lo que se señala en estos términos y condiciones.</li>
                            <br>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <footer>
    <?php
        require_once "../views/estatico/footer.php";
    ?>
    </footer>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php
        require_once "../views/estatico/script.php";
    ?>
</body>
</html>