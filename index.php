	<?php
		include "header.php"; 
		include "lib.php";

		session_start();

		if (isset($_POST['intro']) && autenticar($_POST['id'],$_POST['pass'])) {
			echo "ENTRADO <br>";
			// Insertar include
			// Añadir verificacion empleado
			if(!empty($_POST['empleado'])){
				include "menuEmpleado.php";
			}

		} else if(isset($_POST['intro'])) {
			echo "Usuario o contraseña incorrecta<br>";
			echo "<a href='index.php'>Volver</a>";
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