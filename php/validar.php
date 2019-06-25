<!-- valida los datos ingresado en el login.php -->
<?php
include 'conectar.php';
session_start();
$sql="SELECT NOMBRE,PASSWOR FROM usuario ";
$user=$_POST['nombre'];
$password=$_POST['password'];
if ($result=mysqli_query($link,$sql))
  {
  while ($row=mysqli_fetch_row($result))
    {
        if($user==$row[0] && $password==$row[1]){
                    if(isset($_POST['nombre'])){
                    $_SESSION['nombre'] = $_POST['nombre'];
                    echo '
                    <script>
                    location.href = "../encabezado.php";
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
    location.href = "../login.php";
    alert("Usuario o Contraseña Incorrectos");
    </script>';
}


?>

