	<?php
		include "header.php"; 
		include "lib.php";

		session_start();
		$cnonexion = start_conection("localhost","root","","videoclub");

		if ( isset($_POST['intro'])) {

		} else {

		}
	?>

	<form action="" method="post">
		<p>ID Usuario: </p>
		<input type="text" name="usuario">
		<p>Contraseña: </p>
		<input type="password" name="pass"><br>
		<input type="checkbox" name="empleado"> Empleado <br>
		<input type="submit" name="intro" value="Intro">
		<input type="submit" name="reg" value="Registro">
	</form>

<?php include "footer.php" ?>