<!DOCTYPE html>
<?php
    session_start();
    $rol = $_SESSION['rol'];
?>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../style.css" />
        <title>Usuarios</title>
    </head>
    <body>
        <?php
	if ($rol == 1) {
	?>
      <main>
        <section>
          <article class="">
            <ul>
              <h3>Menú de gestión de Usuarios</h3>
              <li><a href="../crearUsuario.php">Crear usuario</li>
              <li><a href="../consultarUsuarios.php">Consultar usuario</li>
              <li><a href="../delUsuario.php">Borrar usuario</li>
              <li><a href="../modUsuario.php">Modificar usuario</li>
              <a href="../index.php"><button type="button" name="button">Volver a Inicio</button></a>
            </ul>
          </article>
        </section>
      </main>
        <?php
	} else if ($rol==2){
            print("<h3>Tienes que estar conectado como administrador para poder acceder a esta parte</h3>");
            print("<a href='../logout.php'><button type='button' name='button'>Volver a conectarse</button></a>");
	} else {
            print("<h3>Identifícate para poder acceder a esta sección</h3>");
            print("<a href='../index.php'><button type='button' name='button'>Volver a Inicio</button></a>");
	}
	?>
    </body>
</html>
