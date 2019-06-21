<!-- es la pagina principal, se encarga de mostrar los proyectos disponibles de cada usuario
y permite el filtro y ordenamiento de los datos -->
<html>
<head>
    <style>
        h2{
            color:#084B8A;
            text-align:center;
        }
        </style>
    <title>Historial</title>
    <script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="funciones.js"></script>
    <title> Inicio </title>
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
  if(isset($_POST['numeroproyec'])){$PROYECTONO=$_POST['numeroproyec'];}else{$PROYECTONO="";}
  if(isset($_POST['nombreproyec'])){$PROYECTONAME=$_POST['nombreproyec'];}else{$PROYECTONAME="";}
    
  ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: red;">
  <a class="navbar-brand" href="encabezado.php" >Registro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="encabezado.php" style="color:#FF8000;">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nuevo.php" style="color:#FF0040;" >Agregar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="password.php" style="color:#4C0B5F;" >Configuración</a>
      </li>  
      <a class="nav-link " style="color:#086A87;" >Usuario:  <?php echo $_SESSION['nombre']?></a>
      <li class="nav-item">
        <a class="nav-link" href="session.php" style="color:#8A0808;" >Cerrar sesión</a>
      </li>
      <?php 
        
        if($username=="admin"){
          echo '
          <li class="dropdown ">
          <a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Catálogos
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="catalogo1.php" class="dropdown-item">Tipo de Impresión</a></li>
          <li><a href="catalogo2.php" class="dropdown-item">Tipo de Papel</a></li>
          <li><a href="catalogo3.php" class="dropdown-item">Recibir</a></li>
        </ul>
        </li>';
        echo '
          <li class="dropdown ">
          <a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Administrar
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="recuperar.php" class="dropdown-item">Recuperar</a></li>
        </ul>
        </li>';
        }
        ?>
      </li>
      
    </ul>
  </div>
</nav>



<?php

$link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
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
       if($PROYECTONO==$row[1] && ($PROYECTONO!="")){
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
                ?>
                <tr>
                    <td ><?php echo $row[4]?></td>
                    <td ><?php echo  $estatus?></td>
                    <td ><?php echo $row[6]?></td>
                    <td ><?php echo $row[7]?></td>
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
<script>
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
    
  function eliminar(valor){
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