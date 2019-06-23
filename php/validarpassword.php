<!-- valida los datos para la creacion de un nuevo usuario en registrarse.php -->
<?php
 session_start();
 if(isset($_SESSION['nombre'])){
     $nombreuser=$_SESSION['nombre'];
 
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

$confirmar=$_POST['oficialpass'];
$password1=$_POST['password'];
$password2=$_POST['repassword'];
$link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
$sql="SELECT NOMBRE,PASSWOR FROM usuario";
$registrar=true;
if($password1!=$password2){
  $registrar=false;
    echo'
    <script>
            alert("Las contraseñas no coinciden");
            location.href = "password.php";
        </script>
        ';
        
}

if ($result=mysqli_query($link,$sql))
  {
  while ($row=mysqli_fetch_row($result))
    {
       if($nombreuser==$row[0] && $row[1]==$confirmar){
           $registrar=true;
            break;
       }
       else{
        $registrar=false;
       }
    }
}

if($registrar==true){
mysqli_multi_query($link,"UPDATE usuario SET PASSWOR = '$password1' WHERE NOMBRE = '$nombreuser'") or die("<h2>Error Guardando los datos</h2>");
 echo '
 <script>
 alert("Contraseña Guardada");
    location.href = "password.php";
</script>
';
}
else{
    echo '
    <script>
    alert("Contraseña incorrecta");
    location.href = "password.php";
</script>';
  }
}
 else{
    echo '
    <script>
    location.href = "login.php";
</script>';
  }
  
  ?>

