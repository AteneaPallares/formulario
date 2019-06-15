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
<script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="./js/jquery-latest.js"></script> 
    <script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="./js/jquery.tablesorter.pager.js"></script> 
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />

    <title> Reporte </title>
</head>
<body onload="cargar();">
<h4>Nombre del proyecto: "<?php echo  $Nombredelproyecto?>"</h4> 
   <label>Número del proyecto: <?php echo  $Noproyecto?></label> 
  
   <label>Diseñador asignado: <?php echo  $disenador;?></label> 
 
   <label>Fecha inicial: <?php echo  $fechacreacion?></label> 
 
   <label>Número de Orden: <?php echo $Noorden ?></label> 
 
   
 
   <label>Detalles: <?php echo  $Detalles?></label> 
 
   <h4>Datos del cliente </h4> 
   <label>Usuario Responsable: <?php echo $Usuariosresponsable ?></label> 
 
   <label>Área: <?php echo $area ?></label> 
 
   <label>Última fecha: <?php echo date("Y/m/d H:i");  ?></label> 
  
   <label>Teléfono: <?php echo $telefono ?></label> 
  
   <label>Correo: <?php echo  $correo?></label> 

 
   <input type="hidden"  id="tablaimpresiones" name="tablaimpresiones" value="<?php echo $tabla ?>"   onchange="agregarfila()">
                
                
                <div class=" col-sm-12 col-xs-12">
                <label id="estatusagregar"></label>
                </div>
                <div class=" col-sm-12 col-xs-12">
                
                </div>
                <h4>Filtrar Tabla</h4>
                <div class=" col-sm-12 col-xs-12" align="left"><input id="fechauno" style="width:40%;float:left;"
                        name="fechauno" value="2019/01/01 21:58"  onchange="cargar()">
                        <center><label style="width:20%;float:left;">Fecha Inicio-Fin</label></center>
                   <input id="fechados" style="width:40%;float:left; "
                        name="fechados" value=""  onchange="cargar()"></div>        
               
                <table id="tablaimpresionescompleta" class="tablesorter">
                <thead>
                <tr>
                        <th>Fecha</th>
                        <th>Tipo Impresión</th>
                        <th>Tipo de papel</th>
                        <th>No. Papel</th>
                        <th>No.Impresiones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                addrow($tabla);
               ?>
               </tbody>
               <?php
               echo '<tr>';
                echo '<td colspan="5"><hr></td>';
            echo '</tr>';
            ?>
                </table>
                <label onload="agregarfila('vsf');">Bitácora: <?php echo  $bitacora?></label> 
                </br>
                <input type="button" value="Imprimir" onclick="imprimir();"  >
<?php
function addrow($tabla){
   
    $filaacomodar = explode("?CFS.?", $tabla);
    $elimult = array_pop($filaacomodar);
        foreach ($filaacomodar as $value) {
           echo '<script>alert("fila")</script>';
            echo '<tr>';
            $columnaacomodar=explode("?FS.?",$value);
            foreach ($columnaacomodar as $value2) {
                echo '<td>'.$value2.'</td>';
    
            }
            echo '</tr>';
        }
    
}
?>   
 <script>
     $(document).ready(function() 
    { 
        $("#tablaimpresionescompleta").tablesorter(); 
    } );
    
 var sumapapel=0;
var sumaimpresiones=0;
 function imprimir(){
     window.print();
 }
 function cambiar(){
     document.getElementById('totalimpre').innerHTML=$("#precioimpresiones").val()*sumaimpresiones;
     document.getElementById('totalpapel').innerHTML=$("#preciopapel").val()*sumapapel;
 }
       function agregarfila(valor){
      alert("entrando");
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
           vcell.innerHTML=sumapapel;
           vcell = row.insertCell(4);
           vcell.innerHTML=sumaimpresiones;
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

