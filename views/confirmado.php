<?php
header('Content-Type: text/html; charset=UTF-8'); 

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;


  $correo_usuario = $_GET['email'];
  //echo $correo_usuario;
  $nombres = $_GET['nombres'];
  $nro_cupon = $_GET['cuponera'];
  //echo $nombres;

  require '../Phpmailer/Exception.php';
  require '../Phpmailer/PHPMailer.php';
  require '../Phpmailer/SMTP.php';
  
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
      
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPDebug = 2;                      //Enable verbose debug output
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'noreply.pe@smartfit.com';                     //SMTP username
      $mail->Password   = 'Soporte123@';                               //SMTP password
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('noreply.pe@smartfit.com', 'No reply');
      $mail->addAddress($correo_usuario, $nombres);     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
  
      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->CharSet = "utf-8";
      $mail->Subject = 'CODIGO DE CUPON DAY PASS NRO: ( '.$nro_cupon.' ) SMART FIT PERÚ';
      $mail->Body    = 'Hola,<b>'.$nombres.'</b> tu cupon fue asigando con exito, puedes acercarte con tu documento de identidad al Counter de cualquier unidad SmartFit y canjear tu cupon: <b>'.$nro_cupon.'</b> <br><br>Saludos Cordiales, <br><br>
      Equipo de Marketing Smart Fit Perú';
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'El mensaje fue enviado';
  } catch (Exception $e) {
      echo "El mensaje no se pudo enviar. Error: {$mail->ErrorInfo}";
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