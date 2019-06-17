<html>
<head>
<style>
    .estilo2{
    font-size: 15px;
    background:#F5A9D0;
    border:1px;
    width: 85%;
    border-radius: 15px;
    text-align: center;
    position:relative;
    
    white-space: normal;
    border-color: black;
    border-style: solid;
   
}
</style>  
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
function cambiar(){
    var fila=document.getElementById("mostrar");
        fila.style.display = "none"; 
}
</script>
</head>
<body>
<table id="tablaproyec" class="display">
    <thead>
        <tr >
            <th>Column 1</th>
            <th>Column 2</th>

        </tr>
    </thead>
    <tbody>

        <tr style="height:100px; " id="mostrar">
            <td><button style=" width:50px;">hofeTambién es una composición de caracteres imprimibles (con grafema) generados por un algoritmo de cifrado que, aunque no tienen sentido para cualquier persona, sí puede ser descifrado por su destinatario original. En otras palabras, un texto es un entramado de signos con una intención comunicativa que adquiere sentido en determinado contexto. </button></td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
<input type="button" value="Cambiar"onclick="cambiar();" >
                
</body>
</html>