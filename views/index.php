<?php
include "funciones.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $document_type = $_POST['dni'];
  $nro_documento = $_POST['nro_documento'];
  $nombres = $_POST['nombres'];
  $email = $_POST['email'];

  if(empty($_POST['nro_documento'])){
    $document_error = "Por favor, ingrese el documento.";
  }
  elseif(empty($_POST['nombres'])){
    $names_error = "Por favor, ingrese sus nombres completos.";
  }
  elseif(empty($_POST['email'])){
    $email_error = "Por favor, ingrese su email.";
  }

  if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
      $to = "".$email;
      $subject = "Confirmación de email";
      $body = "";
 
      $body .= "From: Smartfit". "\r\n";
      $body .= "Email: "."smartfit@smartfit.com". "\r\n";
      $body .= "Message: ". "\r\n
      mail($to, $subject, $body);
      $message_sent = true;
  }else {
    $invalid_class_name = "form-invalid";
 
$conexion = abrirConexion();
// $queries_select_count = "SELECT COUNT(*) FROM `cupones` WHERE (nro_documen= '$nro_documento')";
// $canjeado = "";
// if (queries_select_count > 0){
//   $canjeado = "Este usuario ya tiene un cupón canjeado.";
// }
// else {
//     $date_today = "".date("Y/m/d");
//     $query_insert_cupon = "insert into cupones(nro_documento, fecha_canjvalues('$nro_documento', '$date_today')";
//     $query_update_cupon = "update `cupones` set status='canjeado' whenro_documento = '$nro_documento'";
//     $query_alumno = "insert into alumnos(tipo_documento, nro_documentnombres_completos, email, fecha_creacion) values('$document_type$nro_documento', '$nombres_completos', '$email', '$date_today')";
//     queries($conexion, $query_insert_cupon);
//     queries($conexion, $query_update_cupon);
//     queries($conexion, $query_alumno);
// }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://www.smartfit.com.pe/packs/media/apple-icon-57x57-2947bd46.png">
    <meta charset="utf-8">
    <title>Dias Gratis SmartFit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Dias Gratis - Day Pass</h1>
            <form action="confirmado.php" method="POST">
                <div class="form-group">
                    <label for="username">Tipo Documento:</label>
                    <select name="dni" class="form-control" id="cars">
                        <option value="DNI">DNI</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Carnet de Extrangeria">Carnet de Extranjeria</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="email">Nro. Documento:</label>
                    <input type="text" class="form-control" name="nro_documento" id="nro_documento" placeholder="Ingrese NRO. Documento" required>
                    <span><?php if(isset($document_error)) $document_error ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Nombres y Apellidos:</label>
                    <input type="nombres_apellidos" class="form-control" name="nombres" id="nombres" placeholder="Ingrese nombes y apellidos completos" required>
                    <span><?php if(isset($names_error)) $names_error ?></span>
                </div>
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" name="email" id="pwd" placeholder="Ingrese email" required>
                    <span><?php if(isset($email_error)) $email_error ?></span>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" id="cbox1" value="first_checkbox" required> Autorizo a Smart Fit para el uso de <a href="assets\pdf\Solicitud original.pdf" download>tratamiento de datos</a> y acepto los <a href="assets\pdf\Solicitud original.pdf" download>términos y condiciones</a> del beneficio</label><br>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
