<?php
include "header.php"; 
include "lib.php";
session_start();
$conexion = start_conection("localhost","root","","videoclub");
if (isset($_REQUEST['reg'])) {
    registro();
}
if (isset($_REQUEST['nuevo_usuario'])) {
    $nombre = $_REQUEST['usuario'];
    $clave = $_REQUEST['pass'];
    $apellidos = $_REQUEST['apellidos'];
    $error = nuevoUsuario($conexion, $nombre, $clave,$apellidos);
    if($error != ""){
        echo ("Error");
        registro();
    }else{
        echo ("REgistro insertado");
        formularioInicial();
    }
}
?>
