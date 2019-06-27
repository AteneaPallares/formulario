<?php 
// eliminar los proyectos 

include 'conectar.php';
$resultado = $_POST['valor'];
$cambiar = $_POST['cambiar'];
 // porción1
mysqli_multi_query($link,"UPDATE datos SET ACTIVO = $cambiar WHERE NUMERO = '$resultado'") or die("<h2>Error Guardando los datos</h2>");

mysqli_query($link,$sql);
mysqli_close($link);
?>