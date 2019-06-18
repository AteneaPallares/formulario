<!-- es la pagina principal, se encarga de mostrar los proyectos disponibles de cada usuario
y permite el filtro y ordenamiento de los datos -->
<html>
<head>
    <title>Lista</title>
<script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>

            <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
            <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.js"></script>
            <link rel="stylesheet" href="estilos.css">
            <script type="text/javascript" src="/details-shim/details-shim.min.js"></script>
            <link rel="stylesheet" type="text/css" href="/details-shim/details-shim.min.css">
<script type="text/javascript">
</script>
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
  $user = explode("+", $datosconexionbd[1]);
  $password = explode("+", $datosconexionbd[2]);
  $database = explode("+", $datosconexionbd[3]);
  session_start();
if(isset($_SESSION['nombre'])){ 
  $username=$_SESSION['nombre'];
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
        
        if($username=="admin"){
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

<form action="encabezado.php" method="post" target="_self">
  <label class="textoordenar">Ordenar y Filtrar datos</label>
  <br></br>
<select name="ordenar" id="ordenarlista">
<option value="NUMERO" >Número de proyecto</option>
<option value="PROYECTO" >Nombre de proyecto</option>
</select>
<select name="filtro" id="filtro">
<option value="7" >Todo</option>
<option value="1" >Info</option>
<option value="2" >Propuesta</option>
<option value="3" >Revisión</option>
<option value="4" >Vobo</option>
<option value="5" >Impresión</option>
<option value="6" >Entregado</option>
</select>
<select name="orden" id="orden">
<option value="ASC" >Ascendente</option>
<option value="DESC" >Descendente</option>
</select>
<button type="submit" class="ordenar">Ordenar y filtrar</button>
</form>

<label style="width:8%;" ><center>No. Proyecto</center></label>
<label style="width:60%;"><center>Proyecto</center></label>
<label style="width:16%;"><center>Fecha</center></label>
<img src="Imagenes/tache.jpg" onclick="eliminar()" width="5%" ></div>

<?php

if(isset($_POST['ordenar']) && !empty($_POST['ordenar'])){
    $seleccion=$_POST['ordenar'];
}
else{
    $seleccion="PROYECTO";
}
if(isset($_POST['filtro']) && !empty($_POST['ordenar'])) {
  $filtro=$_POST['filtro'];
} else{
  $filtro=7;
}
if(isset($_POST['orden']) && !empty($_POST['orden'])){
    $orden=$_POST['orden'];
}
else{
    $orden="ASC";
}


$link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
$sql="SELECT ID,NUMERO,PROYECTO,FECHA,FECHADOS FROM datos  ORDER BY  $seleccion $orden";
$arreglo;
$i=0;
$comparar=0;
$ultimodato=null;
$repetido="";
$numpro=0;
if ($result=mysqli_query($link,$sql))
  {
  while ($row=mysqli_fetch_row($result))
    {
       
      $seguir=true;
        $aux;
        $nomb;
        $partes = explode("+", $repetido);
        foreach ($partes as $value) {
          if($row[1]==$value){
            $seguir=false;
            break;
          }
        }
        if($comparar!=$row[1] && $seguir==true){
            $comparar=$row[1];
           
            $numero;
            $fecha;
            $fecha1;
            $i=0;
            $arreglo[$i]=$comparar;
            $nuevo="SELECT ID,NUMERO,PROYECTO,FECHA,OBSERVACIONES,FECHADOS,ESTATUS1,DISENADOR,ACTIVO FROM datos WHERE NUMERO=$arreglo[$i] ORDER BY FECHADOS";
            if($rep=mysqli_query($link,$nuevo)){
              $filtrobool=false;
                while($sele=mysqli_fetch_row($rep)){
                  
                  if((($sele[6]==$filtro or $filtro=='7') &&($sele[7]==$username || $username=="admin"))&&($sele[8]=="1")){
                    $filtrobool=true;
                    $aux=$sele[0];
                    $nomb=$sele[2];
                    $numero=$sele[1];
                    $fecha=strftime("%d/%m/%Y", strtotime($sele[5]));
                  }
                  else{
                    $filtrobool=false;
                  }
                }
                if($filtrobool==true){
                  $repetido=$repetido."+".$numero;
                $ultimodato=$aux;
                $numpro++;
                ?>
                
                <table>
                <tr>
                    
                    <td style="width: 20%;"onclick="nue('proyecto<?php echo $numpro;?>')"></td>
                    <td style="width: 20%;" ><?php echo $numero?></td>
                    <td style="width: 20%;" onclick="enviar('<?php echo $nomb?>','<?php echo $ultimodato ?>')"><?php echo $nomb?></td>
                    <td style="width: 20%;"><?php echo  $fecha?></td>
                    
                    <td style="width: 20%;"><label ><input id="<?php echo $numero?>" class="check" type="checkbox" value="<?php echo $numero?>" ></label></td>
                    
                    </tr>
                <?php 
                if($tabla=mysqli_query($link,$nuevo)){
                while($seleccion=mysqli_fetch_row($tabla)){
                  $estatus;
                  if($seleccion[6]==1){
                    $estatus="Info";
                  }
                  if($seleccion[6]==2){
                    $estatus="Propuesta";
                  }
                  if($seleccion[6]==3){
                    $estatus="Revisión";
                  }
                  if($seleccion[6]==4){
                    $estatus="Vobo";
                  }
                  if($seleccion[6]==5){
                    $estatus="Impresión";
                  }
                  if($seleccion[6]==6){
                    $estatus="Entregado";
                  }
                   ?> 
                  
                   <tr>
                   <td style="display:none"colspan="5" class="proyecto<?php echo $numpro;?>">
                  <button onclick="enviarsecond('<?php echo $seleccion[0]?>')"><?php echo "<b>Fecha:</b> ".$seleccion[5]." <br><b> Diseñador:</b>  ".$seleccion[7]."<br><b>Estatus:</b> ".$estatus."<br><b>Observaciones:</b>".$seleccion[4]?></button>
                </td>
                </tr>
                
            <form id="enviaranuevo"action="nuevo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="IDmenu" name="IDmenu" value="<?php echo $ultimodato ?>">
            <input type="hidden" id="id2f" name="id" value="<?php echo $seleccion[0]?>">
            <input  type="hidden" id="submitmenu" name="submitmenu" value="<?php echo $nomb?>">
                   
            </form>
                   
                    <?php
                }}}
              
                ?>
               </table>
            
           
            <?php
           
        }
            $i=$i+1;
        }
    }

        ?>

       <input type="button" value="Agregar"onclick="nue()" >
                
   
    
<?php
echo '<script languaje="JavaScript">
            
var cadena="'.$repetido.'";
</script>';
    }
  mysqli_free_result($result);
mysqli_close($link);
?>
<script>
    function nue(nombreproyec){
        // 
        
        var filas2 = document.getElementsByClassName(nombreproyec);
        var i;
          for (i = 0; i < filas2.length; i++) {
              if (filas2[i].style.display != "none") {
                  filas2[i].style.display = "none"; //ocultar fila 
            } else {
              filas2[i].style.display = ""; //mostrar fila 
            }
          }
    }
function enviar(dato,idmenu){
    $("#id2f").remove();
    document.getElementById('IDmenu').value=idmenu;
    document.getElementById('submitmenu').value=dato;
    document.getElementById('id2f').value="";
    document.getElementById('enviaranuevo').submit();
}
function enviarsecond(dato){
    $("#submitmenu").remove();
    document.getElementById('id2f').value=dato;
    document.getElementById('enviaranuevo').submit();
}

            
        
        // filas2.style.display = "none"; 
    
  function eliminar(){
   
    separador = "+", // un espacio en blanco
        arregloDeSubCadenas = cadena.split(separador);
        arregloDeSubCadenas.shift();
        arregloDeSubCadenas.forEach( function(valor, indice, array) {
          
          var d=document.getElementById(''+valor+'').checked;
          
                if(d){
                  var parametros = {
                "valor" : valor,
                "cambiar": 0
        };
        $.ajax({
                data:  parametros,
                url:   'eliminar.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.reload(true);
                }
        });
                 
      }});
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
  
</body>
</html>