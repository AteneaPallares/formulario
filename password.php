<!-- formulario para crear nuevo usuario -->
<html>

    <head>
    <script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <script src="funciones.js"></script>
        <title>Configuración</title></head>
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
$user = explode("+", $datosconexionbd[1]);
$password = explode("+", $datosconexionbd[2]);
$database = explode("+", $datosconexionbd[3]);
  session_start();
if(isset($_SESSION['nombre'])){
    $nombreuser=$_SESSION['nombre'];
    
  ?>
   <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: red;">
  <a class="navbar-brand" href="encabezado.php" >Registro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="encabezado.php" style="color:#FF8000;">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nuevo.php" style="color:#FF0040;" >Agregar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="password.php" style="color:#4C0B5F;" >Configuración</a>
      </li>  
      <a class="nav-link " style="color:#086A87;" >Usuario:  <?php echo $_SESSION['nombre']?></a>
      <li class="nav-item">
        <a class="nav-link" href="session.php" style="color:#8A0808;" >Cerrar sesión</a>
      </li>
      <?php 
        
        if($nombreuser=="admin"){
          echo '
          <li class="dropdown ">
          <a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Catálogos
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="catalogo1.php" class="dropdown-item">Tipo de Impresión</a></li>
          <li><a href="catalogo2.php" class="dropdown-item">Tipo de Papel</a></li>
          <li><a href="catalogo3.php" class="dropdown-item">Recibir</a></li>
        </ul>
        </li>';
        echo '
          <li class="dropdown ">
          <a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Administrar
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="recuperar.php" class="dropdown-item">Recuperar</a></li>
        </ul>
        </li>';
        }
        ?>
    </ul>
  </div>
</nav>

    <h1>Cambiar Contraseña</h1>
           <br>
        <form method="POST" action="validarpassword.php">
             
        <div class=" col-sm-6 col-xs-12"><label>Confirmar Contraseña</label>    
            <input style="width:50%;" id="oficialpass" type="password" name="oficialpass" required></div>  
            
                <div class=" col-sm-6 col-xs-12"><label>Nueva Contraseña</label>    
            <input style="width:50%;" id="password"type="password" name="password" required></div>
            <div class=" col-sm-6 col-xs-12"><label>Repetir Contraseña</label>    
            <input style="width:50%;" id="repassword"type="password" name="repassword" required></div>
            
            <input type="submit" name="submit" value="Guardar cambios"> 
</form>    
<?php }
 else{
    echo '
    <script>
    location.href = "login.php";
</script>';
  }?>
    <body>  
</html>      