<?php
  $correo_usuario = $_GET['email'];
  echo $correo_usuario;
  $nombres = $_GET['nombres'];
  echo $nombres;

  // <?php
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;

  // require 'Phpmailer/Exception.php';
  // require 'Phpmailer/PHPMailer.php';
  // require 'Phpmailer/SMTP.php';

  // //Create an instance; passing `true` enables exceptions
  // $mail = new PHPMailer(true);

  // try {
  //     //Server settings
  //     $mail->SMTPDebug = 0;                      //Enable verbose debug output
  //     $mail->isSMTP();                                            //Send using SMTP
  //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  //     $mail->Username   = '@smartfit.com';                     //SMTP username
  //     $mail->Password   = 'secret';                               //SMTP password
  //     $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  //     $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //     //Recipients
  //     $mail->setFrom('noreply.pe@smartfit.com', 'No reply');
  //     $mail->addAddress($correo_usuario, $nombres);     //Add a recipient
  //     //Content
  //     $mail->isHTML(true);                                  //Set email format to HTML
  //     $mail->Subject = 'Prueba de php mailer';
  //     $mail->Body    = 'Correo de prueba';

  //     $mail->send();
  //     echo 'Message has been sent';
  // } catch (Exception $e) {
  //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  // }

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
    <h2>Gracias!</h2>
    <p>"Ya generaste tu cupón de 1 DÍA GRATIS. Te llegará un código al correo registrado.
    Puedes canjearlo en cualquier sede Smart Fit Perú</p>
    <a href="https://www.smartfit.com.pe/" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Ir Site SmartFit</a>
  </div>
</body>
</html>