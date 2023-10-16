<?php 
$title      = "Fabio Paul - Porfolio";  
include'head.php';
?>

<body>
    <div id="all">
        <div class="cursor"></div>
        <div id="loader">
            <span class="color">Fabio</span>Areco
        </div>
        <div id="breaker">
        </div>
        <div id="breaker-two">
        </div>
        <?php include'header.php';?>
        <div>
            <section style="background:#1a1c1c;">
            <div class="color-changer">
                <div class="color-panel">
                    <img src="images/gear.png" alt="">
                </div>
            </div>
            <div class="contact-header">Mí <span class="color">Contacto</span>
                <div class="contact-header-caption"><span class="color">Estemos </span>en contacto.</div>
            </div>
            </section>
        <section style="background: #1a1c1c; padding-bottom: 5rem;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="fondo-contact">
                        <img class="contact-fondo" src="img/contacto.jpg">
                        <div class="dentro-contact">
                            <div class="contact-info-header" style="text-align:center;">
                                <h4>Información para contactarme</h4>
                            </div>
                            <div class="contact-info-content ">
                                <div class="contect-info-content-line">
                                    <img src="./images/icon-name.png" class="icon" alt="name-icon">
                                    <div class="contact-info-icon-text">
                                        <h6>Fabio Paul Areco Samudio</h6>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="contect-info-content-line">
                                    <img src="./images/icon-location.png" class="icon" alt="location-icon">
                                    <div class="contact-info-icon-text">
                                        <h6>Location</h6>
                                        <p>Capiatá, Paraguay</p>
                                    </div>
                                </div>
                                <div class="contect-info-content-line">
                                    <img src="./images/icon-phone.png" class="icon" alt="phone-icon">
                                    <div class="contact-info-icon-text">
                                        <h6>Call</h6>
                                        <p>+595 972982311</p>
                                    </div>
                                </div>
                                <div class="contect-info-content-line">
                                    <img src="./images/icon-email.png" class="icon" alt="email-icon">
                                    <div class="contact-info-icon-text">
                                        <h6>Gmail</h6>
                                        <p>fabiopaul072003@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-header">
                        </div>
                        <div class="col-md-12"><div class="aviso"></div></div>
                        <form id="contact_form" class="form" method="POST" action="enviar">

                            <div class="input-line">
                                <input id="token" hidden type="text" name="token">
                                <input id="nombre" name="nombre" type="text" placeholder="Nombre" required class="input-name">
                            </div>

                            <input id="email" name="email" type="email" placeholder="Email" class="input-name">

                            <input type="text" name="telefono" id="telefono" placeholder="Teléfeno" class="input-subject">

                            <textarea id="mensaje" name="mensaje" class="input-textarea" placeholder="Mensaje" data-error="Favor complete el campo Mensaje."></textarea>

                            <!--<button type="submit" id="submit" class="btn_enviar_mensaje">Enviar</button>-->
                            <div class="">
                                <button type="submit" id="submit" class=" btn_enviar_mensaje">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>
        </section>
        <section><?php include'footer.php';?></section>
        </div>
     
    </div>
    <!--all the divisions-->
    <script src="js/jquery.min.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/index.js"></script>
    <!--particles script-->
 
    <script src="https://www.google.com/recaptcha/api.js?render=6LfVuZ0UAAAAAISsY0nH4PRXkgvcB23SZj7ZkPXV"></script>
    <script type="text/javascript">
        function alertDismissJS(msj, tipo){
        var salida;
        switch (tipo){
            case 'error':
                /*salida = swal("Error", msj, "error");
                /*salida = "<div class='alert alert-danger'> <i class='fa fa-exclamation-triangle'></i>&nbsp;&nbsp;"+msj+"&nbsp;&nbsp;&nbsp;<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
                         "<span aria-hidden='true'>&times;</span></button></div>";*/
                          salida= `<div class="alert alert-danger  alert-dismissible fade show role="alert">
          <strong>${msj}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
            break;

            case 'error_span':
                salida = "<span id='alerta' class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
                "<span class='glyphicon glyphicon-exclamation-sign'>&nbsp;</span>"+msj+"</span>";
            break;

            case 'warning':
                salida = "<div id='alerta' class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
                "<span class='glyphicon glyphicon-exclamation-sign'>&nbsp;</span>"+msj+"</div>";
            break;

            case 'success':
                /*salida = $.toast({ heading: 'Operación exitosa', text: msj, position: 'top-center', loaderBg:'#008c69', icon: 'success', hideAfter: 3000 });*/
                /*salida = "<div class='alert alert-success'> <i class='fa fa-check-circle'></i>&nbsp;&nbsp;"+msj+"&nbsp;&nbsp;&nbsp;<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
                         "<span aria-hidden='true'>&times;</span></button></div>";*/
                         salida= `<div class="alert alert-success alert-dismissible fade show role="alert">
          <strong>${msj}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
            break;

            case 'success_span':
                salida = "<span id='alerta' class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
                "<span class='glyphicon glyphicon-ok'>&nbsp;</span>"+msj+"</span>";
            break;

            case 'info':
                salida = "<div id='alerta' class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
                "<span class='glyphicon glyphicon-exclamation-sign'>&nbsp;</span>"+msj+"</div>";
            break;
        }
        return salida;
    }

    let createNewToken = () => {
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfVuZ0UAAAAAISsY0nH4PRXkgvcB23SZj7ZkPXV', { action: 'rasi' }).then(function(token) {
                $('#token').val(token);
            });
        });
    }
    createNewToken();
    // SUBMIT Formulario de Contacto
$("#contact_form").submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    $.ajax({
        url: 'enviar',
        dataType: 'json',
        type: 'POST',
        data: formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('.btn_enviar_mensaje').text('Por favor espere...').prop('disabled', true);
        },
        success: function(data) {
            $('.btn_enviar_mensaje').text('Enviar mensaje').prop('disabled', false);
            var status = data.status;
            var mensaje = data.mensaje;

            if (status == 'success') {
                $('#aviso').html(alertDismissJS(mensaje, 'success'));
                // Limpiar formulario
                $('#contact_form').trigger('reset');

                // Ocultar mensaje y recargar captcha
                setTimeout(function() {
                    $('#aviso').html('');

                }, 2500);
            }else{
                 $('#aviso').html(alertDismissJS(mensaje, 'error'));
                // Ocultar mensaje y recargar captcha
                setTimeout(function() {
                    $('#aviso').html('');
                    createNewToken();
                }, 2500);
            }


        },
        error: function(jqXHR, textStatus) {
            $('.btn_enviar_mensaje').text('Enviar mensaje').prop('disabled', false);
            var mensaje = null;
            mensaje = ('Mensaje de error: ' + jqXHR.responseText);
            $('#aviso').html(alertDismissJS(mensaje, 'error')).show();
            createNewToken();
            setTimeout(function() {
                $('#aviso').html('').hide();
            }, 5000);
        }
    });
});

    </script>
</body>

</html>