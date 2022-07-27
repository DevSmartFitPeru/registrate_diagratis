<?php
$mysqli = new mysqli("localhost", "cupon", "Sistemas2021$", "dias_free_mkt");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";


?>