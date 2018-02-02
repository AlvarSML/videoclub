<?php
include "header.php"; 
include "lib.php";
session_start();
<<<<<<< HEAD
$conexion = start_conection("localhost","root","","videoclub");
=======

>>>>>>> 8cdc1f4380749b7cb34b3e2b3abf1c42485e9b01
if (isset($_REQUEST['reg'])) {
    registro();
}
if (isset($_REQUEST['nuevo_usuario'])) {
    $nombre = $_REQUEST['usuario'];
    $clave = $_REQUEST['pass'];
    $apellidos = $_REQUEST['apellidos'];
<<<<<<< HEAD
    $error = nuevoUsuario($conexion, $nombre, $clave,$apellidos);
    if($error != ""){
=======
    $error = nuevoUsuario($nombre, $clave,$apellidos);
    if($error != " "){
>>>>>>> 8cdc1f4380749b7cb34b3e2b3abf1c42485e9b01
        echo ("Error");
        registro();
    }else{
        echo ("REgistro insertado");
        formularioInicial();
    }
}
?>
