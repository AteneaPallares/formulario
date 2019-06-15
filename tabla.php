
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
<body >

 
                
                
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
                <tr id="tablaimpresiones">
                        <th>Fecha</th>
                        <th>Tipo Impresión</th>
                        <th>Tipo de papel</th>
                        <th>No. Papel</th>
                        <th>No.Impresiones</th>
                </tr>
                </thead>
                <tbody> 
                <tr><td><a href="http://geogram.co">geogram.co</a></td><td>co</td><td>Internet</td><td>$49</td><td><a href="mailto:jeff@lookahead.io?subject=Offer for domain name: geogram.co">Purchase</a></td></tr>
                <tr><td><a href="http://newscloud.com">newscloud.com</a></td><td>com</td><td>News</td><td>$19999</td><td><a href="mailto:jeff@lookahead.io?subject=Offer for domain name: newscloud.com">Purchase</a></td></tr>
                <tr><td><a href="http://popcloud.com">popcloud.com</a></td><td>com</td><td>Music</td><td>$14999</td><td><a href="mailto:jeff@lookahead.io?subject=Offer for domain name: popcloud.com">Purchase</a></td></tr>
      
                </tbody>
                </table>
                <label>Bitácora: <?php echo  $bitacora?></label> 
                </br>
                <input type="button" value="Imprimir" onclick="imprimir();"  >
               
 <script>
     $(document).ready(function() 
    { 
        $("#tablaimpresionescompleta").tablesorter(); 
    } );
    
 
          $('#fechauno').datetimepicker();
            $('#fechados').datetimepicker();
 </script>               
</body>
</html>

