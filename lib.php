<?php
	/**
	 * Comprueba un usuario y contraseña
	 * @param empleado Boolean - si es empleado o no
	 * @param id Integer - Id del usuario
	 * @param pass String - Contraseña del usuario
	 */
	function autenticar($id,$pass){
		$cnx = start_conection("localhost","root","","videoclub");

		$q = "SELECT * FROM usuario WHERE id_usuario = $id;";

		if ($resultado = $cnx -> query($q)){
			if ($resultado -> num_rows === 0){
				echo "No Existe el usuario";
				return FALSE;
			} else {
				$arr = $resultado -> fetch_assoc();
				if ($arr['pass'] == $pass){
					return TRUE;
				} else {
					echo "contraseña icorrecta";
					return FALSE;
				}
			}
		} else {
			echo "Error";
		}

		$cnx -> close();
	}

	function start_conection($ip,$usuario,$pass,$bdd){
		$mysqli = new mysqli($ip, $usuario, $pass, $bdd);

		if ($mysqli->connect_errno) {
    	echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		return $mysqli;
	}

?>
