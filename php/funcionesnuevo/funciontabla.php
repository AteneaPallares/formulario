<script>
      var condicional = false;
        var eliminandofila = false;
        function eliminarfila(fila) {

            var cadena = $("#tablaimpresiones").val();
            var res = cadena.replace(fila, "");
            document.getElementById('tablaimpresiones').value = res;
            eliminandofila = true;
            condicional = true;
            agregarfila("false");


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
                    var fecha1 = $("#fechauno").val();
                    var fecha2 = $("#fechados").val();

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

                        var cellimg = row.insertCell(5);
                        var myvar = <?php echo json_encode($Htablaimpre); ?>;
                        if (myvar == "enabled") {
                            var input = "<img style='cursor: pointer' name='" + valor + "?CFS.?" + "' src='Imagenes/tache.jpg' onclick='eliminarfila(this.name);reporte();'; >";

                            cellimg.innerHTML = input;
                        }
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