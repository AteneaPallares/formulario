<!-- valida los datos para la creacion de un nuevo usuario en registrarse.php -->
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
$user = explode("+", $datosconexionbd[1]);
$password = explode("+", $datosconexionbd[2]);
$database = explode("+", $datosconexionbd[3]);

$usuario=$_POST['nombre'];
$password1=$_POST['password'];
$password2=$_POST['repassword'];
$correo=$_POST['correo'];
$link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
$sql="SELECT NOMBRE FROM usuario";
$registrar=true;
if($password1!=$password2){
  $registrar=false;
    echo'
    <script>
            alert("Las contraseñas no coinciden");
            location.href = "registrarse.php";
        </script>
        ';
        
}

if ($result=mysqli_query($link,$sql))
  {
  while ($row=mysqli_fetch_row($result))
    {
       if($usuario==$row[0]){
        $registrar=false;
        echo'
        <script>
                alert("El usuario ya existe");
                location.href = "registrarse.php";
            </script>
            ';
           
            break;
       }
    }
}

if($registrar==true){
mysqli_multi_query($link,"INSERT INTO usuario(NOMBRE,PASSWOR,CORREO) 
VALUES('$usuario','$password1','$correo')") or die("<h2>Error Guardando los datos</h2>");
 echo '
 <script>
 alert("Registro exitoso");
 location.href = "login.php";
</script>
';
}

?>