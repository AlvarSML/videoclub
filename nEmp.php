<form action="#" method="POST">
  Nombre: <input type="text" name="name"><br>
  Apellido: <input type="text" name="ape"><br>
  Contraseña: <input type="password" name="pass"><br>
  Permisos: 
  <select name="permiso">
    <option value="2">Empleado</option>
    <option value="3">Jefe</option>
  </select><br>
  <input type="submit" name="nuemp" value="Intro">
</form>

<?php
  if (isset($_POST['nuemp'])) {

    $nombre = $_POST['name'];
    $apellido = $_POST['ape'];
    $pass = $_POST['pass'];
    $permiso = $_POST['permiso'];


    genericInsert('usuario',["id_usuario","nombre","apellidos","pass","permiso"],[0,"'$nombre'","'$apellido'","'$pass'",$permiso]);
  } else if (isset($_POST['delemp'])) {
    $campo = $_POST['delfield'];
    $val = $_POST['deldata'];
    delRow('usuario',"$campo","$val");
  }

  echo verTabla('usuario',['id_usuario','nombre','apellidos','permiso']);
?>

<form action="#" method="POST">
  Eliminar usuario por campo: <input type="text" name="delfield"><br>
  Que coincida con: <input type="text" name="deldata"><br>
  <input type="submit" name="delemp" value="Eliminar"><br>
  <b>Atencion! podrias borrar mas de un registro si no se usa la id como campo</b>
</form>