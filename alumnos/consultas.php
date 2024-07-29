
<?php
require 'conexion.php';

$consultar = "SELECT * FROM profesionista";
$query = mysqli_query($conexion, $consultar);
$array = mysqli_fetch_array($query);

?>