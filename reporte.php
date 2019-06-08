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
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
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
                        name="fechados" value="<?php echo date("Y/m/d H:i"); ?>"  onchange="cargar()"></div>        
               
                <table id="tablaimpresionescompleta"  >
                <tr id="tablaimpresiones">
                        <th>Fecha</th>
                        <th>Tipo Impresión</th>
                        <th>Tipo de papel</th>
                        <th>No. Papel</th>
                        <th>No.Impresiones</th>
                </tr>
                </table>
                <label>Bitácora: <?php echo  $bitacora?></label> 
                </br>
                <input type="button" value="Imprimir" onclick="imprimir();"  >
               
 <script>
 var sumapapel=0;
var sumaimpresiones=0;
 function imprimir(){
     window.print();
 }
 function cambiar(){
     document.getElementById('totalimpre').innerHTML=$("#precioimpresiones").val()*sumaimpresiones;
     document.getElementById('totalpapel').innerHTML=$("#preciopapel").val()*sumapapel;
 }
 function eliminarfila(fila){
          var cadena=$("#tablaimpresiones").val();
          var res = cadena.replace(fila, "");
          document.getElementById('tablaimpresiones').value=res;
          eliminandofila=true;
          condicional=true;
          agregarfila("false");
       
          
      }
       function agregarfila(valor){
      
          if((($("#tipoimpresion").val()!="")&&($("#tipopapel").val()!=""))|| condicional==true)
          {
           
           var hoy = new Date();
           var dd = hoy.getDate();
           var mm = hoy.getMonth()+1;
           var yyyy = hoy.getFullYear();
           var minutos=hoy.getMinutes();
           if(dd<10) {
               dd='0'+dd;
           } 
           
           if(mm<10) {
               mm='0'+mm;
           } 
           if(minutos<10) {
               minutos='0'+minutos;
           } 
           var fecha=yyyy + "/" + mm + "/" + dd+ " "+hoy.getHours()+":"+minutos; 
           if(valor=="true"){
       document.getElementById('fechados').value=fecha;
      }
           if($("#cantidadpapel").val()==""){document.getElementById('cantidadpapel').value=0;}
           if($("#cantidadimpresiones").val()==""){document.getElementById('cantidadimpresiones').value=0;}
           document.getElementById('estatusagregar').innerHTML="";
           if(eliminandofila==true){
           var nuevafila=$("#tablaimpresiones").val();
           }
           else{
           var nuevafila=$("#tablaimpresiones").val()+fecha+"?FS.?"+$("#tipoimpresion").val()+"?FS.?"+$("#tipopapel").val()+"?FS.?"+$("#cantidadpapel").val()+"?FS.?"+$("#cantidadimpresiones").val()+"?CFS.?";
           }
           separador = "?CFS.?", // un espacio en blanco
           filas = nuevafila.split(separador);
           filas.pop();
           var table = document.getElementById("tablaimpresionescompleta");
           var rowtable=table.rows.length;
           if(table.rows.length>1){
               for(var i=1;i<rowtable;i++){
                   document.getElementById("tablaimpresionescompleta").deleteRow(1);
                    
               }
           }
           sumapapel=0;
           sumaimpresiones=0;
           filas.forEach( function(valor, indice, array) {
               
               var rowCount = table.rows.length;
               var row = table.insertRow(rowCount);
               separador = "?FS.?", // un espacio en blanco
               filas = valor.split(separador);
               var i=0;
               var fechafila=filas[0];
               var fecha1=$("#fechauno").val();
               var fecha2=$("#fechados").val();

               if(fechafila>=fecha1 && fechafila<=fecha2){
               filas.forEach( function(columna, indice, array) {
                  
                   var cell = row.insertCell(i);
                   cell.innerHTML=columna;
                   if(i==3){
                       sumapapel=sumapapel+parseInt(columna);
                   }
                   if(i==4){
                       sumaimpresiones=sumaimpresiones+parseInt(columna);
                   }
                   i++;
               });
              
               }
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
          else{
              document.getElementById('estatusagregar').innerHTML="Faltan datos por llenar ";
             
          }
               
           }
          function cargar(){
              eliminarfila('');
              cambiar();
          }
          $('#fechauno').datetimepicker();
            $('#fechados').datetimepicker();
 </script>               
</body>
</html>

