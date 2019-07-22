<!-- es la pagina principal, se encarga de mostrar los proyectos disponibles de cada usuario
y permite el filtro y ordenamiento de los datos -->
<html>
<?php include '_layout/encabezado.php';?>
<head>
<title>Proyectos</title>
</head>
<body>
  <?php
include 'php/conectar.php';
$sql="SELECT ID,NUMERO,PROYECTO,FECHA,FECHADOS,ESTATUS1,RESPONSABLE,DISENADOR FROM datos ";
$arreglo;
$i=0;
$comparar=0;
$ultimodato=null;
$repetido="";
$numpro=0;
?>
<table id="tablaproyec" class="display" onchange="cerrar()">
  <thead>
    <tr >
      <th >No.</th>
      <th >Fecha</th>
      <th >Nombre</th>
      <th >Estatus</th>
      <th>Información</th>
      <th >Cliente</th>
      <?php if($username=="admin" || $username=="gestor"){
        echo '<th >Diseñador</th>';
      }
      ?>
      
      <th >------------</th>
    </tr>
</thead>
<tbody>
<?php
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
           $comda="";
            $nuevo="SELECT ID,NUMERO,PROYECTO,FECHA,OPCIONES,FECHADOS,ESTATUS1,DISENADOR,ACTIVO,INFO FROM datos WHERE NUMERO=$arreglo[$i] ORDER BY FECHADOS";
            if($rep=mysqli_query($link,$nuevo)){
              $filtrobool=false;
                while($sele=mysqli_fetch_row($rep)){
                  
                  if((($sele[7]==$username || $username=="admin" || $username=="gestor"))&&($sele[8]=="1")){
                    $filtrobool=true;
                    $aux=$sele[0];
                    $nomb=$sele[2];
                    $comda=$sele[4];
                    $numero=$sele[1];
                    $info=$sele[9];
                    $disenador=$sele[7];
                    $estat=$sele[6];
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
                $estatus="";
                if($comda=="0"){
                if($estat==1){
                  $estatus="Info";
                }
                if($estat==2){
                  $estatus="Propuesta";
                }
                if($estat==3){
                  $estatus="Revisión";
                }
                if($estat==4){
                  $estatus="Vobo";
                }
                if($estat==5){
                  $estatus="Impresión";
                }
                if($estat==6){
                  $estatus="Entregado";
                }
                }
              elseif($comda=="2"){
                $estatus="Finalizado";
              }
              else{
                $estatus="No asignado";
              }
                ?>
                
                
                <tr id="fila<?php echo $numero?>">
                    <td><?php echo $numero?></td>
                    <td ><?php echo $fecha?></td>
                    <td onclick="agre('proyecto<?php echo $numero?>','fila<?php echo $numero?>')" id="fila<?php echo $numero?>"><?php echo $nomb?></td>
                    <td ><?php echo  $estatus?></td>
                    <td><?php if($info=="1"){echo 'Completa';}else{echo 'Incompleta';}?></td>
                    <td ><?php echo $row[6]?></td>
                    <?php if($username=="admin" || $username=="gestor"){
                      if($disenador!=""){
                  echo '<td >'.$disenador.'</td>';
                      }
                      else{
                        echo '<td >------</td>';
                      }
                  }?>
                    
                    <td>
                    <div class="input-group">
                    <form id="enviaranuevo"action="nuevo.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="IDmenu" name="IDmenu" value="<?php echo $ultimodato ?>">
                    <input type="hidden" id="id2f" name="id" value="<?php echo $sele[0]?>">
                    <input type="hidden" id="ultimovalor" name="ultimovalor" value="<?php echo $numero?>">
                    <input  type="hidden" id="submitmenu" name="submitmenu" value="<?php echo $nomb?>">
                    <input type="submit" class="btn btn-primary" value="Ir">
                    </form>
                    <form action="historial.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="numeroproyec" name="numeroproyec" value="<?php echo $numero ?>">
                    <input type="hidden" id="nombreproyec" name="nombreproyec" value="<?php echo $nomb ?>">
                    <input type="submit" class="btn btn-info" value="Historial">
                    </form>
                    <label>
                    <input type="button" onclick="eliminar('<?php echo $row[1]?>')" class="btn btn-danger" value="Eliminar">
              </label>
                    </div>
                    </td>
                    </tr>
                <?php 
           
                   
                }
              
                ?>
                
           
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
  include 'php/funcionencabezado.php';
?>
</body>
</html>