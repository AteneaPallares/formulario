<!-- registra un nuevo usuario con la opcion de añadir que se encuentra en el select en nuevo.php -->
<?php 
$username = $_POST['nombreuser'];
$password = $_POST['passworduser'];
$correo = $_POST['correouser'];
$link = mysqli_connect("localhost","root","","form") or die("<h2>No se encuentra el servidor</h2>");
mysqli_multi_query($link,"INSERT INTO usuario(NOMBRE,PASSWOR,CORREO) 
VALUES('$username','$password','$correo')") or die("<h2>Error Guardando los datos</h2>");

mysqli_query($link,$sql);
mysqli_close($link);
?>