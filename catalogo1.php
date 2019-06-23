<html>
<?php include '_layout/catalogos.php'?>;
<body>
<center>
<label style="font-size:20px;">Tipo de Impresión</label><br>
<input class="w3-input" type="text" name="nombre" id="nom"><span><label style="color:red"id="agregando"></label></span><br>
<label><button  type="button" class="btn btn-info" onclick="enviar(); return false;">Agregar</button></label>
      </center>
<?php
$sql="SELECT NOMBRE,ID FROM tipoimpre";
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
include 'php/funcioncatalogos/catalogo1funcion.php'?>
<html>