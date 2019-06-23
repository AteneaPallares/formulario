<?php 
// eliminar los proyectos 
include '../conectar.php';
$cambiar = $_POST['valor'];
$id = $_POST['valor1'];
$tabla=$_POST['tabla'];
 // porción1
$sql="SELECT NOMBRE,ID FROM $tabla";
mysqli_multi_query($link,"UPDATE $tabla SET NOMBRE = '$cambiar' WHERE ID = '$id'") or die("<h2>Error Guardando los datos</h2>");

mysqli_close($link);
?>