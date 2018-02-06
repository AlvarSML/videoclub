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
} else if(isset($_POST['exit'])) {
  session_destroy();
  echo "<a href='index.php'>Volver a Inicio</a>";
} else {
  echo "Error";
  print_r($_POST);
}

?>

<?php  include "footer.php" ?>