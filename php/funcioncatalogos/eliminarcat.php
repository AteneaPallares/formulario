<?php 
// eliminar los proyectos 

include '../conectar.php';
$resultado = $_POST['valor'];
$tabla=$_POST['tabla'];
 // porción1
$sql="DELETE FROM $tabla WHERE ID = $resultado";
mysqli_query($link,$sql);
mysqli_close($link);
?>