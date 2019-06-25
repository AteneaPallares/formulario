<!-- valida los datos para la creacion de un nuevo usuario en registrarse.php -->
<?php
include ("conectar.php");  
$usuario=$_POST['nombre'];
$password1=$_POST['password'];
$password2=$_POST['repassword'];
$correo=$_POST['correo'];
$sql="SELECT NOMBRE FROM usuario";
$registrar=true;
if($password1!=$password2){
  $registrar=false;
    echo'
    <script>
            alert("Las contraseñas no coinciden");
            location.href = "../registrarse.php";
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
                location.href = "../registrarse.php";
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
 location.href = "../login.php";
</script>
';
}

?>