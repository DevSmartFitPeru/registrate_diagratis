<?php

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
$mail->Username   = 'noreply.pe@smartfit.com'; 
$mail->Password = 'Soporte123@';   
$mail->Port = 587;

//Configurar remitentes y destinatarios
$mail->setFrom('noreply.pe@smartfit.com', 'No reply');
$mail->addAddress('luisazanero1991@gmail.com', 'Envio remitente');
//$mail->addReplyTo($email_remitente, 'DEV Luis Azañero Cruz');
//$mail->addBCC($email_consignado);

//Añadimos documentos adjuntos al correo
//$mail->addAttachment($doc);

//Cuerpo del correo electrónico
$mail->isHTML(true);  
$mail->CharSet = "utf-8";
// Set email format to HTML
$mail->Subject = '[ZORE COURIER SOFTWARE] - CODIGO REMITO:';
$mail->Body    = 'Hola <b>Luis:</b><br>Te enviamos la constancia de envio via SmartClinica, ten la seguridad que tu envio sera entregado en excelentes condiciones.<br> Muchas Gracias por la confianza!!!<br>Atte.<br>Equipo de Ventas SoreCourier';
//$mail->AltBody = 'Hola Luis: Te enviamos la constancia de envio vía Courier en SmartClinica, ten la seguridad que tu envio sera entregado en excelentes condiciones.. Muchas Gracias por la confianza!!!.<br>Atte.<br>Equipo de Ventas SoreCourier'; // Si no tienen habilitado el correo HTML

//Enviamos el correo
$mail->send();

echo "Email enviado...";
//Eliminamos el ticket que hemos almacenado temporalmente en el servidor.
//unlink($doc);

}catch (Exception $e) {
    echo "No se ha podido enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}

?>