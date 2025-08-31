    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/wow/wow.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/counterup/counterup.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
    
    <script src="../../assets/js/sweetalert.js"></script>

    <script>
    $('#Enviar').click(function() {
        var producto = document.getElementById('producto').value;
        var cantidad = document.getElementById('cantidad').value;
        var empleado = document.getElementById('empleado').value;
        var ruta = "pro=" + producto + "&can=" + cantidad + "&emp=" + empleado;

        $.ajax({
                url: 'estatico/respuesta.php',
                type: 'POST',
                data: ruta,
            })

            .done(function(res) {
                $('#respuesta').html(res)
            })

    })
    </script>
    <script>
    $('#Enviar').click(function() {
        var producto = document.getElementById('producto').value;
        var cantidad = document.getElementById('cantidad').value;
        var empleado = document.getElementById('empleado').value;
        var ruta = "pro=" + producto + "&can=" + cantidad + "&emp=" + empleado;

        $.ajax({
                url: 'estatico/boton.php',
                type: 'POST',
                data: ruta,
            })

            .done(function(res) {
                $('#respuesta4').html(res)
            })

    })
    </script>
    <script>
        $('#Enviar').click(function() {
            var producto = document.getElementById('producto').value;
            var cantidad = document.getElementById('cantidad').value;

            var ruta = "pro=" + producto + "&can=" + cantidad;

            $.ajax({
                    url: 'estatico/descripcion.php',
                    type: 'POST',
                    data: ruta,
                })

                .done(function(res) {
                    $('#respuesta2').html(res)
                })

        })
    </script>
    <script>
        $('#Enviar').click(function() {
            var producto = document.getElementById('producto').value;
            var cantidad = document.getElementById('cantidad').value;

            var ruta = "pro=" + producto + "&can=" + cantidad;

            $.ajax({
                    url: 'estatico/imagen.php',
                    type: 'POST',
                    data: ruta,
                })

                .done(function(res) {
                    $('#respuesta3').html(res)
                })

        })
    </script>
    <script>
            $('#Enviar').click(function() {
                var producto = document.getElementById('producto').value;
                var cantidad = document.getElementById('cantidad').value;

                var ruta = "pro=" + producto + "&can=" + cantidad;

                $.ajax({
                        url: 'estatico/cantidad.php',
                        type: 'POST',
                        data: ruta,
                    })

                    .done(function(res) {
                        $('#respuesta6').html(res)
                    })

            })
        </script>
    
    <style>
        .sweet-warning{
            background-color: #f5365c;
        }
        .sweet-warning:not([disabled]):hover{
            background-color: #a71c1c;
        }
    </style>

    <script>
    function ExitosoA(){
        swal.fire({ title: "¡Producto seleccionado con exito!",
         icon: "success",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "./ver_Carrito.php";
        }
        });
    }
    
        </script>
    <script>
    function FaltaA(){
        swal.fire({ title: "¡Falta uno de los campos!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../modalcarrito.php";
        }
        });
    }
    </script>

    <script>
    function InicioR(){
        swal.fire({ title: "¡Debe iniciar sesión para poder realizar un pedido!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../login.php";
        }
        });
    }
    </script>

    <script>
    function ErrorE(){
        swal.fire({ title: "¡Debes seleccionar el empleado que lo(a) atendio por primera vez!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../modalcarrito.php";
        }
        });
    }
    </script>

    <script>
    function ErrorRN(){
        swal.fire({ title: "¡Debes seleccionar una cantidad permitida del producto!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-warning'},
        },

        type: "success"}).then(okay => {
        if (okay) {
         window.location.href = "../modalcarrito.php";
        }
        });
    }
    </script>
