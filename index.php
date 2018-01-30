	<?php
		include "header.php"; 
		include "lib.php";

		session_start();

		if ( isset($_POST['intro'])) {
			autenticar(isset($_POST['empleado']),$_POST['id'],$_POST['pass']);
		} else {

	?>

	<form action="index.php" method="post">
		<p>ID Usuario: </p>
		<input type="text" name="id">
		<p>Contraseña: </p>
		<input type="password" name="pass"><br>
		<input type="checkbox" name="empleado"> Empleado <br>
		<input type="submit" name="intro" value="Intro">
		
	</form>
	<form action="registro.php">
		<input type="submit" name="reg" value="Registro">
	</form>

		<?php } include "footer.php" ?>