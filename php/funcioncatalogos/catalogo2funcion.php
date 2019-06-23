<script>
$(document).ready(function() 
    { 
        $("#tabla").tablesorter(); 
    } );
var modific=true;
function enviar(){
    document.getElementById("agregando").innerHTML="";
         if($("#nom").val()!=""){
                  var parametros = {
                "valor" : $("#nom").val(),
                "tabla": "tipopapel"
        };
        $.ajax({
                data:  parametros,
                url:   'php/funcioncatalogos/agregarcatalogo.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.href = "catalogo2.php";
                }
        });
    }
    else{
        document.getElementById("agregando").innerHTML="Faltan datos";
    }
}
function eliminar(elemento,numero,id){
    
                  var parametros = {
                "valor": id,
                "tabla": "tipopapel"
        };
        $.ajax({
                data:  parametros,
                url:   'php/funcioncatalogos/eliminarcat.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.href = "catalogo2.php";
                }
        });
}
function modificar(elemento,numero,id){
    if(modific==true){
    var table = document.getElementById("tabla");
    var rowtable=table.rows.length;
    for (var j = 1; j < rowtable; j++) {
        if(j!=numero){
            document.getElementById('boton'+j).disabled=true;
            document.getElementById('eli'+j).disabled=true;
        }
    }
  
    var name=document.getElementById("table"+numero);
    name.innerHTML="<input id='entrada"+numero+"'type='text' value='"+elemento+"'>";
    document.getElementById("p"+numero).innerHTML="  Aceptar  ";
    modific=false;
}
else{
    var table = document.getElementById("tabla");
    var rowtable=table.rows.length;
    var name=document.getElementById("table"+numero);
    cadena=$("#entrada"+numero+"").val();
    name.innerHTML=cadena;
    document.getElementById("p"+numero).innerHTML="Modificar";
    for (var j = 1; j < rowtable; j++) {
            document.getElementById('boton'+j).disabled=false;
            document.getElementById('eli'+j).disabled=false;
        
    }
                  var parametros = {
                "valor" : cadena,
                "valor1": id,
                "tabla": "tipopapel"
        };
        $.ajax({
                data:  parametros,
                url:   'php/funcioncatalogos/modificar.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        location.href = "catalogo2.php";
                }
        });
    modific=true;
}
    
 
}
</script>