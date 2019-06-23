<?php 
// eliminar los proyectos 
include '../conectar.php';
$resultado = $_POST['valor'];
$tabla=$_POST['tabla'];
$sql="SELECT NOMBRE,ID FROM $tabla";
mysqli_multi_query($link,"INSERT INTO $tabla(NOMBRE) 
VALUES('$resultado')") or die("<h2>Error Guardando los datos</h2>");
mysqli_close($link);
?>