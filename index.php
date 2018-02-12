<?php
include "header.php"; 
include "lib.php";
session_start();



if ((isset($_POST['intro']) && $auth = autenticar($_POST['nombre'],$_POST['pass'])) || isset($_SESSION['user']) ) {
    echo "ENTRADO <br>";

    if($auth && !isset($_SESSION['user'])) {
        $_SESSION['user'] = $_POST['nombre'];
        $_SESSION['pass'] = $_POST['pass'];
    }

    include "menuEmpleado.php";
} else if(isset($_POST['intro'])) {
    echo "Usuario o contraseña incorrecta<br>";
    echo "<a href='index.php'>Volver</a>";
} else {
    formularioInicial();
} include "footer.php";
?>