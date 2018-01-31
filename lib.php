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
function registro(){
?>
<form action="registro.php" method="post">
    <p>Nombre: </p>
    <input type="text" name="usuario">
    <p>Apellidos: </p>
    <input type="text" name="apellidos"><br>
    <p>Contraseña: </p>
    <input type="password" name="pass"><br>
    <input type="checkbox" name="empleado"> Empleado <br>
    <input type="submit" name="nuevo_usuario" value="ACEPTAR">
</form>
<?php
}
function nuevoUsuario($conexion, $nombre, $clave, $apellidos) {
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
    $sql2 = "select * from usuarios where USUARIO='$nombre' and CONTRASENA='$clave'";
    $resultado2 = $conexion->query($sql2);
    if ($resultado2->num_rows > 0) {
        $row = $resultado2->fetch_assoc();
        $id = $row['ID_USUARIO'];
    }
    $sql3 = "insert into usuarios_roles(ID_USUARIO,ID_ROL) values($id,1)";
    $resultado3 = $conexion->query($sql3) or die("ERROR al insertar en usuarios_roles");
    //}
}
?>
