<html>
<head>
<style>
  .w3-input{
    background: #D8D8D8;
   border: 1px solid #393939;
   border-radius: 5px 5px 5px 5px;
   color: black;
   text-align: center;
   font-size: 12px;
   padding: 5px;
  }
  </style>
<script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
<link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />
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
$sql="SELECT NOMBRE,ID FROM recibir";
if(isset($_SESSION['nombre']) && ($_SESSION['nombre']=="admin")){
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
<center>
<label style="font-size:20px;">Recibir por:</label><br>
<input class="w3-input" type="text" name="nombre" id="nom"><span><label style="color:red"id="agregando"></label></span><br>
<label><button  type="button" class="btn btn-info" onclick="enviar(); return false;">Agregar</button></label>

      </center>
<?php
if ($result=mysqli_query($link,$sql))
  {?>
  <table id="tabla" class="tablesorter" >
  <thead>
  <tr>
      <th><center>NOMBRE</center></th>
      <th><center>--------</center></th>
      <th><center>--------</center></th>
  </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
  while ($row=mysqli_fetch_row($result))
    {
        
        ?>
        
       <tr>
        <td id="table<?php echo $i?>"><?php echo $row[0] ?></td>
        <td style="width:10%"id="modific<?php echo $i?>"><label><button style="width:100%" class="btn btn-success" id="boton<?php echo $i?>" type="button" onclick="modificar('<?php echo $row[0]?>','<?php echo $i?>','<?php echo $row[1]?>'); return false;"><label id="p<?php echo $i?>">Modificar</label></button></label></td>
        <td style="width:10%"id="eliminar<?php echo $i?>"><label><button class="btn btn-success" id="eli<?php echo $i?>" type="button" onclick="eliminar('<?php echo $row[0]?>','<?php echo $i?>','<?php echo $row[1]?>'); return false;"><label>Eliminar</label></button></label></td>
        
        </tr>
        
    
<?php
$i++;
    }?>
    </tbody>
    </table>
    </body>
    <?php
  mysqli_free_result($result);
}
mysqli_close($link);
 
?>
<script>
$(document).ready(function() 
    { 
        $("#tabla").tablesorter(); 
    } );
var modific=true;
function enviar(){
    document.getElementById("agregando").innerHTML="";
         if($("#nom").val()!=""){
                  var parametros = {
                "valor" : $("#nom").val(),
                "tabla": "recibir"
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
                        location.href = "catalogo3.php";
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
                "tabla": "recibir"
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
                        location.href = "catalogo3.php";
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
    document.getElementById("p"+numero).innerHTML="  Aceptar  ";
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
                "tabla": "recibir"
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
                        location.href = "catalogo3.php";
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