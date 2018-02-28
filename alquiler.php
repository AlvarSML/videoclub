<?php
print('<form action="nuevo.php" method="post">');
$conexion = start_conection("localhost","root","","videoclub");
print('<h1>SOCIO</h1>');
$sql1 = "select * from usuario where permiso=1";
$resultado1 = $conexion->query($sql1);
print('Nombre del socio:');
print('<select name="socios">');
for ($i = 0; $i<$resultado1->num_rows;$i++){
    $row = $resultado1->fetch_assoc();
    $idUsuario = $row['id_usuario'];
    $nombreSocio = $row['nombre'];
    $sql = "select * from socio where id_usuario=$idUsuario";
    $resultado = $conexion->query($sql);
    $roww = $resultado->fetch_assoc();
    $idSocio = $row['id_socio'];
    print('<option value="'.$idSocio.'">'.$nombreSocio.'');
    print('</option>');
}
print('</select>');
print('<h1>DISCOS</h1>');
$sql2 = "select * from disco where id_prestamo IS NULL";
$resultado2 = $conexion->query($sql2);
print('Nombre del disco:');
print('<select name="discos">');
for ($i = 0; $i<$resultado2->num_rows;$i++){
    $row = $resultado2->fetch_assoc();
    $nombreDisco = $row['nombre_disco'];
    $idDisco = $row['id_disco'];
    print('<option value="'.$idDisco.'">'.$nombreDisco.'');
    print('</option>');
}
print('</select>');
print('<h1>VIDEOS</h1>');
$sql3 = "select * from video where id_prestamo IS NULL";
$resultado3 = $conexion->query($sql3);
print('Nombre del video:');
print('<select name="videos">');
for ($i = 0; $i<$resultado3->num_rows;$i++){
    $row = $resultado3->fetch_assoc();
    $nombreVideo = $row['nombre_video'];
    $idVideo = $row['id_video'];
    print('<option value="'.$idVideo.'">'.$nombreVideo.'');
    print('</option>');
}
print('</select>');
print('<h1>FECHAS</h1>');
print('Fecha de inicio:');
print('<input type="date" name="fechini" step="1" min="2013-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>');
print('<br/>');
print('Fecha de entrega:');
print('<input type="date" name="fechfin" step="1" min="2013-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>');
print('<br/>');
print('<input type="submit" name="alquilar" value="ALQUILAR">');
print('</form>');
print($_SESSION['user']);
print('<a href="index.php">Volver</a>');
?>