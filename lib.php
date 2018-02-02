<?php
function formularioInicial(){
?>
<form action="index.php" method="post">
    <p>Usuario: </p>
    <input type="text" name="nombre">
    <p>Contraseña: </p>
    <input type="password" name="pass"><br>
    <input type="checkbox" name="empleado"> Empleado <br>
    <input type="submit" name="intro" value="Intro">
</form>
<form action="registro.php">
    <input type="submit" name="reg" value="Registro">
</form>
<?php
}
function registro(){
?>
<form action="registro.php" method="post">
    <p>Nombre: </p>
    <input type="text" name="usuario">
    <p>Apellidos: </p>
    <input type="text" name="apellidos"><br>
    <p>Contraseña: </p>
    <input type="password" name="pass"><br>
    <input type="submit" name="nuevo_usuario" value="ACEPTAR">
</form>
<?php
}
//incluir y cerrar conexion
function nuevoUsuario( $nombre, $clave, $apellidos) {
	$conexion = start_conection("localhost","root","","videoclub");

    /* $sql = "select * from usuarios where USUARIO='$nombre'";
      if ($resultado->num_rows == 0) { */
    $sql1 = "insert into usuario(pass,nombre,apellidos) values('$clave','$nombre','$apellidos')";
    $resultado1 = $conexion->query($sql1);
    if ($conexion->error) {
        if($conexion->errno == 1062){
            echo "Porfavor introduzca otro nombre de usuario,ese ya existe.";
        }
        //echo "Mensaje de error y codigo de error ", $conexion->error, $conexion->errno;
        return $conexion -> error;
    }
    $sql2 = "select * from usuario where nombre='$nombre' and pass='$clave'";
    $resultado2 = $conexion->query($sql2);
    if ($resultado2->num_rows > 0) {
        $row = $resultado2->fetch_assoc();
<<<<<<< HEAD
        $id = $row['id_usuario'];
    }
    $sql3 = "insert into socio(id_usuario) values($id)";
    $resultado3 = $conexion->query($sql3) or die("ERROR al insertar en empleados");
=======
        $id = $row['ID_USUARIO'];
	}
	
    //$sql3 = "insert into usuarios_roles(ID_USUARIO,ID_ROL) values($id,1)";
    //$resultado3 = $conexion->query($sql3) or die("ERROR al insertar en usuarios_roles");
>>>>>>> 8cdc1f4380749b7cb34b3e2b3abf1c42485e9b01
}
/**
	 * Comprueba un usuario y contraseña
	 * @param empleado Boolean - si es empleado o no
	 * @param id Integer - Id del usuario
	 * @param pass String - Contraseña del usuario
	 */
function autenticar($nombre,$pass){
    $cnx = start_conection("localhost","root","","videoclub");
    $q = "SELECT * FROM usuario WHERE nombre = '$nombre';";
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
