
<form action="nuevo.php" method="post">
 
  <input type="submit" name="alquiler" value="Alquiler">
  <input type="submit" name="dvd" value="Gestionar videos">
  <input type="submit" name="exit" value="Cerrar sesion">
  <?php
    if (getPriv($_SESSION['user']) == 3) {      
      echo "<input type='submit' name='nemp' value='Nuevo empleado'>";
    }
  ?>
</form> 