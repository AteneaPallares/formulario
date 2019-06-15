<?php 
// eliminar los proyectos 
$file = fopen("conexion.txt", "r") or exit("Unable to open file!");
$datosconexionbd;
$i=0;
while(!feof($file))
{
    $datosconexionbd[$i]=fgets($file);
    $i++;
}
fclose($file);
$host = explode("+", $datosconexionbd[0]);
$user = explode("+", $datosconexionbd[1]);
$password = explode("+", $datosconexionbd[2]);
$database = explode("+", $datosconexionbd[3]);


$resultado = $_POST['valor'];
$tabla=$_POST['tabla'];
 // porción1
$link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
$sql="SELECT NOMBRE,ID FROM $tabla";
mysqli_multi_query($link,"INSERT INTO $tabla(NOMBRE) 
VALUES('$resultado')") or die("<h2>Error Guardando los datos</h2>");
mysqli_close($link);
?>