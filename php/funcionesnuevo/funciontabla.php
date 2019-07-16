<script>
      var condicional = false;
      var modificando="";
        var eliminandofila = false;
        function eliminarfila(fila) {
            var cadena = $("#tablaimpresiones").val();
            var res = cadena.replace(fila, "");
            document.getElementById('tablaimpresiones').value = res;
            eliminandofila = true;
            condicional = true;
            agregarfila("false");


        }
        function modificartabla(fila){
            var texto=document.getElementById('boton'+fila).value;
            if(texto=="Modificar"){
            var fechad=document.getElementById("tablaimpresionescompleta").rows[fila].cells[0];
            var tipoimpre=document.getElementById("tablaimpresionescompleta").rows[fila].cells[1];
            var tipopa=document.getElementById("tablaimpresionescompleta").rows[fila].cells[2];
            var nopa=document.getElementById("tablaimpresionescompleta").rows[fila].cells[3];
            var noimpre=document.getElementById("tablaimpresionescompleta").rows[fila].cells[4];

            modificando=fechad.innerText+"?FS.?"+tipoimpre.innerText+"?FS.?"+tipopa.innerText+"?FS.?"+nopa.innerText+"?FS.?"+noimpre.innerText+"?CFS.?";
            alert(modificando);
            
            // tipoimpre.innerHTML="<input id='impreval' name='"+fechad.innerText+"' type='text' value='"+tipoimpre.innerText+"'>";
            tipoimpre.innerHTML='<select class="cselect" name="'+fechad.innerText+'" id="impreval"><?php $sql="SELECT NOMBRE FROM tipoimpre ORDER BY NOMBRE";if ($result=mysqli_query($link,$sql)){while ($row=mysqli_fetch_row($result)){ ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>> <?php echo $row[0]?></option><?php }} ?></select>';
            // tipopa.innerHTML="<input id='papval' type='text' value='"+tipopa.innerText+"'>";
            tipopa.innerHTML='<select class="cselect"  id="papval"><?php $sql="SELECT NOMBRE FROM tipopapel ORDER BY NOMBRE";if ($result=mysqli_query($link,$sql)){while ($row=mysqli_fetch_row($result)){ ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>> <?php echo $row[0]?></option><?php }} ?></select>';
            nopa.innerHTML="<input id='noimpreval' type='text' value='"+nopa.innerText+"'>";
                       noimpre.innerHTML="<input id='nopapval' type='text' value='"+noimpre.innerText+"'>";

            document.getElementById('boton'+fila).value="Aceptar";
            var table = document.getElementById("tablaimpresionescompleta");
            var rowtable=table.rows.length;
             for (var j = 1; j < rowtable; j++) {
             if(j!=fila){
            document.getElementById('boton'+j).disabled=true;
            document.getElementById('eli'+j).disabled=true;
             }
            }
        
             }else{
            var modic=document.getElementById("tablaimpresiones").value;
            var fecha=document.getElementById("impreval").name;
            var impreval=document.getElementById("impreval").value;
            var papval=document.getElementById("papval").value;
            var noimpreval=document.getElementById("noimpreval").value;
            var nopapval=document.getElementById("nopapval").value;
            var total=fecha+"?FS.?"+impreval+"?FS.?"+papval+"?FS.?"+noimpreval+"?FS.?"+nopapval+"?CFS.?";
            var res = modic.replace(modificando, total);
            document.getElementById("tablaimpresiones").value=res;
            var table = document.getElementById("tablaimpresionescompleta");
            var rowtable=table.rows.length;
            document.getElementById('boton'+fila).value="Modificar";
            for (var j = 1; j < rowtable-1; j++) {
            document.getElementById('boton'+j).disabled=false;
            document.getElementById('eli'+j).disabled=false;
            }
            eliminarfila("");
        }
        }
        function agregarfila(valor) {

            if ((($("#tipoimpresion").val() != null) && ($("#tipopapel").val() != null)) || condicional == true) {

                var hoy = new Date();
                var dd = hoy.getDate();
                var mm = hoy.getMonth() + 1;
                var yyyy = hoy.getFullYear();
                var minutos = hoy.getMinutes();
                if (dd < 10) {
                    dd = '0' + dd;
                }

                if (mm < 10) {
                    mm = '0' + mm;
                }
                if (minutos < 10) {
                    minutos = '0' + minutos;
                }
                var fecha = yyyy + "/" + mm + "/" + dd + " " + hoy.getHours() + ":" + minutos;
                if (valor == "true") {
                    document.getElementById('fechados').value = fecha;
                }
                if ($("#cantidadpapel").val() == "") { document.getElementById('cantidadpapel').value = 0; }
                if ($("#cantidadimpresiones").val() == "") { document.getElementById('cantidadimpresiones').value = 0; }
                document.getElementById('estatusagregar').innerHTML = "";
                if (eliminandofila == true) {
                    var nuevafila = $("#tablaimpresiones").val();
                }
                else {
                    var nuevafila = $("#tablaimpresiones").val() + fecha + "?FS.?" + $("#tipoimpresion").val() + "?FS.?" + $("#tipopapel").val() + "?FS.?" + $("#cantidadpapel").val() + "?FS.?" + $("#cantidadimpresiones").val() + "?CFS.?";
                }
                separador = "?CFS.?", // un espacio en blanco
                    filas = nuevafila.split(separador);
                filas.pop();
                var table = document.getElementById("tablaimpresionescompleta");
                var rowtable = table.rows.length;
                if (table.rows.length > 1) {
                    for (var i = 1; i < rowtable; i++) {
                        document.getElementById("tablaimpresionescompleta").deleteRow(1);

                    }
                }
                var sumapapel = 0;
                var sumaimpresiones = 0;
                filas.forEach(function (valor, indice, array) {

                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    separador = "?FS.?", // un espacio en blanco
                        filas = valor.split(separador);
                    var i = 0;
                    var fechafila = filas[0];
                    fechafila=Date.parse(fechafila);
                    var fecha1a=$("#fechauno").val();
                    var fecha1 = Date.parse(fecha1a);
                    var fecha2a=$("#fechados").val();
                    var fecha2 = Date.parse(fecha2a);

                    if (fechafila >= fecha1 && fechafila <= fecha2) {
                        filas.forEach(function (columna, indice, array) {

                            var cell = row.insertCell(i);
                            cell.innerHTML = columna;
                            if (i == 3) {
                                sumapapel = sumapapel + parseInt(columna);
                            }
                            if (i == 4) {
                                sumaimpresiones = sumaimpresiones + parseInt(columna);
                            }
                            i++;
                        });
                        var numerodefila=indice+1;
                        var cellimg = row.insertCell(5);
                        var myvar = <?php echo json_encode($Htablaimpre); ?>;
                        if (myvar == "enabled") {
                            var input = "<input type='button' id='eli"+numerodefila+"' style='cursor: pointer' name='" + valor + "?CFS.?" + "' value='Eliminar' onclick='eliminarfila(this.name);reporte();'; >";

                            cellimg.innerHTML = input;
                        }
                        var cellmodif=row.insertCell(6);
                        cellmodif.innerHTML="<input type='button' id='boton"+numerodefila+"'name='"+numerodefila+"'value='Modificar' onclick='modificartabla(this.name)'>"
                    }
                });
                rowCount = table.rows.length;
                row = table.insertRow(rowCount);
                vcell = row.insertCell(0);
                vcell.innerHTML = "";
                vcell = row.insertCell(1);
                vcell.innerHTML = "";
                vcell = row.insertCell(2);
                vcell.innerHTML = "Total";
                vcell = row.insertCell(3);
                vcell.innerHTML = sumapapel;
                vcell = row.insertCell(4);
                vcell.innerHTML = sumaimpresiones;
                vcell = row.insertCell(5);
                vcell.innerHTML = "";
                document.getElementById('tablaimpresiones').value = nuevafila;
                document.getElementById('tipoimpresion').value = "";
                document.getElementById('tipopapel').value = "";
                document.getElementById('cantidadpapel').value = 0;
                document.getElementById('cantidadimpresiones').value = 0;
                eliminandofila = false;
                condicional = false;

            }
            else {
                document.getElementById('estatusagregar').innerHTML = "Faltan datos por llenar ";

            }

        }
    </script>