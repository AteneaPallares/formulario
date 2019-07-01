<?php 

date_default_timezone_set('America/Mexico_City');
$Noproyecto=$_POST['Noproyecto'];
$disenador=$_POST['disenador2'];
$fechacreacion=$_POST['fechacreacion'];
$Noorden=$_POST['Noorden'];
$Nombredelproyecto=$_POST['Nombredelproyecto'];
$Detalles=$_POST['Detalles'];
$Usuariosresponsable=$_POST['Usuarioresponsable'];
$area=$_POST['area'];
$fechaultima=$_POST['fechaultima'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$ordenservicio=$_POST['ordenservicio'];
$cantidadimpresos=$_POST['cantidadimpresos'];
$tabla=$_POST['tabla'];
$bitacora=$_POST['bitacora'];
?>
<html>
<head>
<title>Reporte</title>
<script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datetimepicker-master/jquery.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="CSS/style.css">
        <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />
</head>
<body onload="cargar();">
<br></br>
<br></br>
<br></br>
<div class="container">
            <div class="row">
<div class="seccion">
<table width="100%" border="1" bordercolor="black" cellspacing="10" cellpadding="10">
<tr ><td colspan="2"><center><h4>Nombre del proyecto: "<?php echo  $Nombredelproyecto?>"</h4><center></td> </tr>
  <tr> 
  <td><label>Número del proyecto: <?php echo  $Noproyecto?></label> </td>
  <td> <label>Diseñador asignado: <?php echo  $disenador?></label> </td>
  </tr>
  <tr>
  <td><label>Fecha  <?php echo date("Y/m/d H:i"); ?></label> </td>
  <td> <label>Número de Orden: <?php echo $Noorden ?></label> </td>
  </tr>
  <tr>
  <tr><td colspan="2"> <label>Detalles: <?php echo  $Detalles?></label> </td></tr>
 <tr>
  <td colspan="2"><center><h4>Datos del cliente </h4> </center></td>
  </tr>
  <tr>
  <td> <label>Usuario Responsable: <?php echo $Usuariosresponsable ?></label> </td>
  <td> <label>Área: <?php echo $area ?></label> </td>
  </tr>
 
  
  <tr> 
  <td><label>Teléfono: <?php echo $telefono ?></label> </td>
  <td><label>Correo: <?php echo  $correo?></label></td>
   </tr>
</table>
 
   <input type="hidden"  id="tablaimpresiones" name="tablaimpresiones" value="<?php echo $tabla ?>"   onchange="agregarfila()">
                
                
                <div class=" col-sm-12 col-xs-12">
                <label id="estatusagregar"></label>
                </div>
                <div class=" col-sm-12 col-xs-12">
                
                </div>
                <h4>Filtrar Tabla (Inicio-Fin)</h4>
                <div class=" col-sm-12 col-xs-12" align="left"><input id="fechauno" style="width:40%;float:left;"
                        name="fechauno" value="2019/01/01 21:58"  onchange="movimientos();">
                   <input id="fechados" style="width:40%;float:left; "
                        name="fechados" value="<?php echo date("Y/m/d H:i");?>"  onchange="movimientos();"></div>        
               
               
                <?php
                addrow($tabla);
               ?>
                <label onload="agregarfila('vsf');">Bitácora: </label> 
                <textarea 
                            style="width:100%;   text-align: center; height:100px" id="bitacora1" type="text"
                            name="bitacora"><?php echo $bitacora ?></textarea>
                </br>
                <input type="button" value="Imprimir" onclick="imprimir();"  >
                </div>
 </div>
            </div>
               
<?php
function addrow($tabla){
   
    $filaacomodar = explode("?CFS.?", $tabla);
    $elimult = array_pop($filaacomodar);
    echo ' <table id="tablaimpresionescompleta" class="tablesorter" ">
    <thead>
    <tr>
            <th>Fecha</th>
            <th>Tipo Impresión</th>
            <th>Tipo de papel</th>
            <th>No. Papel</th>
            <th>No.Impresiones</th>
    </tr>
    </thead>
    <tbody>';
    $fi=1;
        foreach ($filaacomodar as $value) {
            $i=1;
            echo '<tr id="fil'.$fi.'">';
            $columnaacomodar=explode("?FS.?",$value);
            foreach ($columnaacomodar as $value2) {
                if($i==1){
                    echo '<td id="filcol'.$fi.'">'.$value2.'</td>';
                }elseif($i==4){
                    echo '<td id="filpap'.$fi.'">'.$value2.'</td>';
                }
                elseif($i==5){
                    echo '<td id="filimpre'.$fi.'">'.$value2.'</td>';

                }
                else{
                    echo '<td>'.$value2.'</td>';
                }
                
                $i++;
            }
            $fi++;
            echo '</tr>';
        }
    echo '</tbody>
    <tr>
    <td colspan="5"><hr></td>
 </tr>

     </table>';
}
?>   
 <script>
 var sumapapel=0;
var sumaimpresiones=0;
   $(document).ready(function() 
    { 
        $("#tablaimpresionescompleta").tablesorter(); 
    } );
 function movimientos(){
    var fecha1a=$("#fechauno").val();
    var fecha1 = Date.parse(fecha1a);
    var fecha2a=$("#fechados").val();
    var fecha2 = Date.parse(fecha2a);
    var table = document.getElementById("tablaimpresionescompleta");
    var rowtable=table.rows.length;
    sumapapel=0;
    sumaimpresiones=0;
    for(var y=1;y<rowtable-4;y++){
        var fechafila1=$("#filcol"+y+"").text();
        var fechafila = Date.parse(fechafila1);
        
        if(fechafila>=fecha1 && fechafila<=fecha2){
        var papelcampo1=$("#filpap"+y+"").text();
        var papelcampo=parseInt(papelcampo1);
        
        sumapapel=sumapapel+papelcampo;
        var impresionescampo1=$("#filimpre"+y+"").text();
        var impresionescampo=parseInt(impresionescampo1);
        sumaimpresiones=sumaimpresiones+impresionescampo;
        var fila=document.getElementById("fil"+y+"");
        fila.style.display = ""; 
        }
        else{
            var fila=document.getElementById("fil"+y+"");
        fila.style.display = "none"; 
        }
    }
    cambiar();
    document.getElementById('subtotalpapel').innerHTML=sumapapel;
    document.getElementById('subtotalimpresiones').innerHTML=sumaimpresiones;
    
 }
  
    // document.getElementById("tablaimpresionescompleta").deleteRow(1);
 
   
    
 
 function imprimir(){
     window.print();
 }
 
 function cambiar(){
     document.getElementById('totalimpre').innerHTML=$("#precioimpresiones").val()*sumaimpresiones;
     document.getElementById('totalpapel').innerHTML=$("#preciopapel").val()*sumapapel;
 }
       function agregarfila(valor){
           var table = document.getElementById("tablaimpresionescompleta");
           var rowtable=table.rows.length;
           sumapapel=0;
           sumaimpresiones=0;
           var nuevafila=$("#tablaimpresiones").val();
           separador = "?CFS.?", // un espacio en blanco
           filas = nuevafila.split(separador);
           filas.pop();
           var table = document.getElementById("tablaimpresionescompleta");
           var rowtable=table.rows.length;
           filas.forEach( function(valor, indice, array) {
               var rowCount = table.rows.length;
               separador = "?FS.?", // un espacio en blanco
               filas = valor.split(separador);
               var i=0;
               filas.forEach( function(columna, indice, array) {
                   if(i==3){
                       sumapapel=sumapapel+parseInt(columna);
                   }
                   if(i==4){
                       sumaimpresiones=sumaimpresiones+parseInt(columna);
                   }
                   i++;
               });
           });
           rowCount = table.rows.length;
           row = table.insertRow(rowCount);
           vcell = row.insertCell(0);
           vcell.innerHTML="";
           vcell = row.insertCell(1);
           vcell.innerHTML="";
           vcell = row.insertCell(2);
           vcell.innerHTML="SubTotal";
           vcell = row.insertCell(3);
           input = "<label id='subtotalpapel'>"+sumapapel+"</label>";
           vcell.innerHTML=input;
           vcell = row.insertCell(4);
           input = "<label id='subtotalimpresiones'>"+sumaimpresiones+"</label>";
           vcell.innerHTML=input;
           rowCount = table.rows.length;
           row = table.insertRow(rowCount);
           vcell = row.insertCell(0);
           vcell.innerHTML="";
           vcell = row.insertCell(1);
           vcell.innerHTML="";
           vcell = row.insertCell(2);
           vcell.innerHTML="Precio";
           vcell = row.insertCell(3);
            input = "<input type='number' id='preciopapel'value='1' onchange='cambiar()'>";
           vcell.innerHTML=input;
           vcell = row.insertCell(4);
           input = "<input type='number' id='precioimpresiones'value='1' onchange='cambiar()'>";
           vcell.innerHTML=input;
           rowCount = table.rows.length;
           row = table.insertRow(rowCount);
           vcell = row.insertCell(0);
           vcell.innerHTML="";
           vcell = row.insertCell(1);
           vcell.innerHTML="";
           vcell = row.insertCell(2);
           vcell.innerHTML="Total";
           vcell = row.insertCell(3);
           input = "<label id='totalpapel'></label>";
           vcell.innerHTML=input;
           vcell = row.insertCell(4);
           input = "<label id='totalimpre'></label>";
           vcell.innerHTML=input;
           eliminandofila=false;
           condicional=false;
           }
          function cargar(){
             
            agregarfila('efa');

            cambiar();
          }
          $('#fechauno').datetimepicker();
         $('#fechados').datetimepicker();
 </script>               
</body>
</html>

