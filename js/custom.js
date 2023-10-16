function alertDismissJS(msj, tipo) {
    var salida;
    switch (tipo) {
        case 'warning':
            salida = "<div class='alert alert-warning alert-dismissible' role='alert'><strong>Advertencia! </strong>"+ msj +"</div>";
            break;

        case 'error':
            salida = "<div class='alert alert-danger alert-dismissible alert-lg alert-lg' role='alert'> "+ msj +" </div>";
            break;

        case 'info':
            salida = "<div class='alert alert-info alert-dismissible' role='alert'><strong>Info! </strong> "+ msj +" </div>";
            break;

        case 'ok':
            salida = "<div class='alert alert-success alert-dismissible alert-lg' role='alert'> "+ msj +" </div>";
            break;

        case 'ok_span':
            salida = "<span id='alerta' class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" +
                "<span class='glyphicon glyphicon-ok'>&nbsp;</span>" + msj + "</span>";
            break;

        case 'info':
            salida = "<div id='alerta' class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" +
                "<span class='glyphicon glyphicon-exclamation-sign'>&nbsp;</span>" + msj + "</div>";
            break;
    }
    return salida;
}