<?php
	function abrirConexion() {
		$usuario = "root";
		$contrasena = "";
		$servidor = "localhost";
		$basededatos = "dias_free_mkt";

		$conexion = new mysqli($servidor, $usuario, $contrasena, $basededatos);
		mysqli_query("SET NAMES 'utf8'",$conexion);//UFT para las tildes
		// echo "conexion exitosa";
		if ($conexion->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
		}
		// echo $conexion->host_info . "\n";
		return $conexion;
	}

	function queries($conexion, $consulta) {
		$resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
		return $resultado;
	}

	function transaction($conexion, $consulta) {
		return mysqli_query($conexion, $consulta);
		if (mysqli_query($conexion, $consulta)) {
		    return true;
		} else {
		    return false;
		}
	}

	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}
?>