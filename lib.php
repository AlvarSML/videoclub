<?php
/** TODO: Cerrar las conexiones!!!! */

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
        $id = $row['id_usuario'];
    }
    $sql3 = "insert into socio(id_usuario) values($id)";
    $resultado3 = $conexion->query($sql3) or die("ERROR al insertar en empleados");

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

/**
 * Comienza y devuleve una conexion
 * @param ip - IP o direccion de la base de datos
 * @param usaurio - usuario
 * @param pass - contraseña
 * @param bdd - nombre de la base de datos
 */
function start_conection($ip,$usuario,$pass,$bdd){
    $mysqli = new mysqli("localhost","root","","videoclub");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
}

/**
 * crea un registro de video
 * @param nombre
 * @param prota 
 */
function introVideo($nombre,$prota){
    $conexion = start_conection("localhost","root","","videoclub");

    $insert = "INSERT INTO video VALUES (0,NULL'$nombre','$prota');";

    if($conexion->query($insert)){
        echo "Inser correcto";
    } else {
        echo "Error de insert";
    }

    $conexion -> close();
    
}

/**
 * crea un registro de video
 * @param nombre
 * @param autor 
 */
function introDisco($nombre,$autor){

    $conexion = start_conection("localhost","root","","videoclub");

    $insert = "INSERT INTO disco VALUES (0,NULL,'$nombre','$autor');";

    if($conexion->query($insert)){
        echo "Inser correcto";
    } else {
        echo "Error de insert";
        echo $insert;
    }

    $conexion -> close();
    
}

/**
 * Crea una tabla con los datos de una consulta
 * 
 * @param string $tabla - tabla de la query
 * @param string[] $campos - campos a sacar
 * @return HTMLtabla - con datos del select
 */
function verTabla($tabla,$campos){
    $conexion = start_conection("localhost","root","","videoclub");

    $titulo = "";
    $filas = "";

    /**
     * @var cam = $campos (array) pasado a cadena 
     */
    $cam = implode(',',$campos);
    
    for ($i = 0; $i <count($campos); $i++) {
        $titulo .= "<th>".$campos[$i]."</th>";
    }   
    $titulos = "<tr>$titulo</tr>";

    $q = "SELECT $cam FROM $tabla;";
    //echo $q;

    if($res = $conexion -> query($q)){
        //echo "Select en $tabla completado";
        
        while ($row = $res -> fetch_array(MYSQLI_NUM)) {
            $filas .= "<tr>";
            for ($i = 0; $i <= count($row) -1; $i ++) {
                $filas .= "<td>$row[$i]</td>";
            }
            $filas .= "</td>";
        }

    } else {
        echo "Select en $tabla fallido";
    }

    return "<table border='1'>$titulos $filas</table>";
}
?>
