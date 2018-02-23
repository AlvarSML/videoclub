<?php
include "header.php"; 
include "lib.php";
session_start();

echo "<h2>Alquileres activos</h2>";
echo getAlquileres($_SESSION["user"]);

include "footer.php";
?>