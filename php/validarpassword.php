<!-- valida los datos para la creacion de un nuevo usuario en registrarse.php -->
<?php
 session_start();
 include 'conectar.php';
 $nombreuser=$_SESSION['nombre'];
$confirmar=$_POST['oficialpass'];
$password1=$_POST['password'];
$password2=$_POST['repassword'];
$sql="SELECT NOMBRE,PASSWOR FROM usuario";
$registrar=true;
if($password1!=$password2){
  $registrar=false;
    echo'
    <script>
            alert("Las contraseñas no coinciden");
            location.href = "../password.php";
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
    location.href = "../password.php";
</script>
';
}
else{
    echo '
    <script>
    alert("Contraseña incorrecta");
    location.href = "../password.php";
</script>';
  }

  ?>

