<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function file_get_contents_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

if (isset($_REQUEST['token']) && !empty($_REQUEST['token'])) {

    $secret         = '6LfVuZ0UAAAAAKA3cmBNr0epGv2l79WM-_RzThPy';
    $verifyResponse = file_get_contents_curl('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_REQUEST['token']);

    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {

        //contact form submission code
        $nombre       = strip_tags($_POST['nombre']);
        $email        = $_POST['email'];
        $telefono     = strip_tags($_POST['telefono']);
        $mensaje      = strip_tags($_POST['mensaje']);
        $email_domain = preg_replace('/^[^@]++@/', '', $email);

        require 'PHPMailer/vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {

            switch (true) {
                case (!empty($_SERVER['HTTP_X_REAL_IP'])): $ip       = $_SERVER['HTTP_X_REAL_IP'];
                case (!empty($_SERVER['HTTP_CLIENT_IP'])): $ip       = $_SERVER['HTTP_CLIENT_IP'];
                case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                default:$ip                                          = $_SERVER['REMOTE_ADDR'];
            }

            if (empty($nombre)) {
                $salida = ["status" => "error", "mensaje" => "Error. Por favor especifique un Nombre y Apellido"];
                echo json_encode($salida);
                exit;
            }
            if (empty($email)) {
                $salida = ["status" => "error", "mensaje" => "Error. Por favor especifique un Correo Electrónico"];
                echo json_encode($salida);
                exit;
            }
            if (empty($telefono)) {
                $salida = ["status" => "error", "mensaje" => "Error. Por favor especifique un Número de Teléfono"];
                echo json_encode($salida);
                exit;
            }
            if (empty($mensaje)) {
                $salida = ["status" => "error", "mensaje" => "Error. Por favor especifique un Mensaje"];
                echo json_encode($salida);
                exit;
            }
            if ((bool) checkdnsrr($email_domain, 'MX') == false) {
                $salida = ["status" => "error", "mensaje" => "Error. El correo " . $email . " no es válido"];
                echo json_encode($salida);
                exit;
            }

            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = 'mail.freelancerpy.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'app@freelancerpy.com';
            $mail->Password   = 'y4d]kt[IHt9P';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->setLanguage('es');
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('app@freelancerpy.com', 'Consulta desde Portfolio Web');
            $mail->addAddress("fabiopaul072003@gmail.com");

            $mail->isHTML(true);

            $mail->Subject = 'Consulta desde Portfolio Web';
            $mail->Body    = "
				<h3 style='font-size:12px;font-family:tahoma;font-weight:bold;border-bottom:1px dotted #ccc;'>Consulta desde la web de Astillero Rasi S.R.L.</h3>\r\n
				<p style='font-size:12px;font-family:tahoma;'><b>Nombre: </b>" . $nombre . "</p>
				<p style='font-size:12px;font-family:tahoma;'><b>Email: </b>" . $email . "</p>
				<p style='font-size:12px;font-family:tahoma;'><b>Teléfono: </b>" . $telefono . "</p>
				<p style='font-size:12px;font-family:tahoma;'><b>IP: </b>" . $ip . "</p>
				<p style='font-size:12px;font-family:tahoma;'><b>Mensaje: </b><br>" . nl2br($mensaje) . "</p>
			";

            $mail->send();
            $salida = ["status" => "success", "mensaje" => "Gracias por escribirnos! En breve nos pondremos en contacto con usted"];
            echo json_encode($salida);
            exit;
        } catch (Exception $e) {
            $salida = ["status" => "error", "mensaje" => "Error. Correo no pudo enviarse. {$mail->ErrorInfo}"];
            echo json_encode($salida);
            exit;
        }

    } else {

        $salida = ["status" => "error", "mensaje" => "Error al validar el formulario. Favor reitente la operación"];
        echo json_encode($salida);
        exit;

    }

} else {

    $salida = ["status" => "error", "mensaje" => "Error. Tuvimos problemas en validar el token"];
    echo json_encode($salida);
    exit;

}
