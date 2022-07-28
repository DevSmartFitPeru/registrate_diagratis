<?php

require '../Phpmailer/PHPMailer.php';

date_default_timezone_set('UTC');

define('SMTP_HOST','smtp.gmail.com');
define('SMTP_PORT',25);
define('SMTP_USERNAME','noreply.pe@smartfit.com');
define('SMTP_PASSWORD','Soporte123@');
define('SMTP_AUTH',false);

$email = 'luis.azanero@smartfit.com';
$firstName = 'Aravind';

$mail = new PHPMailerR();
$mail->IsSMTP();
$mail->SMTPDebug = 1;                 
$mail->SMTPAuth = SMTP_AUTH;                
$mail->Host = SMTP_HOST;
$mail->Port = 25;
$mail->Username = SMTP_USERNAME;
$mail->Password = SMTP_PASSWORD;
$mail->SetFrom(SMTP_USERNAME,'AravindNC.IN');
$mail->AddReplyTo(SMTP_USERNAME,"AravindNC.IN");
$mail->Subject = "Welcome to AravindNC.IN";
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
$mail->MsgHTML('This is a test.');
$mail->AddAddress($email, 'Aravind NC');
$mail->Send();

?>

