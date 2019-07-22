<!-- es la pagina principal, se encarga de mostrar los proyectos disponibles de cada usuario
y permite el filtro y ordenamiento de los datos -->
<html>
<head>
<title>Historial</title>
    <style>
        h2{
            color:#084B8A;
            text-align:center;
        }
        </style>
<?php include '_layout/encabezado.php';?>
<body>
<?php
include 'php/conectar.php';
if(isset($_POST['numeroproyec'])){$PROYECTONO=$_POST['numeroproyec'];}else{$PROYECTONO="";}
if(isset($_POST['nombreproyec'])){$PROYECTONAME=$_POST['nombreproyec'];}else{$PROYECTONAME="";}
$sql="SELECT ID,NUMERO,PROYECTO,FECHA,FECHADOS,ESTATUS1,RESPONSABLE,DISENADOR,DETALLES,IMPRESO,BITACORA,ORDEN FROM datos ";
$arreglo;
$i=0;
$comparar=0;
$ultimodato=null;
$repetido="";
$numpro=0;
?>
<h2>"<?php echo $PROYECTONAME;?>"</h2>
<table id="tablaproyec" class="display" onchange="cerrar()">
  <thead>
    <tr >
      <th >Fecha</th>
      <th >Estatus</th>
      <th >Cliente</th>
      <th >Diseñador</th>
      <th >Datos</th>
      <th >-------------</th>

    </tr>
</thead>
<tbody>
<?php
if ($result=mysqli_query($link,$sql))
  {
  while ($row=mysqli_fetch_row($result))
    {
      $estatus="No asignado";
      $disenador="";
       if($PROYECTONO==$row[1] && ($PROYECTONO!="")){
        $disenador=$row[7];
                if($row[5]==1){
                  $estatus="Info";
                }
                if($row[5]==2){
                  $estatus="Propuesta";
                }
                if($row[5]==3){
                  $estatus="Revisión";
                }
                if($row[5]==4){
                  $estatus="Vobo";
                }
                if($row[5]==5){
                  $estatus="Impresión";
                }
                if($row[5]==6){
                  $estatus="Entregado";
                }

                if($disenador==""){
                  $disenador="---";
                }
                ?>
                <tr>
                    <td ><?php echo $row[4]?></td>
                    <td ><?php echo  $estatus?></td>
                    <td ><?php echo $row[6]?></td>

                    <td ><?php echo $disenador?></td>
                    <td>
                        <table>
                        <tr><td>Impresiones: <?php echo $row[9]?><td><td>Usuario:<?php echo $row[6]?><td><td>Recibido:<?php echo $row[11]?><td><tr>
                            <tr><td colspan="3">Detalles: <?php echo $row[8]?><td><tr>
                            <tr><td colspan="3">Bitacora: <?php echo $row[10]?><td><tr>
            </table>  
                    </td>
                    <td width="20%">
                    <div class="input-group">
                    <form action="nuevo.php" method="post" target="_blank" enctype="multipart/form-data">
                    <input type="hidden" id="IDmenu" name="IDmenu" value="<?php echo $row[0]?>">
                    <input type="hidden" id="id2f" name="id" value="<?php echo $row[0]?>">
                    <input type="hidden" id="histo" name="histo" value="true">
                    <input type="submit" class="btn btn-success" value="Ver más">
                    </form>
               </label>
                    </div>
                    </td>
                    </tr>
                <?php 
           
                   
                }}
              
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

<?php include 'php/funcionhistorial.php';?>
</body>
</html>