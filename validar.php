<!-- valida los datos ingresado en el login.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Pagina 2</title>
</head>
<body>
<?php
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
$user2 = explode("+", $datosconexionbd[1]);
$password2 = explode("+", $datosconexionbd[2]);
$database = explode("+", $datosconexionbd[3]);
$user=$_POST['nombre'];
$password=$_POST['password'];
$link = mysqli_connect($host[0],$user2[0],$password2[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
$sql="SELECT NOMBRE,PASSWOR FROM usuario ";
if ($result=mysqli_query($link,$sql))
  {
  while ($row=mysqli_fetch_row($result))
    {
        if($user==$row[0] && $password==$row[1]){
                    if(isset($_POST['nombre'])){
                    $_SESSION['nombre'] = $_POST['nombre'];
                    echo '
                    <script>
                    location.href = "encabezado.php";
                    </script>';
                    
                    }else{
                    if(isset($_SESSION['nombre'])){
                    
                    }else{
                    echo "Acceso Restringido";
                    }
                    }
        }
    }
}
if(isset($_SESSION['nombre'])){
                    
}else{
    echo '
    <script>
    location.href = "login.php";
    alert("Usuario o Contraseña Incorrectos");
    </script>';
}


?>
</body>
</html>
