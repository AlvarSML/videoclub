<?php
include "header.php"; 
include "lib.php";
session_start();
?>

<form action="nuevo.php" method="post">
  <input type="submit" name="disc" value="Nuevo Disco">
  <input type="submit" name="dvd" value="Nuevo DVD">
</form>

<?php  include "footer.php" ?>