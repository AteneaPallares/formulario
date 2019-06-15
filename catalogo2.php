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
<head>
<?php
session_start();

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
$link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
$sql="SELECT NOMBRE,ID FROM tipopapel";
if(isset($_SESSION['nombre'])&& ($_SESSION['nombre']=="admin")){
  $nombreuser=$_SESSION['nombre'];
?>
<body>
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

<label style="width:8%;" ><center>Nombre</center></label>
<input type="text" name="nombre" id="nom">
<button  type="button" onclick="enviar(); return false;">Agregar</button>
<label id="agregando"></label>
<?php
if ($result=mysqli_query($link,$sql))
  {?>
  <table id="tabla" >
  <tr>
      <th><center>NOMBRE</center></th>
      <th><center>--------</center></th>
      <th><center>--------</center></th>
  </tr>
      <?php
      $i=1;
  while ($row=mysqli_fetch_row($result))
    {
        
        ?>
       <tr>
        <td id="table<?php echo $i?>" ><?php echo $row[0] ?></td>
        <td id="modific<?php echo $i?>"><button id="boton<?php echo $i?>" type="button" onclick="modificar('<?php echo $row[0]?>','<?php echo $i?>','<?php echo $row[1]?>'); return false;"><p id="p<?php echo $i?>">Modificar</p></button></td>
        <td id="eliminar<?php echo $i?>"><button id="eli<?php echo $i?>" type="button" onclick="eliminar('<?php echo $row[0]?>','<?php echo $i?>','<?php echo $row[1]?>'); return false;">Eliminar</button></td>
        
        </tr>
    
<?php
$i++;
    }?>
    
    </table>
    </body>
    <?php
  mysqli_free_result($result);
}
mysqli_close($link);
 
?>
<script>
var modific=true;
function enviar(){
    document.getElementById("agregando").innerHTML="";
         if($("#nom").val()!=""){
                  var parametros = {
                "valor" : $("#nom").val(),
                "tabla": "tipopapel"
        };
        $.ajax({
                data:  parametros,
                url:   'agregarcatalogo.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.href = "catalogo2.php";
                }
        });
    }
    else{
        document.getElementById("agregando").innerHTML="Faltan datos";
    }
}
function eliminar(elemento,numero,id){
    
                  var parametros = {
                "valor": id,
                "tabla": "tipopapel"
        };
        $.ajax({
                data:  parametros,
                url:   'eliminarcat.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.href = "catalogo2.php";
                }
        });
}
function modificar(elemento,numero,id){
    if(modific==true){
    var table = document.getElementById("tabla");
    var rowtable=table.rows.length;
    for (var j = 1; j < rowtable; j++) {
        if(j!=numero){
            document.getElementById('boton'+j).disabled=true;
            document.getElementById('eli'+j).disabled=true;
        }
    }
    
    var name=document.getElementById("table"+numero);
    name.innerHTML="<input id='entrada"+numero+"'type='text' value='"+elemento+"'>";
    document.getElementById("p"+numero).innerHTML="Aceptar";
    modific=false;
}
else{
    var table = document.getElementById("tabla");
    var rowtable=table.rows.length;
    var name=document.getElementById("table"+numero);
    cadena=$("#entrada"+numero+"").val();
    name.innerHTML=cadena;
    document.getElementById("p"+numero).innerHTML="Modificar";
    for (var j = 1; j < rowtable; j++) {
            document.getElementById('boton'+j).disabled=false;
            document.getElementById('eli'+j).disabled=false;
        
    }
                  var parametros = {
                "valor" : cadena,
                "valor1": id,
                "tabla": "tipopapel"
        };
        $.ajax({
                data:  parametros,
                url:   'modificar.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.href = "catalogo2.php";
                }
        });
    modific=true;
}
    
 
}
</script>
<?php }
  else{
    echo '
    <script>
    location.href = "login.php";
</script>';
  }
  
  ?>
<html>