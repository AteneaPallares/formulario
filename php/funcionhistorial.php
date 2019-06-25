
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