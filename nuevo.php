<?php
include "header.php"; 
include "lib.php";
session_start();

if (isset($_POST['disc']) || isset($_POST['ndisco'])) {
  include "nDisco.php";

  if (isset($_POST['ndisco'])) {
    introDisco($_POST['nombre'],$_POST['autor']);
  }

} else if (isset($_POST['dvd']) || isset($_POST['nvideo'])) {
  include "nDvd.php";

  if (isset($_POST['ndvd'])) {
    introVideo($_POST['titulo'],$_POST['prota']);
  }

} else {
  echo "Error";
}

?>

<?php  include "footer.php" ?>