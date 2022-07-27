<?php
include "funciones.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $document_type = $_POST['dni'];
  $nro_documento = $_POST['nro_documento'];
  $nombres = $_POST['nombres'];
  $email = $_POST['email'];
  $date_today = date("Y/m/d");
  $canjeado = null;
  
  include "api.php";

    $validar = encontrar_usuario_ss($nro_documento, $email); // 1 o 0
    
    $conexion = abrirConexion();

    // consultar si ya existe el usuario en el sistema
    $queries_select_count = "SELECT COUNT(*) FROM `alumnos` WHERE (nro_documento= '$nro_documento')";
    $query = mysqli_query($conexion, $queries_select_count);
    $array_count = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $user_count = intval($array_count[0]["COUNT(*)"]); // número de usuarios con el dni registrados en la base de datos

    

    if ($user_count > 0){
        $canjeado = "Este usuario ya tiene un cupón canjeado.";
    }else {
        // // insertar alumno en la base de datos
        $query_alumno = "insert into alumnos(tipo_documento, nro_documento, nombres_completos, email, fecha_creacion) values('$document_type','$nro_documento', '$nombres', '$email', '$date_today')";
        mysqli_query($conexion, $query_alumno);

        // // hacer update del cambio de status para el cupón
        //  obtener el primer cupón dispionible para hacer el update
        $get_nro_cupon = "SELECT nro_cupon FROM `códigos_-_free_pass_-_ooh` WHERE nro_documento IS NULL LIMIT 1";
        $query1 = mysqli_query($conexion, $get_nro_cupon);
        $array_cupon = mysqli_fetch_all($query1, MYSQLI_ASSOC);
        $nro_cupon = $array_cupon[0]["nro_cupon"]; // nro de cupon disponible
        // hacer el update en la tabla de los cupones para el usuario ingresado 
        $query_update_cupon = "UPDATE `códigos_-_free_pass_-_ooh` \n";
        $query_update_cupon .= "SET status='canjeado', \n";
        $query_update_cupon .= "nro_documento='$nro_documento', \n";
        $query_update_cupon .= "fecha_canje='$date_today' \n";
        $query_update_cupon .= "WHERE nro_cupon='$nro_cupon';";
        mysqli_query($conexion, $query_update_cupon);

        // redirigir al thankyou page
        header("Location: confirmado.php?email=$email&nombres=$nombres");
        exit();
    }
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if($canjeado != null){
            ?> <style>.error{display: block}</style><?php
        }
    ?>
</head>

<body>
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h2>Dias Gratis - Day Pass</h2>
            <form action="" method="POST">
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
                    <p class=""> <?php 
                    echo "
                    <script> Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Este usuario ya tiene un cupón canjeado.'
                      });</script>";
                    ?>
                    </p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
