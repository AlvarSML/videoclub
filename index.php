
	<?php
		include "header.php"; 
		include "lib.php";
		test();
	?>
	<form action="" method="post">
		<p>Usuario: </p>
		<input type="text" name="usuario">
		<p>Contraseña: </p>
		<input type="password" name="pass"><br>
		<input type="checkbox" name="empleado"> Empleado <br>
		<input type="submit" name="intro" value="Intro">
	</form>
</body>
</html>