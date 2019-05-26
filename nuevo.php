<!-- esta opcion guarda los datos de los formularios de crear un nuevo proyecto
, tambien muestra el historial. -->

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
    <script src="funciones.js"></script>
    <title> Nuevo Registro </title>
</head>

<body onload="cargarimagenes()">
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
    $nombreuser=$_SESSION['nombre'];
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
      
    </ul>
  </div>
</nav>

    <!-- Ver el historial -->
    <?php
            $link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
            $sql="SELECT ID,NUMERO FROM datos  ORDER BY NUMERO ASC";
            $aux=0;
            if ($result=mysqli_query($link,$sql))
            {
                while ($row=mysqli_fetch_row($result))
                    {
                        $aux=$row[1];
                    }
            }
            $urlimagen="https://www.loboswiki.com/Imagenes/imagen-tierna-de-lobos.jpg";
            date_default_timezone_set('America/Mexico_City');
            $numero=$aux+1;$Hnumero="disabled";
            $fecha=date("Y/m/d H:i");$Hfecha="enabled";
            $memo=0;$Hmemo="enabled";
            $orden=0;$Horden="enabled";
            $proyecto="";$Hproyecto="enabled";
            $info="";$Hinfo="enabled";$Hinfo="enabled";
            $imagenes="";$Himagenes="enabled";
            $logos="";$Hlogos="enabled";
            $detalles="";$Hdetalles="enabled";
            $responsable="";$Hresponsable="enabled";
            $tel="";$Htel="enabled";
            $area="";$Harea="enabled";
            $correo="";$Hcorreo="enabled";
            $fechados=date("Y/m/d H:i");$Hfechados="enabled";
            $noimpresos="";$Hnoimpresos="enabled";
            $bitacora="";$Hbitacora="enabled";
            $estatus1=0;
            $disenador="";$Hdisenador="enabled";
            $ordenservicio="";$Hordenservicio="enabled";
            $capturaservicio="";$Hcapturaservicio="enabled";
            $observaciones="";$Hobservaciones="enabled";
            $autoriza="";$Hautoriza="enabled";
            $tipoimpre="";$Htipoimpre="enabled";
            $nopapel=0;$Hnopapel="enabled";
            $tipopapel="";$Htipopapel="enabled";
            $noimpredos=""; $Hnoimpredos="enabled";
            $registrarse="enabled";
            $borrar="enabled";
            $quitar=false;
            $eliminar1="enabled";
            $eliminar2="enabled";
            $correcto="enabled";
            $activo="enabled";
            if(!empty($_POST['IDmenu'])){
                $registrarse=$activo;
                $eliminar1=$activo;
                $eliminar2=$activo;
                $borrar=$activo;
                if(isset($_POST['submitmenu'])){
                    $activo="enabled";
                    $correcto="disabled";
                    $quitar=false;
                    $IDS=$_POST['IDmenu'];
                }
                else{$activo="disabled";
                    $quitar=true;
                    $eliminar1="disabled";
                    $eliminar2="disabled";
                    $registrarse="disabled";
                    $borrar="disabled";
                    $correcto="disabled";
                    $IDS=$_POST['id'];}

            $link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
            $sql="SELECT NUMERO,FECHA,MEMO,ORDEN,PROYECTO,INFO,IMAGENES,LOGOS,DETALLES,RESPONSABLE,TEL,AREA,CORREO,FECHADOS,IMPRESO,BITACORA,ESTATUS1,DISENADOR,ORDENDOS,CAPTURA,OBSERVACIONES,AUTORIZA,TIPOIM,NOPAPEL,TIPOPAPEL,NOIMPRESIONES FROM datos WHERE ID=$IDS ORDER BY ID";
            if ($result=mysqli_query($link,$sql))
            {
            while ($row=mysqli_fetch_row($result))
                {
                    $numero=$row[0];$Hnumero=$correcto;
                    $fecha=$row[1];$Hfecha=$correcto;
                    $memo=$row[2];$Hmemo=$activo;
                    $orden=$row[3];$Horden=$activo;
                    $proyecto=$row[4];$Hproyecto=$correcto;
                    $info=$row[5];$Hinfo=$activo;
                    $imagenes=$row[6];$Himagenes=$activo;
                    $logos=$row[7];$Hlogos=$activo;

                    $detalles=$row[8];$Hdetalles=$activo;

                    $responsable=$row[9];$Hresponsable=$activo;
                    $tel=$row[10];$Htel=$activo;
                    $area=$row[11];$Harea=$activo;
                    $correo=$row[12];$Hcorreo=$activo;
                    if($quitar!=false){$fechados=$row[13];}else{$fechados=date("Y/m/d H:i");} $Hfechados=$activo;
                    $noimpresos=$row[14];$Hnoimpresos=$activo;
                    $bitacora=$row[15];$Hbitacora=$activo;
                    $estatus1=$row[16];
                    $disenador=$row[17];$Hdisenador=$activo;
                    $ordenservicio=$row[18];$Hordenservicio=$activo;

                    $capturaservicio=$row[19];$Hcapturaservicio=$activo;
                    $observaciones=$row[20];$Hobservaciones=$activo;
                    $autoriza=$row[21];$Hautoriza=$activo;
                    $tipoimpre=$row[22];$Htipoimpre=$activo;
                    $nopapel=$row[23];$Hnopapel=$activo;
                    $tipopapel=$row[24];$Htipopapel=$activo;
                    $noimpredos=$row[25];$Hnoimpredos=$activo;

                }
            mysqli_free_result($result);
            }
            mysqli_close($link);}
            ?>
    <!-- Código para crear el nuevo registro -->
    <form action="registro.php" method="POST" enctype="multipart/form-data" id="completo">
        <div class="container">
            <div class="row">
                <div class=" col-sm-6 col-xs-12"><label> No.Proyecto </label> <input type="number" name="numero"
                        value="<?php echo $numero ?>" <?php echo $Hnumero ?> required></div>
                <div class=" col-sm-6 col-xs-12"><label> Diseñador asignado </label>
                <label> <?php echo $disenador ?> </label>
                <select name="disenador" onchange="agregarusuario()" id="disenador">
                  <?php
                  $link = mysqli_connect($host[0],$user[0],$password[0],$database[0]) or die("<h2>No se encuentra el servidor</h2>");
                $sql="SELECT NOMBRE,PASSWOR FROM usuario ";
                        if ($result=mysqli_query($link,$sql))
                        {
                        while ($row=mysqli_fetch_row($result))
                            {
                                if($row[0]==$_SESSION['nombre']){
                                    $seleccionado="selected";
                                }
                                else{

                                    $seleccionado="unselected";
                                }
                               ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>><?php echo $row[0]?></option><?php
                            }
                        }
                        ?>
                        <option value="AnAdIr123asd45gfdert76">Añadir</option>

        </select>
        <input type="hidden" name="nombreusuarionuevo" id="nombreusuarionuevo">
        <input type="hidden" name="passwordsuarionuevo" id="passwordusuarionuevo">
        <input type="hidden" name="correosuarionuevo" id="correousuarionuevo">
        <input type="hidden" name="currentuser" id="currentuser" value="<?php echo $nombreuser ?>">
                    </div>
                <input type="hidden" name="numerodos" value="<?php echo $numero ?>">
                <input type="hidden" name="fechad" value="<?php echo $fecha ?>">
                <div class=" col-sm-12 col-xs-12 "><label style="width:20%">Fecha</label><input id="datetime"
                        style="width:70%" name="fechad" value="<?php echo $fecha ?>" <?php echo $Hfecha ?>></div>
                <div class=" col-sm-12 col-xs-12 "><label style="width:100%;   text-align: center;">SERVICIO DE
                        DISEÑO</label>
                </div>
                <div class=" col-sm-6 col-xs-12"><label> No. Memo </label> <input type="number" name="memo"
                        value="<?php echo $memo ?>" <?php echo $Hmemo ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> No.Orden </label> <input type="number" name="Orden"
                        value="<?php echo $orden ?>" <?php echo $Horden ?>></div>
                <div class=" col-sm-12 col-xs-12"><label style="width:20%"> Proyecto </label> <input style="width:70%"
                        type="text" name="proyecto" id="proyecto" value="<?php echo $proyecto ?>" <?php echo $Hproyecto ?> required>
                </div>
                <input type="hidden" name="proyectodos" value="<?php echo $proyecto ?>">
                <div class=" col-sm-6 col-xs-12"><label> Info Digital Completo </label><input type="text" name="info"
                        value="<?php echo $info ?>" <?php echo $Hinfo ?>> </div>
                <div class=" col-sm-6 col-xs-12"><label> Detalles del servicio </label><textarea type="text"
                        name="detalles"  <?php echo $Hdetalles ?>><?php echo $detalles ?></textarea></div>
                
                
                <!-- Inicio imagenes -->
                
                <div class=" col-sm-6 col-xs-12 ">
                    <input type="hidden" id="imagennueva" name="imagennueva" value="<?php echo $imagenes ?>">
                    <label> Imagenes </label><input type="file" id="cambio" name="img" onchange="inicializar1()"
                        value="<?php echo $imagenes ?>" <?php echo $Himagenes ?>>
                    <input type="button" onclick="eliminar('imagennueva','a');" value="Eliminar" <?php echo $eliminar1 ?>>
                    <div id="contenedor" style="overflow:scroll;height:100px;width:100%;background-image: url(Imagenes/eliminar.png);">

                    </div>
                </div>
                <div class=" col-sm-6 col-xs-12">
                    <input type="hidden" id="imagennuevados" name="imagennuevados" value="<?php echo $logos ?>">
                    <label> Logos </label><input type="file" id="cambiodos" name="log" onchange="inicializar2()"
                        value="<?php echo $logos ?>" <?php echo $Hlogos ?>>
                    <input type="button" onclick="eliminar('imagennuevados','b');" value="Eliminar" <?php echo $eliminar2 ?>>
                    <div id="contenedordos" style="overflow:scroll;height:100px;width:100%;background-image: url(Imagenes/eliminar.png);"> </div>

                </div>
                <!-- fin imagenes -->
                <div class=" col-sm-6 col-xs-12"><label> Usuario Responsable </label><input type="text" name="usuario"
                        value="<?php echo $responsable ?>" <?php echo $Hresponsable ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Telefono </label><input type="text" id="telefono" name="tel"
                        value="<?php echo $tel ?>" <?php echo $Htel ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Area </label><input type="text" name="area"
                        value="<?php echo $area ?>" <?php echo $Harea ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Correo </label> <input type="text" name="correo"
                        value="<?php echo $correo ?>" <?php echo $Hcorreo ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Fecha </label><input id="datetimedos" style="width:70%"
                        name="time" value="<?php echo $fechados ?>" <?php echo $Hfechados ?>></div>

                <div class=" col-sm-6 col-xs-12"><label> Cantidad impresos </label><input type="number" name="impreso"
                        value="<?php echo $noimpresos ?>" <?php echo $Hnoimpresos ?>></div>

                <div class=" col-sm-6 col-xs-12"><label> Orden de Servicio </label><input type="text"
                        name="ordenservicio" value="<?php echo $ordenservicio ?>" <?php echo $Hordenservicio ?>></div>
                <div class=" col-sm-12 col-xs-12"><label style="width:100%;   text-align: center;">ESTATUS DEL
                        SERVICIO</label>
                </div>
                <!-- radio -->
                <div class=" col-sm-12 col-xs-12">
                    <fieldset>
                        <legend>Estado</legend>
                        <label>Info<img id="radio" src="imagenes/info.png"><input class="centrado" type="radio"
                                name="estatus" value="1"
                                <?php if($estatus1=='1') {echo 'checked="checked"';}if($quitar==true){echo 'disabled=$activo';} ?>></label>
                        <label>Propuesta<img id="radio" src="imagenes/propuesta.png"><input type="radio" name="estatus"
                                value="2"
                                <?php if($estatus1=='2') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>></label>
                        <label>Revisión<img id="radio" src="imagenes/revision.png"><input type="radio" name="estatus"
                                value="3"
                                <?php if($estatus1=='3') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>
                        </label>
                        <label>Vobo<img id="radio" src="imagenes/vobo.png"><input type="radio" name="estatus" value="4"
                                <?php if($estatus1=='4') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>
                        </label>
                        <label>Impresión<img id="radio" src="imagenes/impresion.png"><input type="radio" name="estatus"
                                value="5"
                                <?php if($estatus1=='5') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>></label>
                        <label>Entregado<img id="radio" src="imagenes/entregado.png"><input type="radio" name="estatus"
                                value="6"
                                <?php if($estatus1=='6') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>></label>

                    </fieldset>
                </div>

                <!-- fin radio -->
                <div class=" col-sm-6 col-xs-12"><label> Captura de servicio </label><input type="text" name="captura"
                        value="<?php echo $capturaservicio ?>" <?php echo $Hcapturaservicio ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Observaciones del Servicio </label><textarea type="text"
                        name="observaciones"
                        <?php echo $Hobservaciones ?>><?php echo $observaciones ?></textarea></div>
                <div class=" col-sm-6 col-xs-12"><label> Autoriza SRIA. GENERAL</label><input type="text"
                        name="autoriza" value="<?php echo $autoriza ?>" <?php echo $Hautoriza ?>></div>
                <div class=" col-sm-12 col-xs-12"><label style="width:100%;   text-align: center;"> IMPRESIONES</label>
                </div>
                <div class=" col-sm-6 col-xs-12"><label> Tipo de impresión </label><input type="text"
                        name="tipoimpresion" value="<?php echo $tipoimpre ?>" <?php echo $Htipoimpre ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Cantidad de papel </label><input type="number"
                        name="cantidadpapel" value="<?php echo $nopapel ?>" <?php echo $Hnopapel ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Tipo de papel </label><input type="text" name="tipopapel"
                        value="<?php echo $tipopapel ?>" <?php echo $Htipopapel ?>></div>
                <div class=" col-sm-6 col-xs-12"><label> Cantidad impresiones </label><input type="number"
                        name="cantidadimpre" value="<?php echo $noimpredos ?>" <?php echo $Hnoimpredos ?>></div>
                <div class=" col-sm-12 col-xs-12"><label style="width:100%;   text-align: center;"> BITÁCORA</label>
                </div>
                <div class=" col-sm-12 col-xs-12"><textarea style="width:100%;   text-align: center; height:100px"
                        type="text" name="bitacora" <?php echo $Hbitacora ?>><?php echo $bitacora ?></textarea></div>
                <div class=" col-sm-12 col-xs-12">
                    <input style="width:30%;   text-align: center;" type="submit" name="submitdos" value="Guardar"
                        <?php echo $registrarse ?> />
                    <input style="width:30%;   text-align: center;" type="reset" <?php echo $borrar ?> />
                    <a href="encabezado.php"><input style="width:30%;   text-align: center;" type="button"
                            value="Regresar" /></a>
                </div>
                <div class=" col-sm-12 col-xs-12">></div>
            </div>
    </form>
    <?php
            if(isset($_POST['submitdos'])){
                require("registro.php");
            }
            ?>


 <!-- FUNCIONES DE JAVASCRIPT -->
 <script>
     function agregarusuario(){
        var dato = $(disenador).val();
        var nombreproyecto = $(proyecto).val();
        var select = document.getElementById("disenador");
     
        var entrar=true;
        var i=0;
         if(dato=="AnAdIr123asd45gfdert76"){
             var opt;
            var nombre = prompt("Nombre:", "");
            var correo= prompt("Correo:", "");
            
            if(nombre=="" || nombre==null){
                alert("Nombre vacio");
                entrar=false;
            }
            if(correo=="" || correo==null){
                entrar=false;
                alert("Correo vacio");
            }
            var sel = document.getElementById("disenador"); 

            for (var i = 0; i < sel.length; i++) {
                var opt = sel[i];
                if(nombre==opt.value){
                    alert("El usuario ya existe");
                    entrar=false;
                    break;
                }
            }
        if(entrar){
           
    select.options[select.options.length-1] = new Option(nombre, nombre, false, false);
    select.options[select.options.length] = new Option('Añadir', 'AnAdIr123asd45gfdert76', false, false);
    document.getElementById('nombreusuarionuevo').value=nombre;
    document.getElementById('passwordusuarionuevo').value="password123";
    document.getElementById('correousuarionuevo').value=correo;
    document.getElementById('disenador').value=nombre;
    var parametros = {
                "nombreuser":nombre,
                "passworduser": "password123",
                "correouser" : correo

        };
        $.ajax({
                data:  parametros,
                url:   'registrarnuevo.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
    var mensaje="mailto:"+ correo+"?subject=Asignar cuenta&body=%0D%0A Sr "+nombre+"%0D%0A %0D%0A El usuario es: "+nombre+" %0D%0A Contraseña: password123 %0D%0A %0D%0A";
    // 'mailto:anaateneados@gmail.com?subject=Interesting information&body=I thought you might find this information interesting: '
    window.location = mensaje + window.location;return false;
   

         }
         else{
             alert("Registro cancelado");
             document.getElementById('disenador').value=$(currentuser).val();
             document.getElementById('nombreusuarionuevo').value=null;
    document.getElementById('passwordusuarionuevo').value=null;
    document.getElementById('correousuarionuevo').value=null;
         }
         }


     }
    // Esta función se encarga de actualizar los contenedores de las imagenes
            function cargarimagenes(){
                arreglo= [$("#imagennueva").val(),$("#imagennuevados").val()];
                idimagen1="#imagennueva";
                contenedor1="#contenedor";
                idimagen2="#imagennuevados";
                contenedor2="#contenedordos";
                inicio(idimagen1,contenedor1,"a");
                inicio(idimagen2,contenedor2,"b");
            }
    // Esta función se encarga de eliminar todos los elementos de los div contenedores de imagenes
            function limpiar() {
                var d = document.getElementById("contenedor");
                while (d.hasChildNodes())
                d.removeChild(d.firstChild);
                var c = document.getElementById("contenedordos");
                while (c.hasChildNodes())
                c.removeChild(c.firstChild);
            }
    // Esta función se activa cuando se oprime el botón eliminar. Se encarga de cambiar la cadena que contiene
    // las direcciones de las imagenes y manda actualizar los div
            function eliminar(id,check){
                    nuevacadena= $("#"+id+"").val();
                    x=0;
                    separador = "?", // un espacio en blanco
                    arregloDeSubCadenas2 = nuevacadena.split(separador);
                    arregloDeSubCadenas2.pop();
                    arregloDeSubCadenas2.forEach( function(valor, indice, array) {
                        var d=document.getElementById(''+check+x+'').checked;
                        if(d){
                            aux=$("#"+check+x+"").val();
                            patron = aux+"?",
                            nuevoValor    = "",
                            nuevacadena = nuevacadena.replace(patron, nuevoValor);

                        }
                        x++;
                });
                    document.getElementById(''+id+'').value=nuevacadena;
                    limpiar();
                    cargarimagenes();
                }
    // En esta funcion se asignan las imagenes, los checkbox, y añade los elementos a los div de las imagenes
            function inicio(idimagen,idcontenedor,check){
                        i=0;
                        var URLactual = window.location;
                        var urldos=String(URLactual);
                        patron = '/nuevo.php',
                        nuevoValor = "",
                        nuevaCadena = urldos.replace(patron, nuevoValor);
                        var cadena= $(idimagen).val();
                        separador = "?", // un espacio en blanco
                        arregloDeSubCadenas = cadena.split(separador);
                        arregloDeSubCadenas.pop();
                        arregloDeSubCadenas.forEach( function(valor, indice, array) {
                        ruta=nuevaCadena+"/"+valor;
                        var principio = (valor.length)-5;
                        var  fin    = valor.length;
                        word= valor.substring(principio, fin);
                        iniciop = (valor.length)-4;
                        pdf = valor.substring(iniciop, fin);
                        if(word==".docx"){
                            $(idcontenedor).append('<label><a href="'+ruta+'" target="_blank"><img src="imagenes/word.jpg" height="70px"><input class="imagencheck" type="checkbox" id="'+check+i+'"  value="'+valor+'"></a></label>');
                        }
                        else if(pdf==".pdf"){
                            $(idcontenedor).append('<label><a href="'+ruta+'" target="_blank"><img src="imagenes/pdf.jpg" height="70px"><input class="imagencheck" type="checkbox" id="'+check+i+'"  value="'+valor+'"></a></label>');
                        }
                        else {
                            $(idcontenedor).append('<label><a href="'+ruta+'" target="_blank"><img src="'+valor+'" height="70px"><input class="imagencheck" type="checkbox" id="'+check+i+'"  value="'+valor+'"></a></label>'); }

                        i++;
                     });
                 }

        // Esta función se llama al insertar una nueva imagen en Imagenes
            function inicializar1(){
                insertarimagenes('cambio',"#cambio","#contenedor",0,'imagennueva');
                }
         // Esta función se llama al insertar una nueva imagen en Logos
            function inicializar2(){
                insertarimagenes('cambiodos',"#cambiodos","#contenedordos",1,'imagennuevados');
            }
        //  Esta funcion se encarga de modificar la cadena de las direcciones de las imagenes con ajax, llamando
        //  a actualizar.php para copiar los archivos a la carpeta archivosbd
            function insertarimagenes(cambio,cambioid,contenedor,iterador,imagennuevatex) {
                var URLactual = window.location;
                var urldos=String(URLactual);
                patron = '/nuevo.php',
                nuevoValor = "",
                nuevaCadena = urldos.replace(patron, nuevoValor);
                var inputFileImage = document.getElementById(cambio);
                var urlimagen = $(cambioid).val();
                urlimagen = urlimagen.split('\\');
                var file = inputFileImage.files[0];
                var data = new FormData();
                data.append('archivo', file);
                var url = "actualizar.php";
                $.ajax({
                    url: url,
                    type: 'POST',
                    contentType: false,
                    data: data,
                    processData: false,
                    cache: false,
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        valor="archivosbd/imagenes/"+urlimagen[urlimagen.length-1];
                        ruta=nuevaCadena+"/archivosbd/imagenes/"+urlimagen[urlimagen.length-1];
                        arreglo[iterador]+=valor;
                        arreglo[iterador]+="?";
                        document.getElementById(imagennuevatex).value=arreglo[iterador];
                        limpiar();
                        cargarimagenes();
                            }

                }).done(function(data){
                    if(data.ok){

                    }else {
                        alert(data.msg)

                    }
                })
            }
        // Este apartado es para hacer los calendarios de tipo datetimepicker
            $('#datetimedos').datetimepicker();
            $('#datetime').datetimepicker();
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