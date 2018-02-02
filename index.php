<?php
include "header.php"; 
include "lib.php";
session_start();
if (isset($_POST['intro']) && autenticar($_POST['nombre'],$_POST['pass'])) {
    echo "ENTRADO <br>";
    // Insertar include
    // Añadir verificacion empleado
    if(!empty($_POST['empleado'])){
        include "menuEmpleado.php";
    }
} else if(isset($_POST['intro'])) {
    echo "Usuario o contraseña incorrecta<br>";
    echo "<a href='index.php'>Volver</a>";
} else {
    formularioInicial();
} include "footer.php";
?>