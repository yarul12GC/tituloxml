<?php
require 'conexion.php';

$consultar = "SELECT * FROM datosinstitucion";
$query = mysqli_query($conexion, $consultar);
$array =mysqli_fetch_array($query);

?>