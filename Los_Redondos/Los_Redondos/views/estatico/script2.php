<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/lib/wow//wow.min.js"></script>
    <script src="../../assets/lib/easing/easing.min.js"></script>
    <script src="../../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assets/lib/counterup/counterup.min.js"></script>
    <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>

    <script src="../../assets/js/sweetalert.js"></script>


    <script>
        $('#Enviar').click(function() {
            var cantidad = document.getElementById('cantidad').value;
            var producto = document.getElementById('id_producto').value;

            var ruta = "can=" + cantidad + "&pro=" + producto ;

            $.ajax({
                    url: 'peticion_valor_agregar.php',
                    type: 'POST',
                    data: ruta,
                })
            
                .done(function(res) {
                    $('#respuesta').html(res)
                })

        })
    </script>
    <script>
        $('#Enviar2').click(function() {
            var cantidad = document.getElementById('cantidad').value;
            var producto = document.getElementById('id_producto').value;
            var total = document.getElementById('total').value;

            var ruta = "can=" + cantidad + "&pro=" + producto ;

            $.ajax({
                    url: 'peticion_valor_eliminar.php',
                    type: 'POST',
                    data: ruta,
                })

                .done(function(res) {
                    $('#respuesta2').html(res)
                })

        })
    </script>

<script>
    function ExitosoC(){
        swal.fire({ title: "¡Cantidad agregada con exito!",
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
    function CantidadR(){
        swal.fire({ title: "¡No ingresar un valor mayor al que se encuentra en su carrito de compras!",
         icon: "error",
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
        function FaltaD(){
        swal.fire({ title: "¡Falta la cantidad.",
         icon: "error",
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
        function FaltaP(){
        swal.fire({ title: "¡Falta el producto!",
         icon: "error",
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
    function ExitosE(){
        swal.fire({ title: "¡Producto eliminado con éxito del carrito!",
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
        function ExitosCE(){
            swal.fire({ title: "¡Cantidad eliminada con éxito!",
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
    function ExitosT(){
        swal.fire({ title: "¡Productos seleccionados con éxito, su pedido será enviado a la direción indicada en su registro!",
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
        function NuevaCant(){
        swal.fire({ title: "¡Parece que occurrio una compra debido a esto modificaremos su cantidad por una nueva!",
         icon: "error",
         buttons: {
        confirm : {text:'OK',className:'sweet-success'},
        },

        type: "success"}).then(okaya => {
        if (okaya) {
         window.location.href = "./ver_Carrito.php";
        }
        });
    }
    </script>
    <script>
        function UpdateEliCant(){
        swal.fire({ title: "¡Parece que el pruducto ya se encuentra agotado por ello eliminaremos el producto de su carrito de compras!",
         icon: "error",
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
        function EliminareRR(){
        swal.fire({ title: "¡La cantidad seleccionada es mayor a la que se encuentra disponible!",
         icon: "error",
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