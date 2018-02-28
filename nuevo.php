<?php
/**
 * En este archivo se gestiona la creacion de Discos y videos
 */
include "header.php"; 
include "lib.php";
session_start();
if (isset($_POST['disc']) || isset($_POST['ndisco']) || isset($_POST['deldisc'])) {
    include "nDisco.php";  
    if (isset($_POST['ndisco'])) {
        introDisco($_POST['nombre'],$_POST['autor']);
    } else if (isset($_POST['deldisc'])){
        delRow("disco",$_POST['delfield'],$_POST['deldata']);
    }
    echo verTabla('disco',['id_disco','nombre_disco','autor']);
    include "delDisco.php";
} else if (isset($_POST['dvd']) || isset($_POST['ndvd']) || isset($_POST['delvid'])) {
    include "nDvd.php";  
    if (isset($_POST['ndvd'])) {
        $nombre = $_POST['titulo'];
        $prota = $_POST['prota'];
        echo genericInsert("video",[""],[0,"NULL","'$nombre'","'$prota'"]);
    } else if (isset($_POST['delvid'])){
        delRow("video",$_POST['delfield'],$_POST['deldata']);
    }
    echo verTabla('video',['id_video','nombre_video','protagonista']);
    include "delVideo.php";
} else if(isset($_POST['nemp']) || isset($_POST['nuemp']) || isset($_POST['delemp'])) {
    include "nEmp.php";
} else if (isset($_POST['alquiler'])){
    include "alquiler.php";
}else if(isset($_POST['alquilar'])){
    $conexion = start_conection("localhost","root","","videoclub");
    $nombreEmpleado = $_SESSION['user'];
    $sql2 = "select id_usuario from usuario where nombre='$nombreEmpleado'";

    $resultado2 = $conexion->query($sql2) or die ($sql2);
    $row = $resultado2->fetch_assoc();
    $idEmpleado = $row['id_usuario'];
    $idSocio = $_POST['socios'];
    $fechaInicio = $_POST['fechini']; 
    $fechaEntrega = $_POST['fechfin'];
    $fecha1 = date_create($fechaInicio);
    $fecha2 = date_create($fechaEntrega);
    $interval = $fecha1->diff($fecha2);
    $duracion = $interval->format('%a');
    $idDisco = $_POST['discos'];
    $idVideo = $_POST['videos'];

    $sql = "insert into prestamo(empleado,socio,fecha_inicio,duracion,fecha_entrega) values($idEmpleado,$idSocio,'$fechaInicio',$duracion,'$fechaEntrega')";
    $resultado = $conexion->query($sql);
    $sql = "SELECT MAX(id_prestamo) from prestamo";
    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_assoc();
    $idPrestamo = $row['MAX(id_prestamo)'];
    if ($conexion->error) {
        echo "Mensaje de error y codigo de error ", $conexion->error, $conexion->errno;
    }else{
        $sql = "update disco set id_prestamo=$idPrestamo where id_disco=$idDisco";
        $resultado = $conexion->query($sql);
        $sql = "update video set id_prestamo=$idPrestamo where id_video=$idVideo";
        $resultado = $conexion->query($sql);
        echo("El empleado ".$idEmpleado." ha realizado un prestamo al socio ".$idSocio.".<br/>");
        echo("Las fechas del prestamos son : fecha de incio-> ".$fechaInicio." ,fecha de entrega-> ".$fechaEntrega.".<br/>");
        echo("<a href='index.php'>[Volver al menu]</a>");

    }

}else if(isset($_POST['exit'])) {
    session_destroy();
    echo "<a href='index.php'>Volver a Inicio</a>";
} else {
    echo "Error => ";
    print_r($_POST);
}
?>
<?php  include "footer.php" ?>