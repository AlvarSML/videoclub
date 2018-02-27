<?php
include "header.php"; 
include "lib.php";
session_start();

echo "<h2>Alquileres activos</h2>";
echo getAlquileres($_SESSION["user"]);

echo "<h2>Alquileres terminados</h2>";
echo getAlquileresTerminados($_SESSION["user"]);


include "footer.php";
?>