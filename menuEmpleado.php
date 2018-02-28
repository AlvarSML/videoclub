
<form action="nuevo.php" method="post">
    <?php
    if (getPriv($_SESSION['user']) == 2) { 
<<<<<<< HEAD
    ?>
    <input type="submit" name="disc" value="Gestionar discos">
    <input type="submit" name="dvd" value="Gestionar videos">
    <?php
=======
  ?>
  <input type="submit" name="disc" value="Gestionar discos">

  <input type="submit" name="dvd" value="Gestionar videos">
  
  <?php
>>>>>>> fac93e957adcf3195808d031ccd54e7817fad134
    }
    if (getPriv($_SESSION['user']) == 3) {      
        echo "<input type='submit' name='nemp' value='Nuevo empleado'><br>";
    }
    ?>
    <input type="submit" name="exit" value="Cerrar sesion">
</form>

<?php
  if (getPriv($_SESSION['user']) > 2) { 
?>
<form action="alquiler.php" method="post">
<input type="submit" name="alquiler" value="Alquiler">
</form>

<?php
}
?>

<form action="gestionUsuario.php" method="post">
    <input type="submit" name="actAlq" value="Alquileres actuales">
    <input type="submit" name="histAlq" value="Historial de alquileres">
</form>