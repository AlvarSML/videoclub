<?php
	function autenticar($cnx,$empleado,$id,$pass){
		if ($empleado) {
			$q = "SELECT * FROM empleado WHERE id_usuario = $id;";
		}	else {
			$q = "SELECT * FROM socio WHERE id_usuario = $id;";
		}

		if($resultado = $cnx -> query($q)){
			
		}

		
	}

	function start_conection($ip,$usuario,$pass,$bdd){
		$mysqli = new mysqli($ip, $usuario, $pass, $bdd);

		if ($mysqli->connect_errno) {
    	echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		return $mysqli;
	}

?>
