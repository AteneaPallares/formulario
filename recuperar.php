<!-- es la pagina principal, se encarga de mostrar los proyectos disponibles de cada usuario
y permite el filtro y ordenamiento de los datos -->
<html>
    <title>Lista</title>
<?php include '_layout/encabezado.php'?>
<head>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
  
  <?php
  include 'php/conectar.php';
  $username=$_SESSION['nombre'];
  ?>
<h2>"Recuperar Proyectos Eliminados"</h2>
<form action="recuperar.php" method="post" target="_self">
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
<img src="Imagenes/paloma.png" onclick="eliminar()" width="5%" height="5%" ></div>

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


$sql="SELECT ID,NUMERO,PROYECTO,FECHA,FECHADOS FROM datos  ORDER BY  $seleccion $orden";
$arreglo;
$i=0;
$comparar=0;
$ultimodato=null;
$repetido="";

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
                  
                  if((($sele[6]==$filtro or $filtro=='7'))&&($sele[8]=="0")){
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
                ?>
                <form action="nuevo.php" method="POST" enctype="multipart/form-data">
                <details>
                    <summary ><input type="hidden"  name="IDmenu" value="<?php echo $ultimodato ?>">
                    <div class="input-group">
                      <input class="numeroinput" value="<?php echo $numero?>" type="button" style="cursor: default">
                    <input class="estilo1" type="submit" name="submitmenu" value="<?php echo $nomb?>">
                    <input class="fecha" value="<?php echo  $fecha?>" type="button" style="cursor: default">
                    
                    <span ><label ><input id="<?php echo $numero?>" class="check" type="checkbox" value="<?php echo $numero?>" ></label></span>
                    
                  </div>
                 </summary>
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
                   <div class=" col-sm-12 col-xs-12 ">
                  
                  <button class="estilo2" type="submit" name="id" value="<?php echo $seleccion[0]?>"><?php echo "<b>Fecha:</b> ".$seleccion[5]." <br><b> Diseñador:</b>  ".$seleccion[7]."<br><b>Estatus:</b> ".$estatus."<br><b>Observaciones:</b>".$seleccion[4]?></button>
                   </div>
                </form>
                   
                    <?php
                }}}
              
                ?>
               
            </details>
            <?php
           
        }
            $i=$i+1;
        }
    }
        ?>

       
   
    
<?php
echo '<script languaje="JavaScript">
            
var cadena="'.$repetido.'";
</script>';
    }
  mysqli_free_result($result);
mysqli_close($link);
?>
<script>
  function eliminar(){
   
    separador = "+", // un espacio en blanco
        arregloDeSubCadenas = cadena.split(separador);
        arregloDeSubCadenas.shift();
        arregloDeSubCadenas.forEach( function(valor, indice, array) {
          
          var d=document.getElementById(''+valor+'').checked;
          
                if(d){
                  var parametros = {
                "valor" : valor,
                "cambiar": 1
        };
        $.ajax({
                data:  parametros,
                url:   'php/eliminar.php',
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
  
</body>
</html>