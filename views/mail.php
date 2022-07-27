<?php
function enviar_mail($correo, $nombres, $nro_cupon){

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'Phpmailer/Exception.php';
  require 'Phpmailer/PHPMailer.php';
  require 'Phpmailer/SMTP.php';
  
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'noreply.pe@smartfit.com';                     //SMTP username
      $mail->Password   = 'Soporte123@';                               //SMTP password
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('noreply.pe@smartfit.com', 'No reply');
      $mail->addAddress($correo, $nombres);     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
  
      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Código del cupón';
      $mail->Body    = 'Este es tu código de cupón.'.$nro_cupon;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'El mensaje fue enviado';
  } catch (Exception $e) {
      echo "El mensaje no se pudo enviar. Error: {$mail->ErrorInfo}";
  }
}
