<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$to = "sergio.zapata.sepulveda.1@gmail.com"; // Nuestro correo de contacto

// recogeremos los datos del formulario
$nombre = $_POST['name'];
$email = $_POST['email'];
$asunto = 'Mensaje desde ImpresionChile.cl';
$mensaje = nl2br($_POST['mensaje']);

if($nombre == "" || $email == "" || $asunto == "" || $mensaje == ""):
	echo '<div class="alert alert-danger">Todos los campos son requeridos para el envio</div>';
else:

	$mail->From = $email;
	$mail->addAddress($to); //"sergio.zapata.sepulveda.1@gmail.com"
	$mail->Subject = $asunto; // 'Mensaje desde ImpresionChile.cl'
	$mail->isHtml(true);
	$mail->Body = '<strong>Mensaje:</strong><p>'.$mensaje.'</p><br><br>Enviado por <strong>'.$nombre.'</strong><p>Responder a: <strong>'.$email.'</strong><p>';
//	$mail->Body = '<strong>'.$nombre.'</strong> le ha contactado desde su web, y le ha enviado el siguiente mensaje: <br><p>'.$mensaje.'</p>';


	$mail->CharSet = 'UTF-8';
	$mail->send();


endif;

?>
