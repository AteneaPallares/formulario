<?php 
?>
<html>
<head>
<script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />

</head>
<body >
<table id="tablaimpresionescompleta" class="tablesorter" ">
    <thead>
    <tr>
            <th>Fecha</th>
            <th>Tipo Impresión</th>
            <th>Tipo de papel</th>
            <th>No. Papel</th>
            <th>No.Impresiones</th>
            <th>No. Papel</th>
    </tr>
    </thead>
    <tbody>
    
    <?php
    include 'php/conectar.php';
    session_start();
        $username=$_SESSION['nombre'];
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
                  
                  if(($sele[8]=='0')){
                    $filtrobool=true;
                    $aux=$sele[0];
                    $nomb=$sele[2];
                    $numero=$sele[1];
                    $disenador=$sele[7];
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
                
                <tr>
                <td  valign="top"><?php echo $disenador?></td>
                <td valign="top">
                <?php echo $nomb?>
                </td>
                <form action="nuevo.php" method="post" enctype="multipart/form-data">
                <td valign="top">
                <input class="btn btn-info" style="width:100%;" type="submit" name="submitmenu" value="<?php echo $nomb?>">
                </td>
                <td style="width:40%;" valign="top">
                
                <details>
                    <summary ><input type="hidden"  name="IDmenu" value="<?php echo $ultimodato ?>">
                   
                    <input type="hidden" name="submitmenu" value="<?php echo $nomb?>">
                      <input class="btn btn-info" style="width:50%;" type="submit"  value="Historial">
                  
                 </summary>
                 </form>
                 <form action="nuevo.php" method="post" enctype="multipart/form-data">
                 <input type="hidden"  name="IDmenu" value="<?php echo $ultimodato ?>">
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
                  <button class="btnhistorial"style="width:100%;" type="submit" name="id" value="<?php echo $seleccion[0]?>"><?php echo "<b>Fecha:</b> ".$seleccion[5]." <br><b> Diseñador:</b>  ".$seleccion[7]."<br><b>Estatus:</b> ".$estatus."<br><b>Observaciones:</b>".$seleccion[4]?></button>
                
                
                   
                    <?php
                }
                ?>
                </td>
                <td valign="top">
                <span ><label ><button class="btn btn-success" onclick="eliminar('<?php echo $numero;?>')" >Restaurar</button></label></span>
                </td>
                <td valign="top">
                <?php echo  $fecha?>
                </td><?php }}
                ?>
                </form>
            </details>
            
            </tr>
            <?php
           
        }
            $i=$i+1;
        }
    }
        ?>
        
        </tbody>

        </table>

       
   
    
<?php
echo '<script languaje="JavaScript">
            
var cadena="'.$repetido.'";
</script>';
    }
  mysqli_free_result($result);
mysqli_close($link);

   

?>   
 <script>
   $(document).ready(function() 
    { 
        $("#tablaimpresionescompleta").tablesorter(); 
    } );
 
  
    // document.getElementById("tablaimpresionescompleta").deleteRow(1);


          $('#fechauno').datetimepicker();
         $('#fechados').datetimepicker();
  function eliminar(valor){
      alert(valor);
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

