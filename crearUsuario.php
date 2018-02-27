<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
        <title>Videoclub</title>
    </head>
    <body>
        <?php

            $conexion = mysql_connect("localhost", "root", "")
                    or die ("Imposible conectar con el servidor");

            mysql_set_charset("utf8");

            mysql_select_db("videoclub")
                    or die ("No se puede conectar con la base de datos");

        ?>
        <form method="post" action="crearUsuario.php">
            <h2>Creación de usuarios</h2>
            Login:
            <input type="text" name="login"/><br/><br/>
            Contraseña:
            <input type="password" name="pass"/><br/><br/>
            Empleado:
            <select name="empleados">
                <?php
                    $conexion = mysql_connect("localhost", "root", "")
                            or die ("Imposible conectar con el servidor");

                    mysql_query("SET NAMES 'utf8'");

                    mysql_select_db("videoclub")
                            or die ("No se puede conectar con la base de datos");

                    $consulta_usuario = "SELECT * FROM empleado";
                    $resultado_sesion = mysql_query($consulta_usuario);

                    // Devuelve el número de filas de la consulta.
                    $nfilas = mysql_num_rows($resultado_sesion);

                    for($i = 0; $i<$nfilas; $i++){
                        $resultado = mysql_fetch_array ($resultado_sesion);
                        print "<option value='".$resultado['id_empleado']."'>".$resultado['nombre_empleado']."</option>";
                    }
                ?>
            </select>
            <p><input type="submit" name="enviar" value="Enviar" /></p><br/>
            <a href='menu/Usuario.php'><button type='button' name='button'>Volver a menú Usuario</button></a>
        </form>
        <?php
            if (isset($_REQUEST['enviar'])) {
                @$login = $_REQUEST["login"];
                @$pass = $_REQUEST["pass"];

                $creacion_usuarios = "INSERT INTO usuarios (id,login,pass,id_empleado) VALUES "
                        ."(null,'".$login."','".$pass."',".$_POST["empleados"].")";
                $resultado_creacion = mysql_query($creacion_usuarios);

                print "El usuario creado es: $login <br/>";
            }
        ?>
    </body>
</html>
