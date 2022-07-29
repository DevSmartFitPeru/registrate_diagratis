<?php

  $correo_usuario = $_GET['email'];
  //echo $correo_usuario;
  $nombres = $_GET['nombres'];
  $nro_cupon = $_GET['cuponera'];
  //echo $nombres;
    //ENVIO DE CORREO
    require('../public/phpmailer/src/PHPMailer.php');
    require('../public/phpmailer/src/SMTP.php');
    require('../public/phpmailer/src/Exception.php');
    require('../public/phpmailer/src/OAuth.php');
    
// Inicializamos PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
//Configuración de PHPMailer
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure ='tls';
$mail->Host = 'smtp.gmail.com';//'smtp.gmail.com';
$mail->Username   = 'luis.azanero@smartfit.com'; 
$mail->Password = 'quxoncksdixbkyid';   
$mail->Port = 587;

//Configurar remitentes y destinatarios
$mail->setFrom('luis.azanero@smartfit.com', 'No reply');
$mail->addAddress($correo_usuario, $nombres);
//$mail->addReplyTo($email_remitente, 'DEV Luis Azañero Cruz');
//$mail->addBCC($email_consignado);

//Añadimos documentos adjuntos al correo
//$mail->addAttachment($doc);

//Cuerpo del correo electrónico
$mail->isHTML(true);  
$mail->CharSet = "utf-8";
// Set email format to HTML
$mail->Subject = 'CODIGO DE CUPON DAY PASS NRO: ( '.$nro_cupon.' ) SMART FIT PERÚ';
$mail->Body    = 'Hola,<b>'.$nombres.'</b> tu cupon fue asigando con exito, puedes acercarte con tu documento de identidad al Counter de cualquier unidad SmartFit y canjear tu cupon: <b>'.$nro_cupon.'</b> <br><br>Saludos Cordiales, <br><br>
      Equipo de Marketing Smart Fit Perú';

//Enviamos el correo
$mail->send();

//echo "Email enviado...";
//Eliminamos el ticket que hemos almacenado temporalmente en el servidor.
//unlink($doc);

}catch (Exception $e) {
    echo "No se ha podido enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://www.smartfit.com.pe/packs/media/apple-icon-57x57-2947bd46.png">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Confirmado</title>
</head>
<body>
  <div class="popup">
    <img src="404-tick.png">
    <h2>Cupon enviado con Exito!</h2>
    <p>"Ya generaste tu cupón de 1 DÍA GRATIS. Te llegará un código al correo <?php echo $correo_usuario?> registrado.
    Puedes canjearlo en cualquier sede Smart Fit Perú</p>
    <a href="https://www.smartfit.com.pe/" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Ir Site SmartFit</a>
  </div>
</body>
</html>