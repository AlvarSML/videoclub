
<form action="nuevo.php" method="post">
<<<<<<< HEAD
 
  <input type="submit" name="alquiler" value="Alquiler">
=======
  <?php
    if (getPriv($_SESSION['user']) == 2) { 
  ?>
  <input type="submit" name="disc" value="Gestionar discos">
>>>>>>> 86d465bc47b014d92b5a8dc27e850137491b5260
  <input type="submit" name="dvd" value="Gestionar videos">
 
  <?php
    }

    if (getPriv($_SESSION['user']) == 3) {      
      echo "<input type='submit' name='nemp' value='Nuevo empleado'><br>";
    }
  ?>
  <input type="submit" name="exit" value="Cerrar sesion">
</form>
<form action="gestionUsuario.php" method="post">
  <input type="submit" name="actAlq" value="Alquileres actuales">
  <input type="submit" name="histAlq" value="Historial de alquileres">
</form>