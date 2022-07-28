<?php

$nro_dni = $_GET['dni'];
$nombres = $_GET['nombres'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://www.smartfit.com.pe/packs/media/apple-icon-57x57-2947bd46.png">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Error en Registro</title>
</head>
<body>
  <div class="popup">
    <img src="404-tick.png">
    <h2>Importante!</h2>
    <p>"<b><?php echo $nombres?> </b>Verificamos que ya tienes un cupon asignado a tu numero de documento de indentidad: <b><?php echo $nro_dni?></b>. Esta promoción es valida solo un Cupon por cliente."</p>
    <a href="https://www.smartfit.com.pe/" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Ir Site SmartFit</a>
  </div>
</body>
</html>