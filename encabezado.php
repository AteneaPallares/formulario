<!-- es la pagina principal, se encarga de mostrar los proyectos disponibles de cada usuario
y permite el filtro y ordenamiento de los datos -->
<html>
<head>
    <title>Lista</title>
    <script type='text/javascript' src="js/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#tablaproyec').DataTable( {
    language: {
        "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
    }
} );
} );
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
?>
<table id="tablaproyec" class="display" onchange="cerrar()">
  <thead>
    <tr >
      <th onclick="cerrar()">Column 1</th>
      <th onclick="cerrar()">Column 2</th>
      <th onclick="cerrar()">Column 2</th>
      <th onclick="cerrar()">Column 2</th>
      <th onclick="cerrar()">Column 2</th>

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
                
                
                <tr id="proyecto<?php echo $numpro;?>">
                    
                    <td onclick="nue('proyecto<?php echo $numpro;?>')"></td>
                    <td ><?php echo $numero?></td>
                    <td onclick="enviar('<?php echo $nomb?>','<?php echo $ultimodato ?>')"><?php echo $nomb?></td>
                    <td ><?php echo  $fecha?></td>
                    
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
                     <input type="hidden" id="IDmenu" name="IDmenu" value="<?php echo $ultimodato ?>">
                  <tr   colspan="5" class="proyecto<?php echo $numpro;?>">
                  <td>
                  <button onclick="enviarsecond('<?php echo $seleccion[0]?>')"><?php echo "<b>Fecha:</b> ".$seleccion[5]." <br><b> Diseñador:</b>  ".$seleccion[7]."<br><b>Estatus:</b> ".$estatus."<br><b>Observaciones:</b>".$seleccion[4]?></button>
                </td>
                    <td></td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    
                    
                    </tr>
                   
                
            <form id="enviaranuevo"action="nuevo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="IDmenu" name="IDmenu" value="<?php echo $ultimodato ?>">
            <input type="hidden" id="id2f" name="id" value="<?php echo $seleccion[0]?>">
            <input  type="hidden" id="submitmenu" name="submitmenu" value="<?php echo $nomb?>">
                   
            </form>
                   
                    <?php
                }}}
              
                ?>
                
           
            <?php
           
        }
            $i=$i+1;
        }
    }

        ?>

       <input type="button" value="Agregar"onclick="nue()" >
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
  function cerrar(){
    // alert("cerrando");
    // var x = document.getElementsByName("cerrando");
    //     var i;
    //           if (x.style.display != "none") {
    //               x.style.display = "none"; //ocultar fila 
    //           }
  }
    function nue(nombreproyec){
        // 
        // alert("entrando");
        // var table2 = document.getElementById(nombreproyec);
        // $("<span>Hello world!</span>").insertAfter(table2);
        var filas2 = document.getElementsByClassName(nombreproyec);
        var i;
          for (i = 0; i < filas2.length; i++) {
              if (filas2[i].style.display != "none") {
                  filas2[i].style.display = "none"; //ocultar fila 
            } else {
              filas2[i].style.display = ""; //mostrar fila 
              var table2 = document.getElementById(nombreproyec);
              $(filas2[i]).insertAfter(table2);
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