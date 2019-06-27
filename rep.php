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

<?php



$sql="SELECT ID,NUMERO,PROYECTO,FECHA,FECHADOS FROM datos ";
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
                  
                  if(($sele[7]==$username)){
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
                    
                    <span ><label ><button onclick="eliminar('<?php echo $numero;?>')" ></label></span>
                    
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
  function eliminar(valor){
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
                 
      
    }
  </script>
  
</body>
</html>