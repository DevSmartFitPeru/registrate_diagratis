<?php
	function abrirConexion() {
		$usuario = "cupon";
		$contrasena = "Sistemas2021$";
		$servidor = "localhost";
		$basededatos = "dias_free_mkt";

		$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de BD");
		$db = mysqli_select_db($conexion, $basededatos) or die ( "No se ha encontrado la base de datos" );
		echo "conectado";
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